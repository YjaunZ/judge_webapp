<?php

namespace App\Models;

use \Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Data extends Model{
    use HasFactory;
    protected $table = 'data';
    public function systems(){
        return $this->belongsTo(System::class,'data_id','data_id');
    }
}
