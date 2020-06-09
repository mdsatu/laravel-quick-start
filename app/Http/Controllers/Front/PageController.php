<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PageController extends Controller
{
    // Homepage
    public function homepage(){
        return view('front.homepage');
    }
}
