<?php

namespace App\Admin\Controllers;

use App\Models\Judge;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Illuminate\Support\Facades\DB;

class JudgeController extends AdminController
{
    protected $title = '评分管理';
    public function setSignalFinished($id)
    {
        $status = DB::table('tasks')->where('id', '=', $id)
        ->update(['finished_signal' => 1]);
        dump($status);
    }

    //需要筛选打分完成与否
    protected function grid()
    {
        $grid = new Grid(new Judge);
        $grid->disableCreateButton();
        $grid->disableExport();
        $grid->actions(function ($actions) {
            $actions->disableDelete();
            $actions->disableView();
        });

        $grid->column('id', __('ID'))->sortable();
        $grid->column('created_at', __('创建时间'));
        $grid->column('updated_at', __('更新时间'));
        $grid->column('tasks.finished_signal','是否完成')->display(function ($finished_signal){
            if($finished_signal == 1) return '完成';
            else if($finished_signal == 0) return '未完成';
            else return '无';
        });;
//        $grid->column('title')->editable();

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


        return $grid;
    }
    protected function form()
    {
        $form = new Form(new Judge);
//        $form = new Form(Judge::query()->findOrFail($id));

//        echo $form->isCreating();
//        $id = Admin::user()->id;
//        $form->edit($id);

        $form->number('check_1_1','数据安全管理机构得分')->required()->placeholder("请打分")
            ->min(0)
            ->max(2);
        $form->number('check_1_2','数据安全岗位责任得分')->required()->placeholder("请打分")
            ->min(0)
            ->max(2);
        $form->number('check_1_3','数据安全责任人得分')->required()->placeholder("请打分")
            ->min(0)
            ->max(2);

        $form->number('check_2_1','总体规划得分')->required()->placeholder("请打分")
            ->min(0)
            ->max(2);
        $form->number('check_2_2','数据全生命周期管理制度')->required()->placeholder("请打分")
            ->min(0)
            ->max(6);
        $form->number('check_2_3','个人信息保护制度')->required()->placeholder("请打分")
            ->min(0)
            ->max(2);
        $form->number('check_2_4','保密协议')->required()->placeholder("请打分")
            ->min(0)
            ->max(1);
        $form->number('check_2_5','外部人员管')->required()->placeholder("请打分")
            ->min(0)
            ->max(2);
        $form->number('check_2_6','合作商管理制度')->required()->placeholder("请打分")
            ->min(0)
            ->max(1);
        $form->number('check_2_7','第三方产品上线')->required()->placeholder("请打分")
            ->min(0)
            ->max(1);

        $form->number('check_3_1','数据资源清单')->required()->placeholder("请打分")
            ->min(0)
            ->max(4);
        $form->number('check_3_2','敏感数据发现')->required()->placeholder("请打分")
            ->min(0)
            ->max(2);
        $form->number('check_3_3','数据分类分级')->required()->placeholder("请打分")
            ->min(0)
            ->max(2);

        $form->number('check_4_1','个人信息')->required()->placeholder("请打分")
            ->min(0)
            ->max(2);
        $form->number('check_4_2','数据传输')->required()->placeholder("请打分")
            ->min(0)
            ->max(2);
        $form->number('check_4_3','数据脱敏')->required()->placeholder("请打分")
            ->min(0)
            ->max(3);
        $form->number('check_4_4','数据接口')->required()->placeholder("请打分")
            ->min(0)
            ->max(2);
        $form->number('check_4_5','数据导入导出')->required()->placeholder("请打分")
            ->min(0)
            ->max(2);
        $form->number('check_4_6','数据防泄漏')->required()->placeholder("请打分")
            ->min(0)
            ->max(2);
        $form->number('check_4_7','数据存储')->required()->placeholder("请打分")
            ->min(0)
            ->max(2);
        $form->number('check_4_8','数据备份')->required()->placeholder("请打分")
            ->min(0)
            ->max(2);
        $form->number('check_4_9','数据容灾')->required()->placeholder("请打分")
            ->min(0)
            ->max(2);
        $form->number('check_4_10','数据共享')->required()->placeholder("请打分")
            ->min(0)
            ->max(4);
        $form->number('check_4_11','数据销毁')->required()->placeholder("请打分")
            ->min(0)
            ->max(1);

        $form->number('check_5_1','身份认证')->required()->placeholder("请打分")
            ->min(0)
            ->max(4);
        $form->number('check_5_2','访问控制')->required()->placeholder("请打分")
            ->min(0)
            ->max(6);
        $form->number('check_5_3','供应链安全')->required()->placeholder("请打分")
            ->min(0)
            ->max(2);
        $form->number('check_5_4','安全审计')->required()->placeholder("请打分")
            ->min(0)
            ->max(4);
        $form->number('check_5_5','终端安全')->required()->placeholder("请打分")
            ->min(0)
            ->max(4);
        $form->number('check_5_6','等级测评')->required()->placeholder("请打分")
            ->min(0)
            ->max(2);
        $form->number('check_5_7','商用密码应用安全性评估')->required()->placeholder("请打分")
            ->min(0)
            ->max(2);
        $form->number('check_5_8','安全监测')->required()->placeholder("请打分")
            ->min(0)
            ->max(2);
        $form->number('check_5_9','周期检查')->required()->placeholder("请打分")
            ->min(0)
            ->max(2);
        $form->number('check_5_10','应急预案')->required()->placeholder("请打分")
            ->min(0)
            ->max(2);
        $form->number('check_5_11','应急演练')->required()->placeholder("请打分")
            ->min(0)
            ->max(3);
        $form->number('check_5_12','重要时期值')->required()->placeholder("请打分")
            ->min(0)
            ->max(2);
        $form->number('check_5_13','应急处置')->required()->placeholder("请打分")
            ->min(0)
            ->max(2);
        $form->number('check_5_14','安全意识培训')->required()->placeholder("请打分")
            ->min(0)
            ->max(5);

        $form->disableEditingCheck();
        $form->disableCreatingCheck();
        $form->disableViewCheck();
        $form->tools(function (Form\Tools $tools) {
            $tools->disableDelete();
            $tools->disableView();
        });
        //保存后回调
        $form->saved(function (Form $form) {
            $id = $form->model()->id;
            $this->setSignalFinished($id);
        });
        return $form;
    }
    protected function detail($id)
    {
        $show = new Show(Judge::query()->findOrFail($id));

        $show->field('id', 'ID');
        $show->field('judge_appoint', '打分人id');
        $show->field('created_at');
        $show->field('updated_at');
        $show->panel()
            ->tools(function ($tools) {
                $tools->disableList();
                $tools->disableDelete();
            });;
        return $show;
    }

}
