@extends('layouts.base')

@section('title','Comics')

@section('content')
<h1 class="ciao">LISTA FUMETTI</h1>
<a href="{{route("comics.create")}}"><button type="button" class="btn btn-info">Aggiungi Fumetto</button></a>
{{-- <table class="table">
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
            {{-- <td><a href="{{route("comics.show", $element->id)}}"><button type="button" class="btn btn-info">Informazioni</button></a></th>
            <td><a href="{{route("comics.edit", $element->id)}}"><button type="button" class="btn btn-success">Modifica</button></a></th>
              <form action="{{route("comics.destroy", $element->id)}}" method="POST">
                @csrf
                @method("DELETE")
                <button type="submit" class="btn btn-danger" onclick="return confirm('Sicuro di cancellarlo?')">Elimina</button>
            </form>
        </tr>
        @endforeach 
    </tbody>
  </table>--}}
  <div class="container">
    <ul class="responsive-table">
      <li class="table-header">
        {{-- <div class="col col-1">id</div> --}}
        <div class="col col-1">Nome Fumetto</div>
        <div class="col col-5">Descrizione</div>
        <div class="col col-2">image</div>
        <div class="col col-1">prezzo</div>
        <div class="col col-1">Serie</div>
        <div class="col col-1">data d'uscita</div>
        <div class="col col-1">tipo</div>
        {{-- <div class="col col-1">Modifiche</div> --}}
      </li>
      @foreach ($comics as $element)
      <li class="table-row">
        <div class="col col-1" data-label="Job Id">
          {{$element->title}}
          <form action="{{route("comics.destroy", $element->id)}}" method="POST">
            @csrf
            @method("DELETE")
            <button type="submit" class="btn btn_delete" onclick="return confirm('Sicuro di cancellarlo?')">Elimina</button>
        </form>
        </div>
        <div class="col col-5" data-label="Customer Name">{{$element->description}}</div>
        <div class="col col-2" data-label="Amount"><img class="ms_img" src="{{$element->thumb}}" alt=""></div>
        <div class="col col-1" data-label="Payment Status">{{$element->price}}</div>
        <div class="col col-1">{{$element->series}}</div>
        <div class="col col-1">{{$element->sale_date}}</div>
        <div class="col col-1 ms_flex">
          {{$element->type}}
          <a href="{{route("comics.show", $element->id)}}"><button type="button" class="btn btn_info">Informazioni</button></a>
          <a href="{{route("comics.edit", $element->id)}}"><button type="button" class="btn  btn_edit">Modifica</button></a>
        </div>
        
      </li>
      @endforeach
    </ul>
  </div>
  
@endsection
