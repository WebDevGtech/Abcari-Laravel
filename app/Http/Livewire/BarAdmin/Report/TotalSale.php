<?php

namespace App\Http\Livewire\BarAdmin\Report;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
class TotalSale extends Component
{
    use WithPagination;
    private $totalsale;
    public $start_date,$end_date;
    public $search;
    public $DateFrom;
    public $DateTo,$total,$sale,$initial=0;

    public function filter()
    {
      if($this->initial==1)
       {
        $this->totalsale=Order::whereBetween(['bar_restaurant_id',auth::id()],['created_at',[$this->start_date,$this->end_date]])->paginate(15);
       $this->total=Order::whereBetween([['bar_restaurant_id',auth::id()],['created_at',$this->start_date,$this->end_date]])->sum('sub_total');
       }


      
       return  $this->totalsale;
       
    }

    public function render()
    {
        if($this->initial==0)
        {
        $this->totalsale=Order::where('bar_restaurant_id',auth::id())->paginate(15);
        $this->total=Order::where('bar_restaurant_id',auth::id())->sum('sub_total');
        }
        //dd($this->totalsale=Order::all());
        // $this->total=Order::sum('sub_total');
        $search=$this->search.'%';
   
       
       // $this->totalsale=Order::where('order_no','LIKE',$search)->whereBetween('created_at',[$this->start_date,$this->end_date])->paginate(5);
       
        return view('livewire.bar-admin.report.total-sale',['totalsales'=>$this->totalsale,'totals'=>$this->total]);
    }
}
