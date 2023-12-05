<?php

namespace App\Http\Livewire\CountryAdmin\Report;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product;
class Liquor extends Component
{
    use WithPagination;
    private $liquor;
    public $search;
    public $start_date,$end_date;
    
    public $DateFrom;
    public $DateTo;
    public function filter()
    {
      
        
        $this->liquor=Product::whereBetween('created_at',[$this->start_date,$this->end_date])->paginate(5);
       return  $this->liquor;
    }
    public function render()
    {
        $search = $this->search.'%';
        $this->liquor=Product::where('name','LIKE',$search)->whereBetween('created_at',[$this->start_date,$this->end_date])->paginate(5);
       
        
        
        return view('livewire.country-admin.report.liquor',['liquors'=>$this->liquor]);
    }
}
