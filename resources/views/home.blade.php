
@extends('layouts.base')

@section('title','Home sito')

@section('content')
<div class="container my-5">
    <h1>Premi il pulsante per entrare nella lista dei fumetti</h1>
    <a href="{{route("comics.index")}}"><button type="button" class="btn btn-danger">Lista Fumetti</button></a>
</div>
@endsection