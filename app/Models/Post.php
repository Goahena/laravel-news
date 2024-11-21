<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Post extends Model
{
    use Searchable;
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'body',
        'published_at',
        'category_id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }   
    public function searchableAs()
    {
        return 'posts_index';
    }
}