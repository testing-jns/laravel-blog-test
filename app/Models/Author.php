<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Author extends Authenticatable
{
    use HasFactory;

    protected $table = 'authors';

    protected $guarded = ['id'];
    
    public function posts() : HasMany {
        return $this->hasMany(Post::class)->whereNotNull('published_at');
    }
}
