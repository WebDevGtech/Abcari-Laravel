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
class CancelOrder extends Component
{
    use WithPagination, curlprocessor;
    private $orders;
    public $search;
    public function render()
    {
        $search='%'.$this->search.'%';
        $barRestaurant = BarRestaurant::where('user_id', Auth::id())->first();
        $this->orders = OrderItem::with('productName', 'waiterId', 'waiterTableDetails', 'order')->where([['bar_restaurant_id', $barRestaurant->id], ['status', 'cancelled'],['order_no', 'LIKE', $search]])->paginate(15);
        return view('livewire.bar-admin.order.cancel-order',['orders' => $this->orders]);
    }
}
