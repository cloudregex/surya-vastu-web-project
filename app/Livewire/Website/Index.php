<?php

namespace App\Livewire\Website;

use App\Models\Blog;
use App\Models\Project;
use App\Models\Quote;
use App\Models\Service;
use App\Models\Team;
use App\Models\Testimonial;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Index extends Component
{
    #[Layout('livewire.website.layouts.website')]
    #[Title('Surya Vastu - Vastu Consultant')]

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
        // Set default date to tomorrow
        $this->project_date = now()->addDay()->format('Y-m-d');
    }

    public function submitForm()
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

        $this->dispatch('showToast', [
            'type' => 'success',
            'message' => 'Quote request submitted successfully!'
        ]);

        $this->reset();
    }


    public function render()
    {
        $testimonials = Testimonial::all();
        $blogs = Blog::latest()->take(3)->get();
        $projects = Project::latest()->paginate(9);
        $teams = Team::latest()->paginate(8);
        $services = Service::all();
        return view('livewire.website.index', [
            'testimonials' => $testimonials,
            'blogs' => $blogs,
            'projects' => $projects,
            'teams' => $teams,
            'services' => $services
        ]);
    }
}
