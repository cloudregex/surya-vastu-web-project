<?php

namespace App\Livewire\Admin\Auth\Profile;

use App\Models\AdminUploadLogo;
use App\Models\User;
use App\Notifications\VerifyEmailNotification;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Livewire\Component;

class ProfileInformation extends Component
{
    use WithFileUploads;

    public $name;
    public $email;
    public $profile_picture;
    public $oldfile_picture;

    public function mount()
    {
        $user = Auth::user();
        $this->name = $user->name;
        $this->email = $user->email;
        $this->oldfile_picture = $user->profile_picture;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . Auth::id(),
            'profile_picture' => 'nullable|image|max:1024', // 1MB Max
        ];
    }

    public function submitForm()
    {
        $this->validate();
        $user = User::find(Auth::id());
        $user->name = $this->name;
        if ($user->email != $this->email) {
            $user->email = $this->email;
            $user->email_verified_at = null;
        }


        if ($this->profile_picture) {
            $path = $this->profile_picture->Store('profile_pictures', 'public');
            if ($this->oldfile_picture) {
                Storage::disk('public')->delete($this->oldfile_picture);
            }
            $user->profile_picture = $path;
        }
        $user->save();
        $this->reset(['profile_picture']);
        $this->oldfile_picture = $user->profile_picture;
        $this->dispatch('UpdateProfile');
        session()->flash('SUCCESS', 'Profile updated successfully!');
    }
    public function sendVerificationEmail()
    {
        $user = User::find(Auth::id());

        if ($user->hasVerifiedEmail()) {
            session()->flash('FAILED', 'Your email is already verified.');
            return;
        }
        // Generate the email verification URL
        $verificationUrl = URL::temporarySignedRoute(
            'auth.verification.verify',
            now()->addMinutes(60), // URL valid for 60 minutes
            ['id' => $user->id, 'hash' => sha1($user->email)]
        );
        $profilePhotoUrl = AdminUploadLogo::where('logo_name', 'desktop_white')->value('Logo_path');
        // Send the verification notification

        Notification::send($user, new VerifyEmailNotification($verificationUrl, $user->name, $profilePhotoUrl));
        session()->flash('SUCCESS', 'Verification email sent!');
    }
    public function render()
    {
        return view('livewire..admin.auth.profile.profile-information');
    }
}
