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
    public $estimated_budget;
    public $expected_timeline;
    public $project_description;

    protected $rules = [
        'full_name' => 'required',
        'email' => 'required|email',
        'phone' => 'required',
        'project_type' => 'required',
        'project_location' => 'required',
        'project_description' => 'required',
        'estimated_budget' => 'required',
        'expected_timeline' => 'required',
    ];

    public function submit()
    {
        $this->validate();

        Quote::create([
            'full_name' => $this->full_name,
            'email' => $this->email,
            'phone' => $this->phone,
            'project_type' => $this->project_type,
            'project_location' => $this->project_location,
            'estimated_budget' => $this->estimated_budget,
            'expected_timeline' => $this->expected_timeline,
            'project_description' => $this->project_description,
        ]);

        session()->flash('message', 'Quote request submitted successfully!');

        $this->dispatch('showToast', [
            'type' => 'success',
            'message' => 'Quote request submitted successfully!'
        ]);

        $this->dispatch('close-modal'); //

        $this->reset();
    }

    public function render()
    {
        return view('livewire.website.components.quote-form');
    }
}
