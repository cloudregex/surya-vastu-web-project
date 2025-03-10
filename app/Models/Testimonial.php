<?php

namespace App\Models;

use App\Traits\UsesUuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Testimonial extends Model
{
    use SoftDeletes, UsesUuid;
    const UUID_FIELD = 'testimonial_id';
    protected $primaryKey = self::UUID_FIELD;

    /**
     * Validation rules for Blog.
     */
    public static function rules($id = null)
    {
        $rules =   [
            'columns.testimonial_name' => 'required|string|max:25',
            'columns.testimonial_profession' => 'required|string|max:22',
            'columns.testimonial_image' => 'required|image|mimes:jpeg,png,jpg|max:2048|dimensions:width=400,height=400',
            'columns.testimonial_description' => 'required|string|max:120',
        ];

        if ($id) {
            $rules['columns.testimonial_image'] = 'nullable|image|mimes:jpeg,png,jpg|max:2048|dimensions:width=400,height=400';
        }

        return $rules;
    }

    /**
     * Custom validation messages for Blog.
     */
    public static function messages()
    {
        return [
            'columns.testimonial_name.required' => 'The name field is required.',
            'columns.testimonial_name.string' => 'The name must be a valid string.',
            'columns.testimonial_name.max' => 'The name may not exceed 25 characters.',

            'columns.testimonial_profession.required' => 'The profession field is required.',
            'columns.testimonial_profession.string' => 'The profession must be a valid string.',
            'columns.testimonial_profession.max' => 'The profession may not exceed 22 characters.',

            'columns.testimonial_image.required' => 'The image is required.',
            'columns.testimonial_image.image' => 'The image must be a valid image file.',
            'columns.testimonial_image.mimes' => 'The image must be in one of the following formats: jpeg, png, jpg.',
            'columns.testimonial_image.max' => 'The image size must not exceed 2 MB.',
            'columns.testimonial_image.dimensions' => 'The image must have dimensions of 400x400 pixels.',

            'columns.testimonial_description.required' => 'The description field is required.',
            'columns.testimonial_description.string' => 'The description must be a valid string.',
            'columns.testimonial_description.max' => 'The description may not exceed 120 characters.',
        ];
    }
}