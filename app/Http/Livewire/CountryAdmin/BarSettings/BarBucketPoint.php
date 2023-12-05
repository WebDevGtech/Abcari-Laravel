<?php

namespace App\Http\Livewire\CountryAdmin\BarSettings;

use Livewire\Component;
use App\Models\BarBucketPoint as BarBucketPointModel;
use App\Models\BarRestaurant;
use App\Models\BarBucket;

class BarBucketPoint extends Component
{

     public $name,$barbucket,$point,$amount,$editId;

      protected $rules=[
        'name'=>'required',
        'barbucket'=>'required',
        'point'=>'required',
        'amount'=>'required'
      ];
    protected $listeners=['deleteconfirmed'=>'delete'];

    public function save(){
        
        $this->validate();

       $content=new BarBucketPointModel();
        $content->name=$this->name;
        $content->bar_bucket_id=$this->barbucket;
        $content->point=$this->point;
        $content->amount=$this->amount;
       
        $content->save(); 

        $this->reset(['name','barbucket','point','amount']);

        $this->dispatchBrowserEvent('saved');
        $this->dispatchBrowserEvent('alert',[
          'type'=>'success',
          'message'=>'Saved Successfully'
        ]);
    
     }

    public function updateStatus($value,$id)
    {  
      
     $orders=BarBucketPointModel::where('id',$id)->first();
   
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
 
        
    if($edit= BarRestaurant::where('bar_bucket_reward_point_id',$this->delete)->first()){
        $this->dispatchBrowserEvent('alert');
        $this->dispatchBrowserEvent('alert',[
          'type'=>'info',
          'message'=>'selected in '.$edit->name 
        ]);
    }else 
    {  

    $content=BarBucketPointModel::where('id',$this->delete)->first();
   $content->delete();
   $this->dispatchBrowserEvent('alert');
   $this->dispatchBrowserEvent('alert',[
     'type'=>'success',
     'message'=>'Deleted Successfully'
   ]);

    }
  }
  public function reseted()
  {
    $this->reset(['name','barbucket','point','amount']);

  }

  
  public function edit($id){
        
        
    $edit= BarBucketPointModel::where('id',$id)->first();
       $this->editId=$id;
      $this->name=$edit->name;
       $this->barbucket=$edit->bar_bucket_id;
       $this->point=$edit->point;
      $this->amount=$edit->amount;

     
}


public function submit(){
      
     $this->validate();
    BarBucketPointModel::where('id',$this->editId)->update([
          'name'=>$this->name,
           'bar_bucket_id'=>$this->barbucket,
           'point'=>$this->point,
          'amount'=>$this->amount,
          
       ]);
          
       
         $this->dispatchBrowserEvent('updated');
         $this->dispatchBrowserEvent('alert',[
           'type'=>'success',
           'message'=>'Updated Successfully'
         ]);
     
      
     
      
     }


    public function render()
    {
          $bucketpoint=BarBucketPointModel::all();
          $bucket=BarBucket::all();
        return view('livewire.country-admin.bar-settings.bar-bucket-point',['bucketpoint'=>$bucketpoint,'bucket'=>$bucket]);
    }
}
