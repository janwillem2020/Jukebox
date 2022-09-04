@extends('layouts.layout')

@section('title')

<title>Nummers</title>

@endsection

@section('content')
<p>Nummers:</p>
<ul>
@foreach($songData as $i)
<li><a href="/songDetails/{{$i->id}}">{{$i->name}}</a></li>
@endforeach
</ul>
@endsection