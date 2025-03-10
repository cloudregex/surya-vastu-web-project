<?php

namespace App\Livewire\Admin\Page\Gallery;

use App\Models\Gallery;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;

class GalleryEdit extends Component
{
    use WithFileUploads;
    #[Title('Edit Gallery')]
    public $columns, $existingFile;

    public function mount($encryptedId)
    {
        if (!User::find(Auth::id())->can('admin.gallery.edit')) {
            abort(403);
        }

        $this->columns = Gallery::getColumns();
        // Retrieve the user by ID
        $this->columns['gallery_id'] = decryptData($encryptedId);
        $gallery = Gallery::findOrFail($this->columns['gallery_id']);
        if ($gallery) {
            foreach ($this->columns as $key => $column) {
                $this->columns[$key] = $gallery[$key];
            }
            $this->columns['gallery_image'] = '';
            $this->existingFile = $gallery->gallery_image;
        }
    }

    // Define the rules dynamically
    protected function rules()
    {
        return Gallery::rules($this->columns['gallery_id']);
    }

    // Define the messages dynamically
    protected function messages()
    {
        return Gallery::messages();
    }
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);  // Validate only the updated field
    }

    public function submitForm()
    {
        $this->validate();

        // simple store Image code
        if (!empty($this->columns['gallery_image'])) {
            $this->columns['gallery_image'] = uploadOrReplaceImage(
                $this->columns['gallery_image'],
                $this->existingFile,
                'gallery'
            );
            $this->existingFile = $this->columns['gallery_image'];
        } else {
            $this->columns['gallery_image'] =  $this->existingFile;
        }

        Gallery::updateOrCreate(
            ['gallery_id' =>  $this->columns['gallery_id']],
            $this->columns
        );

        flashSuccess('Team User updated successfully.');
        return redirect()->route('admin.gallery.list');
    }
    public function render()
    {
        return view('livewire.admin.page.gallery.gallery-edit');
    }
}
