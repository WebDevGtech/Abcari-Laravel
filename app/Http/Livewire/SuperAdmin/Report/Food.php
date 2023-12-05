<?php

namespace App\Http\Livewire\SuperAdmin\Report;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product;
class Food extends Component
{
    use WithPagination;
    private $food;
    public $search;
    public $start_date,$end_date;
    public $DateFrom;
    public $DateTo;
    
    public function filter()
    {
      
        
        $this->food=Product::whereBetween('created_at',[$this->start_date,$this->end_date])->paginate(5);
       return  $this->food;
    }
    public function render()
    {
        $search=$this->search.'%';
        $this->food=Product::where('name','LIKE',$search)->whereBetween('created_at',[$this->start_date,$this->end_date])->paginate(5);
        return view('livewire.super-admin.report.food',['foods'=>$this->food]);
    }
}
