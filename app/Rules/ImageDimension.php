<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ImageDimension implements ValidationRule
{
    protected $width;
    protected $height;

    public function __construct($width, $height)
    {
        $this->width = $width;
        $this->height = $height;
    }

    /**
     * Run the validation rule.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @param  Closure  $fail
     * @return void
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if ($value) {
            $imagePath = $value->getRealPath();
            list($width, $height) = getimagesize($imagePath);

            if ($width !== $this->width || $height !== $this->height) {
                $fail("The $attribute must be {$this->width}x{$this->height} pixels.");
            }
        }
    }
}
