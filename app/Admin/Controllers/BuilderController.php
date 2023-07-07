<?php

namespace App\Admin\Controllers;
//单位基本信息收集表
use App\Models\Builder;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;

class BuilderController extends AdminController{
    protected $title = "单位基本信息收集表";
    protected function grid(){
        $grid = new Grid(new Builder());
        $grid->column('name', '单位全称');
        $grid->column('type', '单位类型');
        return $grid;
    }
    protected function form(){
        $form = new Form(new Builder());
        $form->text('name','单位全称')->required();
        $list = [
            '党委机关'=>'党委机关',
            '政府机关'=>'政府机关',
            '事业单位'=>'事业单位',
            '企业'=>'企业',
            '其他'=>'其他'
        ];
        $form->select('type','单位所属类型')->required()->options($list);
        $form->text('address', '单位地址')->required();
        $form->text('main_leader','数据安全分管领导姓名职务')->required()->help("如：马化腾部长，马云副科长，张一鸣董事长等");
        $form->mobile('main_leader_phone','电话')->required()->help("数据安全分管领导电话");
        $form->text('responsibility_department','责任部门');
        $form->text('department_leader','责任部门领导姓名职务')->required()->help("如：马化腾部长，马云副科长，张一鸣董事长等");
        $form->mobile('department_leader_phone','领导电话')->required()->help("责任部门领导电话");
        $form->text('service_num','业务系统数量');
        $form->text('office_num','办公系统数量');
        $form->text('website_num','网站数量');
        $form->text('other_num','其他系统');

        return $form;
    }
}
