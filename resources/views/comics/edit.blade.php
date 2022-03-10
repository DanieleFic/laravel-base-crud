@extends('layouts.base')

@section('title','Comics')

@section('content')
<h1>MODIFICA FUMETTO</h1>
<form method="POST">
  @csrf
  @method('PUT')
  <div class="form-row">
    <div class="form-group col-md-12">
      <label for="inputEmail4">Nome Fumetto</label>
      <input value="{{$comic->title}}"  class="form-control" id="inputEmail4" placeholder="Email">
    </div>
    <div class="form-group col-md-12">
      <label for="exampleFormControlTextarea1">Descrizione fumetto</label>
      <textarea class="form-control" id="exampleFormControlTextarea1" rows="3">{{$comic->description}}</textarea>
    </div>
  </div>
  <div class="form-group col-md-12">
    <label for="inputAddress">Copertina Fumetto</label>
    <textarea value="{{$comic->thumb}}" type="text" class="form-control" id="inputAddress" placeholder="url copertina">{{$comic->thumb}}</textarea>
  </div>
  <div class="col-md-6">
    <img src="{{$comic->thumb}}" alt="">
  </div>
  <div class="form-group">
    <label for="inputAddress2">Prezzo Fumetto</label>
    <input value="{{$comic->price}}" type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputState">Tipo Fumetto</label>
      <select id="inputState" class="form-control">
        <option value="comic book" {{$comic->type == "comic book"? "selected": ""}}>comic book</option>
        <option value="graphic novel" {{$comic->type == "graphic novel"? "selected": ""}}>graphic novel</option>
      </select>
    </div>
    <div class="form-group col-md-6">
      <label for="inputZip">Data d'uscita</label>
      <input value="{{$comic->sale_date}}" type="text" class="form-control" id="inputZip">
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Sign in</button>
</form>
@endsection