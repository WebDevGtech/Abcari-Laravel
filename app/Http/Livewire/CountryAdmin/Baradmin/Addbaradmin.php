<?php

namespace App\Http\Livewire\CountryAdmin\Baradmin;

use Livewire\Component;
use App\Models\AdminUser;

class Addbaradmin extends Component
{
   public   $name; 
   public $email,$password;

  

   public $group=3;
   protected $rules=[
    'name'=> 'required|regex:/(^([a-zA-z]+)(\d+)?$)/u',
    'email'=>'required',
    'password'=>'required'

   ];

   
    public function new(){
       
       
        $this->validate();
        
         AdminUser::create([
         'name'=>$this->name,
         'email'=>$this->email,
         'password'=>bcrypt($this->password),
         'user_group_id'=>$this->group
         
        ]);
              $this->reset(['name','email','password']);
         $this->dispatchBrowserEvent('addadmin');
         $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>'Added Successfully'
         ]);

    }

      
    
    public function render()
    {
        return view('livewire.country-admin.baradmin.addbaradmin');
    }
}
