<?php

namespace App\Http\Livewire\CountryAdmin\BarRestaurant;

use App\Models\AdminUser;
use App\Models\BarBucket;
use App\Models\BarCategory;
use App\Models\BarRestaurant;
use App\Models\BarRestaurantCategory;
use App\Models\BarRestaurantService;
use App\Models\BarRewardPoint;
use App\Models\BarService;
use App\Models\BarTieUp;
use App\Models\PostCode;
use Auth;
use Livewire\Component;
use App\Models\City;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Nette\Utils\Arrays;
use Request;

class EditBarRestaurant extends Component
{
    public $selectedValues = [];
    public $editId, $restaurantname, $adminname, $delete, $barbucket,
    $bartieup, $barreward, $barredeem, $postcode, $address, $openinghours, $closinghours, $peakhours, $bannerimage, $image, $latitude, $longitude, $description, $email, $password,$city_id;
    public $edit_barcategory =[];
    public $edit_barservice =[];
    public $abc_barservice ;
   public $abc_barcategory;

    public function submit()
    {
      

        $this->abc_barcategory = BarRestaurantCategory::where('bar_restaurant_id',$this->editId)->pluck('bar_category_id');

        if(count($this->edit_barcategory)){
            foreach($this->edit_barcategory as $key => $edit_barcategory_value){
                $check_id = BarRestaurantCategory::where([['bar_category_id',$this->edit_barcategory[$key]],['bar_restaurant_id',$this->editId]])->first();
                if($check_id == NULL){

                    $add=new BarRestaurantCategory;
                    $add->bar_category_id=$this->edit_barcategory[$key];
                    $add->bar_restaurant_id=$this->editId;
                    $add->save();

               
                }
            }
            $delete_check_id = BarRestaurantCategory::where('bar_restaurant_id',$this->editId)->get();
            foreach($this->edit_barcategory as $key=>$str_value)
            {
                $string_value[$key] = (int)$this->edit_barcategory[$key];
            }
          
            foreach($delete_check_id as $key => $bar_cateory_value_delete){
                $g = +1;
              
                if (in_array((int)$delete_check_id[$key]->bar_category_id, $string_value , TRUE))
                {
                
                }
                else
                {

                    BarRestaurantCategory::where([['bar_category_id',$delete_check_id[$key]->bar_category_id],['bar_restaurant_id',$this->editId]])->delete();
                    
                }
            }
        }
        
  
 //bar service
 $this->abc_barservice = BarRestaurantService::where('bar_restaurant_id',$this->editId)->pluck('bar_service_id');
 if(count($this->edit_barservice)){
    foreach($this->edit_barservice as $key => $edit_barservice_value){
        $check_id = BarRestaurantService::where([['bar_service_id',$this->edit_barservice[$key]],['bar_restaurant_id',$this->editId]])->first();
        if($check_id == NULL){

            $add=new BarRestaurantService;
            $add->bar_service_id=$this->edit_barservice[$key];
            $add->bar_restaurant_id=$this->editId;
            $add->save();

       
        }
    }
    $delete_check_id = BarRestaurantService::where('bar_restaurant_id',$this->editId)->get();
    foreach($this->edit_barservice as $key=>$str_service)
    {
        $service_string_value[$key] = (int)$this->edit_barservice[$key];
    }
    foreach($delete_check_id as $key => $bar_service_value_delete){
        $g = +1;
      
        if (in_array((int)$delete_check_id[$key]->bar_service_id,$service_string_value , TRUE))
        {
          
        }
        else
        {
            
            BarRestaurantService::where([['bar_service_id',$delete_check_id[$key]->bar_service_id],['bar_restaurant_id',$this->editId]])->delete();
        }
    }
}
        $this->validate([
            'restaurantname' => 'required|regex:/(^([a-z A-z]+)(\d+)?$)/u|max:60',
            'barbucket' => 'required',
            // 'edit_barcategory' => 'required',
            // 'edit_barservice' => 'required',
            'bartieup' => 'required',
            'openinghours' => 'required',
            'closinghours' => 'required',
            // 'peakhours'=>'required',
            // 'latitude'=>'required|between:-90,90',
            // 'longitude'=>'required|between:-100,100',
            // 'image'=>'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
            // 'bannerimage'=>'required|mimes:jpeg,png,jpg,gif,svg|max:2048',

            // 'address'=>'required|regex:/(^([a-z A-z]+)(\d+)?$)/u|max:150',
            // 'description'=>'required|regex:/(^([a-z A-z]+)(\d+)?$)/u|max:150',
        ], [
            'restaurantname.required' => trans('addbarRestaurant.restaurantname_required'),
            'restaurantname.regex' => trans('addbarRestaurant.restaurantname_regex'),
            'restaurantname.max' => trans('addbarRestaurant.restaurantname_max'),
            'barbucket.required' => trans('addbarRestaurant.bucket_required'),
            // 'edit_barcategory.required' => trans('addbarRestaurant.barcategory_required'),
            // 'edit_barservice.required' => trans('addbarRestaurant.barservice_required'),
            'bartieup.required' => trans('addbarRestaurant.bartieup_required'),
            'openinghours.required' => trans('addbarRestaurant.openinghours_required'),
            'closinghours.required' => trans('addbarRestaurant.closinghours_required'),
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

            // 'address.required'=>trans('addbarRestaurant.address_required'),
            // 'address.regex'=>trans('addbarRestaurant.address_regex'),
            // 'address.max'=>trans('addbarRestaurant.address_max'),
            // 'description.required'=>trans('addbarRestaurant.description_required'),
            // 'description.regex'=>trans('addbarRestaurant.description_regex'),
            // 'description.max'=>trans('addbarRestaurant.description_max'),
        ]);
        $adminuser = AdminUser::where('id', Auth::id())->first();
        $editbar = BarRestaurant::with('barcategory', 'barservice')->where('id', $this->editId)->first();
        $editbar->name = $this->restaurantname;

        $editbar->bar_tie_up_id = $this->bartieup;
        $editbar->bar_bucket_id = $this->barbucket;
        $editbar->opening_hour = $this->openinghours;
        $editbar->closing_hour = $this->closinghours;
      //  $editbar->peak_hour = $this->peakhours;
        $editbar->description = $this->description;
        $editbar->address = $this->address;
        $editbar->latitude = $this->latitude;
        $editbar->longitude = $this->longitude;
        $editbar->city_id = $this->city_id;
        if ($this->image != null) {
            $extension = $this->image->getClientOriginalExtension();
            $image = $this->image->storeAs('images/' . $adminuser->name . '_' . $adminuser->id . '/bar-restaurant/image', $editbar->name . '_' . $editbar->id . '.' . $extension, 'public');
            $editbar->image = $image;
        }
        if ($this->bannerimage != null) {
            $extension = $this->bannerimage->getClientOriginalExtension();
            $banner_image = $this->bannerimage->storeAs('images/' . $adminuser->name . '_' . $adminuser->id . '/bar-restaurant/banner-image', $editbar->name . '_' . $editbar->id . '.' . $extension, 'public');
            $editbar->banner_image_1 = $banner_image;
        }
        $editbar->save();
      //  $editbarcategory = BarRestaurantCategory::where('bar_restaurant_id', $editbar->id)->get();
      
        
        $this->reset(['adminname', 'restaurantname', 'edit_barcategory', 'edit_barservice', 'bartieup', 'barreward', 'image', 'bannerimage', 'description', 'longitude', 'latitude']);
        $this->dispatchBrowserEvent('modalClose');
        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'message' => 'updated Successfully',
        ]);
    }



    public function render()
    {
        $edit = BarRestaurant::with('barcategory', 'barservice')->where('id',Request::segment('4'))->first();
        if($edit)
        {
        $this->editId = $edit->id;
        $this->restaurantname = $edit->name;
        $this->adminname = $edit->user_id;
        $barcategory = BarRestaurantCategory::where('bar_restaurant_id', $edit->id)->get();

       
        foreach ($barcategory as $key => $value) {
            $this->edit_barcategory[$key] = $value->bar_category_id;
        }
        $barservice = BarRestaurantService::where('bar_restaurant_id', $edit->id)->get();
        foreach ($barservice as $key => $value) {
            $this->edit_barservice[$key] = $barservice[$key]->bar_service_id;
        }
        $this->bartieup = $edit->bar_tie_up_id;
        $this->barbucket = $edit->bar_bucket_id;

        //   $this->bannerimage=$edit->banner_image_1;
        //   $this->image=$edit->image;
        $this->openinghours = $edit->opening_hour;
        $this->closinghours = $edit->closing_hour;
       // $this->peakhours = $edit->peak_hour;
        $this->latitude = $edit->latitude;
        $this->longitude = $edit->longitude;
        $this->description = $edit->description;
        $this->address = $edit->address;
        $this->city_id=$edit->city_id;
        }
        $codered = Auth::user()->country_id;
        $categories = BarCategory::with('barcategory')->get();
        $service = BarService::all();
        $tieup = BarTieUp::all();
        $reward = BarRewardPoint::all();
        $bucket = BarBucket::all();
      
      
     
        $postcode = PostCode::where('country_id', $codered)->get('id')->toArray();
        $city=City::where('country_id',Auth::user()->country_id)->get();

        return view('livewire.country-admin.bar-restaurant.edit-bar-restaurant',['categories' => $categories, 'service' => $service, 'tieup' => $tieup, 'reward' => $reward, 'bucket' => $bucket, 'postcode' => $postcode,'cities'=>$city,'options' => ['1', '2', '3']]);
    }
}
