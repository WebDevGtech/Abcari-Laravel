<?php

namespace App\Http\Livewire\CountryAdmin\Product;

use Livewire\Component;
use App\Models\VariationType as  VariationTypeModal;
use App\Models\ProductVariation;
use Livewire\WithPagination;
class VariationType extends Component
{
  use  WithPagination;
  public $name,$value,$editId,$delete,$search;
  public $edit_name,$edit_value;
  protected $listeners=['deleteconfirmed'=>'delete'];


    public function saveup(){

        $this->validate([
          'name'=>'required|regex:/(^([a-z A-z]+)(\d+)?$)/u|max:50',
          'value'=>'required'
        ],
        ['name.required'=>trans('variationtype.name_required'),
      'name.regex'=>trans('variationtype.name_regex'),
      'name.max'=>trans('variationtype.name_max'),
      'value.required'=>trans('variationtype.value_required'),
      ]);
      $content=new VariationTypeModal();
       $content->name=$this->name;

       $content->value=$this->value;



       $content->save();
       $this->reset('name','value');
       $this->dispatchBrowserEvent('modalClose');
       $this->dispatchBrowserEvent('alert',[
         'type'=>'success',
         'message'=>'Added Successfully'
       ]);
    }

    public function updateStatus($value,$id)
    {

     $orders=VariationTypeModal::where('id',$id)->first();

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


    $edit= VariationTypeModal::where('id',$id)->first();
       $this->editId=$id;
      $this->edit_name=$edit->name;
       $this->edit_value=$edit->value;

}

public function submit(){
  //dd($this->edit_name);
  //  $this->validate();
  $this->validate([
    'edit_name'=>'required|regex:/(^([a-z A-z]+)(\d+)?$)/u|max:50',
    'edit_value'=>'required'
  ],
  ['edit_name.required'=>trans('variationtype.name_required'),
'edit_name.regex'=>trans('variationtype.name_regex'),
'edit_name.max'=>trans('variationtype.name_max'),
'edit_value.required'=>trans('variationtype.value_required'),
]);
   $editvariation=VariationTypeModal::where('id',$this->editId)->first();
   $editvariation->name=$this->edit_name;
   $editvariation->value=$this->edit_value;
   $editvariation->save();

       $this->reset('edit_name','edit_value');

         $this->dispatchBrowserEvent('modalClose');
         $this->dispatchBrowserEvent('alert',[
           'type'=>'success',
           'message'=>'Updated Successfully'
         ]);



     }

     public function reseted()
     {
        $this->reset(['name','value']);
     }

     public function deleteId($id){

      $this->delete=$id;
      $this->dispatchBrowserEvent('some-confirmation');

 }
    public function delete(){

      if($edit=ProductVariation::where('variation_type_id',$this->delete)->first() ){
        $this->dispatchBrowserEvent('error');
        $this->dispatchBrowserEvent('alert',[
          'type'=>'info',
          'message'=>'selected in '.$edit->name ]);
      }else{
        $list= VariationTypeModal::where('id',$this->delete)->first();
        $list->delete();
        $this->dispatchBrowserEvent('delete');
        $this->dispatchBrowserEvent('alert',[
          'type'=>'success',
          'message'=>'Deleted Successfully']);
    }
  }
    public function render()
    {
      $search=$this->search.'%';
         $variation=VariationTypeModal::where('name','LIKE',$search)->paginate(10);
        return view('livewire.country-admin.product.variation-type',['variation'=>$variation]);
    }
}
