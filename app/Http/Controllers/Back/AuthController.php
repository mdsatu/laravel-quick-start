<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:back');
    }

    // Login Page
    public function login(){
        return view('back.auth.login');
    }

    // Submit Login
    public function loginSubmit(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        // Check Login
        $login = Auth::guard('back')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember);
        if (!$login){
            $login = Auth::guard('back')->attempt(['mobile_number' => $request->email, 'password' => $request->password], $request->remember);
        }

        if($login){
            return redirect()->route('back.dashboard');
        }
        return redirect()->back()->withInput()->with('error', 'Email or password wrong!');
    }
}
