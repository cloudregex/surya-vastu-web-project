<?php

namespace App\Livewire\Admin\UserManagement\LoginSetting;

use App\Models\GlobalConstants;
use App\Models\AdminSetting;
use Livewire\Component;

class LoginSetting extends Component
{
    public $register = false;

    public function mount()
    {
        $data = AdminSetting::first();
        $this->register = $data->register;
    }
    public function onSubmit()
    {
        $register = AdminSetting::first();
        $register->register = $this->register ? false : true;
        $register->save();
        $this->register = $register->register;
        $this->dispatch(GlobalConstants::SHOW_SUCCESS_TOAST, !$this->register ? 'User Register is OFF' : 'User Register is ON');
    }

    public function render()
    {
        return view('livewire.admin.user-management.login-setting.login-setting');
    }
}
