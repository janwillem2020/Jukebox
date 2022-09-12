<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

use App\Models\Song;
use App\Models\SavedPlaylist;
use App\Models\SavedPlaylistSong;

class Playlists extends Controller
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

    function showSavedPlaylist(){
        $savedPlaylists = SavedPlaylist::where("user_id", Auth::user()->id)->get();
 
        return view("savedPlaylists", ["savedPlaylists" => $savedPlaylists]);
    }

    function deletePlaylist($playlist_id){
        SavedPlaylist::where("id", $playlist_id)->delete();

        return redirect("savedPlaylists");
    }

    function showChangePlaylistName($playlist_id) {
        $selectedPlaylist = SavedPlaylist::where("id", $playlist_id)->first();

        return view("changePlaylistName", ["selectedPlaylist" => $selectedPlaylist]);
    }

    function changePlaylistName(Request $request, $playlist_id) {
        $selectedPlaylist = SavedPlaylist::where("id", $playlist_id)->first();
        $selectedPlaylist->name = $request->input;
        $selectedPlaylist->save();

        return redirect("savedPlaylists");
    }

    function showSavedPlaylistSongs($playlist_id) {
        $savedPlaylist = SavedPlaylist::find($playlist_id);
        $savedPlaylistSongs = SavedPlaylistSong::where("saved_playlist_id", $playlist_id)->get();
        $allSongs = [];
        foreach($savedPlaylistSongs as $value) {
            array_push($allSongs, Song::find($value->song_id));
        }
        
        return view("savedPlaylistSongs", ["allSongs" => $allSongs, "savedPlaylist" => $savedPlaylist]);
    }

    function removeSongFromSavedPlaylist($playlist_id, $song_id) {
        $savedPlaylist = SavedPlaylist::find($playlist_id);
        $savedPlaylistSong = SavedPlaylistSong::where("saved_playlist_id", $playlist_id)->where("song_id", $song_id)->delete();

        // dd($savedPlaylist, $savedPlaylistSong);
        return redirect("savedPlaylistSongs/{$playlist_id}");
    }

    function calculateDuration($playlist){
        $totalDuration = "00:00:00";

        if(isset($playlist)){
            foreach($playlist as $currentSong){
                $totalDuration = date('H:i:s', strtotime($totalDuration) + strtotime($currentSong->duration));
            }
            return $totalDuration;
        }
    }
}
