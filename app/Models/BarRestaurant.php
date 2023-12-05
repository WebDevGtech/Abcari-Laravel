<?php

namespace App\Models;

use Faker\Core\Barcode;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class BarRestaurant extends Model
{
    use HasFactory;
    public $table="bar_restaurants";

    public $fillable=['name','user_id','bar_bucket_id','bar_service_id','bar_tie_up_id','bar_bucket_reward_point_id','image','banner_image','description','latitude','longitude'];

  
public function user(){
     return $this->belongsTo(AdminUser::class,'user_id','id');

}
public function useradmin(){
    return $this->hasOne(AdminUser::class,'user_id','id');

}

public function category(){
    return $this->belongsTo(BarCategory::class,'bar_category_id','id');
}

public function tieup(){
    return $this->belongsTo(BarTieUp::class,'bar_tie_up_id','id');
}

public function service(){
    return $this->belongsTo(BarService::class,'bar_service_id','id');
}

public function point(){
    return $this->belongsTo(BarBucketPoint::class,'bar_bucket_reward_point_id','id');
}

public function bucket(){
    return $this->belongsTo(BarBucket::class,'bar_bucket_id','id');
}

public function barcategory()
{
    return $this->hasOne(BarRestaurantCategory::class,'bar_restaurant_id','id');
}

public function barservice()
{
    return $this->hasOne(BarRestaurantService::class,'bar_restaurant_id','id');
}

public function bartieup(){
    return $this->hasOne(BarTieUp::class,'id','bar_tie_up_id');
}
}
