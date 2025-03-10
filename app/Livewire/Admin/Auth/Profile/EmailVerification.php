<?php

namespace App\Livewire\Admin\Auth\Profile;

use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class EmailVerification extends Component
{
    #[Layout('livewire/admin/layouts/single')]
    #[Title(content: 'Email Verification')]
    public $status = null;

    public function mount()
    {
        $this->verifyEmail();
    }

    public function verifyEmail()
    {
        $request = request();
        $user = User::find($request->route('id'));

        // Check if the user exists
        if (!$user) {
            $this->status = 'Invalid verification link.';
            return;
        }

        $hash = $request->route('hash');

        // Check if the hash matches
        if (!hash_equals(sha1($user->getEmailForVerification()), $hash)) {
            $this->status = 'Invalid verification link.';
            return;
        }

        // If email is already verified
        if ($user->hasVerifiedEmail()) {
            $this->status = 'Your email is already verified.';
            return;
        }

        // Mark the email as verified
        $user->markEmailAsVerified();
        $this->status = 'Your email has been verified!';
    }

    public function render()
    {
        return view('livewire..admin.auth.profile.email-verification');
    }
}
