<?php

namespace App\Models;

use App\Traits\UsesUuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use SoftDeletes, UsesUuid;

    const UUID_FIELD = 'project_id';

    protected $primaryKey = self::UUID_FIELD;

    /**
     * Validation rules for Blog.
     */
    public static function rules($blogId = null)
    {
        $rules = [
            'columns.project_title' => 'required|string|max:25|unique:Projects,project_title',
            'columns.project_user_name' => 'required|string|max:25',
            'columns.project_description' => 'required|string|min:100',
            'columns.project_date' => 'required|date',
            'columns.project_image' => 'required|image|mimes:jpeg,png,jpg|max:2048|dimensions:width=600,height=500',
        ];
        if ($blogId) {
            $rules['columns.project_title'] = 'required|string|max:25|unique:Projects,project_title,' . $blogId . ',project_id';
            $rules['columns.project_image'] = 'nullable|image|mimes:jpeg,png,jpg|max:2048|dimensions:width=600,height=500';
        }
        return $rules;
    }

    /**
     * Custom validation messages for Blog.
     */
    public static function messages()
    {
        return [
            'columns.project_title.required' => 'The blog title field is required.',
            'columns.project_title.string' => 'The blog title must be a valid string.',
            'columns.project_title.max' => 'The blog title may not exceed 25 characters.',
            'columns.project_title.unique' => 'The blog title has already been taken.',

            'columns.project_user_name.required' => 'The user name field is required.',
            'columns.project_user_name.string' => 'The user name must be a valid string.',
            'columns.project_user_name.max' => 'The user name may not exceed 25 characters.',

            'columns.project_description.required' => 'The description field is required.',
            'columns.project_description.string' => 'The description must be a valid string.',
            'columns.project_description.min' => 'The description must be at least 100 characters long.',

            'columns.project_date.required' => 'The date field is required.',
            'columns.project_date.date' => 'The date must be a valid date.',

            'columns.project_image.required' => 'The image field is required.',
            'columns.project_image.image' => 'The image must be a valid image file.',
            'columns.project_image.mimes' => 'The image must be of type: jpeg, png, or jpg.',
            'columns.project_image.max' => 'The image size must not exceed 2 MB.',
            'columns.project_image.dimensions' => 'The image must have dimensions of 600x500 pixels.',
        ];
    }
}