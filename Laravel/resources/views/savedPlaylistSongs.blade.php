@extends('layouts.layout')

@section('title')

<title>{{$savedPlaylist->name}} overzicht</title>

@endsection

@section('content')

<p>Afspeellijst: {{$savedPlaylist->name}}</p>

@foreach($allSongs as $song)
<div style="display: block;border: solid black 1px; margin: 10px; padding: 5px; width: fit-content;">
    <ul style="list-style: none; margin: 0px; padding: 0px; display: flex; flex-direction: column;">
        <li>Naam: {{$song->name}}</li>
        <li>Artiest: {{$song->artist}}</li>
        <li>Duur: {{$song->duration}}</li>
    </ul>
    <a href="/songDetails/{{$song->id}}">Naar details</a>
    <a href="/">Verwijderen uit afspeellijst</a>
</div>
@endforeach

@endsection