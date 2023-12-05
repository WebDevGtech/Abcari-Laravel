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
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class ViewBarRestaurant extends Component
{

    use WithPagination;
    use WithFileUploads;
    public $usergroupid = 3, $search;
    //  public  $username = Auth::id();
    protected $paginationTheme = 'bootstrap';

    public $status = 1;
    public $editId, $restaurantname, $adminname, $edit_barcategory, $edit_barservice, $delete, $barbucket,
    $bartieup, $barreward, $barredeem, $postcode, $address, $openinghours, $closinghours, $peakhours, $bannerimage, $image, $latitude, $longitude, $description, $email, $password,$city_id;

    protected $listeners = ['deleteconfirmed' => 'delete'];
    public function updateStatus($value, $id)
    {
        //dd(Auth::id());

        $orders = BarRestaurant::where('id', $id)->first();
        $admin_user = AdminUser::where('id', $orders->user_id)->first();

        if ($value == true) {
            $orders->status = '1';
            $admin_user->status = '1';
            $this->dispatchBrowserEvent('onstatus');
            $this->dispatchBrowserEvent('alert', [
                'type' => 'success',
                'message' => 'Updated Successfully',
            ]);
        } else {
            $orders->status = '0';
            $admin_user->status = '0';
            $this->dispatchBrowserEvent('offstatus');
            $this->dispatchBrowserEvent('alert', [
                'type' => 'success',
                'message' => 'Updated Successfully',
            ]);
        }
        $orders->save();
        $admin_user->save();
    }

    public function edit($id)
    {
        $edit = BarRestaurant::with('barcategory', 'barservice')->where('id', $id)->first();
        $this->editId = $id;
        $this->restaurantname = $edit->name;
        $this->adminname = $edit->user_id;
        $barcategory = BarRestaurantCategory::where('bar_restaurant_id', $edit->id)->get();

       
        foreach ($barcategory as $key => $value) {
            $this->edit_barcategory[$key] = $value->bar_category_id;
        }
        // $barservice = BarRestaurantService::where('bar_restaurant_id', $edit->id)->get();
        // foreach ($barservice as $key => $value) {
        //     $this->edit_barservice[$key] = $barservice[$key]->bar_service_id;
        // }
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

    public function view($id)
    {

        $edit = BarRestaurant::where('id', $id)->first();
        $this->editId = $id;
        $this->restaurantname = $edit->name;
        $this->adminname = $edit->user->name;
        $this->barbucket = $edit->bucket->name;
        $this->barcategory = $edit->category->bar_category_id;
        $this->barservice = $edit->service->name;
        $this->bartieup = $edit->tieup->name;
        $this->openinghours = $edit->opening_hour;
        $this->closinghours = $edit->closing_hour;
      //  $this->peakhours = $edit->peak_hour;
        $this->barreward = $edit->point->point;
        $this->barredeem = $edit->point->point;
        $this->image = $edit->image;
        $this->bannerimage = $edit->banner_image;
        $this->postcode = $edit->post_code_id;
        $this->latitude = $edit->latitude;
        $this->longitude = $edit->longitude;
        $this->description = $edit->description;
        $this->address = $edit->address;
    }

    public function deleteId($id)
    {
        $this->delete = $id;
        $this->dispatchBrowserEvent('some-confirmation');

    }
    public function delete()
    {
        $content = BarRestaurant::where('id', $this->delete)->first();
        $content->delete();
        $this->dispatchBrowserEvent('error');
        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'message' => 'Deleted Successfully',
        ]);

    }

    public function render()
    {
        $codered = Auth::user()->country_id;
        $admin = AdminUser::where('user_group_id', $this->usergroupid)->get();
        $categories = BarCategory::all();
        $service = BarService::all();
        $tieup = BarTieUp::all();
        $reward = BarRewardPoint::all();
        $bucket = BarBucket::all();
        $postcode = PostCode::where('country_id', $codered)->get('id')->toArray();


        // if ($this->search == '') {
        //     $restaurant = BarRestaurant::whereIn('post_code_id', $postcode)->paginate(10);
        // } else {
            $search = $this->search . '%';
            $restaurant = BarRestaurant::whereIn('post_code_id', $postcode)->where('name','LIKE',$search)->paginate(10);
       // }
        
        $city=City::where('country_id',Auth::user()->country_id)->get();
        return view('livewire.country-admin.bar-restaurant.view-bar-restaurant',
            ['restaurant' => $restaurant, 'admin' => $admin, 'categories' => $categories, 'service' => $service, 'tieup' => $tieup, 'reward' => $reward, 'bucket' => $bucket, 'postcode' => $postcode,'cities'=>$city]);

    }
}
