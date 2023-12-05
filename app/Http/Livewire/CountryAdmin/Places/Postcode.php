<?php

namespace App\Http\Livewire\CountryAdmin\Places;

use Livewire\Component;
use App\Models\PostCode as PostCodeModel;
use App\Models\Countries;
use App\Models\Zone;
use App\Models\City;
use Auth;
use Livewire\WithPagination;
class PostCode extends Component
{
     use WithPagination;
     public $code,$editId,$zoneid,$countryid,$cityid,$delete,$search,$city,$zone;
     public $edit_postcoded,$edit_editId,$edit_zoneid,$edit_countryid,$edit_cityid;
     protected $listeners=['deleteconfirmed'=>'delete'];

    public function updateStatus($value,$id)
    {

     $orders=PostCodeModel::where('id',$id)->first();

       if($value==true)
       {

         $orders->status ='1';
         $this->dispatchBrowserEvent('onstatus');
         $this->dispatchBrowserEvent('alert',[
           'type'=>'success',
           'message'=>'Updated Successfully'
         ]);
       }
       else{
         $orders->status ='0';
         $this->dispatchBrowserEvent('offstatus');
         $this->dispatchBrowserEvent('alert',[
           'type'=>'success',
           'message'=>'Updated Successfully'
         ]);
       }
       $orders->save();
   }

   public function saveup(){

    $this->validate([
      'code'=>'required|unique:postcodes',
      'zoneid'=>'required',
      'cityid'=>'required',
      'countryid'=>'required'
   ],
  [
    'code.required'=>trans('postcode.postcode_required'),
    'code.unique'=>trans('postcode.unique'),
    'zoneid.required'=>trans('postcode.zoneid_required'),
    'cityid.required'=>trans('postcode.cityid_required'),
    'countryid.required'=>trans('postcode.countryid_required'),
  ]);
  $content=new PostCodeModel;
   $content->code=$this->code;
   $content->country_id=$this->countryid;
   $content->zone_id=$this->zoneid;
   $content->city_id=$this->cityid;

   $content->save();
   $this->reset(['code','countryid','zoneid','cityid']);
   $this->dispatchBrowserEvent('modalClose');
   $this->dispatchBrowserEvent('alert',[
     'type'=>'success',
     'message'=>'Saved Successfully'
   ]);

}
public function zones_list($value)
{
  
  $this->zone=Zone::where('country_id',$value)->get();
}

public function city_list($value)
{
  
  $this->city=City::where('zone_id',$value)->get();
}


   public function edit($id){


    $edit= PostCodeModel::where('id',$id)->first();
       $this->editId=$id;
      $this->edit_postcoded=$edit->code;
      $this->edit_countryid=$edit->country_id;
      $this->edit_zoneid=$edit->zone_id;
      $this->edit_cityid=$edit->city_id;



}

    public function reseted()
    {
        $this->reset(['postcoded','countryid','zoneid','cityid']);

    }
public function submit(){
  $this->validate([
    'edit_postcoded'=>'required',
    'edit_zoneid'=>'required',
    'edit_cityid'=>'required',
    'edit_countryid'=>'required'
 ],
[
  'edit_postcoded.required'=>trans('postcode.postcode_required'),
  'edit_zoneid.required'=>trans('postcode.zoneid_required'),
  'edit_cityid.required'=>trans('postcode.cityid_required'),
  'edit_countryid.required'=>trans('postcode.countryid_required'),
]);
    PostCodeModel::where('id',$this->editId)->update([
          'code'=>$this->edit_postcoded,
           'country_id'=>$this->edit_countryid,
           'city_id'=>$this->edit_cityid,
           'zone_id'=>$this->edit_zoneid




       ]);


       $this->reset(['postcoded','countryid','zoneid','cityid']);

         $this->dispatchBrowserEvent('modalClose');
         $this->dispatchBrowserEvent('alert',[
           'type'=>'success',
           'message'=>'Updated Successfully'
         ]);



     }
     public function deleteId($id){

      $this->delete=$id;
      $this->dispatchBrowserEvent('some-confirmation');

 }

   public function delete(){
    $content=PostCodeModel::where('id',$this->delete)->first();
    $content->delete();
    $this->dispatchBrowserEvent('deleted');
    $this->dispatchBrowserEvent('alert',[
      'type'=>'success',
      'message'=>'Deleted Successfully'
    ]);
}
    public function render()
    {
      $search=$this->search.'%';
         $postcode=PostCodeModel::where([['country_id',Auth::user()->country_id],['code','LIKE',$search]])->paginate(10);
         $city=City::where('country_id',Auth::user()->country_id)->get();
         $country=Countries::where('id',Auth::user()->country_id)->get();
         $zone=Zone::where('country_id',Auth::user()->country_id)->get();
        return view('livewire.country-admin.places.post-code',['postcode'=>$postcode,'city'=>$city,'zone'=>$zone,'country'=>$country]);
    }
}
