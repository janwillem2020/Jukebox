<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SavedPlaylistSongSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\SavedPlaylistSong::factory(50)->create();
    }
}
