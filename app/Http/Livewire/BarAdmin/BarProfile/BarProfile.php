<?php

namespace App\Http\Livewire\BarAdmin\BarProfile;
use App\Models\BarRestaurant;
use App\Models\AdminUser;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Livewire\WithFileUploads;
use Livewire\Component;

class BarProfile extends Component
{
    use WithFileUploads;
    public $bar_image,$description,$banner_image_1,$banner_image_2,$banner_image_3,$profile_image,$name,$email;
    public $new_password,$confirm_password;
    
public function submitForm()
{
    if($this->description)
    {
        $this->validate([
            'description'=>'required|max:250',
        ],
            [
                'description.required'=>trans('barprofile.description_required'),
                'description.max'=>trans('barprofile.description_max'),
            ]);
            $barrestaurant=BarRestaurant::where('user_id',Auth::id())->first();
            $barrestaurant->description=$this->description;
            $barrestaurant->update();
            $this->dispatchBrowserEvent('alert', [
                'type' => 'success',
                'message' => "Bar Description Updated"
            ]);
        
    
    }
   
   
if($this->new_password && $this->confirm_password)
{
    $password=AdminUser::where('id',Auth::id())->first();
    //dd( $password);
if( $this->new_password== $this->confirm_password)
{
    $password->password=Hash::make($this->confirm_password);
    $password->save();
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

    if($this->bar_image)
    {
        
    $this->validate(['bar_image'=>'required|mimes:jpeg,png,jpg,gif,svg|max:2048'],[  'bar_image.required'=>trans('barprofile.image_required'),
    'bar_image.mimes'=>trans('barprofile.image_mimes'),
    'bar_image.max'=>trans('barprofile.image_max'),]);
        $barrestaurant=BarRestaurant::where('user_id',Auth::id())->first();
    $extension = $this->bar_image->getClientOriginalExtension();
    //dd($extension);
    $image=$this->bar_image->storeAs('images/'.$barrestaurant->name.'_'.$barrestaurant->id.'/bar-profile',$barrestaurant->name.'_'.$barrestaurant->id.'.'.$extension,'public');
    $barrestaurant->image=$image;
    $barrestaurant->save();
    $this->dispatchBrowserEvent('alert', [
        'type' => 'success',
        'message' => "bar image  Updated"
    ]);
    }
    if($this->banner_image_1)
    {
        $this->validate([  'banner_image_1'=>'required|mimes:jpeg,png,jpg,gif,svg|max:2048',],[  'banner_image_1.required'=>trans('barprofile.image_required'),
        'banner_image_1.mimes'=>trans('barprofile.image_mimes'),
        'banner_image_1.max'=>trans('barprofile.image_max'),]);
        $barrestaurant=BarRestaurant::where('user_id',Auth::id())->first();
    $extension = $this->banner_image_1->getClientOriginalExtension();
    //dd($extension);
    $bannerimage1=$this->banner_image_1->storeAs('images/'.$barrestaurant->name.'_'.$barrestaurant->id.'/bar-profile',$barrestaurant->name.'_'.$barrestaurant->id.'.'.$extension,'public');
    $barrestaurant->banner_image_1=$bannerimage1;
    $barrestaurant->save();
    $this->dispatchBrowserEvent('alert', [
        'type' => 'success',
        'message' => "Banner image 1 Updated"
    ]);
    }
    if($this->banner_image_2)
    {
        $this->validate([  'banner_image_2'=>'required|mimes:jpeg,png,jpg,gif,svg|max:2048'],[ 'banner_image_2.required'=>trans('barprofile.image_required'),
        'banner_image_2.mimes'=>trans('barprofile.image_mimes'),
        'banner_image_2.max'=>trans('barprofile.image_max')]);
        $barrestaurant=BarRestaurant::where('user_id',Auth::id())->first();
    $extension = $this->banner_image_2->getClientOriginalExtension();
    //dd($extension);
    $bannerimage2=$this->banner_image_2->storeAs('images/'.$barrestaurant->name.'_'.$barrestaurant->id.'/bar-profile',$barrestaurant->name.'_'.$barrestaurant->id.'.'.$extension,'public');
    $barrestaurant->banner_image_2=$bannerimage2;
    $barrestaurant->save();
    $this->dispatchBrowserEvent('alert', [
        'type' => 'success',
        'message' => "Banner image 2 Updated"
    ]);
    }
    if($this->banner_image_3)
    {
        $this->validate([ 'banner_image_3'=>'required|mimes:jpeg,png,jpg,gif,svg|max:2048',],[  'banner_image_3.required'=>trans('barprofile.image_required'),
        'banner_image_3.mimes'=>trans('barprofile.image_mimes'),
        'banner_image_3.max'=>trans('barprofile.image_max')]);
        $barrestaurant=BarRestaurant::where('user_id',Auth::id())->first();
    $extension = $this->banner_image_3->getClientOriginalExtension();
    //dd($extension);
    $bannerimage3=$this->banner_image_3->storeAs('images/'.$barrestaurant->name.'_'.$barrestaurant->id.'/bar-profile',$barrestaurant->name.'_'.$barrestaurant->id.'.'.$extension,'public');
    $barrestaurant->banner_image_3=$bannerimage3;
    $barrestaurant->save();
    $this->dispatchBrowserEvent('alert', [
        'type' => 'success',
        'message' => "Banner image 3 Updated"
    ]);
    }

   
    if($this->profile_image)
    {
        $this->validate(['profile_image'=>'required|mimes:jpeg,png,jpg,gif,svg|max:2048'],[ 'profile_image.required'=>trans('barprofile.image_required'),
        'profile_image.mimes'=>trans('barprofile.image_mimes'),
        'profile_image.max'=>trans('barprofile.image_max'),]);
    $imageprofile=AdminUser::where('id',Auth::id())->first();

    //dd($countryprofile);
   
    $extension = $this->profile_image->getClientOriginalExtension();
    //dd($extension);
    $image=$this->profile_image->storeAs('images/'.$imageprofile->name.'_'.$imageprofile->id.'/bar-profile',$imageprofile->name.'_'.$imageprofile->id.'.'.$extension,'public');
    $imageprofile->profile_photo_path=$image;
    
    $imageprofile->update();
    $this->dispatchBrowserEvent('alert', [
        'type' => 'success',
        'message' => "Bar Profile image Updated"
    ]);

    }

   

}
public function onload()
{
    $admin=AdminUser::where('id',Auth::id())->first();
    // dd($admin);
     $this->name=$admin->name;
     $this->email=$admin->email;
     $barrestaurant=BarRestaurant::where('user_id',Auth::id())->first();
     $this->description=$barrestaurant->description;

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
       
      
            $bar=BarRestaurant::where('user_id',Auth::id())->first();
       
      
       
       
        return view('livewire.bar-admin.bar-profile.bar-profile',['bars'=>$bar,'profiles'=>$profile]);
    }
}
