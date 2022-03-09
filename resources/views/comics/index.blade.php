@extends('layouts.base')

@section('title','Comics')

@section('content')
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
        </tr>
        @endforeach
      
    </tbody>
  </table>
@endsection