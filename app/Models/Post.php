<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    use HasFactory;

    // Mass assignment of Post fields (mass assignment vulnerability)
    protected $fillable = ['title', 'excerpt', 'body', 'slug', 'category_id'];

    public function scopeFilter($query, array $filters){ //$query passed automatically by laravel
        $query->when($filters['search'] ?? false, function($query, $search) {
            $query->where('title', 'like', '%' . $search . '%')
                ->orWhere('body', 'like', '%' . $search . '%');
        });
    }

    // Eager loading ['author', 'category'] by default
    // use without() when not needed!
    // protected $with = ['author', 'category'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author(){ // uses function name to search db column
        return $this->belongsTo(User::class, 'user_id');
    }
}
