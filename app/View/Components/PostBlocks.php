<?php

namespace App\View\Components;

use Illuminate\View\Component;

class PostBlocks extends Component
{
    public $items;
    public $blockLimit;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($items, $limit=null)
    {
        $this->items = $items;
        $this->blockLimit = $limit;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('front.components.post-blocks');
    }
}
