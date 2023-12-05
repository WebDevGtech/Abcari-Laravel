<?php

namespace App\Http\Livewire\BarAdmin\Product;

use Livewire\Component;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;
use App\Models\ProductVariation;
use App\Models\VariationType;
use App\Models\SubCategory;
use App\Models\TaxType;
use App\Models\Category;
use App\Models\Brand;
use App\Models\BarProductCategory;
use App\Models\BarService;
use App\Models\BarRestaurant;
use Illuminate\Support\Facades\Redirect;
class AddProduct extends Component
{
  use WithFileUploads;
  public $variation_type,$value,$price,$name,$image,$category,$tax,$arabic_name,$happy_hour,$is_happy_hour,$thumbnail_image,$service,$brand,$tax_id,$search;

    public $inputs = [];
    public $i = 0;
    public $updateMode = false;

    public function addDiv($increment)
    {
      $this->i=$increment+1;
      $this->variation_type[$increment+1]='';
      $this->value[$increment+1]='';
      $this->price[$increment+1]='';
      $this->is_happy_hour[$increment+1]='';
      array_push($this->inputs, $increment+1);
    }

    public function remove($decrement)
    {
      //dd($decrement);
     if($decrement!=1)
     {
      $this->i=$decrement-1;
     }
     else{
      $this->i=$this->i-$decrement;
     }
      unset($this->inputs[$decrement-1]);
      unset($this->variation_type[$decrement]);
      unset($this->value[$decrement]);
      unset($this->price[$decrement]);
      unset($this->is_happy_hour[$decrement]);

    }
public function submitForm()
{
 // dd($this);

  $this->validate(['name'=>'required|regex:/^[a-z A-Z]+$/u|max:50',
  'arabic_name'=>'max:50',
 // 'image'=>'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
  'category'=>'required',
 // 'thumbnail_image'=>'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
  'variation_type.0'=>'required',
  'price.0'=>'required|min:1|integer',
  'value.0'=>'required|min:1|integer',
  'variation_type.*'=>'required',
  'price.*'=>'required|min:1|integer',
  'value.*'=>'required|min:1|integer',
  'is_happy_hour.0'=>'max:10',
  'is_happy_hour.*'=>'max:10',
],
  ['name.required'=>trans('addproduct.name_required'),
  'name.regex'=>trans('addproduct.name_regex'),
  'name.max'=>trans('addproduct.name_max'),
  // 'image.required'=>trans('addproduct.image_required'),
  // 'image.mimes'=>trans('addproduct.image_mimes'),
  // 'image.max'=>trans('addproduct.image_max'),
  // 'thumbnail_image.required'=>trans('addproduct.thumbnail_image_required'),
  // 'thumbnail_image.mimes'=>trans('addproduct.thumbnail_image_mimes'),
  // 'thumbnail_image.max'=>trans('addproduct.thumbnail_image_max'),
  'arabic_name.required'=>trans('addproduct.arabic_name_required'),
  'arabic_name.max'=>trans('addproduct.arabic_name_max'),
  //'image.required'=>trans('addproduct.image_required'),
  'category.required'=>trans('addproduct.category_required'),

  'variation_type.0.required'=>trans('addproduct.variation_type_required'),
  'price.0.required'=>trans('addproduct.price_required'),
  'price.0.min'=>trans('addproduct.price_min'),
  'price.0.integer'=>trans('addproduct.price_integer'),
  'value.0.required'=>trans('addproduct.value_required'),
  'value.0.min'=>trans('addproduct.value_min'),
  'value.0.integer'=>trans('addproduct.value_integer'),
  'variation_type.*.required'=>trans('addproduct.variation_type_required'),
  'price.*.required'=>trans('addproduct.price_required'),
  'price.*.min'=>trans('addproduct.price_min'),
  'price.*.integer'=>trans('addproduct.price_integer'),
  'value.*.required'=>trans('addproduct.value_required'),
  'value.*.min'=>trans('addproduct.value_min'),
  'value.*.integer'=>trans('addproduct.value_integer'),
  'is_happy_hour.0.required'=>trans('addproduct.is_happy_hour_required'),
  'is_happy_hour.0.max'=>trans('addproduct.is_happy_hour_max'),
  'is_happy_hour.*.required'=>trans('addproduct.is_happy_hour_required'),
  'is_happy_hour.*.max'=>trans('addproduct.is_happy_hour_max'),
]);
  $barRestaurant=BarRestaurant::where('user_id',Auth::id())->first();
  //$this->validate();
  //\DB::beginTransaction();
  // $image=$this->image->store('image','public');
  $addproduct = new Product;
  $addproduct->name = $this->name;
  $addproduct->admin_id =Auth::id();
  //dd( $addproduct->admin_id);
  $addproduct->bar_restaurant_id =$barRestaurant->id;
  if($this->happy_hour== null)
  {
     $addproduct->happy_hour='0';
  }
    else
    {
  $addproduct->happy_hour='1';
    }
  //dd( $addproduct->happy_hour);


  $addproduct->category_id  = $this->category;
  $addproduct->service_id = $this->service;



  $addproduct->brand_id = $this->brand;

  $addproduct->tax_id = $this->tax_id;

  $addproduct->arabic_name = $this->arabic_name;
  //$addproduct->tax_id = $this->tax;
  $addproduct->save();
  if($this->image )
  {
    $this->validate(['image'=>'required|mimes:jpeg,png,jpg,gif,svg|max:2048'],[
      'image.required'=>trans('addbarRestaurant.image_required'),
'image.mimes'=>trans('addbarRestaurant.image_mimes'),
'image.max'=>trans('addbarRestaurant.image_max'),
 ]);
  $product=Product::where('id',$addproduct->id)->first();

  $extension = $this->image->getClientOriginalExtension();
  //dd($extension);
  $image=$this->image->storeAs('images/'.$barRestaurant->name.'_'.$barRestaurant->id.'/products',$product->name.'_'.$product->id.'.'.$extension,'public');
  $product->image=$image;
  $product->save();


  }

if( $this->thumbnail_image!=null)
{
  $this->validate(['thumbnail_image'=>'required|mimes:jpeg,png,jpg,gif,svg|max:2048'],[
    'thumbnail_image.required'=>trans('addbarRestaurant.image_required'),
'thumbnail_image.mimes'=>trans('addbarRestaurant.image_mimes'),
'thumbnail_image.max'=>trans('addbarRestaurant.image_max'),
]);
$product=Product::where('id',$addproduct->id)->first();

  $extension = $this->thumbnail_image->getClientOriginalExtension();
  //dd($extension);
  $thumnail_image=$this->thumbnail_image->storeAs('images/'.$barRestaurant->name.'_'.$barRestaurant->id.'/products',$product->name.'_'.$product->id.'.'.$extension,'public');
  $product->thumbnail_image=$thumnail_image;
  $product->save();
  }
  foreach ($this->value as $key=>$value) {
    $addvariation = new ProductVariation;
    $addvariation->product_id = $addproduct->id;
    $addvariation->value = $this->value[$key];
    $addvariation->variation_type_id=$this->variation_type[$key];
    //dd( $addvariation->variation_type_id);
    $addvariation->price = $this->price[$key];
    if($this->happy_hour == 1)
    {
      $this->validate(['is_happy_hour.0'=>'required',
      'is_happy_hour.*'=>'required'],['is_happy_hour.0.required'=>trans('Please enter the happy hour price'),
      'is_happy_hour.*.required'=>trans('Please enter the happy hour price')]);
    $addvariation->is_happyhour_price = $this->is_happy_hour[$key];
    }
    $addvariation->save();
    //dd($addvariation);
  }
  //\DB::commit();
  $this->inputs = [];
 
$bar_product=BarProductCategory::where('bar_restaurant_id',$barRestaurant->id)->first();

if($bar_product==null)
{
  $barproduct=new BarProductCategory;
  $barproduct->bar_restaurant_id=$barRestaurant->id;
  $barproduct->category_id=$this->category;
  $barproduct->status='1';
  $barproduct->save(); 
}
elseif($this->category == $bar_product->category_id)
{
  $bar_product->bar_restaurant_id=$barRestaurant->id;
  $bar_product->category_id=$this->category;
  $bar_product->status='1';
  $bar_product->save();
}
else{
  $barproduct=new BarProductCategory;
  $barproduct->bar_restaurant_id=$barRestaurant->id;
  $barproduct->category_id=$this->category;
  $barproduct->status='1';
  $barproduct->save();

}


$this->reset('name', 'image', 'category','arabic_name','tax','value','variation_type','price','is_happy_hour','service','brand','tax_id');





  $this->dispatchBrowserEvent('alert', [
      'type' => 'success',
      'message' => "Added Successfully"
  ]);
  return redirect(route('view-product'));
}
    public function render()
    {
     // $search=$this->search.'%';

      $variationtype=VariationType::all();
      $tax=TaxType::all();
  // dd($tax);

      $category=Category::all();
      $service=BarService::all();
     // dd($service);
 //     if($service == 'Liquor')
//{
         $tbrand=Brand::all();
//}


        return view('livewire.bar-admin.product.add-product',['variationtypes'=>$variationtype,'categories'=>$category,'services'=>$service,'brands'=>$tbrand,'taxs'=>$tax]);
    }





}
