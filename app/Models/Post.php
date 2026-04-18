<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // public static function find($slug)
    // {
    //     // return Arr::first(static::all(), function ($post) use ($slug) {
    //     //     return $post['slug'] == $slug;
    //     // });

    //     // return Arr::first(static::all(), fn($post) => $post['slug'] == $slug) ?? abort(404);
    // }

    protected $fillable = ['title', 'author', 'slug', 'body'];
    protected $guarded = ['id'];
    use HasFactory;

    protected $with = ['author', 'category'];

    public function author()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    #[Scope]
    public function filter(Builder $query, array $filters): void
    {
        // Gunakan when() agar query hanya berjalan jika 'search' ada isinya
        // return $query->when(request('search'), function ($query, $search) {
        //     $query->where(function ($q) use ($search) {
        //         $q->where('title', 'like', '%' . $search . '%')
        //         ->orWhereHas('category', function ($q) use ($search) {
        //             $q->where('name', 'like', '%' . $search . '%');
        //         })
        //         ->orWhereHas('author', function ($q) use ($search) {
        //             $q->where('name', 'like', '%' . $search . '%');
        //         });
        //     });
        // });
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where('title', 'like', '%' . $search . '%');
        });

        $query->when($filters['category'] ?? false, function ($query, $category) {
            return $query->whereHas('category', function ( Builder $query) use ($category) {
                $query->where('slug', $category);
            });
        });

        $query->when($filters['author'] ?? false, function ($query, $author) {
            return $query->whereHas('author', function ( Builder $query) use ($author) {
                $query->where('username', $author);
            });
        });
    }
}