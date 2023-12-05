<?php

namespace App\Http\Livewire\CountryAdmin\BarSettings;

use Livewire\Component;
use App\Models\BarTieUp as BarTieUpModel;
use App\Models\BarRestaurant;

class BarTieUp extends Component
{

     public $name,$image,$details,$editId;

     protected $listeners=['deleteconfirmed'=>'delete'];

     protected $rules=[
        'name' =>'required|regex:/^[a-zA-Z]+$/u',
         'image' => 'required|url',
         'details'=>'required'
       ];
         

     public function save(){
               
          $this->validate();
        $content=new BarTieUpModel;
         $content->name=$this->name;
         $content->details=$this->details;
         $content->image=$this->image;
        
         $content->save(); 

         $this->reset(['name','details','image']);
         $this->dispatchBrowserEvent('saved');
         $this->dispatchBrowserEvent('alert',[
           'type'=>'success',
           'message'=>'Saved Successfully'
         ]);
      }

      public function reseted()
     {
      $this->reset(['name','details','image']);
      
     }

    public function edit($id){
        
        
        $edit= BarTieUpModel::where('id',$id)->first();
           $this->editId=$id;
          $this->name=$edit->name;
             $this->details=$edit->details;
               $this->image=$edit->image;

        
     
    }

    
    public function submit(){
          
         $this->validate();
        BarTieUpModel::where('id',$this->editId)->update([
              'name'=>$this->name,
               'details'=>$this->details,
             'image'=>$this->image,
               
           ]);
         
             $this->reset(['name','details','image']);
             $this->dispatchBrowserEvent('updated');
             $this->dispatchBrowserEvent('alert',[
               'type'=>'success',
               'message'=>'Updated Successfully'
             ]);
         
          
         }

    public function updateStatus($value,$id)
    {  
      
     $orders=BarTieUpModel::where('id',$id)->first();
   
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
 
        
    if($edit=BarRestaurant::where('bar_tie_up_id',$this->delete)->first()){
        $this->dispatchBrowserEvent('error');
        $this->dispatchBrowserEvent('alert',[
          'type'=>'info',
          'message'=>'selected in  '.$edit->name
        ]);
    }else 
    {  

    $content=BarTieUpModel::where('id',$this->delete)->first();
   $content->delete();
   $this->dispatchBrowserEvent('error');
   $this->dispatchBrowserEvent('alert',[
     'type'=>'success',
     'message'=>'Deleted Successfully'
   ]);

    }
  }



    public function render()
    {
          $tieup=BarTieUpModel::all();
        return view('livewire.country-admin.bar-settings.bar-tie-up',['tieup'=>$tieup]);
    }
}
