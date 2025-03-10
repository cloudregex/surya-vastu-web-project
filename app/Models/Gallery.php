<?php

namespace App\Models;

use App\Traits\UsesUuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Gallery extends Model
{
    use SoftDeletes, UsesUuid;

    const UUID_FIELD = 'gallery_id';

    protected $primaryKey = self::UUID_FIELD;

    /**
     * Validation rules for team.
     */
    public static function rules($galleryId = null)
    {
        $rules = [
            'columns.gallery_image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ];
        // dd($galleryId);
        if ($galleryId) {
            $rules['columns.gallery_image'] = 'nullable|image|mimes:jpeg,png,jpg|max:2048';
        }
        return $rules;
    }

    /**
     * Custom validation messages for team.
     */
    public static function messages()
    {
        return [
            'columns.gallery_image.required' => 'The image field is required.',
            'columns.gallery_image.image' => 'The image must be a valid image file.',
            'columns.gallery_image.mimes' => 'The image must be of type: jpeg, png, or jpg.',
            'columns.gallery_image.max' => 'The image size must not exceed 2 MB.',
        ];
    }
}