<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;

//首页数据控制器
class StaticController extends Controller{
    //企业分数统计图（曲线）
    public static function totalSumGraph(){
        return view('page1.totalsumgraph');
    }

}
