@extends('layouts.layout')

@section('content')

<p>Genres:</p>
<ul>
@foreach($data as $i)
<li><a href="songs/{{$i->id}}">{{$i->name}}</a></li>
@endforeach
</ul>

<a href="/playlist">Afspeellijst</a>

@endsection