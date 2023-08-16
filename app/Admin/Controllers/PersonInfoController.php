<?php

namespace App\Admin\Controllers;
//系统个人信息调研表
use App\Models\PersonInfo;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use App\Admin\Extensions\PostsExporter;

class PersonInfoController extends AdminController{
    protected $title = '系统个人信息调研表';

    public function grid(){
        $grid = new Grid(new PersonInfo());
        $grid -> column('person_info_id', 'ID');
        $grid -> column('info_type', '个人信息种类');
        $grid -> column('info_content', '内容');

        $grid->exporter(new PostsExporter());
        return $grid;
    }
    public function form(){
        $form = new Form(new PersonInfo());
        $form -> text('info_type','个人信息种类')->required();
        $form -> text('info_content', '个人信息内容')->required();
        $form -> text('usage','用途')->required();
        $form -> text('data_total', '数据总量')->required();
        $list = [
            '0' => '',
            '1' => '是',
            '2' => '否',
        ];
        $form -> select('is_encrypc', '是否加密')->required()->options($list);
        $form -> text('use_os', '涉及应用系统')->required();
        $form -> text('store_location', '存储位置')->required();
        $form -> select('is_backup', '是否异地备份')->required()->options($list);
        $form -> text('backup_way', '备份方式')->required();
        $form -> text('backup_cycle', '备份周期')->required();
        $form -> text('store_cycle', '保存周期')->required();
        $form -> select('is_classfied_protected', '是否分级分类保护')->required()->options($list);
        $form -> text('data_level', '数据分级')->required();
        $form -> select('is_shared', '是否共享')->required()->options($list);;
        $form -> select('is_out_secret', '是否脱敏')->required()->options($list);;
        $form -> select('is_build_destory', '是否建立数据销毁制度')->required()->options($list);;
        return $form;
    }
}
