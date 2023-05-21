<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Product;

class ProductCollection extends Component
{
    public $products;
    public $limit;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($limit)
    {
        $this->limit = $limit ?? 3;
        $this->products = Product::all()->take($limit);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.product-collection');
    }
}
