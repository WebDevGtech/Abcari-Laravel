<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ThemeChange extends Component
{
    public $theme;

    public function changeThemeButton($val){
       
        $this->theme=$val;
        session()->put('theme', $val);
        $this->emit('themeScriptChange');
        $this->emit('themeCssChange');
        return redirect(request()->header('Referer'));

    }
    public function render()
    {
        return view('livewire.theme-change');
    }
}
