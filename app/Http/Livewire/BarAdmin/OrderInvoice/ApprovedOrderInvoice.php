<?php

namespace App\Http\Livewire\BarAdmin\OrderInvoice;

use Livewire\Component;
use App\Models\Order as OrderModel;
use App\Models\OrderItem;

use Auth;
use App\Models\BarRestaurant;
use App\Models\User;
use App\Models\OrderInvoice as OrderInvoiceModel;
use App\Models\OrderTransaction;
use App\Models\PaymentGateway;
use Livewire\WithPagination;
use App\Traits\curlprocessor;

class ApprovedOrderInvoice extends Component
{
    use WithPagination, curlprocessor;
    public $search;
    private $order_invoice;
    public function render()
    {
        $search = '%' . $this->search . '%';
        $barRestaurant = BarRestaurant::where('user_id',Auth::id())->first();
        $this->order_invoice = OrderInvoiceModel::where([['bar_restaurant_id',$barRestaurant->id],['status','approved'],['order_no', 'LIKE', $search]])->paginate(10);
        return view('livewire.bar-admin.order-invoice.approved-order-invoice', ['appproved_invoice' => $this->order_invoice ]);
    }
}
