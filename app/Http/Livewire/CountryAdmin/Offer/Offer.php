<?php

namespace App\Http\Livewire\CountryAdmin\Offer;
use App\Models\BarOffer;
use App\Models\BarRestaurant;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use  Livewire\WithPagination;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Brand;
use Livewire\WithFileUploads;
class Offer extends Component
{
    use WithPagination;
    use WithFileUploads;
    private $offertypes;
    public $name,
    $image,$category,$search,$editId,$deleteId,$offer_type,$offer_id,$discount_value,$discount_type,$minimum_amount,$editoffertypes;
    public $edit_name,$edit_image,$edit_category,$edit_offer_type,$edit_offer_id,$edit_discount_value,$edit_discount_type,$edit_minimum_amount;
   public $initial=0,$bar_restaurant;


    public function updateStatus($value, $id)
    {
     
      $addoffer = BarOffer::where('id', $id)->first();
      
      if ($value == true) {
        
        $addoffer->status ='1';
      } else { 
        $addoffer->status ='0';
      }
      $addoffer->update();
    }
    public function submitForm()
    {
        //dd($this);
       //dd(Auth::id());
       $this->validate(['name'=>'required|regex:/^[a-z A-Z]+$/u|max:50',
       'image'=>'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
       'offer_type'=>'required',
       'discount_value'=>'required|integer',
       'discount_type'=>'required',
       'minimum_amount'=>'required|integer'],
       [
        'name.required'=>trans('offer.name_required'),
       'name.max'=>trans('offer.name_max'),
      'name.regex'=>trans('offer.name_regex'),
      'image.required'=>trans('offer.image_required'),
      'image.mimes'=>trans('offer.image_mimes'),
      'image.max'=>trans('offer.image_max'),
    'offer_type.required'=>trans('offer.offer_type_required'),
    'discount_value.required'=>trans('offer.discount_value_required'),
    'discount_value.integer'=>trans('offer.discount_value_integer'),
    'discount_type.required'=>trans('offer.discount_type_required'),
    'minimum_amount.required'=>trans('offer.minimum_amount_required'),
    'minimum_amount.integer'=>trans('offer.minimum_amount_integer'),
       ]);;
      
       if($this->offer_type!='bar')
       {
 $this->validate(['offer_id'=>'required'],['offer_id.required'=>trans('offer.offer_required')]);
       }
         $barrestaurant=BarRestaurant::where('user_id',Auth::id())->first();
        // dd($barrestaurant->id);
      
        $addoffer=new BarOffer;
        $addoffer->name=$this->name;
        //dd($addoffer->coupon);
        $addoffer->offer_type=$this->offer_type;
        $addoffer->offer_id=$this->offer_id;
        $addoffer->discount=$this->discount_value;
        $addoffer->minimum_amount=$this->minimum_amount;
        $addoffer->discount_type=$this->discount_type;
      
      
      // dd($addoffer->image);
        $addoffer->bar_restaurant_id =$barrestaurant->id;
     
     
        //dd($addoffer);
       
       $addoffer->save();
       $offer=BarOffer::where('id',$addoffer->id)->first();
       $extension = $this->image->getClientOriginalExtension();
       //dd($extension);
       $image=$this->image->storeAs('images/'.$barrestaurant->name.'_'.$barrestaurant->id.'/offers',$offer->name.'_'.$offer->id.'.'.$extension,'public');
       $offer->image=$image;
       $offer->save();
      // dd($addoffer);
       $this->reset('image','category','name','offer_type','offer_id','discount_value','minimum_amount','discount_type');
       $this->dispatchBrowserEvent('modalClose');
       $this->dispatchBrowserEvent('alert', [
           'type' => 'success',
           'message' => "Coupon Added"
       ]);

    }
    public function updateOfferType($value)
    {
$this->offer_type=$value;

    }
    public function editId($id)
    {
        $edit=BarOffer::where('id',$id)->first();
        //dd($edit);
        $this->editId=$id;
        $this->edit_name=$edit->name;
        $this->edit_image=$edit->image;
        $this->edit_offer_type=$edit->offer_type;
      
        $this->edit_offer_id=$edit->offer_id;
        $this->edit_discount_type=$edit->discount_type;
        $this->edit_discount_value=$edit->discount;
        $this->edit_minimum_amount=$edit->minimum_amount;
        
        
    }
    public function editForm()
{
    $this->validate(['edit_name'=>'required|max:50',
    'edit_image'=>'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
    'edit_offer_type'=>'required',
    'edit_discount_value'=>'required|integer',
    'edit_discount_type'=>'required',
    'edit_minimum_amount'=>'required|integer'
    ],
    ['edit_name.required'=>trans('offer.name_required'),
    'edit_name.regex'=>trans('offer.name_regex'),
    'edit_name.max'=>trans('offer.name_max'),
    'edit_image.required'=>trans('offer.image_required'),
    'edit_image.mimes'=>trans('offer.image_mimes'),
    'edit_image.max'=>trans('offer.image_max'),
 'edit_offer_type.required'=>trans('offer.offer_type_required'),
 'edit_discount_value.required'=>trans('offer.discount_value_required'),
 'edit_discount_value.integer'=>trans('offer.discount_value_integer'),
 'edit_discount_type.required'=>trans('offer.discount_type_required'),
 'edit_minimum_amount.required'=>trans('offer.minimum_amount_required'),
 'edit_minimum_amount.integer'=>trans('offer.minimum_amount_integer'),]);
 if($this->edit_offer_type!='bar')
 {
$this->validate(['edit_offer_id'=>'required'],['edit_offer_id.required'=>trans('offer.offer_required')]);
 }
 $barrestaurant=BarRestaurant::where('user_id',Auth::id())->first();
    $editoffer=BarOffer::where('id',$this->editId)->first();
    $editoffer->name=$this->edit_name;
    //dd($addoffer->coupon);
    $editoffer->offer_type=$this->edit_offer_type;
    $editoffer->offer_id=$this->edit_offer_id;
    $editoffer->discount=$this->edit_discount_value;
    $editoffer->minimum_amount=$this->edit_minimum_amount;
    $editoffer->discount_type=$this->edit_discount_type;
  
    $extension = $this->edit_image->getClientOriginalExtension();
    //dd($extension);
    $image=$this->edit_image->storeAs('images/'.$barrestaurant->name.'_'.$barrestaurant->id.'/offers',$editoffer->name.'_'.$editoffer->id.'.'.$extension,'public');
    $editoffer->image=$image;
    $editoffer->update();
    
    $this->dispatchBrowserEvent('modalClose');
    $this->dispatchBrowserEvent('alert', [
        'type' => 'success',
        'message' => "Coupon Updated"
    ]);

}
public function view($id)
{
    $edit=BarOffer::where('id',$id)->first(); 
    $this->name=$edit->name;
    $this->image=$edit->image;
    $this->offer_type=$edit->offer_type;
   $this->bar_restaurant=$edit->barrestaurant->name;
   // $this->offer_id=$edit->offer_id->name;
    $this->discount_type=$edit->discount_type;
    $this->discount_value=$edit->discount;
    $this->minimum_amount=$edit->minimum_amount;

}
public function deleteId($id)
{
    $edit=BarOffer::where('id',$id)->first();
    //dd($edit);
    $this->deleteIdId=$id;
}
public function deleteForm()
{
    $edit=BarOffer::where('id',$this->deleteIdId)->delete();
    $this->dispatchBrowserEvent('modalClose');
    $this->dispatchBrowserEvent('alert', [
        'type' => 'success',
        'message' => "Coupon Deleted"
    ]);
}

    public function render()
    {
        
if($this->initial==0)
{
    $this->initial=1;
   // dd('uiui');
}

if($this->offer_type =='sub_category')
{
    
$this->offertypes=SubCategory::all();
}
if($this->offer_type =='category')
{
    $this->offertypes=Category::all();  
}
if($this->offer_type =='brand')
{
    $this->offertypes=Brand::all();    
}

if($this->edit_offer_type =='sub_category')
{
    
$this->editoffertypes=SubCategory::all();
}
if($this->edit_offer_type =='category')
{
    $this->editoffertypes=Category::all();  
}
if($this->edit_offer_type =='brand')
{
    $this->editoffertypes=Brand::all();    
}
//dd($this->editoffertypes);
        $search='%'.$this->search.'%';
        $offer=BarOffer::with('category')->where('name','LIKE',$search)->Paginate(2);
        //dd($coupon);
        $category=Category::all();
        return view('livewire.country-admin.offer.offer',['offers'=>$offer,'offertypes'=>$this->offertypes,'editoffertypes'=>$this->editoffertypes,'categorys'=>$category]);
    }
}
