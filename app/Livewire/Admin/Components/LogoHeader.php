<?php

namespace App\Livewire\Admin\Components;

use App\Models\AdminUploadLogo;
use Livewire\Component;

class LogoHeader extends Component
{
    public $logos = [];
    public $type;
    protected $listeners = ['UpdateHeaderLogo' => 'UpdateLogo'];

    public function UpdateLogo()
    {
        $this->logos = AdminUploadLogo::whereIn('logo_name', [
            'desktop_white',
            'desktop_dark',
            'toggle_white',
            'toggle_dark'
        ])->pluck('Logo_path', 'logo_name')->toArray();
    }
    public function mount($type = 'horizontal')
    {
        $this->type = $type;
        $this->logos = AdminUploadLogo::whereIn('logo_name', [
            'desktop_white',
            'desktop_dark',
            'toggle_white',
            'toggle_dark'
        ])->pluck('Logo_path', 'logo_name')->toArray();
    }
    public function render()
    {
        return view('livewire.admin.components.logo-header');
    }
}
