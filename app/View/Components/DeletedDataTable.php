<?php

namespace App\View\Components;

use Illuminate\View\Component;

class DeletedDataTable extends Component
{
    public $items;
    public $links;
    public $excepts;
    public $actions;
    public $orederable;
    public $withactions;
    public $showLinks;
    public $type;
    public $id;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($items, $links, $actions, $excepts, $id, $type = null, $showLinks = null,  $orederable=true, $withactions = true)
    {
        $this->id = $id;
        $this->items = $items;
        $this->links = $links;
        $this->actions = $actions;
        $this->excepts = $excepts;
        $this->orederable = $orederable;
        $this->withactions = $withactions;
        $this->showLinks = $showLinks;
        $this->type = $type;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('admin.components.deleted-data-table');
    }
}
