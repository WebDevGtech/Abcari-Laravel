<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AdminLayout extends Component
{
    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
     */
    public $mode;
    public function render()
    {
        $this->mode=1;
        return view('layouts.admin.main');
    }
}
