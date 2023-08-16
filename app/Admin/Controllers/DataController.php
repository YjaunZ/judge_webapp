<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Data;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
//数据基本情况调查表
class DataController extends AdminController{
    protected $title = '数据基本情况调查表';
    public function grid(){
        $grid = new Grid(new Data());
        $grid->column('data_id', 'ID');
        $grid->column('data_name', '名称');
        return $grid;
    }

    public function form(){
        $form = new Form(new Data());
        $form -> text('data_name', '数据名称')->required();
        $form -> text('data_usage', '数据用途')->required();
        $form -> text('data_total', '数据总量')->required()->help("请输入整数");
        $list = [
            '0' => '',
            '1' => '是',
            '2' => '否',
        ];
        $form -> select('is_encrypc','数据是否加密')->options($list)->required();
        $form -> text('data_os', '涉及应用系统')->required();
        $form -> text('data_location', '存储位置')->required();
        $form -> select('is_backup', '数据是否备份')->options($list)->required();
        $form -> text('backup_type', '备份方式')->required();
        $form -> text('backup_cycle', '备份周期')->required();
        $form -> text('store_cycle','保存周期')->required();
        $form -> select('is_classified_protected', '是否分级分类保护')->options($list)->required();
        $form -> text('data_distribtion','数据分级')->required();
        $form -> select('is_shared', '是否共享')->options($list)->required();
        $form -> select('is_out_serect', '是否脱敏')->options($list)->required();
        $form -> select('is_build_destory','是否建立数据销毁制度')->options($list)->required();

        return $form;
    }

}
