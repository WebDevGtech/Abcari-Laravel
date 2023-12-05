<?php

namespace App\Http\Livewire\CountryAdmin\BarRestaurant;

use Livewire\Component;
use  App\Models\BarRestaurant;
use App\Models\AdminUser;
use App\Models\BarCategory;
use App\Models\BarService;
use App\Models\BarTieUp;
use App\Models\BarRewardPoint;
use App\Models\BarBucket;
use App\Models\BarRestaurantCategory;
use App\Models\BarRestaurantService;
use App\Models\PostCode;
use App\Models\City;
use App\Models\Zone;
use Livewire\WithFileUploads;
use Auth;


class AddBarRestaurant extends Component
{
   use WithFileUploads;
    public  $usergroupid=3;
    public  $restaurantname,$barcategory,$barservice,$name,$openinghours,$closinghours,$peakhours,$bucket,$postcoded,$address,$cities,
    $bartieup,$barreward,$bannerimage,$image,$latitude,$longitude,$description ,$email,$password,$barredeem,$city_id,$zone,$city,$zone_id,$postcode,$no_active,$yes=0,$value,$postcodeid;
    
    public function activeyes($value)
    {
       
if($value=='true')
{
        $this->yes="1";
    }
    else{
        $this->yes="";
    }
    if($value=='false')
{
        $this->no="0";
    }
    else{
        $this->no="";
    }
    }
   
