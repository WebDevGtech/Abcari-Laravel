<?php

namespace App\Http\Livewire\SuperAdmin\Report;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\BarRestaurant;
class Bar extends Component
{
    use WithPagination;
    private $bar;
    public $filter;
    public $start_date,$end_date;
    public $search;
    public $DateFrom;
    public $DateTo;
    public function filter()
{
  
   
    $this->bar=BarRestaurant::whereBetween('created_at',[$this->start_date,$this->end_date])->paginate(6);
   return  $this->bar;
}
    public function render()
    {
        
        $search=$this->search.'%';
        
        
       
        $this->bar=BarRestaurant::where('name','LIKE',$search)->whereBetween('created_at',[$this->start_date,$this->end_date])->paginate(6);

     
        return view('livewire.super-admin.report.bar',['bars'=>$this->bar]);
    }
}
