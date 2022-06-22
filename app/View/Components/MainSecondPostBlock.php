<?php

namespace App\View\Components;

use Illuminate\View\Component;

class MainSecondPostBlock extends Component
{
    public $items;
    public $textSize;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($items, $textSize='small')
    {
        $this->items = $items;
        $this->textSize = $textSize;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('front.components.main-second-post-block');
    }
}
