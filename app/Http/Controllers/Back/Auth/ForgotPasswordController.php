<?php

namespace App\Http\Controllers\Back\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Password;

class ForgotPasswordController extends Controller
{
    use SendsPasswordResetEmails;

    public function __construct()
    {
        $this->middleware('guest:back');
    }

    protected function broker()
    {
        return Password::broker('back');
    }

    public function showLinkRequestForm()
    {
        return view('back.auth.passwords.email');
    }
}
