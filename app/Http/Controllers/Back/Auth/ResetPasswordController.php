<?php

namespace App\Http\Controllers\Back\Auth;

use App\Http\Controllers\Controller;
use Auth;
use Password;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\ResetsPasswords;

class ResetPasswordController extends Controller
{

    use ResetsPasswords;

    public function __construct()
    {
        $this->middleware('guest:back');
    }

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/admin-cp/login';

    protected function guard()
    {
        return Auth::guard('back');
    }

    protected function broker()
    {
        return Password::broker('back');
    }

    /** 
     * Display the password reset view for the given token.
     *
     * If no token is present, display the link request form.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string|null  $token
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showResetForm(Request $request, $token = null)
    {   
        return view('back.auth.passwords.reset')->with(
            ['token' => $token, 'email' => $request->email]
        );
    }
}
