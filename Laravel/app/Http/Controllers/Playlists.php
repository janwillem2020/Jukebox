<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Song;
use App\Models\SavedPlaylist;
use App\Models\SavedPlaylistSong;

class Playlists extends Controller
{
    // Laat alle opgeslagen afspeellijsten zien van de ingeloge gebruiker
    function showSavedPlaylist(){
        $savedPlaylists = SavedPlaylist::where("user_id", Auth::user()->id)->get();
 
        return view("savedPlaylists", ["savedPlaylists" => $savedPlaylists]);
    }
    // Verwijderd opgeslagen afspeellijst
    function deletePlaylist($playlist_id){
        SavedPlaylist::where("id", $playlist_id)->delete();

        return redirect("savedPlaylists");
    }
    // Laat de view zien van de afspeellijst waarvan de gebruiker de naam wil veranderen
    function showChangePlaylistName($playlist_id) {
        $selectedPlaylist = SavedPlaylist::where("id", $playlist_id)->first();

        return view("changePlaylistName", ["selectedPlaylist" => $selectedPlaylist]);
    }
    // Veranderd de naam van de opgeslagen playlist
    function changePlaylistName(Request $request, $playlist_id) {
        $selectedPlaylist = SavedPlaylist::where("id", $playlist_id)->first();
        $selectedPlaylist->name = $request->input;
        $selectedPlaylist->save();

        return redirect("savedPlaylists");
    }
    // Laat playlist overzicht zien met nummers
    function showSavedPlaylistSongs($playlist_id) {
        $savedPlaylist = SavedPlaylist::find($playlist_id);
        $savedPlaylistSongs = SavedPlaylistSong::where("saved_playlist_id", $playlist_id)->get();
        $allSongs = [];
        
        foreach($savedPlaylistSongs as $value) {
            array_push($allSongs, Song::find($value->song_id));
        }
        
        return view("savedPlaylistSongs", ["allSongs" => $allSongs, "savedPlaylist" => $savedPlaylist]);
    }
    // Verwijderd nummers uit opgeslagen afspeellijst
    function removeSongFromSavedPlaylist($playlist_id, $song_id) {
        $savedPlaylist = SavedPlaylist::find($playlist_id);
        $savedPlaylistSong = SavedPlaylistSong::where("saved_playlist_id", $playlist_id)->where("song_id", $song_id)->limit(1)->delete();

        return redirect("savedPlaylistSongs/{$playlist_id}");
    }
    // Laat een view zien waar je de playlist kan kiezen waar je een nummer aan wil toevoegen
    function choosePlaylist($song_id) {
        $savedPlaylists = SavedPlaylist::where("user_id", Auth::user()->id)->get();

        return view("choosePlaylist", ["savedPlaylists" => $savedPlaylists, "song_id" => $song_id]);
    }
    // Voegt een nummmer toe aan gekozen opgeslagen playlist
    function addSongToSavedPlaylist($playlist_id, $song_id) {
        SavedPlaylistSong::create(["saved_playlist_id" => $playlist_id, "song_id" => $song_id]);

        return redirect("savedPlaylistSongs/{$playlist_id}");
    }
    // Berekend totale duur van playlist
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
