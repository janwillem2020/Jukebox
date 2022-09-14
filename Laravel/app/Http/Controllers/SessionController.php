<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

use App\Models\Song;
use App\Models\SavedPlaylist;
use App\Models\SavedPlaylistSong;

class SessionController extends Controller
{
    function showPlaylist(Request $request) {
        $playlist = $request->session()->get('playlist');

        $totalDuration = Playlists::calculateDuration($playlist);

        return view('playlist', ['playlist' => $playlist, 'totalDuration' => $totalDuration]);
    }

    function addSongToPlaylist(Request $request, $id) {
        $songData = Song::where("id", $id)->first();

        if(!$request->session()->has("playlist")) {
            $playlist = [];
            $request->session()->put('playlist', $playlist);
        }

        $sessionPlaylist = $request->session()->get('playlist');
        array_push($sessionPlaylist, $songData);
        $request->session()->put('playlist', $sessionPlaylist);

        return redirect('playlist');
    }

    function removeFromPlaylist(Request $request, $song_index) {
        $playlist = $request->session()->get("playlist");

        array_splice($playlist, $song_index, 1);

        $request->session()->put('playlist', $playlist);

        return redirect('playlist');
    }

    function savePlaylist(Request $request) {
        $playlist = $request->session()->get("playlist");

        if (Auth::check() && isset($playlist)) {
            $savedPlaylist = SavedPlaylist::create([
                "user_id" => Auth::user()->id,
                "name" => "Opgeslagen Afspeellijst"
            ]);
        }

        foreach($playlist as $song) {
            SavedPlaylistSong::create([
                "saved_playlist_id" => $savedPlaylist->id,
                "song_id" => $song->id
            ]);
        }
        return redirect("savedPlaylists");
    }
}
