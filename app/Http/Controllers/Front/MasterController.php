<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Repositories\Info;
use View;

class MasterController extends Controller
{
    public function __construct() {
        View::share ('settings_g', Info::WebGroupKey('General Settings'));
    }
}
