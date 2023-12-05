<?php

namespace App\Http\Livewire\CountryAdmin\Places;

use Livewire\Component;
use  App\Models\Zone as ZoneModel;
use App\Models\City;
use  App\Models\PostCode;
use App\Models\Countries;
use  Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;


class Zone extends Component
{
     use WithPagination;
     public $name,$code,$countryid,$editId,$delete,$search;
     public $edit_name,$edit_code,$edit_countryid;

    //  public $zonename;


     protected $listeners=['deleteconfirmed'=>'delete'];


    public function updateStatus($value,$id)
    {

     $zones=ZoneModel::where('id',$id)->first();

       if($value==true)
       {

         $zones->status ='1';
         $this->dispatchBrowserEvent('onstatus');
         $this->dispatchBrowserEvent('alert',[
           'type'=>'success',
           'message'=>'Updated Successfully'
         ]);
       }
       else{
         $zones->status ='0';
         $this->dispatchBrowserEvent('offstatus');
         $this->dispatchBrowserEvent('alert',[
           'type'=>'success',
           'message'=>'Updated Successfully'
         ]);
       }
       $zones->save();
   }


   public function edit($id){


    $edit= ZoneModel::where('id',$id)->first();
       $this->editId=$id;
      $this->edit_name=$edit->name;

      $this->edit_code=$edit->code;
      $this->edit_countryid=$edit->country_id;
      //$this->zoneid=$edit->zone_id;


}



public function submit(){

  $this->validate([
    'edit_name' =>'required|regex:/(^([a-z A-z]+)(\d+)?$)/u|unique:zones',
      'edit_code'=>'required|regex:/(^([a-z A-z]+)(\d+)?$)/u',
      'edit_countryid'=>'required'
   ],
  [
    'edit_name.required'=>trans('zone.name_required'),
    'edit_name.regex'=>trans('zone.name_regex'),
    'edit_name.max'=>trans('zone.name_max'),
    'edit_name.unique'=>trans('zone.unique'),
    'edit_code.required'=>trans('zone.code_required'),
    'edit_code.regex'=>trans('zone.regex_required'),
    'edit_countryid.required'=>trans('zone.countryid_required'),

  ]);
    ZoneModel::where('id',$this->editId)->update([
          'name'=>$this->edit_name,
          'code'=>$this->edit_code,
          'country_id'=>$this->edit_countryid


       ]);

         $this->reset('name','code','countryid');

         $this->dispatchBrowserEvent('modalClose');
         $this->dispatchBrowserEvent('alert',[
           'type'=>'success',
           'message'=>'Updated Successfully'
         ]);


     }

     public function saveup(){

        $this->validate([
          'name' =>'required|regex:/(^([a-z A-z]+)(\d+)?$)/u|unique:zones',
            'code'=>'required|regex:/(^([a-z A-z]+)(\d+)?$)/u',
            'countryid'=>'required'
         ],
        [
          'name.required'=>trans('zone.name_required'),
          'name.regex'=>trans('zone.name_regex'),
          'name.max'=>trans('zone.name_max'),
          'name.unique'=>trans('zone.unique'),
          'code.required'=>trans('zone.code_required'),
          'code.regex'=>trans('zone.regex_required'),
          'countryid.required'=>trans('zone.countryid_required'),

        ]);
      $content=new ZoneModel();
       $content->name=$this->name;
       $content->code=$this->code;
       $content->country_id=$this->countryid;


       $content->save();
       $this->reset('name','code','countryid');
       $this->dispatchBrowserEvent('modalClose');
       $this->dispatchBrowserEvent('alert',[
         'type'=>'success',
         'message'=>'Saved Successfully'
       ]);

    }
    public function deleteId($id){

      $this->delete=$id;
      $this->dispatchBrowserEvent('some-confirmation');

 }



     public function delete(){

          if($edit=city::where('zone_id',$this->delete)->first()){
            $this->dispatchBrowserEvent('error');
            $this->dispatchBrowserEvent('alert',[
              'type'=>'info',
              'message'=>'selected in '.$edit->name .'  city'
            ]);

          }elseif( $edit=PostCode::where('zone_id',$this->delete)->first()){
            $this->dispatchBrowserEvent('error');
            $this->dispatchBrowserEvent('alert',[
              'type'=>'info',
              'message'=>'selected in '.$edit->code .'  postcode'
            ]);
          }
          else{

                $content=ZoneModel::where('id',$this->delete)->first();
        $content->delete();

        $this->dispatchBrowserEvent('updated');
        $this->dispatchBrowserEvent('alert',[
          'type'=>'success',
          'message'=>'Deleted Successfully'
        ]);

          }



    }




    public function render()
    {
      if($this->search=='')
   {
    $zone=ZoneModel::where('country_id',Auth::user()->country_id)->paginate(10);
   }
   else{
    $search=$this->search.'%';
    $zone=ZoneModel::where([['country_id',Auth::user()->country_id],['name','LIKE',$search]])->paginate(10);
   }

         $country=Countries::where('id',Auth::user()->country_id)->get();
        return view('livewire.country-admin.places.zone',['zone'=>$zone,'country'=>$country]);
    }
}
