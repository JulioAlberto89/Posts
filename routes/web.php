<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\Post;

Route::view('/', 'welcome')->name('welcome');

Route::middleware('auth')->group(function () {
    Route::view('/dashboard', 'dashboard')->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/posts', function () {
        return view('posts.index');
    })->name('posts.index');

    Route::post('/posts', function () {

            Post::create([
            'message'=> request('message'),
            'user_id'=> auth()->user()->id,
            ]);

            //session()->flash('status', '¡Post creado correctamente!');
            return to_route('posts.index')
            ->with('status',__('Post created successfully!'));
    });
});

require __DIR__.'/auth.php';
