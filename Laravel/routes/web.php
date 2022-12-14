<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Genres;
use App\Http\Controllers\Songs;
use App\Http\Controllers\Playlists;
use App\Http\Controllers\SessionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/', [Genres::class,"showGenre"]);

Route::get('/songs/{id}', [Songs::class,"showGenreSongs"]);

Route::get('/songDetails/{id}', [Songs::class,"showSongDetails"]);

Route::get('/playlist', [SessionController::class,"showPlaylist"]);

Route::get('/addToPlaylist/{id}', [SessionController::class,"addSongToPlaylist"]);

Route::get('/removeFromPlaylist/{song_index}', [SessionController::class, "removeFromPlaylist"]);

Route::get('/savePlaylist', [SessionController::class, "savePlaylist"]);

Route::get('/savedPlaylists', [Playlists::class, "showSavedPlaylist"]);

Route::get('/deletePlaylist/{id}', [Playlists::class, "deletePlaylist"]);

Route::get('/showChangePlaylistName/{playlist_id}', [Playlists::class, "showChangePlaylistName"]);

Route::post('/changePlaylistName/{playlist_id}', [Playlists::class, "changePlaylistName"]);

Route::get('/savedPlaylistSongs/{playlist_id}', [Playlists::class, "showSavedPlaylistSongs"]);

Route::get('/removeSongFromSavedPlaylist/{playlist_id}/{song_id}', [Playlists::class, "removeSongFromSavedPlaylist"]);

Route::get('/choosePlaylist/{song_id}', [Playlists::class, "choosePlaylist"]);

Route::get('/addSongToSavedPlaylist/{playlist_id}/{song_id}', [Playlists::class, "addSongToSavedPlaylist"]);