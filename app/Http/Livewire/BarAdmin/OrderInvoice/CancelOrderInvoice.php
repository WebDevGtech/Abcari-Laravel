<?php

namespace App\Http\Livewire\BarAdmin\OrderInvoice;

use App\Models\BarRestaurant;
use App\Models\OrderInvoice as OrderInvoiceModel;
use App\Models\OrderTransaction;
use App\Traits\curlprocessor;
use Auth;
use Livewire\Component;
use Livewire\WithPagination;

class CancelOrderInvoice extends Component
{
    use WithPagination, curlprocessor;
    public $order_status = 'pending';
    private $orderInvoice;

    public function orderinvoiceStatusChange($value)
    {
        //   dd($value);
        $this->order_status = $value;
        $barRestaurant = BarRestaurant::where('user_id', Auth::id())->first();
        //  $orderTransaction = OrderTransaction::where([['bar_restaurant_id',$barRestaurant->id],['payment_gateway_id','3']])->get();

        $this->orderInvoice = OrderInvoiceModel::with('orderTransaction', 'order', 'username', 'productName', 'orderInvoice')->where([['bar_restaurant_id', $barRestaurant->id], ['status', $value]])->paginate(15);

        //dd($this->orderInvoice) ;
    }

    public function onload()
    {
        $barRestaurant = BarRestaurant::where('user_id', Auth::id())->first();
        $this->orderInvoice = OrderInvoiceModel::with('orderTransaction', 'order', 'username', 'productName', 'orderInvoice')->where([['bar_restaurant_id', $barRestaurant->id], ['status', 'pending']])->paginate(15);

        //dd($this->orderInvoice);
    }
    public function accept($id)
    {

        OrderInvoiceModel::where('id', $id)->update(['status' => 'approved']);
        $order = OrderInvoiceModel::where('id', $id)->first();

        OrderTransaction::where('id', $order->order_transaction_id)->update(['status' => 'approved']);

        $this->orderinvoiceStatusChange("approved");
        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'message' => "Invoice Generated",
        ]);

        // $orders = OrderItem::where('id',$id)->first();
        // $order = OrderModel::where('id',$orders->order_id)->first();
        // $user = User::where('id',$order->user_id)->first();

        //$this->makeCurlPostRequest($user->user_unique_id,$orders->order_id,"Preparing");

        //   return redirect()->route('order');
    }

    public function cancel($id)
    {
        //dd($id);
        OrderInvoiceModel::where('id', $id)->update(['status' => 'cancelled']);
        $order = OrderInvoiceModel::where('id', $id)->first();

        OrderTransaction::where('id', $order->order_transaction_id)->update(['status' => 'cancelled']);
        $this->orderinvoiceStatusChange("cancelled");
        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'message' => "Order Cancelled",
        ]);
//    $orders = OrderItem::where('id',$id)->first();
//         $order = OrderModel::where('id',$orders->order_id)->first();
//         $user = User::where('id',$order->user_id)->first();

//         $this->makeCurlPostRequest($user->user_unique_id,$orders->order_id,"Cancelled");

    }
    public function render()
    {
        return view('livewire.bar-admin.order-invoice.cancel-order-invoice',['orders' => $this->orderInvoice]);
    }
}
