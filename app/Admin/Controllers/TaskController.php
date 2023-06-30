<?php

namespace App\Admin\Controllers;


use App\Models\Task;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Illuminate\Support\Facades\DB;

class TaskController extends AdminController
{
    protected $title = '打分任务管理';

    protected function grid()
    {
        $grid = new Grid(new Task);
        $grid->column('id', __('ID'))->sortable();
        $grid->column('created_at', __('创建时间'));
        $grid->column('judges.judge_appoint', __('分配打分员id'));
        $grid->column('finished_signal', '是否完成')->display(function ($finished_signal){
            if($finished_signal == 1) return '完成';
            else if($finished_signal == 0) return '未完成';
            else return '无';
        });
        $grid->filter(function($filter){
            // 去掉默认的id过滤器
            $filter->disableIdFilter();
            // 在这里添加字段过滤器
            $filter->equal('任务是否完成')->radio([
                ''   => '全部',
                0    => '未完成',
                1    => '已完成',
            ]);
        });
        $grid->export(function ($export) {
            $export->filename('任务完成情况表.csv');
            $export->except(['column1', 'column2' ]);
            $export->only(['column3', 'column4' ]);
            $export->originalValue(['column1', 'column2']);
            $export->column('column_5', function ($value, $original)
            {
                return $value;
            });
        });

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
//        $arr_new = array();
        for($i = 0; 2*$i < count($arr); $i++)
        {
            $arr_new[2*($i+1)] = $arr[2*$i+1];
        }

//        array_shift($arr_new);
        return $arr_new;
    }

    protected function form()
    {
//        $sign = [0=>'未完成', 1=>'已完成'];
        $form = new Form(new Task);
//        $form->select('finished_signal','是否完成')->required()->options($sign);
//        $list = json_encode($this->getUserList(),JSON_UNESCAPED_UNICODE);//二维数组转json
        $list = $this->getUserList();
//        array_shift($list);
        $form->select('judges.judge_appoint','选择打分员')->required()->options($list);
        return $form;

    }

    protected function detail($id)
    {
        $show = new Show(Task::query()->findOrFail($id));

        $show->field('id', 'ID');
        $show->field('created_at');
        $show->field('updated_at');
        $show->field('finished_signal', '完成标志位');
        $show->panel();
//            ->tools(function ($tools) {
//                $tools->disableEdit();
//                $tools->disableList();
//                $tools->disableDelete();
//            });;
        return $show;
    }

}
