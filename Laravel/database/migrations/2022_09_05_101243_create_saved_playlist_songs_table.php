<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSavedPlaylistSongsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('saved_playlist_songs', function (Blueprint $table) {
            $table->unsignedBigInteger("saved_playlist_id")->unsigned();
            $table->foreign("saved_playlist_id")->references("id")->on("saved_playlists")->onDelete('cascade');
            $table->unsignedBigInteger("song_id")->unsigned();
            $table->foreign("song_id")->references("id")->on("songs")->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('saved_playlist_songs');
    }
}
