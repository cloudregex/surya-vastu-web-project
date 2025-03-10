<?php

namespace App\Livewire\Website\Page;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

class Nocapcha extends Component
{
    #[Layout('livewire.website.layouts.website')]
    #[Title('Test')]

    public $name;
    public $email;
    public $message;

    public function submit()
    {
        $this->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        // Process form submission
        session()->flash('success', 'Form submitted successfully!');
        $this->reset(); // Reset form
    }

    public function render()
    {
        return view('livewire.website.page.nocapcha');
    }
}