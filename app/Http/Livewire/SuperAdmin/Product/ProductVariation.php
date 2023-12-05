<?php

namespace App\Http\Livewire\SuperAdmin\Product;

use Livewire\Component;
use App\Models\ProductVariation as ProductVariationModal;
use App\Models\ProductVariationStock;
use App\Models\VariationType;
use App\Models\Product;

class ProductVariation extends Component
{

    public $productid,$variationid,$value,$price,$editId,$delete;
    public $edit_productid,$edit_variationid,$edit_value,$edit_price;

    protected $listeners=['deleteconfirmed'=>'delete'];
    public function edit($id){
          
        $edit= ProductVariationModal::where('id',$id)->first();
           $this->editId=$id;
          $this->edit_productid=$edit->product_id;
          $this->edit_variationid=$edit->variation_type_id;
          $this->edit_value=$edit->value;
          $this->edit_price=$edit->price;     
    }
 
    public function submit(){
          
      ProductVariationModal::where('id',$this->editId)->update([
               'product_id'=>$this->edit_productid,
               'variation_type_id'=>$this->edit_variationid,
               'value'=>$this->edit_value,
               'price'=>$this->edit_price
           ]);
              
         
           
             $this->dispatchBrowserEvent('modalClose');
             $this->dispatchBrowserEvent('alert',[
               'type'=>'success',
               'message'=>'Updated Successfully'
             ]);  
         }

         public function saveup(){
       
           $this->validate(['productid'=>'required',
          'variationid'=>'required',
          'value'=>'required|integer',
          'price'=>'required|integer',
          ],['productid.required'=>trans('productvariation.productid_required'),
          'variationid.required'=>trans('productvariation.variationid_required'),
          'value.required'=>trans('productvariation.value_required'),
          'value.integer'=>trans('productvariation.value_integer'),
          'price.required'=>trans('productvariation.price_required'),
          'price.integer'=>trans('productvariation.price_integer'),
        ]);
          $content=new ProductVariationModal();
           $content->product_id=$this->productid;
           $content->variation_type_id=$this->variationid;
           $content->value =$this->value;
          $content->price=$this->price;
         
          
           $content->save(); 
        
           $this->dispatchBrowserEvent('modalClose');
           $this->dispatchBrowserEvent('alert',[
             'type'=>'success',
             'message'=>'Added Successfully'
           ]);
           
    
        }
         public function updateStatus($value,$id)
         {  
           
          $orders=ProductVariationModal::where('id',$id)->first();
        
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
     public function reseted(){
        
        $this->reset('productid','variationid','value','price');
     }

     public function deleteId($id){
       
        $this->delete=$id;
        $this->dispatchBrowserEvent('some-confirmation');
       
   }
      public function delete(){
        if($edit=ProductVariationstock::where('product_variation_id',$this->delete)->first() ){
          $this->dispatchBrowserEvent('error');
          $this->dispatchBrowserEvent('alert',[
            'type'=>'info',
            'message'=>'selected in '.$edit->quantity ]);
        }else{
          $content=ProductVariationModal::where('id',$this->delete)->first();
          $content->delete();
          $this->dispatchBrowserEvent('modalClose');
          $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>'Deleted Successfully'
          ]);
    }
  }
    public function render()
    {

        $product=ProductVariationModal::all();
        $productvariation=Product::all();
        $variation=VariationType::all();
        return view('livewire.super-admin.product.product-variation',['product'=>$product,'productvariation'=>$productvariation,'variation'=>$variation]);
    }
}
