<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CategoryList extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $name,
        public string $slug,
        public string $total,
        public ?string $requestCategoryName = null
    ) {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.category-list');
    }
}
