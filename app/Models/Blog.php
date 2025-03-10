<?php

namespace App\Models;

use App\Traits\UsesUuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    use SoftDeletes, UsesUuid;

    const UUID_FIELD = 'blog_id';

    protected $primaryKey = self::UUID_FIELD;
    /**
     * Validation rules for Blog.
     */
    public static function rules($blogId = null)
    {
        $rules = [
            'columns.blog_title' => 'required|string|max:25|unique:blogs,blog_title',
            'columns.blog_user_name' => 'required|string|max:100',
            'columns.blog_description' => 'required|string|min:100',
            'columns.blog_date' => 'required|date',
            'columns.blog_image' => 'required|image|mimes:jpeg,png,jpg|max:2048|dimensions:width=500,height=350',
        ];
        if ($blogId) {
            $rules['columns.blog_title'] = 'required|string|max:100|unique:blogs,blog_title,' . $blogId . ',blog_id';
            $rules['columns.blog_image'] = 'nullable|image|mimes:jpeg,png,jpg|max:2048|dimensions:width=500,height=350';
        }
        return $rules;
    }

    /**
     * Custom validation messages for Blog.
     */
    public static function messages()
    {
        return [
            'columns.blog_title.required' => 'The blog title field is required.',
            'columns.blog_title.string' => 'The blog title must be a valid string.',
            'columns.blog_title.max' => 'The blog title may not exceed 25 characters.',
            'columns.blog_title.unique' => 'The blog title has already been taken.',

            'columns.blog_user_name.required' => 'The user name field is required.',
            'columns.blog_user_name.string' => 'The user name must be a valid string.',
            'columns.blog_user_name.max' => 'The user name may not exceed 25 characters.',

            'columns.blog_description.required' => 'The description field is required.',
            'columns.blog_description.string' => 'The description must be a valid string.',
            'columns.blog_description.min' => 'The description must be at least 100 characters long.',

            'columns.blog_date.required' => 'The date field is required.',
            'columns.blog_date.date' => 'The date must be a valid date.',

            'columns.blog_image.required' => 'The image field is required.',
            'columns.blog_image.image' => 'The image must be a valid image file.',
            'columns.blog_image.mimes' => 'The image must be of type: jpeg, png, or jpg.',
            'columns.blog_image.max' => 'The image size must not exceed 2 MB.',
            'columns.blog_image.dimensions' => 'The image must have dimensions of 500x350 pixels.',
        ];
    }
}