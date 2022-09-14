<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Song;
use App\Models\Genre;

class Songs extends Controller
{
    // Laat nummer zien
    function showSong($id) {
        $data = Song::where("id", $id)->get();
        
        return view("songs", ["data" => $data]);
    }
    // Laat nummers zien van gekozen genre
    function showGenreSongs($id) {
        $genreData = Genre::where("id", $id)->get();
        $songData = Song::where("genre_id", $id)->get();

        return view('songs', ['genreData' => $genreData, 'songData' => $songData]);
    }
    // Laat nummer details zien van gekozen nummer
    function showSongDetails($id) {
        $songData = Song::where("id", $id)->get();

        return view('songDetails', ['songData' => $songData]);
    }
}
