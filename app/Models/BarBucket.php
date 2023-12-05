<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarBucket extends Model
{
    use HasFactory;

    public $table="bar_buckets";

    public $fillable=['name','arabic_name','image','status','bucket_type'];
 public function point(){
        return $this->hasMany(BarBucketPoint::class,'bar_bucket_id','id');
    }

    public function pointreward(){
        return $this->hasOne(BarBucketPoint::class,'bar_bucket_id','id')->where('bucket_point_type','reward');
    }
    public function pointredeem(){
        return $this->hasOne(BarBucketPoint::class,'bar_bucket_id','id')->where('bucket_point_type','redeem');
    }
}
