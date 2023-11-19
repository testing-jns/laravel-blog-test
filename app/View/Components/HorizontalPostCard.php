<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Support\Str;

class HorizontalPostCard extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $title,
        public string $slug,
        public string $excerpt,
        public string $author,
        public string $username,
        public int $readDuration,
        public string $publishedDate,
        public string $categoryName,
        public string $categorySlug,
        public int $views,
        public int $likes
    ) {
        $this->excerpt = Str::limit($this->excerpt, 120);
    }
    
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.card.horizontal-post');
    }
}
