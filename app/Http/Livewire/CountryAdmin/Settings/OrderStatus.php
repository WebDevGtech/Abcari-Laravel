<?php

namespace App\Http\Livewire\CountryAdmin\Settings;

use Livewire\Component;
use App\Models\OrderStatus as OrderStatusModel;

class OrderStatus extends Component
{
         public $displayname,$name,$color,$value,$delete,$search;
         public $edit_displayname,$edit_name,$edit_color,$edit_value;
         protected $listeners=['deleteconfirmed'=>'delete'];

        
    public function edit($id){
        
            
            $edit= OrderstatusModel::where('id',$id)->first();
           $this->editId=$id;
          $this->edit_displayname=$edit->display_name;
          $this->edit_name=$edit->string_value;
          $this->edit_color=$edit->color;
          $this->edit_value=$edit->int_value;
                 
    }

  public function submit(){
              
    $this->validate([
      'edit_displayname'=>'required|regex:/(^([a-zA-z]+)(\d+)?$)/u|max:50',
      'edit_color'=> 'required',
      'edit_name'=> 'required|regex:/(^([a-zA-z]+)(\d+)?$)/u|max:50',
      'edit_value'=>'required|numeric'
     ],['edit_displayname.required'=>trans('orderstatus.displayname_required'),
     'edit_displayname.regex'=>trans('orderstatus.displayname_regex'),
     'edit_displayname.max'=>trans('orderstatus.displayname_max'),
     'edit_color.required'=>trans('orderstatus.color_required'),
     'edit_name.required'=>trans('orderstatus.name_required'),
     'edit_name.regex'=>trans('orderstatus.name_regex'),
     'edit_name.max'=>trans('orderstatus.name_max'),
     'edit_value.required'=>trans('orderstatus.value_required'),
     'edit_value.numeric'=>trans('orderstatus.value_numeric'),
    ]);
       $update=OrderStatusModel::where('id',$this->editId)->first();
           $update->display_name=$this->edit_displayname;
           $update->string_value=$this->edit_name;
           $update->color=$this->edit_color;
           $update->int_value=$this->edit_value;
           $update->update();

         
         

        $this->reset('edit_displayname','edit_name','edit_color','edit_value');
        $this->dispatchBrowserEvent('modalClose');
        $this->dispatchBrowserEvent('alert',[
          'type'=>'success',
          'message'=>'Updated Successfully'
        ]);


  }

    public function saveup(){
       
      $this->validate([
        'displayname'=>'required|regex:/(^([a-z A-z]+)(\d+)?$)/u|max:50',
        'color'=> 'required',
        'name'=> 'required|regex:/(^([a-z A-z]+)(\d+)?$)/u|max:50',
        'value'=>'required|numeric'
       ],['displayname.required'=>trans('orderstatus.displayname_required'),
       'displayname.regex'=>trans('orderstatus.displayname_regex'),
       'displayname.max'=>trans('orderstatus.displayname_max'),
       'color.required'=>trans('orderstatus.color_required'),
       'name.required'=>trans('orderstatus.name_required'),
       'name.regex'=>trans('orderstatus.name_regex'),
       'name.max'=>trans('orderstatus.name_max'),
       'value.required'=>trans('orderstatus.value_required'),
       'value.numeric'=>trans('orderstatus.value_numeric'),
      ]);
      $content=new OrderStatusModel;
       $content->display_name=$this->displayname;
       $content->string_value=$this->name;
       $content->color=$this->color;
       $content->int_value=$this->value;
      
       $content->save(); 
    
       $this->reset('displayname','name','color','value');

       $this->dispatchBrowserEvent('modalClose');
          $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>'Saved Successfully'
          ]);
    }
    
    public function deleteId($id){
       
      $this->delete=$id;
      $this->dispatchBrowserEvent('some-confirmation');
     
 }
    public function delete(){
        $content=OrderStatusModel::where('id',$this->delete)->first();
        $content->delete();
        $this->dispatchBrowserEvent('deleted');
        $this->dispatchBrowserEvent('alert',[
          'type'=>'success',
          'message'=>'Deleted Successfully'
        ]);
  }

    public function reseted(){
        
        $this->reset(['displayname','name','color','value']);
    }
    public function updateStatus($value,$id)
    {  
      
     $orders=OrderStatusModel::where('id',$id)->first();
   
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
    public function render()
    {
      $search=$this->search.'%';
         $order =OrderStatusModel::where('display_name','LIKE',$search)->paginate(5);
        return view('livewire.country-admin.settings.order-status',['order'=>$order]);
    }
}
