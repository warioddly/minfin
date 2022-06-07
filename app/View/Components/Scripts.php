<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Scripts extends Component
{
    public $urls;
    public $type;
    public $pageParentId;

    /**
     * Create a new component instance.
     *
     * @return void
     */

    public function __construct($urls, $type, $pageParentId = null)
    {

        $this->urls = $urls;
        $this->type = $type;
        $this->pageParentId = $pageParentId;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('admin.components.scripts');
    }
}
