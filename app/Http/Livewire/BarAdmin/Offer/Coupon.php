<?php

namespace App\Http\Livewire\BarAdmin\Offer;
use App\Models\BarCoupon;
use Illuminate\Support\Facades\Auth;
use App\Models\BarRestaurant;

use Livewire\Component;
use Livewire\WithFileUploads;
use  Livewire\WithPagination;
class Coupon extends Component
{
    use WithPagination;
    use WithFileUploads;
 
    private $coupon,$product;
public $editId,$deleteId,$viewId;
    public $name,$coupon_code,$image,$discount,$coupon_type,$minimum_amount,$discount_type,$search;
    public $edit_name,$edit_coupon_code,$edit_image,$edit_discount,$edit_coupon_type,$edit_minimum_amount,$edit_discount_type;
    
public function updateStatus($value, $id)
{
 
  $addcoupon = BarCoupon::where('id', $id)->first();
  
  if ($value == true) {
    
    $addcoupon->status ='1';
    $this->dispatchBrowserEvent('alert', [
      'type' => 'success',
      'message' => "Updated Successfully"
  ]);
  }
   else
    { 
    $addcoupon->status ='0';
    $this->dispatchBrowserEvent('alert', [
      'type' => 'success',
      'message' => "Updated Successfully"
  ]);
  }
  $addcoupon->update();
}
public function submitForm()
{
   //dd(Auth::id());
   $this->validate(['name'=>'required|regex:/^[a-z A-Z]+$/u|max:50',
  // 'image'=>'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
   'coupon_code'=>'required|max:50',
   'discount'=>'required|integer',
   'minimum_amount'=>'required|integer',
   'coupon_type'=>'required',
   'discount_type'=>'required',
  ],
   [
    'name.required'=>trans('coupon.name_required'),
    'name.regex'=>trans('coupon.name_regex'),
    'name.max'=>trans('coupon.name_max'),
    // 'image.required'=>trans('coupon.image_required'),
    // 'image.mimes'=>trans('coupon.image_mimes'),
    // 'image.max'=>trans('coupon.image_max'),
    'coupon_code.required'=>trans('coupon.coupon_code_required'),
    'coupon_code.max'=>trans('coupon.coupon_code_max'),
    'discount.required'=>trans('coupon.discount_required'),
    'discount.integer'=>trans('coupon.discount_integer'),
    'minimum_amount.required'=>trans('coupon.minimum_amount_required'),
    'minimum_amount.integer'=>trans('coupon.minimum_amount_integer'),
   'coupon_type.required'=>trans('coupon.coupontype_required'),
   'discount_type.required'=>trans('coupon.discounttype_required')]);
     $barrestaurant=BarRestaurant::where('user_id',Auth::id())->first();
    // dd($barrestaurant->id);
    $addcoupon=new BarCoupon;
    $addcoupon->name=$this->name;
    $addcoupon->bar_restaurant_id =$barrestaurant->id;
    $addcoupon->coupon_code=$this->coupon_code;
    $addcoupon->discount=$this->discount;
    $addcoupon->minimum_amount=$this->minimum_amount;
    $addcoupon->coupon_type=$this->coupon_type;
    $addcoupon->discount_type=$this->discount_type;
   $addcoupon->save();
   if( $this->image)
   {
   $coupon=BarCoupon::where('id',$addcoupon->id)->first();
   $extension = $this->image->getClientOriginalExtension();
   //dd($extension);
   $image=$this->image->storeAs('images/'.$barrestaurant->name.'_'.$barrestaurant->id.'/coupons',$coupon->name.'_'.$coupon->id.'.'.$extension,'public');
   $coupon->image=$image;
   $coupon->save();
   }
   $this->reset('name','coupon_code','discount','minimum_amount','coupon_type','discount_type','image');
   $this->dispatchBrowserEvent('modalClose');
   $this->dispatchBrowserEvent('alert', [
       'type' => 'success',
       'message' => "Saved Successfully"
   ]);

}
public function editId($id)
{
    $edit=BarCoupon::where('id',$id)->first();
    //dd($edit);
    $this->editId=$id;
    $this->edit_name=$edit->name;
    $this->edit_coupon_code=$edit->coupon_code;
   // $this->edit_image=$edit->image;
    $this->edit_discount=$edit->discount;
    $this->edit_coupon_type=$edit->coupon_type;
    $this->edit_minimum_amount=$edit->minimum_amount;
    $this->edit_discount_type=$edit->discount_type;
    
}
public function viewId($id)
{
  $edit=BarCoupon::where('id',$id)->first();
    //dd($edit);
    $this->viewId=$id;
    $this->edit_name=$edit->name;
    $this->edit_coupon_code=$edit->coupon_code;
    $this->edit_image=$edit->image;
    $this->edit_discount=$edit->discount;
    $this->edit_coupon_type=$edit->coupon_type;
    $this->edit_minimum_amount=$edit->minimum_amount;
    $this->edit_discount_type=$edit->discount_type;

}

public function editForm()
{
  
  $this->validate(['edit_name'=>'required|regex:/^[a-z A-Z]+$/u|max:50',
 // 'edit_image'=>'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
  'edit_coupon_code'=>'required|max:50',
  'edit_discount'=>'required|integer',
  'edit_minimum_amount'=>'required|integer',
  'edit_coupon_type'=>'required',
  'edit_discount_type'=>'required',
 ],
  [
   'edit_name.required'=>trans('coupon.name_required'),
   'edit_name.regex'=>trans('coupon.name_regex'),
   'edit_name.max'=>trans('coupon.name_max'),
  // 'edit_image.required'=>trans('coupon.image_required'),
   //'edit_image.mimes'=>trans('coupon.image_mimes'),
 //  'edit_image.max'=>trans('coupon.image_max'),
   'edit_coupon_code.required'=>trans('coupon.coupon_code_required'),
   'edit_coupon_code.max'=>trans('coupon.coupon_code_max'),
   'edit_discount.required'=>trans('coupon.discount_required'),
   'edit_discount.integer'=>trans('coupon.discount_integer'),
   'edit_minimum_amount.required'=>trans('coupon.minimum_amount_required'),
   'edit_minimum_amount.integer'=>trans('coupon.minimum_amount_integer'),
  'edit_coupon_type.required'=>trans('coupon.coupontype_required'),
  'edit_discount_type.required'=>trans('coupon.discounttype_required')]);
    $barrestaurant=BarRestaurant::where('user_id',Auth::id())->first();
    $editcoupon=BarCoupon::where('id',$this->editId)->first();
    $editcoupon->name=$this->edit_name;
    $editcoupon->coupon_code=$this->edit_coupon_code;
   
    $editcoupon->discount=$this->edit_discount;
    $editcoupon->minimum_amount=$this->edit_minimum_amount;
    $editcoupon->coupon_type=$this->edit_coupon_type;
    $editcoupon->discount_type=$this->edit_discount_type;
   
    $editcoupon->update();
    if($this->edit_image)
    {
      $editimage=BarCoupon::where('id',$editcoupon->id)->first();
      $this->validate(['edit_image'=>'required|mimes:jpeg,png,jpg,gif,svg|max:2048'],
      ['edit_image.required'=>trans('coupon.image_required'),
   'edit_image.mimes'=>trans('coupon.image_mimes'),
  'edit_image.max'=>trans('coupon.image_max'),]);
    $extension = $this->edit_image->getClientOriginalExtension();
    //dd($extension);
    $image=$this->edit_image->storeAs('images/'.$barrestaurant->name.'_'.$barrestaurant->id.'/coupons',$editcoupon->name.'_'.$editcoupon->id.'.'.$extension,'public');
    $editimage->image=$image;
    $editimage->save();
    }
    $this->dispatchBrowserEvent('modalClose');
    $this->dispatchBrowserEvent('alert', [
        'type' => 'success',
        'message' => "Updated Successfully"
    ]);

}
public function deleteId($id)
{
    $delete=BarCoupon::where('id',$id)->first();
 
  $this->deleteId=$id;
  
}
public function deleteForm()
{
  $deletecoupon= BarCoupon::where('id',$this->deleteId)->delete();
    $this->dispatchBrowserEvent('modalClose');
    $this->dispatchBrowserEvent('alert', [
        'type' => 'success',
        'message' => "coupon Deleted"
    ]);
}


    public function render()
    {
      $barrestaurant=BarRestaurant::where('user_id',Auth::id())->first();
        $search=$this->search.'%';
       
$this->coupon=BarCoupon::where([['bar_restaurant_id',$barrestaurant->id],['name','LIKE',$search]])->paginate(15);
        return view('livewire.bar-admin.offer.coupon',['coupons'=>$this->coupon,'products'=>$this->product]);
    }
}
