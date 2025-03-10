<?php

namespace App\Models;

use App\Traits\UsesUuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Slider extends Model
{
    use SoftDeletes, UsesUuid;
    const UUID_FIELD = 'slider_id';
    const SUB_TITLE = 'slider_sub_title';
    const TITLE = 'slider_title';
    const IMAGE = 'slider_image';

    protected $primaryKey = self::UUID_FIELD;
    /**
     * Validation rules for Blog.
     */
    public static function rules($id = null)
    {
        $rules = [
            'columns.slider_title' => 'required|string|max:40',
            'columns.slider_sub_title' => 'required|string|max:22',
            'columns.slider_image' => 'required|image|mimes:jpeg,png,jpg|max:2048|dimensions:width=1920,height=1080',
        ];

        if ($id) {
            $rules['columns.slider_image'] = 'nullable|image|mimes:jpeg,png,jpg|max:2048|dimensions:width=1920,height=1080';
        }

        return $rules;
    }

    /**
     * Custom validation messages for Blog.
     */
    public static function messages()
    {
        return [
            'columns.slider_title.required' => 'The title field is required.',
            'columns.slider_title.string' => 'The title must be a valid string.',
            'columns.slider_title.max' => 'The title may not exceed 40 characters.',

            'columns.slider_sub_title.required' => 'The sub-title field is required.',
            'columns.slider_sub_title.string' => 'The sub-title must be a valid string.',
            'columns.slider_sub_title.max' => 'The sub-title may not exceed 22 characters.',

            'columns.slider_image.required' => 'The image is required.',
            'columns.slider_image.image' => 'The image must be a valid image file.',
            'columns.slider_image.mimes' => 'The image must be of type jpeg, png, or jpg.',
            'columns.slider_image.max' => 'The image size must not exceed 2 MB.',
            'columns.slider_image.dimensions' => 'The image must have dimensions of 1920x1080 pixels.',
        ];
    }
}