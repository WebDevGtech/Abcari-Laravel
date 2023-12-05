<?php

namespace App\Http\Livewire\SuperAdmin\BarSettings;

use Livewire\Component;
use App\Models\BarService as BarServiceModel;
use App\Models\BarRestaurant;
use App\Models\TaxType;
use App\Models\AdminUser;
use App\Models\BarServiceTaxType;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use  Livewire\WithPagination;
class BarService extends Component
{

  use  WithPagination;
  use WithFileUploads;
    public  $name,$image,$arabic_name,$search,$tax_id;
    
    
    public  $edit_image,$edit_name,$edit_arabic_name,$category,$edit_tax_id;

    public $editId,$delete;

    protected $listeners=['deleteconfirmed'=>'delete'];

   
   
    
    
      

    public function edit($id){
        
        //dd($this->edit_tax_id);
        $edit= BarServiceModel::with('servicetax')->where('id',$id)->first();
       // dd($edit);
           $this->editId=$id;
          $this->edit_name=$edit->name;
          $this->edit_arabic_name=$edit->arabic_name;
           
          $this->edit_image=$edit->image;
        

         // $this->edit_tax_id=$edit->servicetax->id;

         

         
    }

    
    public function submit(){
          
      $this->validate([
        'edit_name' =>'required|regex:/^[a-z A-Z]+$/u|max:50',
        'edit_image'=>'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'edit_arabic_name' =>'max:50',
       ],['edit_name.required'=>trans('barcategory.name_required'),
       'edit_name.regex'=>trans('barcategory.name_regex'),
       'edit_name.max'=>trans('barcategory.name_max'),
       'edit_arabic_name.required'=>trans('barcategory.arabic_name_required'),
       'edit_arabic_name.max'=>trans('barcategory.arabic_name_max'),
       'edit_image.required'=>trans('barcategory.image_required'),
       'edit_image.mimes'=>trans('barcategory.image_mimes'),
       'edit_image.max'=>trans('barcategory.image_max'),]);

       $adminuser=AdminUser::where('id',Auth::id())->first();
        $editservice=BarServiceModel::where('id',$this->editId)->first();
        
        $editservice->name=$this->edit_name;
               
        $editservice->arabic_name=$this->edit_arabic_name;
              
        $extension = $this->edit_image->getClientOriginalExtension();
         //dd($extension);
         $image=$this->edit_image->storeAs('images/'.$adminuser->name.'_'.$adminuser->id.'/bar-service',$editservice->name.'_'.$editservice->id.'.'.$extension,'public');
         $editservice->image=$image;
         $editservice->save();

         //checking..
//          $tax=BarServiceTaxType::where('bar_service_id',$editservice->id)->first();
// $tax->tax_id=$this->edit_tax_id;
// $tax->save();
         
              
            // $this->dispatchBrowserEvent('hide');
            // $this->reset(['name','image']);
           
             $this->dispatchBrowserEvent('modalClose');
             $this->dispatchBrowserEvent('alert',[
               'type'=>'success',
               'message'=>'Updated Successfully'
             ]);
         
          
         
          
         }

         public function reseted()
     {
      $this->reset(['name','image','arabic_name']);
      
     }


    public function save(){
        
      
      $this->validate([
        'name' =>'required|regex:/^[a-z A-Z]+$/u|max:50',
        'image'=>'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'arabic_name' =>'required|max:50',
       ],['name.required'=>trans('barservice.name_required'),
       'name.regex'=>trans('barservice.name_regex'),
       'name.max'=>trans('barservice.name_max'),
       'arabic_name.required'=>trans('barservice.arabic_name_required'),
       'arabic_name.max'=>trans('barservice.arabic_name_max'),
       'image.required'=>trans('barservice.image_required'),
       'image.mimes'=>trans('barservice.image_mimes'),
       'image.max'=>trans('barservice.image_max'),]);
 $adminuser=AdminUser::where('id',Auth::id())->first();
        $content=new BarServiceModel;
         $content->name=$this->name;
         $content->name=$this->arabic_name;
        
         $content->save(); 
$saveservice=BarServiceModel::where('id',$content->id)->first();
$extension = $this->image->getClientOriginalExtension();
         //dd($extension);
         $image=$this->image->storeAs('images/'.$adminuser->name.'_'.$adminuser->id.'/bar-service',$saveservice->name.'_'.$saveservice->id.'.'.$extension,'public');
         $saveservice->image=$image;
         $saveservice->save();
         //checking..
// $tax=new BarServiceTaxType;
// $tax->bar_service_id=$content->id;
// $tax->tax_id=$this->tax_id;
// $tax->save();
         

         $this->reset(['name','image']);

         $this->dispatchBrowserEvent('modalClose');
         $this->dispatchBrowserEvent('alert',[
           'type'=>'success',
           'message'=>'Saved Successfully'
         ]);
     
      }

    public function updateStatus($value,$id)
    {  
      
     $orders=BarServiceModel::where('id',$id)->first();
   
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

   public function deleteId($id){
       
    $this->delete=$id;
    $this->dispatchBrowserEvent('some-confirmation');
   
}
   public function delete(){
 
        
    if($edit= BarRestaurant::where('bar_service_id',$this->delete)->first()){
     
        $this->dispatchBrowserEvent('alert',[
          'type'=>'info',
          'message'=>'selected in '.$edit->name 
        ]);
    }else 
    {  

    $content=BarServiceModel::where('id',$this->delete)->first();
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
      $taxtype=TaxType::all();
      $search='%'.$this->search.'%';
        $service=BarServiceModel::where('name','LIKE',$search)->paginate(10);
        return view('livewire.super-admin.bar-settings.bar-service',['service'=>$service,'taxtypes'=>$taxtype]);
    }
}
