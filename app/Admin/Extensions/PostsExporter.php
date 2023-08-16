<?php
namespace App\Admin\Extensions;

use Encore\Admin\Grid\Exporters\ExcelExporter;

class PostsExporter extends ExcelExporter
{
    protected $fileName = '列表.xlsx';

    protected $columns = [
        'id'      => 'ID',
        'info_type'   => '信息种类',
        'info_content' => '内容',
    ];
}
