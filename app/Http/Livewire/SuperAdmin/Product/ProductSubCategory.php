<?php

namespace App\Http\Livewire\SuperAdmin\Product;

use Livewire\Component;
use App\Models\ProductSubCategory as ProductSubCategoryModel;
use App\Models\ProductCategory;
use App\Models\Product;
use App\Models\AdminUser;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;
use  Livewire\WithPagination;
class ProductSubCategory extends Component
{
  use WithFileUploads;
  use  WithPagination;
    public $name,$image,$categoryid,$arabic_name,$editId,$delete,$search;
    public $edit_name,$edit_image,$edit_categoryid,$edit_arabic_name;

    protected $listeners=['deleteconfirmed'=>'delete'];



   
    public function updateStatus($value,$id)
    {  
      
     $orders=ProductSubCategoryModel::where('id',$id)->first();
   
       if($value==true)
       {
        
         $orders->status ='1';
         $this->dispatchBrowserEvent('onstatus');
         $this->dispatchBrowserEvent('alert',[
           'type'=>'success',
           'message'=>'Updated Successfully'
         ]);
       }
       else{
         $orders->status ='0';
         $this->dispatchBrowserEvent('offstatus');
         $this->dispatchBrowserEvent('alert',[
           'type'=>'success',
           'message'=>'Updated Successfully'
         ]);
       }
       $orders->save();
   }


   public function edit($id){
        
       
    $edit= ProductSubCategoryModel::where('id',$id)->first(); 

       $this->editId=$id;
      $this->edit_name=$edit->name;
      $this->edit_arabic_name=$edit->arabic_name;
      $this->edit_image=$edit->image;
  $this->edit_categoryid=$edit->category_id;
      
             
}
public function submit(){

  $this->validate(['edit_name'=>'required|regex:/^[a-z A-Z]+$/u|max:50',
  'edit_image'=>'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
  'edit_arabic_name'=>'max:50',
  'edit_categoryid'=>'required',
],['edit_name.required'=>trans('productsubcategory.name_required'),
'edit_name.regex'=>trans('productsubcategory.name_regex'),
'edit_name.max'=>trans('productsubcategory.name_max'),
'edit_arabic_name.required'=>trans('productsubcategory.arabicname_required'),
'edit_arabic_name.max'=>trans('productsubcategory.arabicname_max'),
'edit_image.required'=>trans('productsubcategory.image_required'),
'edit_image.mimes'=>trans('productsubcategory.image_mimes'),
'edit_image.max'=>trans('productsubcategory.image_max'),
'edit_categoryid.required'=>trans('productsubcategory.categoryid_required'),
]);
    $adminuser=AdminUser::where('id',Auth::id())->first();
   $subcategory=ProductSubCategoryModel::where('id',$this->editId)->first();
    
   
          $subcategory->name=$this->edit_name;
          $subcategory->arabic_name=$this->edit_arabic_name;
          $subcategory->category_id=$this->edit_categoryid;
           
   $extension = $this->edit_image->getClientOriginalExtension();
   //dd($extension);
   $image=$this->edit_image->storeAs('images/'.$adminuser->name.'_'.$adminuser->id.'/product-sub-category',$subcategory->name.'_'.$subcategory->id.'.'.$extension,'public');
   $subcategory->image=$image;
       $subcategory->update();
           
       
     
       $this->reset(['name','image','categoryid']);
     
         $this->dispatchBrowserEvent('modalClose');
         $this->dispatchBrowserEvent('alert',[
           'type'=>'success',
           'message'=>'Updated Successfully'
         ]);
     
     
      
     }



   public function saveup(){
       
    $this->validate(['name'=>'required|regex:/^[a-z A-Z]+$/u|max:50',
      'image'=>'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
      'arabic_name'=>'max:50',
      'categoryid'=>'required',
    ],['name.required'=>trans('productsubcategory.name_required'),
    'name.regex'=>trans('productsubcategory.name_regex'),
    'name.max'=>trans('productsubcategory.name_max'),
    'arabic_name.required'=>trans('productsubcategory.arabicname_required'),
    'arabic_name.max'=>trans('productsubcategory.arabicname_max'),
    'image.required'=>trans('productsubcategory.image_required'),
    'image.mimes'=>trans('productsubcategory.image_mimes'),
    'image.max'=>trans('productsubcategory.image_max'),
  'categoryid.required'=>trans('productsubcategory.categoryid_required'),
  ]);
    $adminuser=AdminUser::where('id',Auth::id())->first();
  $content=new ProductSubCategoryModel;
   $content->name=$this->name;
   $content->category_id=$this->categoryid;
   $content->arabic_name=$this->arabic_name;
   $content->save(); 
   $product=ProductSubCategoryModel::where('id',$content->id)->first();

   $extension = $this->image->getClientOriginalExtension();
   //dd($extension);
   $image=$this->image->storeAs('images/'.$adminuser->name.'_'.$adminuser->id.'/product-sub-category',$product->name.'_'.$product->id.'.'.$extension,'public');
   $product->image=$image;
   $product->save();

   $this->reset(['name','image','categoryid','arabic_name']);
   $this->dispatchBrowserEvent('modalClose');
   $this->dispatchBrowserEvent('alert',[
     'type'=>'success',
     'message'=>'Added Successfully'
   ]);

}

   public function reseted()
   {
       $this->reset(['name','image','categoryid','arabic_name']);
    
   }

   
 public function deleteId($id){
       
  $this->delete=$id;
  $this->dispatchBrowserEvent('some-confirmation');
 
}
   public function delete(){
    if($edit=Product::where('sub_category_id',$this->delete)->first() ){
      $this->dispatchBrowserEvent('error');
      $this->dispatchBrowserEvent('alert',[
        'type'=>'info',
        'message'=>'selected in '.$edit->name ]);

    }else{
 $list= ProductSubCategoryModel::where('id',$this->delete)->first();
     $list->delete();
     $this->dispatchBrowserEvent('modalClose');
     $this->dispatchBrowserEvent('alert',[
       'type'=>'success',
       'message'=>'Deleted Successfully'
     ]);

    }
  }
    public function render()
    {
      $search='%'.$this->search.'%';
        $subcategory=ProductSubCategoryModel::where('name','LIKE',$search)->paginate(5);
        $category=ProductCategory::all();
        return view('livewire.super-admin.product.product-sub-category',['subcategory'=>$subcategory,'category'=>$category]);
    }
}
