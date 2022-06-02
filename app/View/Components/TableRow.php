<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;

class TableRow extends Component
{
    /**
     * @var int Порядковый номер записи.
     */
    public int $key;
    public $item;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($key, $item)
    {
        $this->key = $key;
        $this->item = $item;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View
     */
    public function render(): View
    {
        return view('components.table-row');
    }
}
