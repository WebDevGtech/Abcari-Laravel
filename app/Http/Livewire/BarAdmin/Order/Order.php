<?php

namespace App\Http\Livewire\BarAdmin\Order;

use App\Models\BarRestaurant;
use App\Models\BarWaiterDetails;
use App\Models\Order as OrderModel;
use App\Models\OrderItem;
use App\Models\AdminUser;
use App\Models\User;
use App\Traits\curlprocessor;
use Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Order extends Component
{
    use WithPagination, CurlProcessor;
    public $order_status = 'hold';
    private $orders;

    public $barwaiter, $status,$search;
    public $waiter_updated_id;

    // public function orderStatusChange($value)
    // {
    //     //   dd($value);
    //     $this->order_status = $value;
    //     $barRestaurant = BarRestaurant::where('user_id', Auth::id())->first();
    //     $this->orders = OrderItem::with('productName', 'waiterId', 'waiterTableDetails', 'order')->where([['bar_restaurant_id', $barRestaurant->id], ['status', $value]])->paginate(15);

    // }

    public function accept($id)
    {

       $accept= OrderItem::where('id', $id)->first();
       $accept->status='preparing';
       $accept->update();

       $order_item=OrderModel::where('id', $accept->order_id)->first();
       $order_item->status='4';
       $order_item->update();
      
       // $this->orderStatusChange("preparing");
        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'message' => "Order Accepted",
        ]);

        $orders = OrderItem::where('id', $id)->first();
        $order = OrderModel::where('id', $orders->order_id)->first();
        $user = User::where('id', $order->user_id)->first();
        $status="Preparing";
        $bar_id="0";
        $type=2;
        $live_order_id= $order_item->id;
        $invoice_id="0";
        $user_mobile=$user->user_unique_id;
        $heading="Your Order has been Preparing";


        $this->makeCurlPostRequest($status,$bar_id,$type,$live_order_id,$invoice_id,$user_mobile,$heading);
       // return redirect()->route('prepare_order');
       return redirect(route('bar-prepare-order'));
        //   return redirect()->route('order');
    }
   
   
    public function cancel($id)
    {
        //dd($id);
        $cancel = OrderItem::where('id', $id)->first();
        $cancel->status='cancelled';
        $cancel->update();

        $order_item=OrderModel::where('id', $cancel->order_id)->first();
        $order_item->status='1';
        $order_item->update();
       
       
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
       // return redirect()->route('cancel_order');
        return redirect(route('bar-cancel-order'));
    }

    public function render()
    {
        $search='%' . $this->search . '%';


        // dd($this->orders);
        // $order=OrderModel::where('status',2)->paginate(5);
        // dd($order);
       // $this->barwaiter = BarWaiterDetails::all();
        $barRestaurant = BarRestaurant::where('user_id', Auth::id())->first();
        $this->orders = OrderItem::with('productName', 'waiterId', 'waiterTableDetails', 'order')->where([['bar_restaurant_id', $barRestaurant->id], ['status', 'pending'],['order_no', 'LIKE', $search]])->paginate(15);
        // dd( $this->barwaiter);
        return view('livewire.bar-admin.order.order', ['orders' => $this->orders, 'barwaiters' => $this->barwaiter]);
    }
}
