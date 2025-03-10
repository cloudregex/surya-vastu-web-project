<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Quote extends Model
{
    use HasFactory;
    const UUID_FIELD = 'quote_id';

    protected $primaryKey = self::UUID_FIELD;
    public $incrementing = false;
    protected $keyType = 'string';

    protected static function booted()
    {
        static::creating(function ($quote) {
            // Generate a UUID only if it doesn't already exist
            if (empty($quote->quote_id)) {
                $quote->quote_id = Str::uuid();
            }
        });
    }
    protected $guarded = [];
}
