<?php

namespace App\Http\Controllers;

use App\Repositories\Info;
use View;

class MasterController extends Controller
{
    public function __construct() {
        View::share ('settings_g', Info::WebGroupKey('general'));
    }
}
