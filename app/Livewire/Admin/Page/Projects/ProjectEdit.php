<?php

namespace App\Livewire\Admin\Page\Projects;

use App\Models\Project;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class ProjectEdit extends Component
{
    use WithFileUploads;
    #[Title('Edit Project')]
    public $columns, $existingFile;

    public function mount($encryptedId)
    {
        if (!User::find(Auth::id())->can('admin.projects.edit')) {
            abort(403);
        }

        $this->columns = Project::getColumns();
        // Retrieve the user by ID
        $this->columns['project_id'] = decryptData($encryptedId);
        $projects = Project::findOrFail($this->columns['project_id']);
        if ($projects) {
            foreach ($this->columns as $key => $column) {
                $this->columns[$key] = $projects[$key];
            }
            $this->columns['project_image'] = '';
            $this->existingFile = $projects->project_image;
        }
    }

    // Define the rules dynamically
    protected function rules()
    {
        return Project::rules($this->columns['project_id']);
    }

    // Define the messages dynamically
    protected function messages()
    {
        return Project::messages();
    }
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);  // Validate only the updated field
    }

    public function submitForm()
    {
        $this->validate();

        // simple store Image code
        if (!empty($this->columns['project_image'])) {
            $this->columns['project_image'] = uploadOrReplaceImage(
                $this->columns['project_image'],
                $this->existingFile,
                'projects'
            );
            $this->existingFile = $this->columns['project_image'];
        } else {
            $this->columns['project_image'] =  $this->existingFile;
        }
        $this->columns['project_slug'] = Str::slug($this->columns['project_title']);
        Project::updateOrCreate(
            ['project_id' =>  $this->columns['project_id']],
            $this->columns
        );

        flashSuccess('Project updated successfully.');
        return redirect()->route('admin.projects.list');
    }

    public function render()
    {
        return view('livewire.admin.page.projects.project-edit');
    }
}