<?php

namespace App\Http\Livewire\BarAdmin\Offer;
use App\Models\BarRestaurantBanner;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;
use App\Models\BarRestaurant;
use Livewire\Component;
use App\Models\Category;
use  Livewire\WithPagination;
class Banner extends Component
{
    use WithPagination;
    use WithFileUploads;
    public $banner_name,$image,$category,$location,$search,$editId,$deleteId;
    public $edit_image,$edit_category,$edit_location,$edit_banner_name;

    public function updateStatus($value, $id)
    {
     
      $addbanner = BarRestaurantBanner::where('id', $id)->first();
      
      if ($value == true) {
        
        $addbanner->status ='1';
      } else { 
        $addbanner->status ='0';
      }
      $addbanner->update();
    }
    public function submitForm()
    {
       //dd(Auth::id());
       $this->validate(['banner_name'=>'required|regex:/^[a-z A-Z]+$/u|max:50',
       'image'=>'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
       'category'=>'required',
       'location'=>'required'],
       ['banner_name.required'=>trans('banner.name_required'),
       'banner_name.regex'=>trans('banner.name_regex'),
       'banner_name.max'=>trans('banner.name_max'),
       'image.required'=>trans('banner.image_required'),
       'image.mimes'=>trans('banner.image_mimes'),
       'image.max'=>trans('banner.image_max'),
       'category.required'=>trans('banner.category_required'),
       'location.required'=>trans('banner.location_required')]);
         $barrestaurant=BarRestaurant::where('user_id',Auth::id())->first();
        // dd($barrestaurant->id);

       
        //dd($image);
        $addbanner=new BarRestaurantBanner;
        $addbanner->banner_name=$this->banner_name;
        $addbanner->bar_restaurant_id =$barrestaurant->id;
        $addbanner->category_id =$this->category;
        $addbanner->location=$this->location;
       $addbanner->save();
       $banner=BarRestaurantBanner::where('id',$addbanner->id)->first();
       $extension = $this->image->getClientOriginalExtension();
       //dd($extension);
       $image=$this->image->storeAs('images/'.$barrestaurant->name.'_'.$barrestaurant->id.'/banners',$banner->banner_name.'_'.$banner->id.'.'.$extension,'public');
       $banner->image=$image;
       $banner->save();
       $this->reset('image','location','category','banner_name');
       $this->dispatchBrowserEvent('modalClose');
       $this->dispatchBrowserEvent('alert', [
           'type' => 'success',
           'message' => "Banner Added"
       ]);

    }
    public function editId($id)
{
    $edit=BarRestaurantBanner::where('id',$id)->first();
    //dd($edit);
    $this->editId=$id;
    $this->edit_banner_name=$edit->banner_name;
    $this->edit_image=$edit->image;
    $this->edit_location=$edit->location;
    $this->edit_category=$edit->category_id;
}
public function view($id){
        
       
    $edit= BarRestaurant::where('id',$id)->first();
  
   
       $this->editId=$id;
      $this->edit_image=$edit->name;
      $this->edit_location=$edit->user->name;
      $this->edit_category=$edit->category->name;
}

public function editForm()
{
    $this->validate(['edit_banner_name'=>'required|regex:/^[a-z A-Z]+$/u|max:50',
    'edit_image'=>'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
    'edit_category'=>'required',
    'edit_location'=>'required'],
    [ 'edit_image.required'=>trans('banner.image_required'),
    'edit_image.mimes'=>trans('banner.image_mimes'),
    'edit_image.max'=>trans('banner.image_max'),
        'edit_banner_name.required'=>trans('banner.name_required'),
    'edit_banner_name.regex'=>trans('banner.name_regex'),
    'edit_banner_name.max'=>trans('banner.name_max'),
    'edit_category.required'=>trans('banner.category_required'),
    'edit_location.required'=>trans('banner.location_required')]);
    $barrestaurant=BarRestaurant::where('user_id',Auth::id())->first();
    $editbanner=BarRestaurantBanner::where('id',$this->editId)->first();
    $editbanner->banner_name=$this->edit_banner_name;

    $extension = $this->edit_image->getClientOriginalExtension();
    //dd($extension);
    $image=$this->edit_image->storeAs('images/'.$barrestaurant->name.'_'.$barrestaurant->id.'/banners',$editbanner->banner_name.'_'.$editbanner->id.'.'.$extension,'public');
    $editbanner->image=$image;
 
    $editbanner->location=$this->edit_location;
    $editbanner->category_id=$this->edit_category;
    $editbanner->update();
    
    $this->dispatchBrowserEvent('modalClose');
    $this->dispatchBrowserEvent('alert', [
        'type' => 'success',
        'message' => "Banner Updated"
    ]);

}
public function deleteId($id)
{
    $delete=BarRestaurantBanner::where('id',$id)->first();
 
  $this->deleteId=$id;
  
}
public function deleteForm()
{
    BarRestaurantBanner::where('id',$this->deleteId)->delete();
    $this->dispatchBrowserEvent('modalClose');
    $this->dispatchBrowserEvent('alert', [
        'type' => 'success',
        'message' => "Banner Deleted"
    ]);
}

    public function render()
    {
        $search='%'.$this->search.'%';
        $banner=BarRestaurantBanner::with('category')->where('banner_name','LIKE',$search)->paginate(5);
        $category=Category::all();
        return view('livewire.bar-admin.offer.banner',['banners'=>$banner,'categorys'=>$category]);
    }
}
