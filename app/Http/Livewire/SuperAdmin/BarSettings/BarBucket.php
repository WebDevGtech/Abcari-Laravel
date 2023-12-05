<?php

namespace App\Http\Livewire\SuperAdmin\BarSettings;

use Livewire\Component;
use App\Models\BarBucket as BarBucketModel;
use App\Models\BarBucketPoint;
use App\Models\AdminUser;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;
use  Livewire\WithPagination;
class BarBucket extends Component
{
  use WithPagination;
  use WithFileUploads;
    public $name,$arabicname,$editId,$search;
    public $edit_name,$edit_arabicname;
    protected $listeners=['deleteconfirmed'=>'delete'];
 

 
     public function saveup(){
    
      
      dd('a');
         $this->validate([
          'name'=>'required|regex:/(^([a-z A-z]+)(\d+)?$)/u|max:50',
          'arabicname'=>'required|max:50',
        
         ],['name.required'=>trans('barbucket.name_required'),
         'name.regex'=>trans('barbucket.name_regex'),
         'name.max'=>trans('barbucket.name_max'),
        
         'arabicname.required'=>trans('barbucket.arabicname_required'),
         'arabicname.max'=>trans('barbucket.arabicname_max'),
      ]);
       
        $content=new BarBucketModel;
         $content->name=$this->name;
         $content->arabic_name=$this->arabicname;
        
        
         $content->save(); 
        // dd('a');
        
         $this->reset(['name','arabicname']);
 
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
    $this->dispatchBrowserEvent('modalClose');
    $this->dispatchBrowserEvent('alert',[
      'type'=>'success',
      'message'=>'Deleted Successfully'
    ]);
 
     }
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
       $this->edit_name=$edit->name;
       $this->edit_arabicname=$edit->arabic_name;
        
    
 
      
 }
 
 
 public function submit(){
       
  $this->validate([
    'edit_name'=>'required|regex:/(^([a-z A-z]+)(\d+)?$)/u|max:50',
    'edit_arabicname'=>'max:50', 
   
   ],['edit_name.required'=>trans('barbucket.name_required'),
   'edit_name.regex'=>trans('barbucket.name_regex'),
   'edit_name.max'=>trans('barbucket.name_max'),
   'edit_arabicname.required'=>trans('barbucket.arabicname_required'),
   'edi_arabicname.max'=>trans('barbucket.arabicname_max'),
  ]);
  
    $editbucket=BarBucketModel::where('id',$this->editId)->first();
     
  
    $editbucket->name=$this->edit_name;
    $editbucket->arabic_name=$this->edit_arabicname;
  
           
      $editbucket->update();
           
         // $this->dispatchBrowserEvent('hide');
        
        
          $this->dispatchBrowserEvent('modalClose');
          $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>'Updated Successfully'
          ]);
      
       
      
       
      }
   

    public function render()
    {
      $search='%'.$this->search.'%';
        $bucket=BarBucketModel::where('name','LIKE',$search)->paginate(5);
        return view('livewire.super-admin.bar-settings.bar-bucket',['bucket'=>$bucket]);
    }
}
