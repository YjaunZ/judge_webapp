<?php

namespace App\Admin\Controllers;


use App\Models\Task;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Illuminate\Support\Facades\DB;

class TaskController extends AdminController
{
    protected $title = '任务管理';
    protected function grid()
    {
        $grid = new Grid(new Task);
        $grid->column('created_at', __('创建时间'));
        $grid->column('judges.judge_appoint', __('分配打分员'));
        $grid->column('finished_signal', __('完成标志'));
        return $grid;
    }

    //中介join连结大法
    public function getUserList()
    {
        $userlist = DB::table('admin_role_users')
            ->join('admin_users','admin_role_users.user_id', '=', 'admin_users.id')
            ->join('admin_roles', 'admin_role_users.role_id', '=', 'admin_roles.id')
            ->select('admin_users.name')
            ->where('admin_role_users.role_id','=','3')
            ->get();

        return $userlist;
    }

    protected function form()
    {
        $sign = [0=>'未完成', 1=>'已完成'];
        $form = new Form(new Task);
        $form->select('finished_signal','是否完成')->required()->options($sign);
        $list = $this->getUserList();
        $form->select('judges.judge_appoint','选择打分员')->required()->options($list);
        return $form;

    }

}
