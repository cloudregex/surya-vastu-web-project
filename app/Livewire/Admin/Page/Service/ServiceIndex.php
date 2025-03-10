<?php

namespace App\Livewire\Admin\Page\Service;

use App\Models\Service;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class ServiceIndex extends Component
{
    use WithPagination;
    #[Title('Services')]
    #[Url(history: true)]
    public $perPage = 10;
    #[Url(history: true)]
    public $Search = '';
    #[Url(history: true)]
    public $sortBy = 'created_at';
    #[Url(history: true)]
    public $sortDir = 'DESC';

    #[Url(history: true)]
    public $filters = [
        'service_name' => null,
        'service_description' => null,
    ];

    public function setSortBy($sortField)
    {
        if ($this->sortBy == $sortField) {
            $this->sortDir = $this->sortDir !== "ASC" ? "ASC" : "DESC";
        }
        $this->sortBy = $sortField;
    }

    public function resetFilters($key = null)
    {
        if ($key) {
            $this->filters[$key] = null;
        } else {
            $this->reset([
                'Search',
                'sortBy',
                'sortDir',
            ]);
            foreach ($this->filters as $key => $value) {
                $this->filters[$key] = null;
            }
        }
        $this->dispatch('clearSelect2');
    }

    public function updatedperPage()
    {
        $this->resetPage();
    }

    public function mount()
    {
        // Check if the user has a specific role or permission
        if (!User::find(Auth::id())->can('admin.service.list')) {
            abort(403);
        }
    }

    public function DeleteService($encryptedId)
    {
        // Check if the user has a specific role or permission
        if (!User::find(Auth::id())->can('admin.service.delete')) {
            abort(403);
        }
        // Decrypt the service ID
        $service = Service::withTrashed()->find(decryptData($encryptedId));
        return toggleTrash($service, 'service');
    }

    public function submitForm()
    {
        $this->resetPage();
    }

    public function render()
    {
        $services = Service::query()
            ->when($this->Search, function ($query) {
                $query->where('service_name', 'like', '%' . $this->Search . '%')
                    ->orWhere('service_description', 'like', '%' . $this->Search . '%');
            })
            ->when($this->filters['service_name'], function ($query) {
                $query->where('service_name', 'like', '%' . $this->filters['service_name'] . '%');
            })
            ->when($this->filters['service_description'], function ($query) {
                $query->where('service_description', 'like', '%' . $this->filters['service_description'] . '%');
            })
            ->orderBy($this->sortBy, $this->sortDir)
            ->paginate($this->perPage);

        return view('livewire.admin.page.service.service-index', compact('services'));
    }
}
