<?php

namespace App\Http\Livewire\SuperAdmin\Places;

use Livewire\Component;
use App\Models\Countries;
use App\Models\Zone;
use App\Models\AdminUser;
use  Livewire\WithPagination;
class AddCountry extends Component
{
  use  WithPagination;
    public $name,$code,$phonecode,$editId,$delete,$currency_name,$search;
    public $edit_name,$edit_code,$edit_phonecode,$edit_currency_name;
    protected $paginationTheme = 'bootstrap';
    protected $listeners=['deleteconfirmed'=>'delete'];

    
   public function updateStatus($value,$id)
   {  
     
    $orders=Countries::where('id',$id)->first();
  
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

  public function edit($id){
       
       
   $edit= Countries::where('id',$id)->first();
      $this->editId=$id;
     $this->edit_name=$edit->name;
      
     $this->edit_code=$edit->code;
     $this->edit_phonecode=$edit->phonecode;
     $this->edit_currency_name=$edit->currency_name;

    
}



public function submit(){
 
  $this->validate(['edit_name'=>'required|regex:/(^([a-z A-z]+)(\d+)?$)/u|max:50|unique:countries',
  'edit_code'=>'required|regex:/^[a-z A-Z]+$/u|max:50|unique:countries',
  'edit_phonecode'=>'required|max:10',
  'edit_currency_name'=>'required|max:10'],
  ['edit_name.required'=>trans('country.name_required'),
  'edit_name.regex'=>trans('country.name_regex'),
  'edit_name.max'=>trans('country.name_max'),
  'edit_name.unique'=>trans('country.unique'),
  'edit_code.required'=>trans('country.code_required'),
  'edit_code.regex'=>trans('country.code_regex'),
  'edit_code.max'=>trans('country.code_max'),
  'edit_code.unique'=>trans('Code already used'),
  'edit_phonecode.required'=>trans('country.phonecode_required'),
  'edit_phonecode.max'=>trans('country.phonecode_max'),
  'edit_currency_name.required'=>trans('country.currency_name_required'),
  // 'edit_currency_name.regex'=>trans('country.currency_name_regex'),
  // 'edit_currency_name.max'=>trans('country.currency_name_max'),
 
 
 
 ]);
   Countries::where('id',$this->editId)->update([
         'name'=>$this->edit_name,
         'code'=>$this->edit_code,
         'phonecode'=>$this->edit_phonecode,
         'currency_name'=>$this->edit_currency_name
          
       
      ]);
    
        // $this->reset(['name','code','phonecode','currency_name']);
     
        $this->dispatchBrowserEvent('modalClose');
        $this->dispatchBrowserEvent('alert',[
          'type'=>'success',
          'message'=>'Updated Successfully'
        ]);
    
     
    
     
    }
    public function saveup(){
      //dd($this);
      $this->validate(['name'=>'required|regex:/(^([a-z A-z]+)(\d+)?$)/u|max:50|unique:countries',
 'code'=>'required|regex:/^[a-z A-Z]+$/u|max:50|unique:countries',
 'phonecode'=>'required|max:10',
 'currency_name'=>'required|max:10'],
 ['name.required'=>trans('country.name_required'),
 'name.regex'=>trans('country.name_regex'),
 'name.max'=>trans('country.name_max'),
 'name.unique'=>trans('country.unique'),
 'code.required'=>trans('country.code_required'),
 'code.regex'=>trans('country.code_regex'),
 'code.max'=>trans('country.code_max'),
 'code.unique'=>trans('Code already used'),
 'phonecode.required'=>trans('country.phonecode_required'),
 'phonecode.max'=>trans('country.phonecode_max'),
 'currency_name.required'=>trans('country.currency_name_required'),
//  'currency_name.regex'=>trans('country.currency_name_regex'),
//  'currency_name.max'=>trans('country.currency_name_max'),



]);


     $content=new Countries();


      $content->name=$this->name;
      $content->code=$this->code;
      $content->phonecode=$this->phonecode;
      $content->currency_name=$this->currency_name;
    
     
      $content->save(); 
      $this->reset(['name','code','phonecode','currency_name']);
      $this->dispatchBrowserEvent('modalClose');
      $this->dispatchBrowserEvent('alert',[
        'type'=>'success',
        'message'=>'Saved Successfully'
      ]);

   }
   public function deleteId($id){
       
    $this->delete=$id;
   // $this->dispatchBrowserEvent('some-confirmation');
   
}
   
    public function delete(){
        
     
        if($edit=Zone::where('country_id',$this->delete)->first()){
            $this->dispatchBrowserEvent('error');
            $this->dispatchBrowserEvent('alert',[
              'type'=>'info',
              'message'=>'selected in  '.$edit->name
            ]);
        }elseif($user=AdminUser::where('country_id',$this->delete)->first()){
          $this->dispatchBrowserEvent('error');
          $this->dispatchBrowserEvent('alert',[
            'type'=>'info',
            'message'=>'selected in  '.$user->name
          ]);
        }
        else 
        {  

        $content=Countries::where('id',$this->delete)->delete();
     
        $this->dispatchBrowserEvent('modalClose');
       $this->dispatchBrowserEvent('alert',[
         'type'=>'success',
         'message'=>'Deleted Successfully'
       ]);

        }
       
     
   }
    public function render()
    {
      $search=$this->search.'%';
        $country=Countries::where('name','LIKE',$search)->paginate(15);
        return view('livewire.super-admin.places.add-country',['countries'=>$country]);
    }
}
