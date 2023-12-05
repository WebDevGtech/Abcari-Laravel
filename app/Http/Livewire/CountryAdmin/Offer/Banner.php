<?php

namespace App\Http\Livewire\CountryAdmin\Offer;
use App\Models\GeneralBanner;
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
    public $banner_name,$image,$category,$position,$search,$editId,$deleteId;
    public $edit_image,$edit_category,$edit_position,$edit_banner_name;

    public function updateStatus($value, $id)
    {

      $addbanner = GeneralBanner::where('id', $id)->first();

      if ($value == true) {

        $addbanner->status ='1';
        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>'Updated Successfully'
          ]);
      } else {
        $addbanner->status ='0';
        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>'Updated Successfully'
          ]);
      }
      $addbanner->update();
    }
    public function submitForm()
    {
      // dd($this);
       $this->validate(['banner_name'=>'required|regex:/(^([a-z A-z]+)(\d+)?$)/u|max:50',
    //    'image'=>'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
       'category'=>'required',
       'position'=>'required'],
       ['banner_name.required'=>trans('banner.name_required'),
       'banner_name.regex'=>trans('banner.name_regex'),
       'banner_name.max'=>trans('banner.name_max'),
    //    'image.required'=>trans('banner.image_required'),
    //    'image.mimes'=>trans('banner.image_mimes'),
    //    'image.max'=>trans('banner.image_max'),
       'category.required'=>trans('banner.category_required'),
       'position.required'=>trans('banner.position_required')]);
         //$barrestaurant=BarRestaurant::where('user_id',Auth::id())->first();
        // dd($barrestaurant->id);


        //dd($image);
        $addbanner=new GeneralBanner;
        $addbanner->banner_name=$this->banner_name;
        // $addbanner->bar_restaurant_id =$barrestaurant->id;
        $addbanner->category_id =$this->category;
        $addbanner->position=$this->position;
       $addbanner->save();
       if($this->image != NULL){
            $banner=GeneralBanner::where('id',$addbanner->id)->first();
            $extension = $this->image->getClientOriginalExtension();
            $image=$this->image->storeAs('images/dubai/banners',$banner->banner_name.'_'.$banner->id.'.'.$extension,'public');
            $banner->image=$image;
            $banner->save();
       }

       $this->reset('image','position','category','banner_name');
       $this->dispatchBrowserEvent('modalClose');
       $this->dispatchBrowserEvent('alert', [
           'type' => 'success',
           'message' => "Saved Successfully"
       ]);

    }
    public function editId($id)
{

    $edit=GeneralBanner::where('id',$id)->first();
    //dd($edit);

    $this->editId=$id;
    $this->edit_banner_name=$edit->banner_name;
    // $this->edit_image=$edit->image;
    $this->edit_position=$edit->position;
    $this->edit_category=$edit->category_id;

}
public function view($id){


    $edit= BarRestaurant::where('id',$id)->first();


      $this->editId=$id;
      $this->edit_image=$edit->name;
      $this->edit_position=$edit->user->name;
      $this->edit_category=$edit->category->name;
}

public function editForm()
{

    $this->validate(['edit_banner_name'=>'required|regex:/(^([a-z A-z]+)(\d+)?$)/u|max:50',
    // 'edit_image'=>'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
   'edit_category'=>'required',
    'edit_position'=>'required'],
     [
    //  'edit_image.required'=>trans('banner.image_required'),
    // 'edit_image.mimes'=>trans('banner.image_mimes'),
    // 'edit_image.max'=>trans('banner.image_max'),
    'edit_category.required'=>trans('banner.category_required'),
        'edit_banner_name.required'=>trans('banner.name_required'),
    'edit_banner_name.regex'=>trans('banner.name_regex'),
    'edit_banner_name.max'=>trans('banner.name_max'),
    'edit_position.required'=>trans('banner.position_required')]);
    $editbanner=GeneralBanner::where('id',$this->editId)->first();
    $editbanner->banner_name=$this->edit_banner_name;
    if($this->edit_image != NULL){
        $extension = $this->edit_image->getClientOriginalExtension();
        $image=$this->edit_image->storeAs('images/dubai/banners',$editbanner->banner_name.'_'.$editbanner->id.'.'.$extension,'public');
        $editbanner->image=$image;
    }

    $editbanner->position=$this->edit_position;
    $editbanner->category_id=$this->edit_category;
    $editbanner->update();

    $this->dispatchBrowserEvent('modalClose');
    $this->dispatchBrowserEvent('alert', [
        'type' => 'success',
        'message' => "Updated Successfully"
    ]);

}
public function deleteId($id)
{
    $delete=GeneralBanner::where('id',$id)->first();

  $this->deleteId=$id;

}
public function deleteForm()
{
    GeneralBanner::where('id',$this->deleteId)->delete();
    $this->dispatchBrowserEvent('modalClose');
    $this->dispatchBrowserEvent('alert', [
        'type' => 'success',
        'message' => "Banner Deleted"
    ]);
}

    public function render()
    {
        $search='%'.$this->search.'%';
        $banner=GeneralBanner::with('category')->where('banner_name','LIKE',$search)->orWhere('position','LIKE',$search)->paginate(10);
        $category=Category::all();
        return view('livewire.country-admin.offer.banner',['banners'=>$banner,'categorys'=>$category]);
    }
}
