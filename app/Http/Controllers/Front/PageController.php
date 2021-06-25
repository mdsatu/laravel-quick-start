<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PageController extends Controller
{
    // Parent Constructor
    public function __construct()
    {
        parent::__construct();
    }

    // Homepage
    public function homepage(){
        return view('front.homepage');
    }
}
