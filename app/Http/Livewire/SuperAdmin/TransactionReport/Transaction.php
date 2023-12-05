<?php

namespace App\Http\Livewire\SuperAdmin\TransactionReport;

use Livewire\Component;
use App\Models\OrderTransaction;
class Transaction extends Component
{
    private $transaction;
    public $search;
    public function render()
    {
        $search=$this->search.'%';
        $this->transaction=OrderTransaction::where('order_no','LIKE',$search)->paginate(5);
        return view('livewire.super-admin.transaction-report.transaction',['transactions'=>$this->transaction]);
    }
}
