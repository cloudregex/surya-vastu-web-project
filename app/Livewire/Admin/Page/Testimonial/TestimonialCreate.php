<?php

namespace App\Livewire\Admin\Page\Testimonial;

use App\Models\Testimonial;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;

class TestimonialCreate extends Component
{
    use WithFileUploads;
    #[Title('Testimonial List')]

    public $columns, $existingFile;

    public function mount()
    {
        // Authorization check for the current user
        if (!User::find(Auth::id())->can('admin.user.create')) {
            abort(403); // Unauthorized access
        }
        $this->columns = Testimonial::getColumns();
    }


    // Define the rules dynamically
    protected function rules()
    {
        return Testimonial::rules();
    }

    // Define the messages dynamically
    protected function messages()
    {
        return Testimonial::messages();
    }
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);  // Validate only the updated field
    }
    public function submitForm()
    {
        $this->validate();

        // simple store Image code
        if (!empty($this->columns['testimonial_image'])) {
            $this->columns['testimonial_image'] = uploadOrReplaceImage(
                $this->columns['testimonial_image'],
                $this->existingFile,
                'testimonials'
            );
            $this->existingFile = $this->columns['testimonial_image'];
        }
        // Create the testimonial entry
        Testimonial::create($this->columns);

        flashSuccess('Testimonial created successfully.');
        return redirect()->route('admin.testimonial.list');
    }

    public function render()
    {
        return view('livewire.admin.page.testimonial.testimonial-create');
    }
}
