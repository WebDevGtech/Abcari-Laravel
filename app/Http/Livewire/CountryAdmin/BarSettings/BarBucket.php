<?php

namespace App\Http\Livewire\CountryAdmin\BarSettings;

use Livewire\Component;
use App\Models\BarBucket as BarBucketModel;
use App\Models\BarBucketPoint;

class BarBucket extends Component
{

   public $name,$image,$arabicname,$editId;
   protected $listeners=['deleteconfirmed'=>'delete'];

   protected $rules=[
    'name'=>'required',
    'arabicname'=>'',
     'image'=>'required'
   ];

    public function saveup(){
      
        $this->validate();

       $content=new BarBucketModel;
        $content->name=$this->name;
        $content->arabic_name=$this->arabicname;
        $content->image=$this->image;
       
        $content->save(); 

        $this->reset(['name','arabicname','image']);

        $this->dispatchBrowserEvent('saved');
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
 
        
    if($edit= BarBucketPoint::where('bar_bucket_id',$this->delete)->first()){
        $this->dispatchBrowserEvent('error');
        $this->dispatchBrowserEvent('alert',[
          'type'=>'info',
          'message'=>'selected in '.$edit->name 
        ]);
    }else 
    {  

    $content=BarBucketModel::where('id',$this->delete)->first();
   $content->delete();
   $this->dispatchBrowserEvent('error');
   $this->dispatchBrowserEvent('alert',[
     'type'=>'success',
     'message'=>'Deleted Successfully'
   ]);

    }
  }

   
   

     public function reseted()
     {
      $this->reset(['name','arabicname','image']);
     }

     public function updateBucket($value,$id)
    {  
       
      
     $orders=BarBucketModel::where('id',$id)->first();
   
       if($value==true)
       {
        
         $orders->bucket_type =('redeem');
         $this->dispatchBrowserEvent('onstatus');
         $this->dispatchBrowserEvent('alert',[
           'type'=>'success',
           'message'=>'Changed Redeem Successfully'
         ]);
       }
       else{
         $orders->bucket_type =('reward');
         $this->dispatchBrowserEvent('offstatus');
         $this->dispatchBrowserEvent('alert',[
           'type'=>'success',
           'message'=>'Changed Reward Successfully'
         ]);
       }
       $orders->save();
   }

     public function updateStatus($value,$id)
    {  
     
     $orders=BarBucketModel::where('id',$id)->first();
   
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
        
        
    $edit= BarBucketModel::where('id',$id)->first();
       $this->editId=$id;
      $this->name=$edit->name;
      $this->arabicname=$edit->arabic_name;
       
      $this->image=$edit->image;

     
}


public function submit(){
      
     $this->validate();
    BarBucketModel::where('id',$this->editId)->update([
          'name'=>$this->name,
          'arabic_name'=>$this->arabicname,
           
         'image'=>$this->image,
          
       ]);
          
        // $this->dispatchBrowserEvent('hide');
         $this->reset(['name','arabicname','image']);
       
         $this->dispatchBrowserEvent('updated');
         $this->dispatchBrowserEvent('alert',[
           'type'=>'success',
           'message'=>'Updated Successfully'
         ]);
     
      
     
      
     }
  

    
    
    public function render()
    {
         $bucket=BarBucketModel::all();
        return view('livewire.country-admin.bar-settings.bar-bucket',['bucket'=>$bucket]);
    }
}
