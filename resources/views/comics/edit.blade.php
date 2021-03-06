@extends('layouts.base')

@section('title','Comics')

@section('content')
<h1>MODIFICA FUMETTO {{$comic->title}}</h1>
<a href="{{route("comics.index")}}"><button type="button" class="btn btn-info">Indietro</button></a>

<form action="{{route("comics.update", $comic->id)}}" method="POST">
  @csrf

  {{-- Visto che nell Edit possiamo usare solo post come method di form ci aiutiamo con la funzione di laravel
  PUT per modificare un elemento
  Nell edit i tag input devono ricevere il name e il value((attributi del fumetto che vai a modificare)--}}
  
  @method('PUT')

  <div class="form-row">
    <div class="form-group col-md-12">
      <label for="inputEmail4">Nome Fumetto</label>
      <input name="title"  value="{{$comic->title}}"   class="form-control @error('title') is-invalid @enderror" id="inputEmail4" placeholder="Email">
        @error('title')
          <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group col-md-12">
      <label for="exampleFormControlTextarea1">Descrizione fumetto</label>
      <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="exampleFormControlTextarea1" rows="3">{{$comic->description}}</textarea>
      @error('description')
          <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

  <div class="form-group col-md-12">
    <label for="inputAddress">Copertina Fumetto</label>
    <textarea name="thumb" value="{{$comic->thumb}}" type="text" class="form-control @error('thumb') is-invalid @enderror" id="inputAddress" placeholder="url copertina">{{$comic->thumb}}</textarea>
      @error('thumb')
        <div class="alert alert-danger">{{ $message }}</div>
      @enderror
  </div>

  <div class="col-md-6">
    <img src="{{$comic->thumb}}" alt="">
  </div>

  <div class="form-group">
    <label for="inputAddress2">Prezzo Fumetto</label>
    <input name="price" value="{{$comic->price}}" type="text" class="form-control @error('price') is-invalid @enderror" id="inputAddress2" placeholder="Apartment, studio, or floor">
    @error('price')
      <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  </div>

  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputState">Tipo Fumetto</label>
      <select name="type" id="inputState" class="form-control">
        <option value="comic book" {{$comic->type == "comic book"? "selected": ""}}>comic book</option>
        <option value="graphic novel" {{$comic->type == "graphic novel"? "selected": ""}}>graphic novel</option>
      </select>
    </div>

    <div class="form-group col-md-6">
      <label for="inputZip">Data d'uscita</label>
      <input name="sale_date" value="{{$comic->sale_date}}" type="text" class="form-control @error('sale_date') is-invalid @enderror" id="inputZip">
      @error('sale_date')
        <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>

    <div class="form-group col-md-6">
      <label for="inputZip">Serie</label>
      <input name="series" value="{{$comic->series}}" type="text" class="form-control @error('series') is-invalid @enderror" id="inputZip">
        @error('series')
          <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
  </div>

  <button type="submit" class="btn btn-primary">Modifica</button>
  {{-- <form action="{{route("comics.destroy", $comic->id)}}" method="POST">
    @csrf
    @method("DELETE")
    <button type="submit" class="btn btn-danger">Elimina</button>
  </form> --}}
  {{-- @if($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{$error}}</li>
      @endforeach
    </ul>
  </div>
  @endif --}}

</form>
@endsection