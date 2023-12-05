<?php

namespace App\Http\Livewire\SuperAdmin;

use Livewire\Component;
use App\Models\AdminUser;
use App\Models\Countries;
use Illuminate\Validation\Rules\Unique;

class AddAdmin extends Component
{


public $name,$password,$email,$countryid;
public $usergroupid=2;


    

   public function submit(){
     // dd('f');
             $this->validate(['name'=>'required|regex:/(^([a-z A-z]+)(\d+)?$)/u|max:50',
             'password'=>'required|min:8',
             'email'=>'required|email|unique:admin_users',
             'countryid'=>'required'],
             ['name.required'=>trans('add-admin.name_required'),
             'name.regex'=>trans('add-admin.name_regex'),
             'name.max'=>trans('add-admin.name_max'),
             'password.required'=>trans('add-admin.password_required'),
             'password.regex'=>trans('add-admin.password_regex_number'),
             'password.regex'=>trans('add-admin.password_regex_special'),
             'password.max'=>trans('add-admin.password_max'),
             'email.required'=>trans('add-admin.email_required'),
             'email.email'=>trans('add-admin.email_email'),
             'email.unique'=>trans('add-admin.unique'),
             'countryid.required'=>trans('add-admin.country_required')]);

             if(  $edit=AdminUser::where('country_id',$this->countryid)->first()){
               
                $this->dispatchBrowserEvent('alert',[
                  'type'=>'info',
                  'message'=>'used by '.$edit->name .'  Country Admin'
                ]);
                 
             }else{

               $adduser= AdminUser::create([
               'name'=>$this->name,
               'password'=>bcrypt($this->password),
               'email'=>$this->email,
               'country_id'=>$this->countryid,
               'user_group_id'=>$this->usergroupid
       ]);  
       //dd($adduser);
       
       $this->reset('name','email','password','countryid');
      
               $this->dispatchBrowserEvent('alert',[
                'type'=>'success',
                'message'=>'Added Successfully'
              ]);
    
       
             }

     
            

      
   }
  
     

    public function render()
    {
        $countryview=Countries::all();
        return view('livewire.super-admin.add-admin',['countryview'=>$countryview]);
    }
}
