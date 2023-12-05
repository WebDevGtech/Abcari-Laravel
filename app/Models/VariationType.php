<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VariationType extends Model
{
    use HasFactory;
    public $table="variation_types";

    public $fillable=['name','value'];
}
