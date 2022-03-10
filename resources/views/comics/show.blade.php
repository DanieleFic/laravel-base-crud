@extends('layouts.base')

@section('title','Show Comics')

@section('content')
  <div>
      <h1>FUMETTO</h1>
      <h3>Titolo fumetto</h3>
      <h1>{{$comic->title}}</h1>
      <h3>Descrizione</h3>
      <p>{{$comic->description}}</p>
      <h3>Copertina</h3>
      <img src="{{$comic->thumb}}" alt="">
      <h3>Prezzo del fumetto</h3>
      <p>{{$comic->price}}</p>
      <h3>Serie del fumetto</h3>
      <p>{{$comic->series}}</p>
      <h3>Data d'uscita</h3>
      <p>{{$comic->sale_date}}</p>
      <h3>Tipo di fumetto</h3>
      <p>{{$comic->type}}</p>
      {{-- facciamo un bottone con il route comics.show che si trova nel nostro controllore  --}}
      <a href="{{route("comics.index")}}"><button type="button" class="btn btn-info">Indietro</button></a>
  </div>     
@endsection