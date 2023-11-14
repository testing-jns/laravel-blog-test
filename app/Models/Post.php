<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $casts = [
        'published_at' => 'datetime:Y-m-d'
    ];

    private static Collection $posts;


    public function category() : BelongsTo {
        return $this->belongsTo(Category::class);
    }

    public function author() : BelongsTo {
        return $this->belongsTo(Author::class);
    }

    private static function initilize() : void {
        if (!empty(self::$posts)) return;
        self::$posts = parent::with(['author', 'category'])->get();
    }

    public function readDuration() : int {
        $avg_of_words_per_minute = 200;
        Str::macro('readDuration', function(...$text) use($avg_of_words_per_minute) {
            $total_words = str_word_count(implode(" ", $text));
            $minutes_to_read = round($total_words / $avg_of_words_per_minute);

            return intval(max(1, $minutes_to_read));
        });

        return Str::readDuration($this->title, $this->body);
    }

    public static function mostLikedPosts() : Post | null {
        static::initilize();
        return self::$posts->sortByDesc('likes')->first();
    }

    public static function trendingPosts() {

    }

    public static function popularPosts() : Post | null {
        static::initilize();
        return self::$posts->sortByDesc('views')->first();
    }

    public static function recentPosts() : Collection {
        static::initilize();
        return self::$posts->sortByDesc('published_at');
    }
}
