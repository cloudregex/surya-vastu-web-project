<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BaseController
{
    public function Redirect()
    {
        return redirect()->route('auth.login');
    }
}
