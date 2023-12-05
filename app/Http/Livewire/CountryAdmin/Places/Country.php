<?php

namespace App\Http\Livewire\CountryAdmin\Places;

use Livewire\Component;
use App\Models\Countries;

class Country extends Component
{

    public $name,$code,$phonecode,$editId;

     protected $rules=[
      'name' =>'required|regex:/^[a-zA-Z]+$/u',
        'code'=>'required',
        'phonecode'=>'required|max:10'
     ];
    public function updateStatus($value,$id)
    {  
      
     $orders=Countries::where('id',$id)->first();
   
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
        
        
    $edit= Countries::where('id',$id)->first();
       $this->editId=$id;
      $this->name=$edit->name;
       
      $this->code=$edit->code;
      $this->phonecode=$edit->phonecode;

     
}
public function reseted(){
    $this->reset(['name','code','phonecode']);
}


public function submit(){
  
  $this->validate();
      
    Countries::where('id',$this->editId)->update([
          'name'=>$this->name,
          'code'=>$this->code,
          'phonecode'=>$this->phonecode
           
        
       ]);
     
         $this->reset(['name','code','phonecode']);
      
         $this->dispatchBrowserEvent('updated');
         $this->dispatchBrowserEvent('alert',[
           'type'=>'success',
           'message'=>'Updated Successfully'
         ]);
     
      
     
      
     }
     public function saveup(){
       
        $this->validate();
      $content=new Countries();
       $content->name=$this->name;
       $content->code=$this->code;
       $content->phonecode=$this->phonecode;
     
      
       $content->save(); 
       $this->reset(['name','code','phonecode']);
       $this->dispatchBrowserEvent('added');
       $this->dispatchBrowserEvent('alert',[
         'type'=>'success',
         'message'=>'Added Successfully'
       ]);

    }
    
     public function delete($id){
        $content=Countries::where('id',$id)->first();
        $content->delete();
        $this->dispatchBrowserEvent('deleted');
        $this->dispatchBrowserEvent('alert',[
          'type'=>'success',
          'message'=>'Deleted Successfully'
        ]);
    }
    public function render()
    {

        $country=Countries::all();
        return view('livewire.country-admin.places.country',['country'=>$country]);
    }
}
