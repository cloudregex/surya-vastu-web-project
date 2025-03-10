<?php

namespace App\Livewire\Admin\Page\Gallery;

use App\Models\Gallery;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class GalleryTrash extends Component
{
    use WithPagination;
    #[Title('Trash Galleries')]
    #[Url(history: true)]
    public $perPage = 10;

    #[Url(history: true)]
    public $Search = '';

    #[Url(history: true)]
    public $sortBy = 'created_at';

    #[Url(history: true)]
    public $sortDir = 'DESC';

    public function setSortBy($sortField)
    {
        if ($this->sortBy == $sortField) {
            $this->sortDir = $this->sortDir !== "ASC" ? "ASC" : "DESC";
        }
        $this->sortBy = $sortField;
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function updatedperPage()
    {
        $this->resetPage();
    }

    public function mount()
    {
        // Check if the user has a specific role or permission
        if (!User::find(Auth::id())->can('admin.team.trash')) {
            abort(403); // You can customize this response
        }
    }

    public function render()
    {
        // Fetch trashed team
        $gallery = Gallery::query()
            ->when($this->Search, function ($query) {
                $query->where('gallery_image', 'like', '%' . $this->Search . '%')
                    ->orWhere('gallery_image', 'like', '%' . $this->Search . '%');
            })
            ->onlyTrashed() // Fetch only trashed records
            ->orderBy($this->sortBy, $this->sortDir)
            ->paginate($this->perPage);
        return view('livewire.admin.page.gallery.gallery-trash', compact('gallery'));
    }
}
