<?php

namespace App\Http\Livewire\BarAdmin\Settings;

use Livewire\Component;
use App\Models\Countries;
use App\Models\Zone;
use App\Models\City;
use App\Models\PostCode;
use App\Models\TaxType as TaxTypeModel;
use Livewire\WithPagination;
class TaxType extends Component
{
    use WithPagination;
    private $country,$zone,$taxtype,$city,$postcode;


public $delete_tax_name,$deleteId,$search;
public function updateStatus($value, $id)
{
 
  $addtax = TaxTypeModel::where('id', $id)->first();
  
  if ($value == true) {
    
    $addtax->status ='1';
   

  } else {
  
   
    $addtax->status ='0';
  }
  $addtax->update();
 


}
public function editId($id)
{
    $edit=TaxTypeModel::where('id',$id)->first();
    $this->editId=$id;
    $this->edit_tax_name=$edit->tax_name;
    $this->edit_country_name=$edit->country_id;
    $this->edit_zone_name=$edit->zone_id;
    $this->edit_city_name=$edit->city_id;
    $this->edit_post_code=$edit->postcode_id;
    $this->edit_taxrate=$edit->tax_rate; 
}
public function editForm()
{
    $edittax=TaxTypeModel::where('id',$this->editId)->first();
    $edittax->tax_name=$this->edit_tax_name;
    $edittax->country_id=$this->edit_country_name;
    $edittax->zone_id=$this->edit_zone_name;
    $edittax->city_id=$this->edit_city_name;
    $edittax->postcode_id=$this->edit_post_code;
    $edittax->tax_rate=$this->edit_taxrate;
    $edittax->update(); 
    $this->dispatchBrowserEvent('modalClose');
   
}
public function deleteId($id)
{
    $delete=TaxTypeModel::where('id',$id)->first();  
    $this->deleteId=$id;
    $this->delete_tax_name=$delete->tax_name;
}
public function deleteForm()
{
    $delete=TaxTypeModel::where('id',$this->deleteId)->delete();  
    $this->dispatchBrowserEvent('modalClose');
    $this->dispatchBrowserEvent('alert', [
        'type' => 'success',
        'message' => "Tax Deleted"
    ]);  
}


    public function render()
    {
        $this->country=Countries::all();
        $this->zone=Zone::all();
        $this->city=City::all();
        $this->postcode=PostCode::all();
        $search = '%'.$this->search .'%';
        $this->taxtype=TaxTypeModel::with('country','zone','city','postcode')->where('tax_name','LIKE',$search)->paginate(5);
        return view('livewire.bar-admin.settings.tax-type',['countries'=>$this->country,'zones'=>$this->zone,'taxtypes'=>$this->taxtype,'cities'=>$this->city,'postcodes'=>$this->postcode]);
    }
}
