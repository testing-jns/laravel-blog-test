<?php

namespace App\Models;

use Illuminate\Pagination\Paginator;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;

class Post extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $casts = [
        'published_at' => 'datetime:Y-m-d'
    ];

    // private static Builder $posts;
    private static Collection $posts;


    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(Author::class);
    }

    private static function initilize(): void
    {
        if (!empty(self::$posts))
            return;
        self::$posts = parent::with(['author', 'category'])->get();
    }

    public function readDuration(): int
    {
        $avgOfWordsPerMinute = 200;
        Str::macro('readDuration', function (...$text) use ($avgOfWordsPerMinute) {
            $totalWords = str_word_count(implode(" ", $text));
            $minutesToRead = round($totalWords / $avgOfWordsPerMinute);

            return intval(max(1, $minutesToRead));
        });

        return Str::readDuration($this->title, $this->body);
    }

    public function scopeMostLiked(): Collection
    {
        static::initilize();
        return self::$posts->sortByDesc('likes');
    }

    public function scopeTrending()
    {

    }

    public function scopePopular(): Collection
    {
        static::initilize();
        return self::$posts->sortByDesc('views');
    }

    public function scopeRecent(Builder $query, bool $useRawBuilderQuery = false): Builder|Collection
    {
        if ($useRawBuilderQuery) {
            return parent::with(['author', 'category'])->orderByDesc('published_at');
        }

        static::initilize();
        return self::$posts->sortByDesc('published_at');
    }

    public function scopeSearchTitle(Builder $query, string $keyword): Builder
    {
        return $query->where('title', 'LIKE', '%' . $keyword . '%');
    }

    public function scopeSearchCategory(Builder $query, string $category): Builder
    {
        return $query->whereHas('category', function (Builder $query) use ($category) {
            $query->where('slug', '=', $category);
        });
    }


    /**
     * Paginate from a instance
     *
     * @param array|object|Collection   $items
     * @param int   $perPage
     * @param int   $page
     * @param array $options
     *
     * @return LengthAwarePaginator
     * 
     * @source https://gist.github.com/vluzrmos/3ce756322702331fdf2bf414fea27bcb
     */
    public static function paginate($items, $perPage = 3, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);

        $items = $items instanceof Collection ? $items : Collection::make($items);

        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }
}
