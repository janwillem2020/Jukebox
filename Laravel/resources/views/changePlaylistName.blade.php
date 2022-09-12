@extends('layouts.layout')

@section('title')

<title>Afspeellijst naam veranderen</title>

@endsection

@section('content')

<p>Afspeellijst veranderen</p>

<form method="post" action="/changePlaylistName/{{$selectedPlaylist->id}}">
    @csrf
    <input name="input" autocomplete="off" value="{{$selectedPlaylist->name}}" type="text">
    <input value="Opslaan" type="submit">
</form>
@endsection

