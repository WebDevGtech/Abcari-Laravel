<?php

namespace App\Http\Livewire\CountryAdmin\BarSettings;

use Livewire\Component;
use App\Models\BarCategory as BarCategoryModel;
use App\Models\BarRestaurant;

use Livewire\WithFileUploads;

class BarCategory extends Component
{

  use WithFileUploads;
         public  $name;
     
         public $image;

         public $editId ,$delete;

         
       protected $rules=[
        'name' =>'required|regex:/^[a-zA-Z]+$/u',
         'image' => 'required',
       ];
         
        
       protected $listeners=['deleteconfirmed'=>'delete'];

         
          
       
     public function edit($id){
        
        
         $edit= BarCategoryModel::where('id',$id)->first();
            $this->editId=$id;
           $this->name=$edit->name;
            
           $this->image=$edit->image;

         
             
             
     }

 
     public function submit(){
          
       $this->validate();
    BarCategoryModel::where('id',$this->editId)->update([
          'name'=>$this->name,
           
         'image'=>$this->image,
           
       ]);
     
         $this->reset(['name','image']);
         $this->dispatchBrowserEvent('updated');
         $this->dispatchBrowserEvent('alert',[
           'type'=>'success',
           'message'=>'Updated Successfully'
         ]);
     
      
     }

     public function reseted()
     {
      $this->reset(['name','image']);
      
     }

    //  public function updated($feild){
    //         $this->validateOnly($feild,[
    //           'image'=>'required',
    //         ]);
    //  }
    
       public function save(){
    
             $this->validate();
         $content=new BarCategoryModel;
          $content->name=$this->name;
          $content->image=$this->image;
           $content->save(); 

          
          // $this->reset(['name','image']);
          $this->dispatchBrowserEvent('saved');
          $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>'Saved Successfully'
          ]);
      
       }

       public function updateStatus($value,$id)
    {  
      
     $orders=BarCategoryModel::where('id',$id)->first();
   
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
        if($edit= BarRestaurant::where('bar_category_id',$this->delete)->first()){
          $this->dispatchBrowserEvent('error');
          $this->dispatchBrowserEvent('alert',[
            'type'=>'info',
            'message'=>'selected in '.$edit->name 
          ]);
      }else 
      {  
            $content=BarCategoryModel::where('id',$this->delete)->first();
            $content->delete();

            $this->dispatchBrowserEvent('deleted');
            $this->dispatchBrowserEvent('alert',[
              'type'=>'success',
              'message'=>'Deleted Successfully'
            ]);
      }
    }
    public function render()
    {
         $category=BarCategoryModel::all();
        return view('livewire.country-admin.bar-settings.bar-category',['category'=>$category]);
    }
}
