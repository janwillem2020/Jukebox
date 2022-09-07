@extends('layouts.layout')

@section('title')

<title>Home</title>

@endsection

@section('content')

@auth
    <p>Je bent ingelogd</p>
@endauth

<p>Genres:</p>
<ul style="list-style-type: '- '">
@foreach($data as $i)
<li><a href="songs/{{$i->id}}">{{$i->name}}</a></li>
@endforeach
</ul>

@endsection