<?php

namespace App\Livewire\Website\Pages;

use App\Models\Quote;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class QuotesIndex extends Component
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

    #[Url(history: true)]
    public $filters = [
        'full_name' => null,
        'email' => null,
        'phone' => null,
        'project_type' => null,
        'project_location' => null,
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
    public function submitForm()
    {
        $this->resetPage();
    }
    public function deleteQuote($encryptedId)
    {
        // Check if the user has a specific role or permission
        if (!User::find(Auth::id())->can('admin.quote.trash')) {
            abort(403);
        }
        // Decrypt the user ID
        $quote = Quote::find(decryptData($encryptedId));
        $quote->delete();
        flashSuccess('Quote deleted successfully.');
    }

    public function render()
    {
        $quotes = Quote::when($this->Search, function ($query) {
            $query->where('full_name', 'like', '%' . $this->Search . '%')
                ->orWhere('email', 'like', '%' . $this->Search . '%')
                ->orWhere('project_type', 'like', '%' . $this->Search . '%');
        })
            ->when($this->filters['full_name'], function ($query) {
                $query->where('full_name', 'like', '%' . $this->filters['full_name'] . '%');
            })
            ->when($this->filters['email'], function ($query) {
                $query->where('email', 'like', '%' . $this->filters['email'] . '%');
            })
            ->when($this->filters['phone'], function ($query) {
                $query->where('phone', 'like', '%' . $this->filters['phone'] . '%');
            })
            ->when($this->filters['project_type'], function ($query) {
                $query->where('project_type', 'like', '%' . $this->filters['project_type'] . '%');
            })
            ->paginate($this->perPage);
        return view('livewire.website.pages.quotes-index', compact('quotes'));
    }
}
