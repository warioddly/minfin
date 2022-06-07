<?php

namespace App\View\Components;

use Illuminate\View\Component;

class PageActions extends Component
{

    public $create;
    public $icon;
    public $rightSide;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($create, $icon, $rightSide)
    {
        $this->create = $create;
        $this->icon = $icon;
        $this->rightSide = $rightSide;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('admin.components.page-actions');
    }
}
