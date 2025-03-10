<?php

namespace App\Livewire\Admin\Page\Team;

use App\Models\Team;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;

class TeamCreate extends Component
{
    use WithFileUploads;
    #[Title('Team Create')]
    public $columns, $existingFile;

    public function mount()
    {
        if (!User::find(Auth::id())->can('admin.team.create')) {
            abort(403); // Unauthorized access
        }
        $this->columns = Team::getColumns();
        $this->existingFile = $this->columns['team_image'];
    }

    // Define the rules dynamically
    protected function rules()
    {
        return Team::rules();
    }

    // Define the messages dynamically
    protected function messages()
    {
        return Team::messages();
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submitForm()
    {
        $this->validate();

        // Upload the image
        if (!empty($this->columns['team_image'])) {
            $this->columns['team_image'] = uploadOrReplaceImage(
                $this->columns['team_image'],
                $this->existingFile,
                'team'
            );
            $this->existingFile = $this->columns['team_image'];
        }

        // Save the Projects entry
        Team::create($this->columns);

        flashSuccess('Team created successfully.');
        return redirect()->route('admin.team.list');
    }

    public function render()
    {
        return view('livewire.admin.page.team.team-create');
    }
}
