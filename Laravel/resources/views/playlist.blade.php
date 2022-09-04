@extends('layouts.layout')

@section('content')
<p>Afspeellijst:</p>

<p>Totale duur: {{$totalDuration}}</p>

@if(isset($playlist))
    <ul>
        @foreach($playlist as $songData)
        <div style="border: solid black 1px; margin: 5px; padding: 5px;">
            <ul style="list-style: none;">
                <li>Naam: {{$songData->name}}</li>
                <li>Artiest: {{$songData->artist}}</li>
                <li>Duur: {{$songData->duration}}</li>
                <li>Gecreërd op: {{$songData->created_at}}</li>
            </ul>
            <a href="/removeFromPlaylist/{{$loop->index}}">Verwijderen uit afspeellijst</a>
        </div>
        @endforeach
    </ul>
@endif
@endsection