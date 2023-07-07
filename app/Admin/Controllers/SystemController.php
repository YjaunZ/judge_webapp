<?php

namespace App\Admin\Controllers;
//信息系统基本情况调查表
use App\Models\System;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;

class SystemController extends AdminController{
    protected $title = "信息系统基本情况调查表";
    public function grid(){
        $grid = new Grid(new System());
        $grid->column('name','系统名称');
        return $grid;
    }
    public function form(){
        $form = new Form(new System());
        $form->text('name','系统名称')->required();
        $form->text('encode','系统编号')->required();
        $form->text('level_grade','等保测评')->required();
        $form->text('build_way','建设方式')->required();
        $form->text('service_type','业务类型')->required();
        $form->text('service_describ','业务描述')->required();
        $form->text('service_object','服务对象')->required();
        $form->text('service_limit','服务范围')->required();
        $form->text('user_num','用户数量')->required()->help("请输入数字");
        $form->text('network_interface','网络接入')->required()->help("请输入数字");
        $list = [
            '是'=>'是',
            '否'=>'否'
        ];
        $form->select('if_use_person_info','是否涉及个人信息')->options($list)->required()->help("请选择");
        $form->text('server_location','服务器部署位置')->required();
        $form->text('use_department','使用科室')->required();
        $form->text('department_leader','使用科室负责人')->required();
        $form->mobile('department_leader_phone','联系方式')->required()->help("请输入使用科室负责人手机号");
        $form->text('data_type','系统处理数据类型')->required();
        $form->select('is_confidential','是否涉密')->options($list)->required()->help("请选择");
        $form->select('is_use_other','是否委托第三方进行数据处理')->options($list)->required()->help("请选择");
        $form->select('is_use_both','是否共同处理数据')->options($list)->required()->help("请选择");
        $form->text('data_store_location','数据存储地点')->required();
        $form->select('is_evaluation','是否开展网络安全风险评估')->options($list)->required()->help("请选择");
        $form->select('is_build_censor','是否建立数据安全全流程管理制度')->options($list)->required()->help("请选择");
        $form->text('run_type','运维方式')->required();
        $form->text('run_company','运维单位')->required();
        $form->text('product_safety_num','安全专用产品数量')->required()->help('请输入整数');
        $form->text('product_safety_china','安全专用产品使用国产品率')->required()->help('请输入小数');;
        $form->text('product_net_num','网络产品数量')->required()->help('请输入整数');
        $form->text('product_net_china','网络产品使用国产品率')->required()->help('请输入小数');
        $form->text('product_os_num','操作系统数量')->required()->help('请输入整数');
        $form->text('product_os_china','操作系统使用国产品率')->required()->help('请输入小数');
        $form->text('product_db_num','数据库数量')->required()->help('请输入整数');
        $form->text('product_db_china','数据库使用国产品率')->required()->help('请输入小数');
        $form->text('product_server_num','服务器数量')->required()->help('请输入整数');
        $form->text('product_server_china','服务器使用国产品率')->required()->help('请输入小数');
        $form->text('product_pwd_num','密码产品数量')->required()->help('请输入整数');
        $form->text('product_pwd_china','密码产品使用国产品率')->required()->help('请输入小数');
        return $form;
    }
}
