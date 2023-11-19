<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class MiniCard extends Component
{

    // public string $title;
    // public string $slug;
    // public string $excerpt;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        // $this->title = $post->title;
        // $this->slug = $post->slug;
        // $this->excerpt = $post->excerpt;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.card.mini-post');
    }
}
