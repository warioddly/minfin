<?php

namespace App\View\Components;

use App\Models\Page;
use Illuminate\View\Component;

class PageToTree extends Component
{
    public $mainPages;
    public $pageIs;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($pageIs = [null])
    {
        $this->mainPages = Page::where('parent_id', null)->get();
        $this->pageIs = $pageIs;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('admin.components.page-to-tree');
    }
}
