<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\Dashboard;
use Encore\Admin\Layout\Column;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Row;

class HomeController extends Controller
{
//    public Content $content;
    public function index(Content $content)
    {
//        $content->title('绘图示例');
        return $content
            ->row(IntroController::intro());


//            ->title('打分汇总')
//            ->row(Dashboard::title())
//            ->row(function (Row $row) {
//                $row->column(6, function (Column $column) {
//
//                });
//
//                $row->column(3, function (Column $column) {
//                    $column->append(Dashboard::extensions());
//                });
//
//                $row->column(3, function (Column $column) {
//                    $column->append(Dashboard::dependencies());
//                });
//            });
    }
}
