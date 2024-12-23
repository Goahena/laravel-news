<?php

namespace App\Models;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Post;

// use Searchable;
// use HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['slug', 'name', 'parentId'];
    public $timestamps = false;
    public function children()
    {
        return $this->hasMany(Category::class, 'parentId');
    }


    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    public function toSearchableArray(): array
    {
        return [
            'id' => (int) $this->title,
            'title' => $this->title,
            'slug' => $this->slug,
            'body' => $this->body,
            'published_at' =>  $this->published_at,
            'category_id' => (int) $this->category_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
    public function shouldBeSearchable(): bool
    {
        return $this->published_at;
    }
}
