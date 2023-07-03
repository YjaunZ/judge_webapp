<?php

namespace App\Admin\Controllers;

use App\Models\Company;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Illuminate\Support\Facades\DB;

class CompanyController extends AdminController{
    protected $title = '企业管理';

    //获取企业列表
    public function getCompanyList()
    {
        $companylist = DB::table('admin_role_users')
            ->join('admin_users','admin_role_users.user_id', '=', 'admin_users.id')
            ->join('admin_roles', 'admin_role_users.role_id', '=', 'admin_roles.id')
            ->select('admin_users.id','admin_users.name')
            ->where('admin_role_users.role_id','=','2')
            ->get();
        $temp = $companylist->toArray();
        $arr = [];
        for($key = 0; $key < count($temp); $key++)
        {
            array_push($arr, $temp[$key]->id, $temp[$key]->name);
        }
        for($i = 0; 2*$i < count($arr); $i++)
        {
            $arr_new[2*($i+1)] = $arr[2*$i+1];
        }
        return $arr_new;
    }
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
        $grid->column('name', __('公司名称'))->sortable();
        $grid->column('email', __('公司邮箱'))->sortable();
        $grid->column('created_at', __('创建时间'));
        $grid->column('updated_at', __('更新时间'));

        return $grid;
    }
    //提交表单
    protected function form()
    {
        $form = new Form(new Company);
        $list = $this->getCompanyList();
        $form->select('name', '企业名称')->required()->options($list);
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
