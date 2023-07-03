<?php

namespace App\Admin\Controllers;

use App\Models\Software;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Illuminate\Support\Facades\DB;

class SoftwareController extends AdminController
{
    protected $title = '软件管理';
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
    protected function grid()
    {
        $grid = new Grid(new Software);
        $grid->column('id', 'ID');
        $grid->column('systemname', '系统名称');
        $grid->column('judges.grade','系统得分');
        return $grid;
    }
    protected function form()
    {
        $form = new Form(new Software);
        $list = $this->getCompanyList();
        $form->text('systemname','系统名称');
        $form->select('build_company', '承建公司')->options($list);
        $form->select('run_company', '运维公司')->options($list);
        $usrlist = [
            0=>'本部门',
            1=>'本行业'
        ];
        $form->select('user_belong','用户范围')->options($usrlist);
        $form->textarea('func', '系统业务功能');
        return $form;
    }
    protected function detail($id)
    {
        $show = new Show(Software::query()->findOrFail($id));
        $show->field('id', 'ID');
        $show->field('systemname', '系统名称');
        $show->field('build_company', '承建公司');
        $show->field('run_company', '运维公司');
        $show->field('user_belong','用户范围');
        $show->field('func','系统业务功能');
        $show->field('grade', '得分');



    }
}
