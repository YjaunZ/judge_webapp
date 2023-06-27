<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Task extends \Illuminate\Database\Eloquent\Model
{
    use HasFactory;
    //任务和评分表一对一
    public function judges()
    {
        return $this->hasOne(Judge::class);
    }
}
