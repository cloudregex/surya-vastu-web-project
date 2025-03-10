<?php

namespace App\Livewire\Admin\Page\Testimonial;

use App\Models\Testimonial;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class TestimonialIndex extends Component
{
    use WithPagination;
    #[Title('Testimonial List')]
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
        if (!User::find(Auth::id())->can('admin.testimonial.list')) {
            abort(403);
        }
    }
    public function DeleteUser($encryptedId)
    {
        // Check if the user has a specific role or permission
        if (!User::find(Auth::id())->can('admin.testimonial.delete')) {
            abort(403);
        }

        // Decrypt the user ID
        $testimonial = Testimonial::withTrashed()->find(decryptData($encryptedId));
        return toggleTrash($testimonial, 'testimonial');
    }
    public function render()
    {
        $testimonial = Testimonial::query()
            ->when($this->Search, function ($query) {
                $query->where('testimonial_name', 'like', '%' . $this->Search . '%')
                    ->orWhere('testimonial_Profession', 'like', '%' . $this->Search . '%');
            })
            ->orderBy($this->sortBy, $this->sortDir)->paginate($this->perPage);
        return view('livewire.admin.page.testimonial.testimonial-index', compact('testimonial'));
    }
}