    public function submit()
    {
     //  dd($this);
      $this->validate(['name'=>'required|regex:/(^([a-z A-z]+)(\d+)?$)/u|max:50',
        'email'=>'required|email',
        'password'=>'required|min:8',
        'restaurantname'=>'required|regex:/(^([a-z A-z]+)(\d+)?$)/u|max:60',
        'bucket'=>'required',
        'barcategory'=>'required',
        'barservice'=>'required',
        'bartieup'=>'required',
         'openinghours'=>'required',
         'closinghours'=>'required',
        
        // 'peakhours'=>'required',
        // 'latitude'=>'required|between:-90,90',
        // 'longitude'=>'required|between:-100,100',
        // 'image'=>'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
        // 'bannerimage'=>'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
       // 'zone_id'=>'required',
        // 'address'=>'required|regex:/(^([a-z A-z]+)(\d+)?$)/u|max:250',
        //  'description'=>'required|max:250',
        ],['name.required'=>trans('addbarRestaurant.name_required'),
        'name.regex'=>trans('addbarRestaurant.name_regex'),
        'name.max'=>trans('addbarRestaurant.name_max'),
        'email.required'=>trans('addbarRestaurant.email_required'),
        'email.email'=>trans('addbarRestaurant.email_email'),
        'password.required'=>trans('addbarRestaurant.password_required'),
        'password.min'=>trans('Password Minimum 8 letters'),
        'restaurantname.required'=>trans('addbarRestaurant.restaurantname_required'),
        'restaurantname.regex'=>trans('addbarRestaurant.restaurantname_regex'),
        'restaurantname.max'=>trans('addbarRestaurant.restaurantname_max'),
        'bucket.required'=>trans('addbarRestaurant.bucket_required'),
        'barcategory.required'=>trans('addbarRestaurant.barcategory_required'),
        'barservice.required'=>trans('addbarRestaurant.barservice_required'),
        'bartieup.required'=>trans('addbarRestaurant.bartieup_required'),
        'openinghours.required'=>trans('addbarRestaurant.openinghours_required'),
        'closinghours.required'=>trans('addbarRestaurant.closinghours_required'),
       // 'zone_id.required'=>trans('The Zone field is required'),
       // 'peakhours.required'=>trans('addbarRestaurant.peakhours_required'),
        // 'latitude.required'=>trans('addbarRestaurant.latitude_required'),
        // 'latitude.between'=>trans('addbarRestaurant.latitude_between'),
        // 'longitude.required'=>trans('addbarRestaurant.longitude_required'),
        // 'longitude.between'=>trans('addbarRestaurant.longitude_between'),
        // 'image.required'=>trans('addbarRestaurant.image_required'),
        // 'image.mimes'=>trans('addbarRestaurant.image_mimes'),
        // 'image.max'=>trans('addbarRestaurant.image_max'),
        // 'bannerimage.required'=>trans('addbarRestaurant.bannerimage_required'),
        // 'bannerimage.mimes'=>trans('addbarRestaurant.bannerimage_mimes'),
        // 'bannerimage.max'=>trans('addbarRestaurant.bannerimage_max'),
       // 'postcoded.required'=>trans('addbarRestaurant.postcode_required'),
        // 'address.required'=>trans('addbarRestaurant.address_required'),
        // 'address.regex'=>trans('addbarRestaurant.address_regex'),
        // 'address.max'=>trans('addbarRestaurant.address_max'),
    //     'description.required'=>trans('addbarRestaurant.description_required'),
    //    // 'description.regex'=>trans('addbarRestaurant.description_regex'),
    //     'description.max'=>trans('addbarRestaurant.description_max'),
        ]);

            $adminuser=AdminUser::where('id',Auth::id())->first();
            $editId=new AdminUser;
            $editId->name =$this->name;
            $editId->email=$this->email;
            $editId->password =bcrypt($this->password);
            $editId->user_group_id=$this->usergroupid;
            $editId->country_id=Auth::user()->country_id;
            $editId->save();

            $addbar= new BarRestaurant;
            $addbar->name=$this->restaurantname;
            $addbar->user_id=$editId->id;
            $addbar->bar_bucket_id=$this->bucket;
            $addbar->bar_tie_up_id=$this->bartieup;
            $addbar->post_code_id=$this->postcoded;
            $addbar->image=$this->image;
            $addbar->city_id=$this->city_id;
            $addbar->zone_id=$this->zone_id;
            $addbar->banner_image_1=$this->bannerimage;
            $addbar->description=$this->description;
            $addbar->latitude=$this->latitude;
            $addbar->longitude=$this->longitude;
            $addbar->opening_hour=$this->openinghours;
            $addbar->closing_hour=$this->closinghours;
           // $addbar->peak_hour=$this->peakhours;
            $addbar->address=$this->address;

            $addbar->save();
            $addimage=BarRestaurant::where('id',$addbar->id)->first();
            if($this->image != NULL){
                $this->validate(['image'=>'required|mimes:jpeg,png,jpg,gif,svg|max:2048'],[
                    'image.required'=>trans('addbarRestaurant.image_required'),
              'image.mimes'=>trans('addbarRestaurant.image_mimes'),
              'image.max'=>trans('addbarRestaurant.image_max'),
               ]);
                $extension = $this->image->getClientOriginalExtension();
                $image=$this->image->storeAs('images/'.$adminuser->name.'_'.$adminuser->id.'/bar-restaurant/image',$addimage->name.'_'.$addimage->id.'.'.$extension,'public');
                $addimage->image=$image;
            }
            if($this->bannerimage != NULL){
                $this->validate(['bannerimage'=>'required|mimes:jpeg,png,jpg,gif,svg|max:2048'],[
                    'bannerimage.required'=>trans('addbarRestaurant.image_required'),
              'bannerimage.mimes'=>trans('addbarRestaurant.image_mimes'),
              'bannerimage.max'=>trans('addbarRestaurant.image_max'),
               ]);
                $extension = $this->bannerimage->getClientOriginalExtension();
                $image=$this->image->storeAs('images/'.$adminuser->name.'_'.$adminuser->id.'/bar-restaurant/image',$addimage->name.'_'.$addimage->id.'.'.$extension,'public');
                $banner_image=$this->bannerimage->storeAs('images/'.$adminuser->name.'_'.$adminuser->id.'/bar-restaurant/banner-image',$addimage->name.'_'.$addimage->id.'.'.$extension,'public');
                $addimage->banner_image_1=$banner_image;
            }
            $addimage->save();
            foreach($this->barcategory as $key =>$value)
            {
                $addcategory= new BarRestaurantCategory;
                $addcategory->bar_restaurant_id =$addbar->id;
                $addcategory->bar_category_id =$this->barcategory[$key];
                $addcategory->save();
            }
            foreach($this->barservice as $key =>$value)
            {
                $addcategory= new BarRestaurantService;
                $addcategory->bar_restaurant_id =$addbar->id;
                $addcategory->bar_service_id =$this->barservice[$key];
                $addcategory->save();
            }
            $this->reset([ 'email','password','name','openinghours','bucket','address','closinghours','peakhours','restaurantname','bucket','barservice','bartieup','barreward','image','bannerimage','description','longitude','latitude','barcategory','postcoded','city_id']);
            $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>'Added Successfully'
            ]);
            return redirect()->to(route('view-bar-restaurant'));
        }
        public function city_list($value)
        {
          
          $this->cities=City::where('zone_id',$value)->get();
        }
        public function postcode_list($value)
        {
          
          $this->postcodeid=$value;
         
        }


    public function render()
    {
        
        $restaurant=BarRestaurant::all();
        $admin=AdminUser::where('user_group_id',$this->usergroupid)->get();
        $category=BarCategory::all();
        $service=BarService::all();
        $tieup=BarTieUp::all();
        $reward=BarRewardPoint::all();
        $barbucket=BarBucket::all();
      
if($this->postcodeid!=null)
{
  
    $postcode=PostCode::where('city_id',$this->postcodeid)->get(); 
}
else{

        $postcode=PostCode::where('country_id',Auth::user()->country_id)->get();
     
}

        $zone_list=Zone::where('country_id',Auth::user()->country_id)->get();
   
        $city=City::all();

      
        return view('livewire.country-admin.bar-restaurant.add-bar-restaurant',['restaurant'=>$restaurant, 'admin'=>$admin,'category'=>$category,'service'=>$service,'tieup'=>$tieup,'reward'=>$reward,'barbucket'=>$barbucket,'postcodes'=>$postcode,'cities'=>$city,'zone_list'=>$zone_list]);
    }
}
