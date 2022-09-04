@extends('layouts.layout')

@section('content')
<p>Liedjes:</p>
<ul>
@foreach($songData as $i)
<li><a href="/songDetails/{{$i->id}}">{{$i->name}}</a></li>
@endforeach
</ul>
@endsection