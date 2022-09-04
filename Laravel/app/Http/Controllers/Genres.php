<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genre;

class Genres extends Controller
{
    function showGenre() {
        $data = Genre::all();
        return view('index', ['data' => $data]);
    }
}
