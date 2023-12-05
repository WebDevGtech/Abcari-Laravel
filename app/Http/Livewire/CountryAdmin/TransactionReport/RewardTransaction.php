<?php

namespace App\Http\Livewire\CountryAdmin\TransactionReport;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\RewardTransaction as RewardModel;
class RewardTransaction extends Component
{
     use WithPagination;
    private $reward;
    public $search;
    public function render()
    {
        $search=$this->search.'%';
       
        $this->reward=RewardModel::where('order_no','LIKE',$search)->paginate(5);
        return view('livewire.country-admin.transaction-report.reward-transaction',['rewards'=>$this->reward]);
    }
}
