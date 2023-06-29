<?php

namespace App\Models;

//use Encore\Admin\Grid\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Judge extends Model
{
    use HasFactory;
    //任务和评分表一对一（必须为表名）
    protected $table = 'judges';
    public function tasks()
    {
        return $this->belongsTo(Task::class,'id', 'task_id');

    }
}
