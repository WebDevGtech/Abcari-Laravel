<?php

namespace App\Http\Livewire\CountryAdmin\TransactionReport;
use Livewire\WithPagination;
use App\Models\OrderTransaction;
use Livewire\Component;

class Transaction extends Component
{
    use WithPagination;
    private $transaction;
    public $search;

    public function render()
    {
        $search=$this->search.'%';
        $this->transaction=OrderTransaction::where('order_no','LIKE',$search)->paginate(5);
        return view('livewire.country-admin.transaction-report.transaction',['transactions'=>$this->transaction]);
    }
}
