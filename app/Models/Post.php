<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Builder;

class Post extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $casts = [
        'published_at' => 'datetime:Y-m-d'
    ];

    private static Builder $posts;


    public function category() : BelongsTo {
        return $this->belongsTo(Category::class);
    }

    public function author() : BelongsTo {
        return $this->belongsTo(Author::class);
    }

    private static function initilize() : void {
        if (!empty(self::$posts)) return;
        self::$posts = parent::with(['author', 'category']);
    }

    public function readDuration() : int {
        $avgOfWordsPerMinute = 200;
        Str::macro('readDuration', function(...$text) use($avgOfWordsPerMinute) {
            $totalWords = str_word_count(implode(" ", $text));
            $minutesToRead = round($totalWords / $avgOfWordsPerMinute);

            return intval(max(1, $minutesToRead));
        });

        return Str::readDuration($this->title, $this->body);
    }

    public function scopeMostLiked() : Builder {
        static::initilize();
        return self::$posts->orderByDesc('likes');
    }

    public function scopeTrending() {

    }

    public function scopePopular() : Builder {
        static::initilize();
        return self::$posts->orderByDesc('views');
    }

    public function scopeRecent() : Builder {
        static::initilize();
        return self::$posts->orderByDesc('published_at');
    }

    public function scopeSearchTitle(Builder $query, string $keyword) : Builder {
        return $query->where('title', 'LIKE', '%'. $keyword .'%');
    }

    public function scopeSearchCategory(Builder $query, string $category) : Builder {
        return $query->whereHas('category', function(Builder $query) use($category) {
            $query->where('slug', '=', $category);
        });
    } 
}
