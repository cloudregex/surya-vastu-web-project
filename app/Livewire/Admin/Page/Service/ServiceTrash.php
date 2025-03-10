<?php

namespace App\Livewire\Admin\Page\Service;

use App\Models\Service;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class ServiceTrash extends Component
{
    use WithPagination;
    #[Title('Trash Services')]
    #[Url(history: true)]
    public $perPage = 10;
    #[Url(history: true)]
    public $Search = '';
    #[Url(history: true)]
    public $sortBy = 'created_at';
    #[Url(history: true)]
    public $sortDir = 'DESC';
    public function render()
    {
        $services = Service::onlyTrashed()
            ->when($this->Search, function ($query) {
                $query->where('service_name', 'like', '%' . $this->Search . '%')
                    ->orWhere('service_description', 'like', '%' . $this->Search . '%');
            })
            ->orderBy($this->sortBy, $this->sortDir)
            ->paginate($this->perPage);
        return view('livewire.admin.page.service.service-trash', compact('services'));
    }
}
