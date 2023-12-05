<?php

namespace App\Http\Livewire\BarAdmin\Settings;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\BarRestaurant;
use App\Models\BarPaymentGateway;
use Livewire\WithPagination;
use App\Models\PaymentGateway as PaymentGatewayModel;
class PaymentGateway extends Component
{
    use WithPagination;
    public $search,$deleteId,$selectpayment;
    private $barpayment;
   
    public function updateStatus($value, $id)
    {
     
      $addpayment = BarPaymentGateway::where('id', $id)->first();
      
      if ($value == true) {
        
        $addpayment->status ='1';
        $this->dispatchBrowserEvent('alert', [
          'type' => 'success',
          'message' => "Updated Successfully"
          ]);
      } 
      else
       { 
        $addpayment->status ='0';
        $this->dispatchBrowserEvent('alert', [
          'type' => 'success',
          'message' => "Updated Successfully"
          ]);
      }
      $addpayment->update();
    }
    public function sumbitForm()
    {
     //dd($this->selectpayment);
        $barrestaurant=BarRestaurant::where('user_id',Auth::id())->first();
     foreach($this->selectpayment as $key =>$value)
     {
      $addpayment= new BarPaymentGateway;
      $addpayment->bar_restaurant_id =$barrestaurant->id;
      $addpayment->payment_gateway_id=$this->selectpayment[$key];
      $addpayment->save();
     }
      $this->dispatchBrowserEvent('modalClose');
      $this->dispatchBrowserEvent('alert', [
      'type' => 'success',
      'message' => "Saved Successfully"
      ]);
    }
    public function deleteId($id)
{
  $deletepayment=BarPaymentGateway::where('id',$id)->first();
  $this->deleteId=$id;
}
public function deleteForm()
{
  $delete=BarPaymentGateway::where('id',$this->deleteId)->delete();
  $this->dispatchBrowserEvent('modalClose');
  $this->dispatchBrowserEvent('alert', [
  'type' => 'success',
  'message' => "Payment Gateway Deleted"
  ]);
  
}

    public function render()
    {
$search=$this->search.'%';
$barrestaurant=BarRestaurant::where('user_id',Auth::id())->first();

$this->barpayment=BarPaymentGateway::with('paymentgateway')->where([['bar_restaurant_id',$barrestaurant->id],['id','LIKE',$search]])->paginate(15);

$pluckbarid=BarPaymentGateway::with('paymentgateway')->where('bar_restaurant_id',$barrestaurant->id)->pluck('payment_gateway_id');
//dd($pluckbarid);

        $payment=PaymentGatewayModel::whereNotIn('id',$pluckbarid)->get();
        return view('livewire.bar-admin.settings.payment-gateway',['payments'=>$payment,'barpayments'=>$this->barpayment]);
    }
}
