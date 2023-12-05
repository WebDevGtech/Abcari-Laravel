<?php

namespace App\Http\Livewire\CountryAdmin\Baradmin;

use Livewire\Component;
use App\Models\AdminUser;

class Toviewbaradmins extends Component
{
    public   $user;
   public $name;
   public $email,$password ;
   public $editId;

   public $usergroupid=3;


   protected $rules=[
    'name'=> 'required|regex:/(^([a-zA-z]+)(\d+)?$)/u',
    'email'=>'required',
    'password'=>'required'

   ];


    public function deleteId($id){

        $terminate=AdminUser::where('id',$id)->first();
        $terminate->delete();
        $this->dispatchBrowserEvent('deleteadmin');
        $this->dispatchBrowserEvent('alert',[
          'type'=>'success',
          'message'=>'Deleted Successfully'
        ]);
    }

    public function edit( $id){
          
            
          $edit=AdminUser::where('id',$id)->first();
          $this->editId=$id;
          $this->name=$edit->name;
          $this->email=$edit->email;
        $this->password=$edit->password ;    
        
           
    }

    public function reseted()
     {
      $this->reset(['name','email','password']);
     }
 

      public Function submit(){
      
          $this->validate();
        $view=AdminUser::where('id',$this->editId)->update([
          
          'name'=>$this->name,
          'email'=>$this->email,
           'password' =>$this->password
        ]);
          $this->reset(['name','email','password']);
          $this->dispatchBrowserEvent('update');
          $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>'Updated Successfully'
          ]);
      }
    public function updateStatus($value,$id)
    {  
      //  dd($value,$id);
     $action=AdminUser::where('id',$id)->first();
   
       if($value==true)
       {
         $action->status='1';
         $this->dispatchBrowserEvent('onstatus');
         $this->dispatchBrowserEvent('alert',[
           'type'=>'success',
           'message'=>'Updated Successfully'
         ]);
       }
       else{
         $action->status='0';
       }
       $action->save();
       $this->dispatchBrowserEvent('offstatus');
         $this->dispatchBrowserEvent('alert',[
           'type'=>'success',
           'message'=>'Updated Successfully'
         ]);

   }
   
   

    public function render()
    { 
           
             $this->user=AdminUser::where('user_group_id',$this->usergroupid)->paginate(15);
             
               return view('livewire.country-admin.baradmin.toviewbaradmins',['users'=>$this->user]);
    }
}
