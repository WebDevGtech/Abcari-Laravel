<?php

namespace App\Http\Livewire;

use Livewire\Component;

class DirectionChange extends Component
{
    public function changeDirection($val){
       //dd($val);
        session()->put('direction', $val);
        $this->emit('themeScriptChange');
        $this->emit('themeCssChange');
        return redirect(request()->header('Referer'));

    }
    public function render()
    {
        return view('livewire.direction-change');
    }
}
