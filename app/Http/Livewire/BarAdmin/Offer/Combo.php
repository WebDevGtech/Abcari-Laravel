<?php

namespace App\Http\Livewire\BarAdmin\Offer;

use App\Models\BarRestaurant;
use App\Models\BarRestaurantCombo;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Combo extends Component
{
    use WithPagination;
    use WithFileUploads;
    public $image, $product_1, $category, $product_2, $category_2;
    public $editId, $edit_image, $edit_product, $edit_category;

    public $deleteId, $search;
    private $combo, $categorymodel;

    public function updateStatus($value, $id)
    {

        $addcombo = BarRestaurantCombo::where('id', $id)->first();

        if ($value == true) {

            $addcombo->status = '1';
            $this->dispatchBrowserEvent('alert', [
                'type' => 'success',
                'message' => "Updated Successfully",
            ]);
        } else {
            $addcombo->status = '0';
            $this->dispatchBrowserEvent('alert', [
                'type' => 'success',
                'message' => "Updated Successfully",
            ]);
        }
        $addcombo->update();
    }
   
public function submitForm()
{
   // dd(Auth::id());
 //  'image'=>'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
//    'image.image'=>trans('combo.image_required'),
//     'image.mimes'=>trans('combo.image_mimes'),
//     'image.max'=>trans('combo.image_max'),
    $this->validate(['category'=>'required',
    //'image'=>'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
    'category_2'=>'required',
    'product_1'=>'required',
    'product_2'=>'required'],
    [
        // 'image.required'=>trans('combo.image_required'),
        // 'image.mimes'=>trans('combo.image_mimes'),
        // 'image.max'=>trans('combo.image_max'),
    'category.required'=>trans('combo.category_required'),
    'product_1.required'=>trans('combo.product_required'),
    'category_2.required'=>trans('combo.category_required'),
    'product_2.required'=>trans('combo.product_required'),
   ]);
    $barrestaurant=BarRestaurant::where('user_id',Auth::id())->first();
//dd($barrestaurant->id);
//$image=$this->image->store('photos','public');
   $addcombo=new  BarRestaurantCombo;
 
   //$addcombo->image=$image;

   $addcombo->category_id=$this->category;
  // dd($addcombo->sub_category_id);
   $addcombo->product_id=$this->product_1;
  
   $addcombo->category_1_id=$this->category_2;
  // dd( $addcombo->sub_category_1_id);
   $addcombo->product_1_id=$this->product_2;
  
   $addcombo->bar_restaurant_id=$barrestaurant->id;
   $addcombo->save();
   if( $this->image)
   {
   $combo=BarRestaurantCombo::where('id',$addcombo->id)->first();
   $extension = $this->image->getClientOriginalExtension();
   //dd($extension);
   $image=$this->image->storeAs('images/'.$barrestaurant->name.'_'.$barrestaurant->id.'/combos',$combo->product_id.'_'.$combo->id.'.'.$extension,'public');
   $combo->image=$image;
   $combo->save();
   }
   $this->reset('image','category','product_1','category_2','product_2');
   $this->dispatchBrowserEvent('modalClose');
   $this->dispatchBrowserEvent('alert', [
       'type' => 'success',
       'message' => "Saved Successfully"
   ]);
}
public function editId($id)
{
   
    $edit=BarRestaurantCombo::where('id',$id)->first();
    //dd($edit);
    $this->editId=$id;

   // $this->edit_image=$edit->image;
    $this->edit_product_1=$edit->product_id;
    $this->edit_product_2=$edit->product_1_id;
    $this->edit_category=$edit->category_id;
    $this->edit_category_2=$edit->category_1_id;
}
public function deleteId($id)
{
    $edit=BarRestaurantCombo::where('id',$id)->first();
    //dd($edit);
    $this->deleteId=$id;
}
public function deleteForm()
{
    $edit=BarRestaurantCombo::where('id', $this->deleteId)->delete();
    $this->dispatchBrowserEvent('modalClose');
    $this->dispatchBrowserEvent('alert', [
        'type' => 'success',
        'message' => "Combo Deleted"
    ]);
}

    public function editForm()
    {
        //  'image'=>'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
//    'image.image'=>trans('combo.image_required'),
//     'image.mimes'=>trans('combo.image_mimes'),
//     'image.max'=>trans('combo.image_max'),
$this->validate(['edit_category'=>'required',
'edit_category_2'=>'required',
'edit_product_1'=>'required',
'edit_product_2'=>'required'],
//'edit_image'=>'required|mimes:jpeg,png,jpg,gif,svg|max:2048'],
[
    // 'edit_image.required'=>trans('combo.image_required'),
    //     'edit_image.mimes'=>trans('combo.image_mimes'),
    //     'edit_image.max'=>trans('combo.image_max'),  
'edit_category.required'=>trans('combo.category_required'),
'edit_product_1.required'=>trans('combo.product_required'),
'edit_category_2.required'=>trans('combo.category_required'),
'edit_product_2.required'=>trans('combo.product_required'),
]);
//$image=$this->edit_image->store('photos','public');
$barrestaurant=BarRestaurant::where('user_id',Auth::id())->first();
    $editcombo=BarRestaurantCombo::where('id',$this->editId)->first();
    if($this->edit_image)
    {
    $extension = $this->edit_image->getClientOriginalExtension();
    //dd($extension);
    $image=$this->edit_image->storeAs('images/'.$barrestaurant->name.'_'.$barrestaurant->id.'/combos',$editcombo->product_id.'_'.$editcombo->id.'.'.$extension,'public');
    $editcombo->image=$image;
}
    $editcombo->category_id=$this->edit_category;
   // dd($addcombo->sub_category_id);
    $editcombo->product_id=$this->edit_product_1;
   
    $editcombo->category_1_id=$this->edit_category_2;
   // dd( $addcombo->sub_category_1_id);
    $editcombo->product_1_id=$this->edit_product_2;
    $editcombo->update();
    $this->dispatchBrowserEvent('modalClose');
    $this->dispatchBrowserEvent('alert', [
        'type' => 'success',
        'message' => "Updated Successfully"
    ]);
}
    public function render()
    {
        $barrestaurant=BarRestaurant::where('user_id',Auth::id())->first();
        $search='%'.$this->search.'%';
        $this->categorymodel=Category::all();
        $product=Product::all();
       
        $this->combo=BarRestaurantCombo::with('category')->where([['bar_restaurant_id',$barrestaurant->id],['id','LIKE',$search]])->paginate(15);
        return view('livewire.bar-admin.offer.combo',['combos'=>$this->combo,'categories'=>$this->categorymodel,'products'=>$product]);
    }
}
