<?php

namespace App\Livewire\Admin\Auth\Profile;

use App\Models\AdminUploadLogo;
use App\Rules\ImageDimension;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class UploadLogo extends Component
{
    use WithFileUploads;

    public $desktop_white;
    public $desktop_dark;
    public $toggle_white;
    public $toggle_dark;

    public $existingDesktopWhite;
    public $existingDesktopDark;
    public $existingToggleWhite;
    public $existingToggleDark;

    public function mount()
    {
        // Load existing image paths from the database
        $this->existingDesktopWhite = AdminUploadLogo::where('logo_name', 'desktop_white')->value('Logo_path');
        $this->existingDesktopDark = AdminUploadLogo::where('logo_name', 'desktop_dark')->value('Logo_path');
        $this->existingToggleWhite = AdminUploadLogo::where('logo_name', 'toggle_white')->value('Logo_path');
        $this->existingToggleDark = AdminUploadLogo::where('logo_name', 'toggle_dark')->value('Logo_path');
    }
    public function submitForm()
    {
        // Validate the uploaded logos
        $this->validate([
            'desktop_white' => ['max:1024', new ImageDimension(700, 300)],
            'desktop_dark' => ['max:1024', new ImageDimension(700, 300)],
            'toggle_white' => ['max:1024', new ImageDimension(64, 68)],
            'toggle_dark' => ['max:1024', new ImageDimension(64, 68)],
        ]);

        // Handle each image separately
        $this->uploadAndDeleteOldImage('desktop_white', $this->desktop_white);
        $this->uploadAndDeleteOldImage('desktop_dark', $this->desktop_dark);
        $this->uploadAndDeleteOldImage('toggle_white', $this->toggle_white);
        $this->uploadAndDeleteOldImage('toggle_dark', $this->toggle_dark);

        // Dispatch event to update UI
        $this->dispatch('UpdateHeaderLogo');
        session()->flash('SUCCESS', 'Logos updated successfully!');
    }
    private function uploadAndDeleteOldImage($logoName, $newImage)
    {
        if ($newImage) {
            // Get the existing logo record
            $existingLogo = AdminUploadLogo::where('logo_name', $logoName)->first();

            // Delete the old image from storage if it exists
            if ($existingLogo && Storage::disk('public')->exists($existingLogo->Logo_path)) {
                Storage::disk('public')->delete($existingLogo->Logo_path);
            }

            // Store the new image
            $newImagePath = $newImage->store('logos', 'public');

            // Update or create new record
            AdminUploadLogo::updateOrCreate(
                ['logo_name' => $logoName],
                ['Logo_path' => $newImagePath]
            );
        }
    }

    public function render()
    {
        return view('livewire..admin.auth.profile.upload-logo');
    }
}