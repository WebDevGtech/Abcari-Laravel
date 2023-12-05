<?php

namespace App\Http\Livewire\SuperAdmin\Places;

use Livewire\Component;
use App\Models\PostCode as PostCodeModel;
use App\Models\Countries;
use App\Models\Zone;
use App\Models\City;
use  Livewire\WithPagination;
class AddPostCode extends Component
{
  use  WithPagination;
    public $code ,$editId ,$zoneid,$countryid,$cityid,$delete,$search,$zone,$city;
    public $edit_postcoded,$edit_zoneid,$edit_countryid,$edit_cityid;
    protected $listeners=['deleteconfirmed'=>'delete'];
    protected $paginationTheme = 'bootstrap';
     
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
     //dd($this);
   $this->validate([
  
    'zoneid'=>'required',
    'cityid'=>'required',
    'countryid'=>'required',
    'code'=>'required|unique:postcodes'
 ],[
  'code.required'=>trans('Enter the postalcode'),
  'code.unique'=>trans('postcode.unique'),
 
  
 'zoneid.required'=>trans('postcode.zoneid_required'),
 'cityid.required'=>trans('postcode.cityid_required'),
 'countryid.required'=>trans('postcode.countryid_required'),

]);
//dd('2');
 $content=new PostCodeModel;
  $content->code=$this->code;
  $content->country_id=$this->countryid;
  $content->zone_id=$this->zoneid;
  $content->city_id=$this->cityid;
 //dd('3');
  $content->save(); 
  $this->reset('code','countryid','zoneid','cityid');
  $this->dispatchBrowserEvent('modalClose');
  $this->dispatchBrowserEvent('alert',[
    'type'=>'success',
    'message'=>'Saved Successfully'
  ]);

}

  
  
  public function edit($id){
       
       
   $edit= PostCodeModel::where('id',$id)->first();
      $this->editId=$id;
     $this->edit_postcoded=$edit->code;
     $this->edit_countryid=$edit->country_id;
     $this->edit_zoneid=$edit->zone_id;
     $this->edit_cityid=$edit->city_id;

     
            
}
 
   
public function submit(){
  $this->validate([
  
    'edit_zoneid'=>'required',
    'edit_cityid'=>'required',
    'edit_countryid'=>'required',
 ],[
 
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
    
     
      $this->reset('edit_postcoded','edit_countryid','edit_zoneid','edit_cityid');
    
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
   $this->dispatchBrowserEvent('modalClose');
   $this->dispatchBrowserEvent('alert',[
     'type'=>'success',
     'message'=>'Deleted Successfully'
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
    public function render()
    {
      $search=$this->search.'%';
        $postcode=PostCodeModel::where('code','LIKE',$search)->paginate(5);
         $city=City::all();
         $country=Countries::all();
         $zone=Zone::all();
        return view('livewire.super-admin.places.add-post-code',['postcode'=>$postcode,'city'=>$city,'zone'=>$zone,'country'=>$country]);
    }
}
