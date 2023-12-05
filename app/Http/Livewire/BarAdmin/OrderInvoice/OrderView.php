<?php

namespace App\Http\Livewire\BarAdmin\OrderInvoice;

use Livewire\Component;
use Request;
use App\Models\Order ;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\ProductVariation;
use Auth;
use App\Models\BarRestaurant;
use App\Models\User;
use App\Models\OrderInvoice;
use App\Models\OrderTransaction;
use App\Models\PaymentGateway;
use App\Models\WaiterDetail;
use App\Models\RewardRedeemPoint;
class OrderView extends Component
{
public $orderInvoice;


    public function render()
    {
       
      //  dd(request::segment('4'));
      $barRestaurant=BarRestaurant::where('user_id',Auth::id())->first();

      
      $this->orderInvoice=OrderInvoice::with('orderTransaction','order','username','productName','orderInvoice')->where([['bar_restaurant_id',$barRestaurant->id],['order_no',request::segment('4')]])->first();

$orders=OrderItem::with('productvariations.variation')->where('order_id',$this->orderInvoice->order->id)->get();
//dd($orders);
$orders_total=OrderItem::with('productvariations.variation','productvariations')->where('order_id',$this->orderInvoice->order->id)->sum('total_price');
$orders_tax=OrderItem::with('productvariations.variation','productvariations')->where('order_id',$this->orderInvoice->order->id)->sum('tax_price');
$grand_total=$orders_total+$orders_tax;


$rewardredeempoint=RewardRedeemPoint::where('order_id', $this->orderInvoice->order_id)->first();


$redeempointamount=$grand_total-$rewardredeempoint->redeem_points_amount;
//dd($redeempointamount);
// $pluck_waiter=OrderItem::with('productvariations.variation')->where('order_id',$this->orderInvoice->order->id)->pluck('bar_waiter_detail_id');

// $waiter=WaiterDetail::whereIn('id',$pluck_waiter)->first();

        return view('livewire.bar-admin.order-invoice.order-view',['order'=>$this->orderInvoice,'orders'=>$orders,'orders_total'=>$orders_total,'orders_tax'=>$orders_tax,'rewardredeempoint'=>$rewardredeempoint,'redeempointamount'=>$redeempointamount]);
    }
}
