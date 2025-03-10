<?php

namespace App\Livewire\Admin\Page\Team;

use App\Models\Team;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;

class TeamEdit extends Component
{
    use WithFileUploads;
    #[Title('Team Edit')]

    public $columns, $existingFile;

    public function mount($encryptedId)
    {
        if (!User::find(Auth::id())->can('admin.team.edit')) {
            abort(403);
        }

        $this->columns = Team::getColumns();
        // Retrieve the user by ID
        $this->columns['team_id'] = decryptData($encryptedId);
        $team = Team::findOrFail($this->columns['team_id']);
        if ($team) {
            foreach ($this->columns as $key => $column) {
                $this->columns[$key] = $team[$key];
            }
            $this->columns['team_image'] = '';
            $this->existingFile = $team->team_image;
        }
    }

    // Define the rules dynamically
    protected function rules()
    {
        return Team::rules($this->columns['team_id']);
    }

    // Define the messages dynamically
    protected function messages()
    {
        return Team::messages();
    }
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);  // Validate only the updated field
    }

    public function submitForm()
    {
        $this->validate();

        // simple store Image code
        if (!empty($this->columns['team_image'])) {
            $this->columns['team_image'] = uploadOrReplaceImage(
                $this->columns['team_image'],
                $this->existingFile,
                'team'
            );
            $this->existingFile = $this->columns['team_image'];
        } else {
            $this->columns['team_image'] =  $this->existingFile;
        }

        Team::updateOrCreate(
            ['team_id' =>  $this->columns['team_id']],
            $this->columns
        );

        flashSuccess('Team User updated successfully.');
        return redirect()->route('admin.team.list');
    }
    public function render()
    {
        return view('livewire.admin.page.team.team-edit');
    }
}
