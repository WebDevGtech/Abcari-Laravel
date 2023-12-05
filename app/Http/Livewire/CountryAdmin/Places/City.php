<?php

namespace App\Http\Livewire\CountryAdmin\Places;

use Livewire\Component;
use App\Models\City as CityModel;
use App\Models\Countries;
use App\Models\Zone;
use App\Models\PostCode;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;
class City extends Component
{
    use WithPagination;
    public $editId,$name,$code,$zoneid,$countryid,$delete,$search,$zone;
    public $edit_name,$edit_code,$edit_zoneid,$edit_countryid;
    protected $listeners=['deleteconfirmed'=>'delete'];


    public function updateStatus($value,$id)
    {

     $orders=CityModel::where('id',$id)->first();

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
   public function deleteId($id){

    $this->delete=$id;
    $this->dispatchBrowserEvent('some-confirmation');

}

   public function delete(){

    if($edit=PostCode::where('city_id',$this->delete)->first()){
      $this->dispatchBrowserEvent('error');
      $this->dispatchBrowserEvent('alert',[
        'type'=>'info',
        'message'=>'selected in '.$edit->code
      ]);

    }else{
        $content=CityModel::where('id',$this->delete)->first();
    $content->delete();
    $this->dispatchBrowserEvent('deleted');
    $this->dispatchBrowserEvent('alert',[
      'type'=>'success',
      'message'=>'Deleted Successfully'
    ]);
    }

}

   public function edit($id){


    $edit= CityModel::where('id',$id)->first();
       $this->editId=$id;
      $this->edit_name=$edit->name;

      $this->edit_code=$edit->code;
      $this->edit_zoneid=$edit->zone_id;
      $this->edit_countryid=$edit->country_id;


}
public function reseted(){
    $this->reset(['name','code','zoneid','countryid']);
}


public function submit(){
  $this->validate(['edit_name' =>'required|regex:/(^([a-z A-z]+)(\d+)?$)/u',
  'edit_zoneid'=>'required',
  'edit_code'=>'required|regex:/^[a-z A-Z]+$/u',
  'edit_countryid'=>'required',
],[
'edit_name.required'=>trans('city.name_required'),
'edit_name.regex'=>trans('city.name_regex'),
'edit_name.max'=>trans('city.name_max'),
'edit_zoneid.required'=>trans('city.zoneid_required'),
'edit_countryid.required'=>trans('city.countryid_required'),
'edit_code.required'=>trans('city.code_required'),
'edit_code.regex'=>trans('city.code_regex'),
]);
    CityModel::where('id',$this->editId)->update([
          'name'=>$this->edit_name,
          'code'=>$this->edit_code,
          'zone_id'=>$this->edit_zoneid,
           'country_id'=>$this->edit_countryid

       ]);

       $this->reset(['name','code','zoneid','countryid']);


         $this->dispatchBrowserEvent('modalClose');
         $this->dispatchBrowserEvent('alert',[
           'type'=>'success',
           'message'=>'Updated Successfully'
         ]);


     }
     public function saveup(){

        $this->validate(['name' =>'required|regex:/(^([a-z A-z]+)(\d+)?$)/u',
        'zoneid'=>'required',
        'code'=>'required',
        'countryid'=>'required'
],[
  'name.required'=>trans('city.name_required'),
  'name.regex'=>trans('city.name_regex'),
  'name.max'=>trans('city.name_max'),
  'zoneid.required'=>trans('city.zoneid_required'),
  'countryid.required'=>trans('city.countryid_required'),
  'code.required'=>trans('city.code_required'),
]);
      $content=new CityModel();
       $content->name=$this->name;
       $content->code=$this->code;
       $content->zone_id=$this->zoneid;
       $content->country_id=$this->countryid;
       $content->save();
       $this->reset(['name','code','zoneid','countryid']);
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

    public function render()
    {
      $search=$this->search.'%';
         $city=CityModel::where([['country_id',Auth::user()->country_id],['name','LIKE',$search]])->paginate(10);
         $country=Countries::where('id',Auth::user()->country_id)->get();
         $zone=Zone::where('country_id',Auth::user()->country_id)->get();
        return view('livewire.country-admin.places.city',['city'=>$city,'country'=>$country,'zone'=>$zone]);
    }
}
