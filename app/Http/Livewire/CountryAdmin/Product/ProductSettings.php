<?php

namespace App\Http\Livewire\CountryAdmin\Product;

use Livewire\Component;

class ProductSettings extends Component
{

    public $name,$image;
    public function render()
    {
        return view('livewire.country-admin.product.product-settings');
    }
}
