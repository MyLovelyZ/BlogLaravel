<?php

use App\Http\Controllers\PostDashboardController;
use App\Http\Controllers\ProfileController;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', ['title' => 'Home']);
});


Route::get('/posts', function () {
    $title = '';
    
    if(request('category')) {
        $category = Category::firstWhere('slug', request('category'));
        if($category) {
            $title = ' in ' . $category->name;
        }
    }
    if(request('author')) {
        $author = User::firstWhere('username', request('author'));
        if($author) {
            $title = ' by ' . $author->name;
        }
    }

    return view('posts', [
        'title' => 'Blog' . $title, 
        'posts' => Post::latest()->filter(request(['search', 'category', 'author']))->paginate(6)->withQueryString(),
        'categories' => Category::all()
    ]);
});

Route::get('/posts/{post:slug}', function (Post $post) {
    return view('post', ['title' => $post->title, 'post' => $post]);
});

Route::get('/about', function () {
    return view('about', ['title' => 'About']);
});

Route::get('/contact', function () {
    return view('contact', ['title' => 'Contact']);
});

Route::get('/dashboard', [PostDashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
