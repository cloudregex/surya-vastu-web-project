<?php

namespace App\Livewire\Admin\Auth\Profile;

use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Jenssegers\Agent\Agent;

class DeviceSessions extends Component
{
    public $sessions;

    public function mount()
    {
        $userId = Auth::id(); // Get the current user's ID
        $currentSessionId = Request::session()->getId(); // Get the current session ID
        $this->sessions = DB::table('sessions')
            ->where('user_id', $userId) // Filter sessions by the current user
            ->where('id', '<>', $currentSessionId) // Exclude the current session
            ->get()
            ->map(function ($session) {
                // Create an instance of Agent
                $agent = new Agent();
                $agent->setUserAgent($session->user_agent);

                // Add browser name to session data
                $session->browser = $agent->browser();

                // Format last activity date
                $session->last_activity_formatted = $this->formatActivity($session->last_activity);

                return $session;
            });
    }

    private function formatActivity($lastActivityTimestamp)
    {
        $lastActivity = Carbon::createFromTimestamp($lastActivityTimestamp);
        return $lastActivity->format('d-m-Y'); // Format as 'day-month-year'
    }
    public function removeSession($id)
    {
        $userId = Auth::id(); // Ensure you only delete the current user's sessions
        DB::table('sessions')
            ->where('id', $id)
            ->where('user_id', $userId)
            ->delete();
        session()->flash('SUCCESS', 'Remove Authentication successfully.');
        $this->mount(); // Refresh sessions after deletion
    }

    public function removeAllSessions()
    {
        $userId = Auth::id(); // Ensure you only delete the current user's sessions
        DB::table('sessions')
            ->where('user_id', $userId)
            ->where('id', '<>', Request::session()->getId()) // Exclude the current session
            ->delete();
        session()->flash('SUCCESS', 'Remove All Device Authentication successfully.');
        $this->mount(); // Refresh sessions after deletion
    }

    public function render()
    {
        return view('livewire.admin.auth.profile.device-sessions');
    }
}
