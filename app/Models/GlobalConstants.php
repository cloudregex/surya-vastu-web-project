<?php

namespace App\Models;

class GlobalConstants
{
    // General Status
    const ACTIVE = 'active';
    const INACTIVE = 'inactive';
    const OPEN = 'open';
    const CLOSED = 'closed';
    const PENDING = 'pending';
    const ENABLED = 'enabled';
    const DISABLED = 'disabled';

    // HTTP Response Keys
    const SUCCESS = 'SUCCESS';
    const ERROR = 'ERROR';

    const SHOW_LOADING_TOAST = 'ToastLoading';
    const HIDE_LOADING_TOAST = 'ToastHideLoading';
    const SHOW_SUCCESS_TOAST = 'ToastSuccess';
    const SHOW_ERROR_TOAST = 'ToastError';

    // Default Values
    const DEFAULT_PAGE_SIZE = 10;

    // Timestamps
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    const DELETED_AT = 'deleted_at';

    // Validation Rules
    const STRING_VALIDATION = 'required|string|min:3|max:20';
    const IFRAME_VALIDATION = [
        'required',
        'string',
        'regex:/^<iframe[^>]*src="https:\/\/www\.google\.com\/maps\/embed\?pb=.*"[^>]*><\/iframe>$/i',
    ];
    const MOBILE_VALIDATION = 'required|string|regex:/^(\+?[0-9]{1,4}[\s-])?(\(?\d{1,5}\)?[\s-]?)?[\d\s-]{7,15}$/|min:10|max:15';
    const EMAIL_VALIDATION = 'required|email|max:255';
    const UNIQUE_USERS_TABLE_EMAIL_VALIDATION = 'required|email|max:255|unique:users,email';
    const UNIQUE_USERS_TABLE_MOBILE_VALIDATION = 'required|string|regex:/^(\+?[0-9]{1,4}[\s-])?(\(?\d{1,5}\)?[\s-]?)?[\d\s-]{7,15}$/|unique:users,mobile|min:10|max:15';
    const PASSWORD_VALIDATION = 'required|string|min:8|max:64|confirmed';
    const STATUS_VALIDATION = 'required|in:active,inactive';
    const BOOLEAN_VALIDATION = 'required|boolean';
    const DATE_VALIDATION = 'required|date|date_format:Y-m-d';
    const TIME_VALIDATION = 'required|date_format:H:i:s';
    const USER_EXISTS_IN_USERS_TABLE_VALIDATION = 'required|exists:users,id';
    const NULL_IMAGE_VALIDATION = 'nullable|image|mimes:jpeg,jpg,png|max:2048';
    const IMAGE_VALIDATION = 'required|image|mimes:jpeg,jpg,png|max:2048';
    const REQUIRED = 'required';
    const PIN_CODE_VALIDATION = 'nullable|digits:6';

    // Miscellaneous
    const DEFAULT_SORT_ORDER = 'asc';
    const USER_ROLE = 'user';
    const ADMIN_ROLE = 'admin';
    const SUPER_ADMIN_ROLE = 'super_admin';
    const ROLE_VALIDATION = 'required|in:user,admin,super_admin';
    const NULLABLE_URL = 'nullable|url';
    const DESCRIPTION_VALIDATION = 'required|string';

    // Miscellaneous
    const IS_ACTIVE = 'is_active';
    const IS_VERIFIED = 'is_verified';
    const IS_DELETED = 'is_deleted';
    const SLUG = 'slug';

    // Calendar
    const MONTHS = [
        'Jan',
        'Feb',
        'Mar',
        'Apr',
        'May',
        'Jun',
        'Jul',
        'Aug',
        'Sept',
        'Oct',
        'Nov',
        'Dec'
    ];

    const DAYS = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
}
