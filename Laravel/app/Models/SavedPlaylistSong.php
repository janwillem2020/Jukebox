<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SavedPlaylistSong extends Model
{
    use HasFactory;

    protected $fillable = ["saved_playlist_id", "song_id"];

    public $timestamps = false;
}
