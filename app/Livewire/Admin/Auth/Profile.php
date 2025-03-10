<?php

namespace App\Livewire\Admin\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Title;
use Livewire\Component;

class Profile extends Component
{
    #[Title('Profile')]
    public $profile;
    protected $listeners = ['UpdateProfile' => 'UpdateProfiles'];

    public function UpdateProfiles()
    {
        $this->profile =  Auth::user();
    }
    public function mount()
    {
        $this->profile =  Auth::user();
    }

    public function render()
    {
        return view('livewire..admin.auth.profile');
    }
}
