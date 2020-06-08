<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    // Website Settings
    public function settings(){
        return view('back.settings.settings');
    }
}
