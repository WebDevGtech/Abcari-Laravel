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
class ReadyToServeOrder extends Component
{
    use WithPagination, CurlProcessor;
    private $orders;
    public $barwaiter, $status;
    public $waiter_updated_id,$search;
    public function serve($order_item_id, $order_no)
    {



        if ($this->waiter_updated_id != "") {
            $orderTable = OrderModel::where('order_no', $order_no)->update(['bar_waiter_detail_id' => $this->waiter_updated_id]);
            $orderItemsTable = OrderItem::where('order_no', $order_no)->update(['bar_waiter_detail_id' => $this->waiter_updated_id]);
        }
      


      $orderitem=  OrderItem::where('id', $order_item_id)->first();
     $orderitem->status='served';
     $orderitem->update();

     $cancel = OrderModel::where('id', $orderitem->order_id)->first();
     $cancel->status='6';
     $cancel->update();

        //$this->orderStatusChange("served");
        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'message' => "Order Served",
        ]);
        $orders = OrderItem::where('id', $order_item_id)->first();
        $order = OrderModel::where('id', $orders->order_id)->first();
        $user = User::where('id', $order->user_id)->first();
        $status="Served";
        $bar_id="0";
        $type=2;
        $live_order_id= $order->id;
        $invoice_id="0";
        $user_mobile=$user->user_unique_id;
        $heading="Your Order has been Served";

        
        $this->makeCurlPostRequest($status,$bar_id,$type,$live_order_id,$invoice_id,$user_mobile,$heading);
       // return redirect()->route('served_order');
        return redirect(route('bar-served-order'));
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



        //$this->orderStatusChange("cancelled");
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
         $search='%'.$this->search.'%';
         
        $barRestaurant = BarRestaurant::where('user_id', Auth::id())->first();
        $this->barwaiter = BarWaiterDetails::where('bar_restaurant_id',$barRestaurant->id)->get();
        $this->orders = OrderItem::with('productName', 'waiterId', 'waiterTableDetails', 'order')->where([['bar_restaurant_id', $barRestaurant->id], ['status', 'ready_to_serve'],['order_no', 'LIKE', $search]])->paginate(15);

    //dd($this->orders);
        return view('livewire.bar-admin.order.ready-to-serve-order',['orders' => $this->orders, 'barwaiters' => $this->barwaiter]);
    }
}
