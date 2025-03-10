<?php

namespace App\Livewire\Admin\Page\SideBar;

use App\Models\Slider;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;

class SideBarEdit extends Component
{
    use WithFileUploads;
    #[Title('Edit Slider')]
    public $columns, $existingFile;


    public function mount($encryptedId)
    {
        if (!User::find(Auth::id())->can('admin.side.bar.edit')) {
            abort(403); // You can customize this response
        }
        $this->columns = Slider::getColumns();
        // Retrieve the user by ID
        $this->columns['slider_id'] = decryptData($encryptedId);
        $sidebar = Slider::findOrFail($this->columns['slider_id']);
        if ($sidebar) {
            foreach ($this->columns as $key => $column) {
                $this->columns[$key] = $sidebar[$key];
            }
            $this->columns['slider_image'] = '';
            $this->existingFile = $sidebar->slider_image;
        }
    }

    // Define the rules dynamically
    protected function rules()
    {
        return Slider::rules($this->columns['slider_id']);
    }

    // Define the messages dynamically
    protected function messages()
    {
        return Slider::messages();
    }
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);  // Validate only the updated field
    }
    public function submitForm()
    {
        // Validate the input fields
        $this->validate();
        // simple store Image code
        if (!empty($this->columns['slider_image'])) {
            $this->columns['slider_image'] = uploadOrReplaceImage(
                $this->columns['slider_image'],
                $this->existingFile,
                'sidebars'
            );
            $this->existingFile = $this->columns['slider_image'];
        } else {
            $this->columns['slider_image'] =  $this->existingFile;
        }

        Slider::updateOrCreate(
            ['slider_id' =>  $this->columns['slider_id']],
            $this->columns
        );
        // Flash success message and redirect
        flashSuccess('Sidebar updated successfully.');
        return redirect()->route('admin.side.bar.list');
    }

    public function render()
    {
        return view('livewire.admin.page.silde-bar.side-bar-edit');
    }
}
