<?php

namespace App\Admin\Controllers;

use App\Models\Judge;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;

class JudgeController extends AdminController
{
    protected $title = '评分管理';


    //需要筛选打分完成与否
    protected function grid()
    {
        $grid = new Grid(new Judge);
        $grid->column('id', __('ID'))->sortable();
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

        return $grid;
    }
    protected function form()
    {

        $form = new Form(new Judge);

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


        $form->footer(function ($footer) {
            // 去掉`查看`checkbox
            $footer->disableViewCheck();
            // 去掉`继续编辑`checkbox
            $footer->disableEditingCheck();
            // 去掉`继续创建`checkbox
            $footer->disableCreatingCheck();

        });







        return $form;
    }

}
