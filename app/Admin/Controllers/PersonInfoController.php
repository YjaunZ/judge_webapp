<?php

namespace App\Admin\Controllers;
//系统个人信息调研表
use App\Models\PersonInfo;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Grid;

class PersonInfoController extends AdminController{
    protected $title = '系统个人信息调研表';

    public function grid(){
        $grid = new Grid(new PersonInfo());
        $grid -> column('person_info_id', '');
    }
}
