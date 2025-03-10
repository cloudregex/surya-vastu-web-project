<?php

namespace App\Models;

use App\Traits\UsesUuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Team extends Model
{
    use SoftDeletes, UsesUuid;

    const UUID_FIELD = 'team_id';

    protected $primaryKey = self::UUID_FIELD;

    /**
     * Validation rules for team.
     */
    public static function rules($teamId = null)
    {
        $rules = [
            'columns.team_user_name' => 'required|string|max:25',
            'columns.team_profession' => 'required|string|max:50',
            'columns.team_image' => 'required|image|mimes:jpeg,png,jpg|max:2048|dimensions:width=300,height=350',
        ];

        if ($teamId) {
            $rules['columns.team_image'] = 'nullable|image|mimes:jpeg,png,jpg|max:2048|dimensions:width=300,height=350';
        }
        return $rules;
    }

    /**
     * Custom validation messages for team.
     */
    public static function messages()
    {
        return [
            'columns.team_user_name.required' => 'The user name field is required.',
            'columns.team_user_name.string' => 'The user name must be a valid string.',
            'columns.team_user_name.max' => 'The user name may not exceed 25 characters.',

            'columns.team_profession.required' => 'The profession field is required.',
            'columns.team_profession.string' => 'The profession must be a valid string.',
            'columns.team_profession.max' => 'The profession may not exceed 50 characters.',

            'columns.team_image.required' => 'The image field is required.',
            'columns.team_image.image' => 'The image must be a valid image file.',
            'columns.team_image.mimes' => 'The image must be of type: jpeg, png, or jpg.',
            'columns.team_image.max' => 'The image size must not exceed 2 MB.',
            'columns.team_image.dimensions' => 'The image must have dimensions of 300x350 pixels.',
        ];
    }
}