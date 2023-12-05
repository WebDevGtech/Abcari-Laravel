<?php

namespace App\Http\Livewire\BarAdmin\RewardPoints;

use Livewire\Component;
use App\Models\RewardRedeemPoint;
use Illuminate\Support\Facades\Auth;
use App\Models\BarRestaurant;
use App\Models\User;
use App\Models\Order;
use Carbon\Carbon;

class RemoveReward extends Component
{
    
    private $remove_reward, $remove_reward_order;


 public function remove($id)
    {
   
        User::where('id',$id)->update(['reward_point_remaining'=>'0']);
     $this->dispatchBrowserEvent('alert', [
       'type' => 'success',
       'message' => "Reward Point Removed"
   ]);
}

    public function render()
    {
        $remove_reward=User::where('reward_point_remaining','>','0')->pluck('id')->toarray();

       


       $remove_reward_order=Order::whereIn('user_id',$remove_reward)->get();
     //  dd( $remove_reward_order);
    
       $remove = Order::where('created_at','<',Carbon::now()->subMonth(6))->get();
    
   //dd('1');
    if(empty($remove))
    {
       // dd('2');
       foreach($remove as $removes)
       {
    // dd('3');
        $remove1=User::where('id',$removes->user_id)->get();
       
       }
      // dd('b');
    }
    else
    {
        $remove1=0;
       
    }
   
 //   dd($remove1);
        return view('livewire.bar-admin.reward-points.remove-reward',['remove_reward_orders'=>$remove1]);
    }
}
