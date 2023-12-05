<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeakHour extends Model
{
    use HasFactory;
    public $table="bar_peak_hours";
   // protected $casts=['available_days'=>'array'];
    
   
}
