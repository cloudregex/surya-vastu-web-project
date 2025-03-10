<?php

namespace App\Livewire\Admin\Page\Gallery;

use App\Models\Gallery;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;

class GalleryCreate extends Component
{
    use WithFileUploads;
    #[Title('Create Gallery')]
    public $columns, $existingFile;

    public function mount()
    {
        if (!User::find(Auth::id())->can('admin.gallery.create')) {
            abort(403); // Unauthorized access
        }
        $this->columns = Gallery::getColumns();
        $this->existingFile = $this->columns['gallery_image'];
    }

    // Define the rules dynamically
    protected function rules()
    {
        return Gallery::rules();
    }

    // Define the messages dynamically
    protected function messages()
    {
        return Gallery::messages();
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submitForm()
    {
        $this->validate();

        // Upload the image
        if (!empty($this->columns['gallery_image'])) {
            $this->columns['gallery_image'] = uploadOrReplaceImage(
                $this->columns['gallery_image'],
                $this->existingFile,
                'gallery'
            );
            $this->existingFile = $this->columns['gallery_image'];
        }

        // Save the Projects entry
        Gallery::create($this->columns);

        flashSuccess('Gallery Image created successfully.');
        return redirect()->route('admin.gallery.list');
    }

    public function render()
    {
        return view('livewire.admin.page.gallery.gallery-create');
    }
}
