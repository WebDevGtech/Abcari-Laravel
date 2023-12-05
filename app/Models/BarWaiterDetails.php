<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarWaiterDetails extends Model
{
    use HasFactory;
    
    public $table='bar_waiter_details';

    public $fillable=['name','string'];
}
