<?php

namespace App\Http\Livewire\CountryAdmin\Product;

use App\Models\Category;
use Livewire\Component;
use App\Models\ProductSubCategory as ProductSubCategoryModel;
use App\Models\ProductCategory;
use App\Models\Product;

class ProductSubCategory extends Component
{

    public $name,$image,$categoryid,$editId,$delete;

    protected $listeners=['deleteconfirmed'=>'delete'];



    protected $rules=[
        'name'=>'required',
        'image'=>'',
        'categoryid'=>'required'
    ];
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
      $this->name=$edit->name;
    
      $this->image=$edit->image;
  $this->categoryid=$edit->category_id;
      
             
}
public function submit(){

    $this->validate();
          
    ProductSubCategoryModel::where('id',$this->editId)->update([
   
          'name'=>$this->name,
          'image'=>$this->image,
          'category_id'=>$this->categoryid
           
       
           
       ]);
     
       $this->reset(['name','image','categoryid']);
     
         $this->dispatchBrowserEvent('updated');
         $this->dispatchBrowserEvent('alert',[
           'type'=>'success',
           'message'=>'Updated Successfully'
         ]);
     
     
      
     }



   public function saveup(){
       
    $this->validate();
  $content=new ProductSubCategoryModel();
   $content->name=$this->name;
   $content->category_id=$this->categoryid;
   $content->image=$this->image;

 
  
   $content->save(); 
   $this->reset(['name','image','categoryid']);
   $this->dispatchBrowserEvent('saved');
   $this->dispatchBrowserEvent('alert',[
     'type'=>'success',
     'message'=>'Added Successfully'
   ]);

}

   public function reseted()
   {
       $this->reset(['name','image','categoryid']);
    
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
     $this->dispatchBrowserEvent('delete');
     $this->dispatchBrowserEvent('alert',[
       'type'=>'success',
       'message'=>'Deleted Successfully'
     ]);

    }
  }
   
  


    public function render()
    {
        $subcategory=ProductSubCategoryModel::all();
        $category=ProductCategory::all();
        return view('livewire.country-admin.product.product-sub-category',['subcategory'=>$subcategory,'category'=>$category]);
    }
}
