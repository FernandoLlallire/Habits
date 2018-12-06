@extends('layouts.app')

@section("content")
  <h1>Listado de Desafios - Total ({{$allChallenges}})</h1>
  @foreach ($challenges as $challenge)
    <ul>
      <p><b>Name: </b>{{$challenge->name}}  <b>Descripcion: </b>{{$challenge->description}}</p>

      <p><b>Categoria: </b>{{$challenge->category->name}}</p>
{{-- Recorda que aca en categoria lo que haces es llamar al metodo  de la relacion de las tablas para obtener todos los valores que tienes en sus columas!! es este caso el objeto $challenge que es heredado de modelo es quien invoca a la funcion category y de ahi obtengo el objeto de category--}}
    </ul>
    <a href="{{route('challenges.show',$challenge->id)}}" class="btn btn-info">View</a>
    {{-- <a href="{{route('challenges.delete',$challenge->id)}}" class="btn btn-danger"> Borrar</a> --}}
    {{-- <a href="{{route('challenges.edit',$challenge->id)}}" class="btn btn-info">Editar</a> --}}
  @endforeach
  {{$challenges->links()}}
  {{-- El metodo links nos permite ver las paginaciones que asignemos --}}
@endsection
