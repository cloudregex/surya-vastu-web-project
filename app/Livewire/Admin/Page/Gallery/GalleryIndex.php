<?php

namespace App\Livewire\Admin\Page\Gallery;

use App\Models\Gallery;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class GalleryIndex extends Component
{
    use WithPagination;
    #[Url(history: true)]
    public $perPage = 10;
    #[Url(history: true)]
    public $Search = '';
    #[Url(history: true)]
    public $sortBy = 'created_at';
    #[Url(history: true)]
    public $sortDir = 'DESC';
    #[Title('Galleries')]
    public function setSortBy($sortField)
    {
        if ($this->sortBy == $sortField) {
            $this->sortDir = $this->sortDir !== "ASC" ? "ASC" : "DESC";
        }
        $this->sortBy = $sortField;
    }
    public function updatedperPage()
    {
        $this->resetPage();
    }
    public function mount()
    {
        // Check if the user has a specific role or permission
        if (!User::find(Auth::id())->can('admin.gallery.list')) {
            abort(403);
        }
    }
    public function DeleteUser($encryptedId)
    {
        // Check if the user has a specific role or permission
        if (!User::find(Auth::id())->can('admin.gallery.delete')) {
            abort(403);
        }
        // Decrypt the user ID
        $gallery = Gallery::withTrashed()->find(decryptData($encryptedId));
        return toggleTrash($gallery, 'gallery');
    }
    public function submitForm()
    {
        $this->resetPage();
    }
    public function render()
    {
        $gallery = Gallery::query()
            ->when($this->Search, function ($query) {
                $query->where('gallery_image', 'like', '%' . $this->Search . '%')
                    ->orWhere('gallery_image', 'like', '%' . $this->Search . '%');
            })
            ->orderBy($this->sortBy, $this->sortDir)
            ->paginate($this->perPage);
        return view('livewire.admin.page.gallery.gallery-index', compact('gallery'));
    }
}
