@extends('layouts.app')

@section('title', 'Crear Desafio')
@section('content')
  <script src="{{ asset('js/createChallenge.js') }}"></script>
    {{-- enctype="multipart/form-data" esto es para que podamos pasarle como parametro una imagen al form!--}}
  <div class="container">
      <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card Transparent boxCardHabits">
                  <div class="card-header boxCardHabits font-weight-bold">Nuevo Desafio</div>

                  <div class="card-body">
                      <form id="formChallenge" method="POST" class="form formNuevoDesafio" action="{{ route('challenges.store') }}" enctype="multipart/form-data" >
                          @csrf

                          <div class="form-group row">
                              <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre del Desafio') }}</label>

                              <div class="col-md-6">
                                  <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}"  >
                                  <span class="invalid-feedback" role="alert">
                                  @if ($errors->has('name'))
                                          <strong>{{ $errors->first('name') }}</strong>
                                  @endif
                                  </span>
                              </div>
                          </div>

                          <div class="form-group row">
                              <label for="description" class="col-md-4 col-form-label text-md-right">Actividad</label>

                              <div class="col-md-6">
                                  <input id="description" type="text" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" value="{{ old('description') }}"  >
                                  <span class="invalid-feedback" role="alert">
                                  @if ($errors->has('description'))
                                          <strong>{{ $errors->first('description') }}</strong>
                                  @endif
                                  </span>
                              </div>
                          </div>


                          <div class="form-group row countryDiv">
                              <label for="country" class="col-md-4 col-form-label text-md-right">Categoria</label>

                              <div class="col-md-6">
                                  <select id="category_id" type="text" class="form-control{{ $errors->has('category_id') ? ' is-invalid' : '' }}" name="category_id" value="{{ old('category_id') }}" >
                                    @foreach ($categories as $category)
                                      <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                  </select>
                                  <span class="invalid-feedback" role="alert">
                                  @if ($errors->has('category_id'))
                                          <strong>{{ $errors->first('category_id') }}</strong>
                                  @endif
                                  </span>
                              </div>
                          </div>

                          <div class="form-group row">
                            <label for="metaChallenge" class="col-md-4 col-form-label text-md-right">Meta </label>
                            <div class="col-md-6">
                                <input id="metaChallenge" type="text" class="form-control{{ $errors->has('metaChallenge') ? ' is-invalid' : '' }}" name="metaChallenge" value="{{ old('metaChallenge') }}" >
                                <span class="invalid-feedback" role="alert">
                                @if ($errors->has('metaChallenge'))
                                        <strong>{{ $errors->first('metaChallenge') }}</strong>
                                @endif
                                </span>
                            </div>
                          </div>

                      <div class="form-group row mb-0">

                              <div class="col-md-4 offset-md-4">
                                  <button type="submit" class="btn btn-primary mr-4">
                                      Guardar
                                  </button>
                                  <a class="btn btn-secondary" href="{{ route('user.show',Auth::user()->id) }}">
                                      Volver
                                  </a>
                              </div>

                          </div>
@endsection
