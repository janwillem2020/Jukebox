@extends('layouts.layout')

@section('title')

<title>Opgeslagen afspeellijsten</title>

@endsection

@section('content')

<p>Opgeslagen afspeellijsten</p>

@foreach($savedPlaylists as $currentPlaylist)
    <div style="border: solid black 1px; margin: 5px; padding: 5px; display: flex; flex-direction: column;">
        <a>Afspeellijst naam: {{$currentPlaylist->name}}</a>
        <div>
            <a href="/changeNamePlaylist/{{$currentPlaylist->id}}">Naam veranderen</a>
            <a href="/deletePlaylist/{{$currentPlaylist->id}}">Afspeellijst verwijderen</a>
        </div>
    </div>
@endforeach

@endsection