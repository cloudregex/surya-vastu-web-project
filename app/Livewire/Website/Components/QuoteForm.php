<?php

namespace App\Livewire\Website\Components;

use App\Models\Quote;
use Livewire\Component;

class QuoteForm extends Component
{
    public $full_name;
    public $email;
    public $phone;
    public $project_type;
    public $project_location;
    public $project_description;
    public $project_date;

    protected $rules = [
        'full_name' => 'required',
        'email' => 'required|email',
        'phone' => 'required',
        'project_type' => 'required',
        'project_location' => 'required',
        'project_description' => 'required',
        'project_date' => 'required|date',
    ];

    public function mount()
    {
        $this->project_date = now()->addDay()->format('Y-m-d');
    }

    public function submit()
    {
        $this->validate();

        Quote::create([
            'full_name' => $this->full_name,
            'email' => $this->email,
            'phone' => $this->phone,
            'project_type' => $this->project_type,
            'project_location' => $this->project_location,
            'project_description' => $this->project_description,
            'project_date' => $this->project_date,
        ]);

        session()->flash('message', 'Quote request submitted successfully!');

        $this->dispatch('showToast', [
            'type' => 'success',
            'message' => 'Quote request submitted successfully!'
        ]);

        $this->dispatch('close-modal');

        $this->reset();
    }

    public function render()
    {
        return view('livewire.website.components.quote-form');
    }
}
