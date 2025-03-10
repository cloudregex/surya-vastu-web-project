<?php

namespace App\Livewire\Website\Pages;

use App\Models\tbl_team;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Team extends Component
{
    #[Layout('livewire.website.layouts.website')]
    #[Title('Team')]
    public function render()
    {
        $teams = tbl_team::latest()->paginate(8);
        return view('livewire.website.pages.team', [
            'teams' => $teams
        ]);
    }
}
