@extends('layouts.layout')

@section('title')

<title>Nummer details</title>

@endsection

@section('content')
<p>Nummer details:</p>
@foreach($songData as $i)
<div style="border: solid black 1px; margin: 10px; padding: 5px; width: fit-content;">
    <ul style="list-style: none; margin: 0px; padding: 0px; display: flex; flex-direction: column;">
        <li>Naam: {{$i->name}}</li>
        <li>Artiest: {{$i->artist}}</li>
        <li>Duur: {{$i->duration}}</li>
        <li><a href="/addToPlaylist/{{$i->id}}">Toevoegen aan tijdelijke playlist</a></li>
        <li><a href="/choosePlaylist/{{$i->id}}">Toevoegen aan bestaande playlist</a></li>
    </ul>
</div>
@endforeach
@endsection