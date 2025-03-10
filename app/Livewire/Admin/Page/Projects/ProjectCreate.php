<?php

namespace App\Livewire\Admin\Page\Projects;

use App\Models\Project;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class ProjectCreate extends Component
{
    use WithFileUploads;
    #[Title('Create Project')]
    public $columns, $existingFile;

    public function mount()
    {
        if (!User::find(Auth::id())->can('admin.projects.create')) {
            abort(403); // Unauthorized access
        }
        $this->columns = Project::getColumns();
        $this->existingFile = $this->columns['project_image'];
    }

    // Define the rules dynamically
    protected function rules()
    {
        return Project::rules();
    }

    // Define the messages dynamically
    protected function messages()
    {
        return Project::messages();
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submitForm()
    {
        $this->validate();

        // Upload the image
        if (!empty($this->columns['project_image'])) {
            $this->columns['project_image'] = uploadOrReplaceImage(
                $this->columns['project_image'],
                $this->existingFile,
                'projects'
            );
            $this->existingFile = $this->columns['project_image'];
        }
        $this->columns['project_slug'] = Str::slug($this->columns['project_title']);

        // Save the Projects entry
        Project::create($this->columns);

        flashSuccess('Project created successfully.');
        return redirect()->route('admin.projects.list');
    }

    public function render()
    {
        return view('livewire.admin.page.projects.project-create');
    }
}