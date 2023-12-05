<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RewardRedeemPoint extends Model
{
    use HasFactory;
    public $table="reward_redeem_point_transactions";
    public function restaurant()
    {
        return $this->belongsTo(BarRestaurant::class,'bar_restaurant_id','id');
    }
    
    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }


}




















