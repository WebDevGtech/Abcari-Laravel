<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ThemeScript extends Component
{
    public $theme;
    public $css;
    public $direction;
    protected $listeners = ['themeScriptChange' => 'scriptChange'];
    public function scriptChange(){
        $css= session()->get('theme',);
        $direction=session()->get('direction');
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
        if(session()->get('theme')==null&&session()->get('direction')==null)
        {
        $this->theme=$this->css."/".$this->direction;
        } else{
            $this->theme=session()->get('theme')."/".session()->get('direction');
        }
       }
    public function render()
    {
       
        return view('livewire.theme-script');
    }
}
