<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zone extends Model
{
    use HasFactory;


    public $table="zones";

    public function zone(){
        return $this->belongsTo(Countries::class,'country_id','id');
    }

}
