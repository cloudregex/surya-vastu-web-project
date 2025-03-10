<?php

namespace App\Livewire\Admin\Auth;

use App\Models\AdminSetting;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleLogin extends Component
{
    public function redirectToGoogle()
    {
        // Redirect the user to Google login page
        return Socialite::driver('google')->stateless()->redirect()->getTargetUrl();
    }

    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->stateless()->user();

            // check Permission
            $register_permission = AdminSetting::first();
            if (!$register_permission->register) {
                $find = User::where('email', $googleUser->getEmail())->first();
                if (!$find) {
                    session()->flash('FAILED', 'Google login is restricted to registered admin accounts only.');
                    return redirect()->route('auth.login');
                }
            }
            // Check if the email exists in the soft-deleted users
            $softDeletedUser = User::withTrashed()->where('email', $googleUser->getEmail())->first();

            // If the user is soft-deleted, ask them to recover their account
            if ($softDeletedUser && $softDeletedUser->trashed()) {
                session()->flash('FAILED', 'Your account was previously deleted. Enter your Email to recover it.');
                return redirect()->route('auth.forgot-password')->with('TOAST_SUCCESS', 'Your account was previously deleted. Enter your Email to recover it.');
            }
            // Find or create the user in the database
            if (User::count() == 0) {
                $user = User::firstOrCreate([
                    'email' => $googleUser->getEmail(),
                ], [
                    'name' => $googleUser->getName(),
                    'google_id' => $googleUser->getId(),
                    'profile_picture' => $googleUser->getAvatar(),
                    'email_verified_at' => now(),
                    'status' => "ACTIVE",
                ]);
                $user->syncRoles(["Super Admin"]);
            } else {
                $user = User::firstOrCreate([
                    'email' => $googleUser->getEmail(),
                ], [
                    'name' => $googleUser->getName(),
                    'google_id' => $googleUser->getId(),
                    'profile_picture' => $googleUser->getAvatar(),
                    'email_verified_at' => now(),
                ]);
            }
            $user->markEmailAsVerified();
            // Log the user in
            if ($user->status === 'ACTIVE') {
                Auth::login($user);
                return redirect()->route('admin.dashboard');
            }
            session()->flash('FAILED', 'Your account is not active!');
            return redirect()->route('auth.login');
        } catch (\Exception $e) {
            dd($e);
            session()->flash('FAILED', 'Unable to login using Google.');
            return redirect()->route('auth.login');
        }
    }
    public function render()
    {
        return view('livewire.admin.auth.google-login');
    }
}