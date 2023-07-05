<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Builder extends Model{
    use HasFactory;
    protected $table = 'builders';
    public function checks(){
        return $this->belongsTo(Check::class, 'builder_id', 'builder_id');
    }


}
