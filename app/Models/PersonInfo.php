<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PersonInfo extends Model{
    protected $table = 'person_info';
    public function systems(){
        return $this->belongsTo(System::class,'person_info_id', 'person_info_id');
    }

}
