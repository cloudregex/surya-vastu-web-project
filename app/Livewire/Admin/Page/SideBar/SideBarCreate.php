<?php

namespace App\Livewire\Admin\Page\SideBar;

use App\Models\Slider;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;

class SideBarCreate extends Component
{
    use WithFileUploads;
    #[Title('Create Slider')]
    public $columns, $existingFile;

    public function mount()
    {
        if (!User::find(Auth::id())->can('admin.user.create')) {
            abort(403); // Unauthorized access
        }
        $this->columns = Slider::getColumns();
        $this->existingFile = $this->columns['slider_image'];
    }

    // Define the rules dynamically
    protected function rules()
    {
        return Slider::rules();
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
        $this->validate();

        // Handle image upload
        if (!empty($this->columns['slider_image'])) {
            $this->columns['slider_image'] = uploadOrReplaceImage(
                $this->columns['slider_image'],
                $this->existingFile,
                'sidebars'
            );
            $this->existingFile = $this->columns['slider_image'];
        }

        // Create the sidebar entry
        Slider::create($this->columns);

        flashSuccess('Side Bar created successfully.');
        return redirect()->route('admin.side.bar.list');
    }

    public function render()
    {
        return view('livewire.admin.page.silde-bar.side-bar-create');
    }
}
