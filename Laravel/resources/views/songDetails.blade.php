@extends('layouts.layout')

@section('content')
<p>Song details:</p>
<ul>
@foreach($songData as $i)
<li>
    <p>Naam: {{$i->name}}</p>
    <p>Artiest: {{$i->artist}}</p>
    <p>Duur: {{$i->duration}}</p>
    <p>Gecreërd op: {{$i->created_at}}</p>
</li>
<a href="/addToPlaylist/{{$i->id}}">Aan playlist toevoegen</a>
@endforeach
</ul>
@endsection