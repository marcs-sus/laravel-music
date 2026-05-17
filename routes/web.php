<?php

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\PlaylistController;
use App\Http\Controllers\SongController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/* Route::get('/', function () {
    return view('welcome');
}); */

Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('albums', AlbumController::class);
    Route::resource('artists', ArtistController::class);
    Route::resource('genres', GenreController::class);
    Route::resource('playlists', PlaylistController::class);
    Route::resource('songs', SongController::class);
});

require __DIR__ . '/auth.php';
