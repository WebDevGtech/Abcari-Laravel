<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarTieUp extends Model
{
    use HasFactory;

    public $table="bar_tie_up";
    public $fillable=['name','image','status','details'];
}
