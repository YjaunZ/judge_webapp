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
    protected $title = '打分任务管理';
    protected function grid()
    {
        $grid = new Grid(new Task);
        $grid->column('created_at', __('创建时间'));
        $grid->column('judges.judge_appoint', __('分配打分员id'));
        $grid->column('finished_signal', __('完成标志'));
        return $grid;
    }

    //join连结
    //获取打分员列表
    public function getUserList()
    {
        $userlist = DB::table('admin_role_users')
            ->join('admin_users','admin_role_users.user_id', '=', 'admin_users.id')
            ->join('admin_roles', 'admin_role_users.role_id', '=', 'admin_roles.id')
            ->select('admin_users.id','admin_users.name')
            ->where('admin_role_users.role_id','=','3')
            ->get();

        $temp = $userlist->toArray();
        $arr = [];

        for($key = 0; $key < count($temp); $key++)
        {
//            $temp_arr = ['id' => $temp[$key]->id, 'name'=> $temp[$key]->name];

            array_push($arr, $temp[$key]->id, $temp[$key]->name);
        }
        $arr_new = array();
        for($i = 0; $i < count($arr); $i++)
        {
            $arr_new[2*$i] = $arr[$i];
        }
//        array_shift($arr_new);
        return $arr_new;
    }

    protected function form()
    {
        $sign = [0=>'未完成', 1=>'已完成'];
        $form = new Form(new Task);
        $form->select('finished_signal','是否完成')->required()->options($sign);
//        $list = json_encode($this->getUserList(),JSON_UNESCAPED_UNICODE);//二维数组转json
        $list = $this->getUserList();
        $form->select('judges.judge_appoint','选择打分员')->required()->options($list);
        return $form;

    }

}
