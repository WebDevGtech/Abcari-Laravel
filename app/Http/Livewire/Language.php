<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Request;

class Language extends Component
{
  

   public function change($val){
   
    App::setLocale($val);
    session()->put('locale', $val);
    return redirect(request()->header('Referer'));
   }
    public function render()
    {
        
       
        return view('livewire.language');
    }
}
