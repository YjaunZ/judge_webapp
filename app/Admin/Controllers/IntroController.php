<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;

class IntroController extends Controller
{
    public static function intro(){
        return view('page1.swintro');
    }
}
