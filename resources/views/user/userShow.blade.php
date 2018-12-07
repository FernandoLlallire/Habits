@extends('layouts.app')

@section('content')
  {{-- @php
     dd($user->challenges[0]->name);
  @endphp --}}
  <div class="row justify-content-center">
    <div class="col-sm-8 "><h1>Bienvenido {{$user->firstName}}</h1></div>
  </div>
  <div class="row justify-content-center">
    <div class="col-sm-8 "> <p>Este es tu perfil desde aca  vas a poder ver todos tus desafios</p> </div>
  </div>
  <div class="row justify-content-center">
    <a href="{{route('challenges.create')}}" class="btn btn-info">Crear Nuevo Desafio</a>
  </div>
<br><br>
{{-- <div class="row justify-content-center ">

  <div class="card Transparent col-sm-8" >
      <div class="card-header">{{$user->challenges[0]->name}}</div>
  <div class="card-body ">
<div class="row justify-content-center">
  <div class=""> <p>{{$user->challenges[0]->description}}</p> </div>
</div>
</div>
</div>
</div> --}}
@if ($challenges)
  @foreach ($challenges as $challenge)
    <div class="row justify-content-center">
      <div class="col-sm-6">
        <div class="card bg-transparent boxCardHabits">
          <div class="card-header boxCardHabits font-weight-bold">
            {{$challenge->name}}
          </div>
          <div class="card-body">
            <h5 class="card-title">{{$challenge->description}}</h5>
            <p class="card-text">{{$challenge->metaChallenge}}</p>
            <p class="card-text">provando el tema de la cateogria {{$challenge->category->name}}</p>
            <a href="{{route('challenges.edit',$challenge->id)}}" class="btn btn-warning">Editar</a>
            <form action="{{ route('challenges.delete', $challenge->id) }}" method="post" style="display: inline-block;">
              @csrf
              {{ method_field('DELETE') }}
              <button type="submit" class="btn btn-danger">Borrar</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <br>
  @endforeach
  <div class="row justify-content-center">
    {{$challenges->links()}}
  </div>

@endif


@endsection
