<?php

namespace App\Http\Livewire\CountryAdmin\CountryProfile;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\AdminUser;
use Illuminate\Support\Facades\Hash;
class CountryProfile extends Component
{
    use WithFileUploads;

    public $profile_image;
    public $new_password,$confirm_password,$validated,$name,$email;
    public function submitForm()
    {
      if( $this->profile_image)
      {
        $this->validate([
            'profile_image'=>'required|mimes:jpeg,png,jpg,gif,svg|max:2048'],
            [
                'profile_image.required'=>trans('countryprofile.image_required'),
                'profile_image.mimes'=>trans('countryprofile.image_mimes'),
                'profile_image.max'=>trans('countryprofile.image_max'),
            ]);
        }
        $countryprofile=AdminUser::where('id',Auth::id())->first();

//dd($countryprofile);
if($this->profile_image != null )
{
$extension = $this->profile_image->getClientOriginalExtension();
//dd($extension);
$image=$this->profile_image->storeAs('images/'.$countryprofile->name.'_'.$countryprofile->id.'/country-profile',$countryprofile->name.'_'.$countryprofile->id.'.'.$extension,'public');
$countryprofile->profile_photo_path=$image;
//dd($countryprofile);
$countryprofile->update();
$this->dispatchBrowserEvent('alert',[
    'type'=>'success',
    'message'=>'Image Updated'
  ]);
}
if($this->new_password && $this->confirm_password )
{
if($this->new_password == $this->confirm_password){
    $countryprofile->password=Hash::make($this->confirm_password);
    $countryprofile->save();
    $this->dispatchBrowserEvent('alert',[
        'type'=>'success',
        'message'=>'Password Updated'
      ]);
}
else{
    //$this->validated="Your password and confirmation password do not match.";
    $this->dispatchBrowserEvent('alert',[
        'type'=>'error',
        'message'=>'Your password and confirmation password do not match.'
      ]);
}
}



    }
    public function onload()
{
    $admin=AdminUser::where('id',Auth::id())->first();
    // dd($admin);
     $this->name=$admin->name;
     $this->email=$admin->email;
     //$this->password=$admin->password;
}

public function edit()
{
    $this->validate([ 'new_password'=>'required',
    'confirm_password'=>'required|same:new_password',
    'name'=>'required',
    'email'=>'required',
]);
    $admin=AdminUser::where('id',Auth::id())->first(); 
$admin->password=Hash::make($this->confirm_password);
$admin->name=$this->name;
$admin->email=$this->email;
$admin->save();
   


}  

    public function render()
    {
        
        $profile=AdminUser::where('id',Auth::id())->first();
        return view('livewire.country-admin.country-profile.country-profile',['profiles'=>$profile]);
    }
}
