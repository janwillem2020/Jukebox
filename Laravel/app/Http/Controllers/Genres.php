<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genre;

class Genres extends Controller
{
    // Laat alle genres in de database zien
    function showGenre() {
        $data = Genre::all();
        return view('index', ['data' => $data]);
    }
}
