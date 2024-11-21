<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
<<<<<<< HEAD
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $fillable = [
        'slug', 'tag', 'description', 'title', 'created_at', 'update_at', 'author_id', 
        'is_active', 'timer', 'image', 'is_comment'
    ];

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'categoryPost', 'postId', 'categoryId');
    }
}
=======
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
>>>>>>> origin/authanduser
