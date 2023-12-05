<?php

namespace App\Http\Livewire\SuperAdmin\TransactionReport;

use Livewire\Component;
use App\Models\RewardTransaction as RewardModel;
class RewardTransaction extends Component
{
    private $reward;
    public $search;
    public function render()
    {
        $search=$this->search.'%';
        $this->reward=RewardModel::where('order_no','LIKE',$search)->paginate(10);
        return view('livewire.super-admin.transaction-report.reward-transaction',['rewards'=>$this->reward]);
    }
}
