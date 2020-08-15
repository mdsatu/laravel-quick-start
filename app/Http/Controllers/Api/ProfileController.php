<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    // Profile Info
    public function profile(){
        return response()->json(Auth::guard('back_api')->user());
    }
}
