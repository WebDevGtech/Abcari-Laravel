<?php

namespace App\Http\Livewire\BarAdmin\Report;

use Livewire\Component;
use App\Models\Brand as BrandMOdel;
class Brand extends Component
{
    public function render()
    {
        return view('livewire.bar-admin.report.brand');
    }
}
