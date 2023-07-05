<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Check extends Model{
    use HasFactory;
    protected $table = 'checks';
    public function builders(){
        return $this->hasOne(Builder::class,'builder_id','builder_id');
    }
    public function systems(){
        return $this->hasOne(System::class,'system_id','system_id');
    }
}
