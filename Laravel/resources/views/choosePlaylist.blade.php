@extends('layouts.layout')

@section('title')

<title>Kies afspeellijst</title>

@endsection

@section('content')

<p>Kies afspeellijst om nummer aan toe te voegen</p>

@foreach($savedPlaylists as $currentPlaylist)
<div style="border: solid black 1px; margin: 5px; padding: 5px;">
    <a href="/addSongToSavedPlaylist/{{$currentPlaylist->id}}/{{$song_id}}">
        <p style="margin: 0px;">{{$currentPlaylist->name}}</p>
    </a>
</div>
   
@endforeach

@endsection