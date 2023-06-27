<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use Encore\Admin\Layout\Content;
use Encore\Admin\Widgets\Box;


class ChartjsController extends Controller
{
    public static function title()
    {
        return view('admin.chartjs');
    }
}
