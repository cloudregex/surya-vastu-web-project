<?php

namespace App\Traits;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Schema;

trait UsesUuid
{
    /**
     * Boot method to assign UUID automatically when creating a new model.
     */
    protected static function bootUsesUuid()
    {
        static::creating(function ($model) {
            if (empty($model->{$model->getKeyName()})) {
                $model->{$model->getKeyName()} = (string) Str::uuid();
            }
        });
    }
    /**
     * UUIDs are not auto-incrementing.
     */
    public function getIncrementing()
    {
        return false;
    }

    /**
     * UUIDs should be treated as strings.
     */
    public function getKeyType()
    {
        return 'string';
    }

    /**
     * Get table columns dynamically, excluding timestamps.
     */
    public static function getColumns()
    {
        $model = new static(); // ✅ Get the instance of the current model
        $columns = Schema::getColumnListing($model->getTable()); // ✅ Get table columns

        // Define columns to exclude
        $excludeColumns = ['created_at', 'updated_at', 'deleted_at'];
        $filteredColumns = array_diff($columns, $excludeColumns);
        return array_fill_keys($filteredColumns, '');
    }
    /**
     * Ensure models using this trait have $guarded set to an empty array.
     */
    protected function initializeUsesUuid()
    {
        $this->guarded = []; // ✅ Automatically set $guarded = []
    }
}