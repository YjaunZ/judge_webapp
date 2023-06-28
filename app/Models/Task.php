<?php

namespace App\Models;

//use Encore\Admin\Grid\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    //任务和评分表一对一，一个任务有一个评分表
    protected $table = 'tasks';
    public function judges()
    {
        return $this->hasOne(Judge::class, 'task_id', 'id');
    }
}
