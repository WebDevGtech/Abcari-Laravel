<?php

namespace App\Http\Livewire\BarAdmin\RewardPoints;

use Livewire\Component;
use App\Models\RewardRedeemPoint;
use Illuminate\Support\Facades\Auth;
use App\Models\BarRestaurant;
use App\Models\User;
class RewardTransaction extends Component
{
    
    private $reward;


 public function cancel($id)
    {
   // dd($id);
   RewardRedeemPoint::where('id',$id)->update(['status'=>'cancelled']);
     $this->dispatchBrowserEvent('alert', [
       'type' => 'success',
       'message' => "Reward Cancelled"
   ]);
}
public function accept($id)
{
   
  //dd($id);
  $r=RewardRedeemPoint::where('id',$id)->update(['status'=>'approved']);
 
   $v = RewardRedeemPoint::where([['id',$id],['status','approved']])->first();
  

   $user=User::where('id',$v->user_id)->first();
  

    $user->reward_point_earning = $v->reward_points + $user->reward_point_earning; 
    $user->reward_point_remaining = $v->reward_points + $user->reward_point_remaining; 
    
  
$user->update();


$this->dispatchBrowserEvent('alert', [
'type' => 'success',
'message' => "Reward Accepted"
]);
}
    public function render()
    {
        $barRestaurant=BarRestaurant::where('user_id',Auth::id())->first();
       
        $this->reward=RewardRedeemPoint::where([['bar_restaurant_id',$barRestaurant->id],['status','pending']])->paginate(15);
      
        return view('livewire.bar-admin.reward-points.reward-transaction',['rewards'=>$this->reward]);
    }
}
