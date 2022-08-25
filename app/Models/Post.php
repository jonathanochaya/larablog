<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];

    // protected $with = ['author', 'category'];

    public function category()
    {
        // hasOne, hasMany, belongsTo, belongsToMany
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function scopeFilter($query, $filters)
    {
        $query->when($filters['search'] ?? false, function($query, $search) {
            $query
                ->where('title', 'like', '%' . $search  . '%')
                ->orWhere('body', 'like', '%' . $search . '%');
                // ->orWhereHas('author', fn($query) => $query->where('username', 'like', '%' . $search . '%'));
        });

        $query->when($filters['category'] ?? false, function($query, $category) {
            $query->whereHas('category', fn($query) =>
                $query->where('slug', $category)
            );
        });

        $query->when($filters['author'] ?? false, function($query, $author) {
            $query->whereHas('author', fn($query) =>
                $query->where('username', $author)
            );
        });
    }
}
