<?php

namespace App\Http\Livewire\BarAdmin\SiteSetting;

use Livewire\Component;
use App\Models\AppSetting;
use  Livewire\WithPagination;

class SiteSetting extends Component
{
    use WithPagination;
    public $search,$editId;
private $site;
public $name,$key,$value;
public $edit_name,$edit_key,$edit_value;
protected $paginationTheme = 'bootstrap';

public function submit()
{
  $this->validate([ 'name' =>'required|regex:/(^([a-z A-z]+)(\d+)?$)/u|max:50',
  'key' =>'required|regex:/^[a-z A-Z]+$/u|max:50',
'value'=>'required|numeric'],
['name.required'=>trans('sitesetting.name_required'),
'name.regex'=>trans('sitesetting.name_regex'),
'name.max'=>trans('sitesetting.name_max'),
'key.required'=>trans('sitesetting.key_required'),
         'key.regex'=>trans('sitesetting.key_regex'),
         'key.max'=>trans('sitesetting.key_max'),
        'value.required'=>trans('sitesetting.value_required'),
      'value.numeric'=>trans('sitesetting.value_numeric')]);
$addsite =new AppSetting;
$addsite->name=$this->name;
$addsite->key=$this->key;
$addsite->value=$this->value;
$addsite->save();
$this->reset('name','key','value');
$this->dispatchBrowserEvent('modalClose');
$this->dispatchBrowserEvent('alert',[
  'type'=>'success',
  'message'=>'Added Successfully'
]);

}
public function editId($id)
{
  $edit=AppSetting::where('id',$id)->first();
  $this->editId=$id;
  $this->edit_name=$edit->name;
  $this->edit_key=$edit->key;
  $this->edit_value=$edit->value;
}
public function edit()
{
  $this->validate([ 'edit_name' =>'required|regex:/(^([a-z A-z]+)(\d+)?$)/u|max:50',
  'edit_key' =>'required|regex:/^[a-z A-Z]+$/u|max:50',
'edit_value'=>'required|numeric'],
['edit_name.required'=>trans('sitesetting.name_required'),
'edit_name.regex'=>trans('sitesetting.name_regex'),
'edit_name.max'=>trans('sitesetting.name_max'),
'edit_key.required'=>trans('sitesetting.key_required'),
         'edit_key.regex'=>trans('sitesetting.key_regex'),
         'edit_key.max'=>trans('sitesetting.key_max'),
        'edit_value.required'=>trans('sitesetting.value_required'),
      'edit_value.numeric'=>trans('sitesetting.value_numeric')]);
  $edit=AppSetting::where('id',$this->editId)->first();

  $edit->name=$this->edit_name;
  $edit->key=$this->edit_key;
  $edit->value=$this->edit_value;
  $edit->update();
  $this->dispatchBrowserEvent('modalClose');
  $this->dispatchBrowserEvent('alert',[
    'type'=>'success',
    'message'=>'Updated Successfully'
  ]);
}
public function updateChange($value,$id)
{  
  
 $site=AppSetting::where('id',$id)->first();

   if($value==true)
   {
    
     $site->status ='1';
     $this->dispatchBrowserEvent('alert',[
      'type'=>'success',
      'message'=>'Updated Successfully'
    ]);
   }
   else{
     $site->status ='0';
     $this->dispatchBrowserEvent('alert',[
      'type'=>'success',
      'message'=>'Updated Successfully'
    ]);
   }
   $site->update();
}

    public function render()
    {
        $search=$this->search.'%';
        $this->site=AppSetting::where('name','LIKE',$search)->paginate(15);
        return view('livewire.bar-admin.site-setting.site-setting',['sites'=>$this->site]);
    }
}
