<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ThemeCss extends Component
{
    public $theme;
    public $css;
    public $direction;
    protected $listeners = ['themeCssChange' => 'cssChange'];
    public function cssChange(){
        $this->css= session()->get('theme',);
        $this->direction=session()->get('direction');
        $this->theme=$this->css."/".$this->direction;
    }
    public function mount(){
        if(session()->get('theme')==null)
        {
            $this->css=session()->put('theme','darkmode');
        }
        if(session()->get('direction')==null)
        {
            $this->direction=session()->put('direction','ltr');
        }
        else{
            $this->theme=session()->get('theme')."/".session()->get('direction');
        }
        
    }
    public function render()
    {
       
        return view('livewire.theme-css');
    }
}
