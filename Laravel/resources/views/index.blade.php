@extends('layouts.layout')

@section('title')

<title>Home</title>

@endsection

@section('content')

<p>Genres:</p>
<ul style="list-style-type: '- '">
@foreach($data as $i)
<li><a href="songs/{{$i->id}}">{{$i->name}}</a></li>
@endforeach
</ul>

<div>
    <a href="/playlist">Tijdelijke Afspeellijst</a>
    <a href="/">Opgeslagen afspeellijsten</a>
</div>

@endsection