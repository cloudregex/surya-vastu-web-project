<?php

namespace App\Livewire\Admin\Page\Testimonial;

use App\Models\Testimonial;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;

class TestimonialEdit extends Component
{
    use WithFileUploads;
    #[Title('Testimonial Edit')]

    public $columns, $existingFile;

    public function mount($encryptedId)
    {
        if (!User::find(Auth::id())->can('admin.side.bar.edit')) {
            abort(403); // Unauthorized access
        }
        $this->columns = Testimonial::getColumns();
        $this->columns['testimonial_id'] = decryptData($encryptedId);
        $testimonial = Testimonial::findOrFail($this->columns['testimonial_id']);
        if ($testimonial) {
            foreach ($this->columns as $key => $column) {
                $this->columns[$key] = $testimonial[$key];
            }
            $this->columns['testimonial_image'] = '';
            $this->existingFile = $testimonial->testimonial_image;
        }
    }

    // Define the rules dynamically
    protected function rules()
    {
        return Testimonial::rules($this->columns['testimonial_id']);
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
        } else {
            $this->columns['testimonial_image'] =  $this->existingFile;
        }

        Testimonial::updateOrCreate(
            ['testimonial_id' =>  $this->columns['testimonial_id']],
            $this->columns
        );
        flashSuccess('Testimonial updated successfully.');
        return redirect()->route('admin.testimonial.list');
    }

    public function render()
    {
        return view('livewire.admin.page.testimonial.testimonial-edit');
    }
}
