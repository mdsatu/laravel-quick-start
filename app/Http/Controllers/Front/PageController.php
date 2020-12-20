<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;

class PageController extends MasterController
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
