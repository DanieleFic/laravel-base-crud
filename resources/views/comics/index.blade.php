@extends('layouts.base')

@section('title','Comics')

@section('content')
<h1>LISTA FUMETTI</h1>
<a href="{{route("comics.create")}}"><button type="button" class="btn btn-info">Aggiungi Fumetto</button></a>
<table class="table">
    <thead>
      <tr>
        <th scope="col">id</th>
        <th scope="col">Nome Fumetto</th>
        <th scope="col">Descrizione</th>
        <th scope="col">image</th>
        <th scope="col">prezzo</th>
        <th scope="col">Serie</th>
        <th scope="col">data d'uscita</th>
        <th scope="col">tipo</th>
        <th scope="col">Modifiche</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($comics as $element)
        <tr>
            <th scope="row">{{$element->id}}</th>
            <td>{{$element->title}}</th>
            <td>{{$element->description}}</th>
            <td> <img src="{{$element->thumb}}" alt=""></th>
            <td>{{$element->price}}</th>
            <td>{{$element->series}}</th>
            <td>{{$element->sale_date}}</th>
            <td>{{$element->type}}</th>
            {{-- facciamo un bottone con il route comics.show che si trova nel nostro controllore  --}}
            {{-- <td><button href="{{route("comics.show", $element->id)}}" type="button" class="btn btn-info"></button></th> --}}
            <td><a href="{{route("comics.show", $element->id)}}"><button type="button" class="btn btn-info">Informazioni</button></a></th>
              <td><a href="{{route("comics.edit", $element->id)}}"><button type="button" class="btn btn-success">Modifica</button></a></th>
                <td><a href="{{route("comics.show", $element->id)}}"><button type="button" class="btn btn-Danger">Cancella</button></a></th>
        </tr>
        @endforeach
      
    </tbody>
  </table>
@endsection