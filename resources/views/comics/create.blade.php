@extends('layouts.base')

@section('title','Aggiungi Fumetto')

@section('content')
{{--Creiamo il form per aggiungere un nuovo elemento fumetto al nostro DB negli input mettiamo 
  il valore name="nome della colonna sul nostro db",
  nel form mettiamo come action il percorso della nostra rotta
  come methodo POST e @csrf nel form che è una funzione
  di laravel--}}
<h1>MODIFICA FUMETTO</h1>
<a href="{{route("comics.index")}}"><button type="button" class="btn btn-info">Indietro</button></a>
<form action="{{route ("comics.store") }}" method="POST">
  @csrf
  
  <div class="form-row">
    <div class="form-group col-md-12">
      <label for="inputEmail4">Nome Fumetto</label>
      <input name="title" value="{{old("title")}}"  class="form-control" id="inputEmail4" placeholder="Nome del fumetto">
        @error('title')
          <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group col-md-12">
      <label for="exampleFormControlTextarea1">Descrizione fumetto</label>
      <textarea name="description" value="{{old("description")}}" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Descrivi il fumetto"></textarea>
      @error('description')
        <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>
  </div>

  <div class="form-group col-md-12">
    <label for="inputAddress">Copertina Fumetto</label>
    <textarea name="thumb" value="{{old("thumb")}}" type="text" class="form-control" id="inputAddress" placeholder="url copertina">{{$comic->thumb}}</textarea>
      @error('title')
        <div class="alert alert-danger">{{ $message }}</div>
      @enderror
  </div>
  <div class="form-group">
    <label for="inputAddress2">Prezzo Fumetto</label>
    <input name="price" value="{{old("price")}}" type="text" class="form-control" id="inputAddress2" placeholder="Prezzo del fumetto">
      @error('title')
        <div class="alert alert-danger">{{ $message }}</div>
      @enderror
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputState">Tipo Fumetto</label>
      <select name="type" id="inputState" class="form-control">
        <option value="" disabled selected>Seleziona Tipo</option>
        <option value="comic book">comic book</option>
        <option value="graphic novel">graphic novel</option>
      </select>
    </div>
    <div class="form-group col-md-6">
      <label for="inputZip">Data d'uscita</label>
      <input name="sale_date" value="{{old("sale_date")}}" type="date" class="form-control" id="inputZip">
        @error('title')
          <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div> 
    <div class="form-group col-md-6">
      <label for="inputZip">Serie</label>
      <input name="series" value="{{old("series")}}" type="text" class="form-control" id="inputZip">
        @error('title')
          <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Aggiungi</button>
</form>
{{-- @if($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{$error}}</li>
      @endforeach
    </ul>
  </div>
  @endif --}}
@endsection