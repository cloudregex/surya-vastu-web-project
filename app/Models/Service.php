<?php

namespace App\Models;

use App\Traits\UsesUuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    use SoftDeletes, UsesUuid;

    const UUID_FIELD = 'service_id';

    protected $primaryKey = self::UUID_FIELD;
    /**
     * Validation rules for Service.
     */
    public static function rules($serviceId = null)
    {
        $rules = [
            'columns.service_name' => 'required|string|max:50|unique:services,service_name',
            'columns.service_description' => 'required|string|min:100',
            'columns.service_image' => 'required|image|mimes:jpeg,png,jpg|max:2048|dimensions:width=600,height=400',
        ];

        if ($serviceId) {
            $rules['columns.service_name'] = 'required|string|max:50|unique:services,service_name,' . $serviceId . ',service_id';
            $rules['columns.service_image'] = 'nullable|image|mimes:jpeg,png,jpg|max:2048|dimensions:width=600,height=400';
        }
        return $rules;
    }

    /**
     * Custom validation messages for Service.
     */
    public static function messages()
    {
        return [
            'columns.service_name.required' => 'The service name field is required.',
            'columns.service_name.string' => 'The service name must be a valid string.',
            'columns.service_name.max' => 'The service name may not exceed 50 characters.',
            'columns.service_name.unique' => 'The service name has already been taken.',

            'columns.service_description.required' => 'The description field is required.',
            'columns.service_description.string' => 'The description must be a valid string.',
            'columns.service_description.min' => 'The description must be at least 100 characters long.',

            'columns.service_image.required' => 'The image field is required.',
            'columns.service_image.image' => 'The image must be a valid image file.',
            'columns.service_image.mimes' => 'The image must be of type: jpeg, png, or jpg.',
            'columns.service_image.max' => 'The image size must not exceed 2 MB.',
            'columns.service_image.dimensions' => 'The image must have dimensions of 600x400 pixels.',

        ];
    }
}
