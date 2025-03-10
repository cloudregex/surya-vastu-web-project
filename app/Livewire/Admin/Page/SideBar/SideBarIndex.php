<?php

namespace App\Livewire\Admin\Page\SideBar;

use App\Models\Slider;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class SideBarIndex extends Component
{
    use WithPagination;
    #[Title('Sliders')]
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
        if (!User::find(Auth::id())->can('admin.side.bar.list')) {
            abort(403);
        }
    }
    public function DeleteUser($encryptedId)
    {
        // Check if the user has a specific role or permission
        if (!User::find(Auth::id())->can('admin.user.delete')) {
            abort(403);
        }

        // Decrypt the user ID
        $sideBar = Slider::withTrashed()->find(decryptData($encryptedId));
        return toggleTrash($sideBar, 'sidebar');
    }
    public function render()
    {
        $sideBar = Slider::query()
            ->when($this->Search, function ($query) {
                $query->where('sid_title', 'like', '%' . $this->Search . '%')
                    ->orWhere('sid_sub_title', 'like', '%' . $this->Search . '%');
            })
            ->orderBy($this->sortBy, $this->sortDir)->paginate($this->perPage);
        return view('livewire.admin.page.silde-bar.side-bar-index', compact('sideBar'));
    }
}
