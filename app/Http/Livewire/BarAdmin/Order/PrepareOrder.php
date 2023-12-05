<?php

namespace App\Http\Livewire\BarAdmin\Order;

use Livewire\Component;
use App\Models\BarRestaurant;
use App\Models\BarWaiterDetails;
use App\Models\Order as OrderModel;
use App\Models\OrderItem;
use App\Models\User;
use App\Traits\curlprocessor;
use Auth;
use Livewire\WithPagination;
class PrepareOrder extends Component
{
    use WithPagination, CurlProcessor;
    private $orders;
    public $search;
    public function ready($id)
    {

        OrderItem::where('id', $id)->update(['status' => 'ready_to_serve']);

       // $this->orderStatusChange("ready_to_serve");
        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'message' => "Order Ready to Served",
        ]);
       
        $orders = OrderItem::where('id', $id)->first();
        $order = OrderModel::where('id', $orders->order_id)->first();
        $user = User::where('id', $order->user_id)->first();
        $status="Ready to Served";
        $bar_id="0";
        $type=2;
        $live_order_id= $order->id;
        $invoice_id="0";
        $user_mobile=$user->user_unique_id;
        $heading="Your Order has been Ready to Served";

        
        $this->makeCurlPostRequest($status,$bar_id,$type,$live_order_id,$invoice_id,$user_mobile,$heading);
        return redirect(route('bar-ready-to-serve'));

    }
    public function cancel($id)
    {
        //dd($id);
        $cancel = OrderItem::where('id', $id)->first();
        $cancel->status='cancelled';
        $cancel->update();

     $order_item= OrderModel::where('id', $cancel->order_id)->first();
     $cancel->status='1';
     $cancel->update();
        
       // $this->orderStatusChange("cancelled");
        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'message' => "Order Cancelled",
        ]);
        $orders = OrderItem::where('id', $id)->first();
        $order = OrderModel::where('id', $orders->order_id)->first();
        $user = User::where('id', $order->user_id)->first();
        $status="Cancelled";
        $bar_id="0";
        $type=2;
        $live_order_id= $order->id;
        $invoice_id="0";
        $user_mobile=$user->user_unique_id;
        $heading="Your Order has been Cancelled";

        
        $this->makeCurlPostRequest($status,$bar_id,$type,$live_order_id,$invoice_id,$user_mobile,$heading);
      //  return redirect()->route('cancel_order');
        return redirect(route('bar-cancel-order'));
        
    }

    public function render()
    {
        $search='%'.$this->search.'%';
        $barRestaurant = BarRestaurant::where('user_id', Auth::id())->first();
        $this->orders = OrderItem::with('productName', 'waiterId', 'waiterTableDetails', 'order')->where([['bar_restaurant_id', $barRestaurant->id], ['status', 'preparing'],['order_no', 'LIKE', $search]])->paginate(15);
       // dd( $this->orders );
        return view('livewire.bar-admin.order.prepare-order',['orders' => $this->orders]);
    }
}
