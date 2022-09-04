@extends('layouts.layout')

@section('title')

<title>Afspeellijst</title>

@endsection

@section('content')
<p>Afspeellijst:</p>

<p>Totale duur: {{$totalDuration}}</p>

@if(isset($playlist))
    @foreach($playlist as $songData)
    <div style="border: solid black 1px; margin: 10px; padding: 5px; width: fit-content;">
        <ul style="list-style: none; margin: 0px; padding: 0px; display: flex; flex-direction: column;">
            <li>Naam: {{$songData->name}}</li>
            <li>Artiest: {{$songData->artist}}</li>
            <li>Duur: {{$songData->duration}}</li>
            <li>Gecreërd op: {{$songData->created_at}}</li>
            <li><a href="/removeFromPlaylist/{{$loop->index}}">Verwijderen uit afspeellijst</a></li>
        </ul>
    </div>
    @endforeach
@endif

<a href="/savePlaylist">Afspeellijst opslaan</a>
@endsection