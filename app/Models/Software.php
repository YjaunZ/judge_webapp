<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Software extends Model
{
    use HasFactory;
    protected $table ='softwares';
    public function judges()
    {
        return $this->hasOne(Judge::class, 'software_id', 'id');
    }
    public function tasks()
    {
        return $this->hasOne(Task::class,'software_id', 'id');
    }

}
