<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class System extends Model{
    use HasFactory;
    protected $table = 'systems';
    public function checks(){
        return $this->belongsTo(Check::class,'system_id', 'system_id');
    }
    public function person_info(){
        return $this->hasMany(PersonInfo::class,'person_info_id','person_info_id');
    }
    public function data(){
        return $this->hasMany(Data::class,'data_id','data_id');
    }
}
