<?php

namespace App\Http\Livewire\BarAdmin\Transaction;

use Livewire\Component;
use App\Models\OrderTransaction;
class Transaction extends Component
{
    private $transaction;
    public $search;
    public function render()
    {
        $search=$this->search.'%';
        $this->transaction=OrderTransaction::where('order_no','LIKE',$search)->paginate(15);
        return view('livewire.bar-admin.transaction.transaction',['transactions'=>$this->transaction]);
    }
}
