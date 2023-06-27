<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use Encore\Admin\Layout\Content;

class DataController extends Controller
{
    public function index(Content $content)
    {
        return view('admin.chartjs');
    }

}
