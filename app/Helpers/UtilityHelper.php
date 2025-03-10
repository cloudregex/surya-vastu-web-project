<?php

use App\Models\GlobalConstants;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

if (!function_exists('SortSrNo')) {
    /**
     * Calculate the serial number for a paginated list.
     *
     * @param int $currentPage
     * @param int $perPage
     * @param int $key
     * @param string $sortDir
     * @param int $total
     * @return int
     */
    function SortSrNo($currentPage, $perPage, $key, $sortDir, $total)
    {
        return $sortDir === 'DESC'
            ? 1 + $key
            : $total - ($currentPage - 1) * $perPage - $key;
    }
}

if (!function_exists('encryptData')) {

    function encryptData($data)
    {
        return \Illuminate\Support\Facades\Crypt::encryptString($data);
    }
}

if (!function_exists('decryptData')) {
    function decryptData($encryptedData)
    {
        try {
            return \Illuminate\Support\Facades\Crypt::decryptString($encryptedData);
        } catch (\Illuminate\Contracts\Encryption\DecryptException $e) {
            return null;
        }
    }
}

if (!function_exists('flashSuccess')) {
    /**
     * Flash a success message to the session.
     *
     * @param string $message
     * @return void
     */
    function flashSuccess(string $message): void
    {
        session()->flash(GlobalConstants::SUCCESS, $message);
    }
}

if (!function_exists('flashError')) {
    /**
     * Flash a failure message to the session.
     *
     * @param string $message
     * @return void
     */
    function flashError(string $message): void
    {
        session()->flash(GlobalConstants::ERROR, $message);
    }
}
if (!function_exists('toggleTrash')) {

    /**
     * Soft delete or restore a model based on its current trash status.
     *
     * @param Model $model
     * @return \Illuminate\Http\RedirectResponse
     */
    function toggleTrash(Model $model, string $cacheKey)
    {
        if ($model) {

            $successMessage = $model->trashed()
                ? ucfirst(class_basename($model)) . ' restored successfully.'
                : ucfirst(class_basename($model)) . ' deleted successfully.';
            if ($cacheKey != "NO_KEY") {
                Cache::forget($cacheKey);
            }
            if ($model->trashed()) {
                $model->restore();
                flashSuccess($successMessage);
                return redirect()->back();
            } else {
                $model->delete();
                flashSuccess($successMessage);
                return redirect()->back();
            }

            return redirect()->back();
        } else {

            flashError('Model not found.');

            return redirect()->back();
        }
    }
}

if (!function_exists('format_date')) {
    /**
     * Format the given date for blog display based on the provided format name.
     *
     * @param string $date
     * @param string $formatName
     * @return string
     */
    function format_date($date, $formatName = 'default')
    {
        // Define all possible formats
        $formats = [
            'default' => 'd M, Y',       // 01 Jan, 2045
            'full' => 'l, d F Y',         // Friday, 01 January 2045
            'short' => 'd/m/Y',           // 01/01/2045
            'year_month' => 'M Y',        // Jan 2045
            'time' => 'h:i A',            // 08:30 PM
            'datetime' => 'd M, Y h:i A', // 01 Jan, 2045 08:30 PM
            'iso' => 'Y-m-d\TH:i:s',      // 2045-01-01T20:30:00
            'month_day' => 'd M',         // 01 Jan
            'long_date' => 'l, d F Y h:i A', // Friday, 01 January 2045 08:30 PM
        ];

        $format = $formats[$formatName] ?? $formats['default'];
        return Carbon::parse($date)->format($format);
    }
}

if (!function_exists('uploadOrReplaceImage')) {
    /**
     * Handle the upload or replacement of an image.
     *
     * @param UploadedFile|null $newImage The new image to be uploaded.
     * @param string|null $existingImage The path of the existing image to delete.
     * @param string $storagePath The directory where the image will be stored.
     * @return string|null The path of the newly uploaded image or null if no image is uploaded.
     */
    function uploadOrReplaceImage(?UploadedFile $newImage, ?string $existingImage = null, string $storagePath = 'uploads'): ?string
    {

        // Delete the old image if it exists
        if ($existingImage && Storage::disk('public')->exists($existingImage)) {
            Storage::disk('public')->delete($existingImage);
        }

        // Store the new image and return the path
        return $newImage->store($storagePath, 'public');
    }
}
