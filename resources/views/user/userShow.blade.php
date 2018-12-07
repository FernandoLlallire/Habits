@extends('layouts.app')

@section('content')
  @php
    dd($user->challenges);
  @endphp
  <div class="row justify-content-center">
    <div class="col-sm-8 "><h1>Bienvenido {{$user->firstName}}</h1></div>
  </div>
  <div class="row justify-content-center">
    <div class="col-sm-8 "> <p>Este es tu perfil desde aca  vas a poder ver todos tus desafios</p> </div>
  </div>
  <div class="row justify-content-center">
    <a href="{{route('challenges.create')}}" class="btn btn-info">Crear Nuevo Desafio</a>
  </div>

@endsection
