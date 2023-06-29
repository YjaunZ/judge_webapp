<?php

namespace App\Admin\Controllers;

use App\Models\Company;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class CompanyController extends AdminController{
    protected $title = '企业管理';
    protected function detail($id)
    {
        $show = new Show(Company::query()->findOrFail($id));

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
    protected function grid()
    {
        $grid = new Grid(new Company);
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

        return $grid;
    }
    //提交表单
    protected function form()
    {
        $form = new Form(new Company);
        $form->text('account', '企业登陆名称')->rules('required|min:6',[
            'required'=>'此空为必填项',
            'min'=>'登陆名至少为6位']);

        //regex:/[\u4e00-\u9fa5]/
        $form->text('name', '企业名称')->rules('required|min:4',[
            'required'=>'此空为必填项',
            'min'=>'至少为四个字符'
        ]);
        $form->text('email', '邮箱')->rules('required|regex:/^[a-zA-Z0-9_-]+@[a-zA-Z0-9_-]+(\.[a-zA-Z0-9_-]+)+$/',[
            'required'=>'此空为必填项',
            'regex'=>'邮箱格式不正确，请检查'
        ]);
        $type = [
            1 => '党委机关',
            2 => '政府机关',
            3 => '事业单位',
            4 => '企业',
            5 => '其他',
        ];
        $form->select('type', '单位所属类型')->options($type)->rules('required',[
            'required' => '这是必填项'
        ]);
        $form->text('address', '地址')->rules('required',[
            'required' => '这是必填项'
        ]);
        //regex:/[\u4e00-\u9fa5]/
        $form->text('data_leader', '数据安全分管领导')->rules('required',[
            'required' => '这是必填项',

        ]);
        //|regex:/^(13[0-9]|14[01456879]|15[0-35-9]|16[2567]|17[0-8]|18[0-9]|19[0-35-9])\d{8}$/
        $form->text('leader_phone', '数据安全分管领导手机号')->rules('required',[
            'required' => '这是必填项',
        ]);
        //|regex:regex:/[\u4e00-\u9fa5]/
        $form->text('department_responsibility_name', '责任部门联系人')->rules('required',[
            'required' => '这是必填项',

        ]);
        //|regex:/^(13[0-9]|14[01456879]|15[0-35-9]|16[2567]|17[0-8]|18[0-9]|19[0-35-9])\d{8}$/
        $form->text('department_responsibility_phone', '责任部门联系人电话')->rules('required',[
            'required' => '这是必填项',
        ]);
        $form->textarea('describe', '简介')->rules('nullable');
        return $form;
    }
}
