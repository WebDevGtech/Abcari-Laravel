<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarBucketPoint extends Model
{
    use HasFactory;

    public $table="bar_bucket_points";

    public function rewardpoint(){
        return $this->belongsTo(BarBucket::class,'bar_bucket_id','id');
    }
}
