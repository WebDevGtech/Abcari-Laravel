<?php

namespace App\Http\Livewire\Settings;
use App\Models\TaxType as TaxTypeModal;
use App\Models\Country;
use Livewire\Component;
use Livewire\WithPagination;
class TaxType extends Component
{
use WithPagination;
private $tax;
public $search;
 public $taxname,$countryname,$countrycode,$statecode,$zipcode,$city,$taxrate;   

public function submit()
{
    $ordercount=TaxTypeModal::count();
    $addtax=new TaxTypeModal;

$addtax->tax_name=$this->taxname;


$addtax->country_id=$this->countryname;
$addtax->country_code=$this->countrycode;
$addtax->state_code=$this->statecode;
$addtax->zip_postcode=$this->zipcode;
$addtax->city=$this->city;
$addtax->tax_rate=$this->taxrate;
$addtax->order=$ordercount+1;

$addtax->save();
//dd($addtax);
$this->reset('name','countryname','countrycode','statecode','zipcode','city','taxrate');

}


    public function render()
    {
         $search='%'.$this->search.'%';
        $this->tax=TaxTypeModal::with('country')->where('id','LIKE',$search)->paginate(3);
       // dd( $this->tax);
$country=Country::all();
        return view('livewire.settings.tax-type',['taxtypes'=>$this->tax,'countries'=>$country]);
    }
}
