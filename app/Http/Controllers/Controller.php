<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Info;
use View;

class Controller extends BaseController
{
    public function __construct() {
        View::share ('settings_g', Info::InfoKey('General Settings'));
    }

    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
