@extends('layouts.app')
@section('content')
    {{-- enctype="multipart/form-data" esto es para que podamos pasarle como parametro una imagen al form!--}}
  <div class="container">
      <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card">
                  <div class="card-header">Nuevo Desafio</div>

                  <div class="card-body">
                      <form method="POST" class="form" action="{{ route('challenges.store') }}" enctype="multipart/form-data">
                          @csrf

                          <div class="form-group row">
                              <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

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
                              <label for="description" class="col-md-4 col-form-label text-md-right">Descripción</label>

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
                              <label for="country" class="col-md-4 col-form-label text-md-right">{{ __('Pais') }}</label>

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
                            <label for="example-number-input" class="col-md-4 col-form-label text-md-right">Primer Paso: </label>
                            <div class="col-md-6">
                                <input id="step_1" type="number" class="form-control{{ $errors->has('step_1') ? ' is-invalid' : '' }}" name="step_1" value="{{ old('step_1') }}" >
                            </div>
                          </div>

                          <div class="form-group row">
                            <label for="example-number-input" class="col-md-4 col-form-label text-md-right">Segundo Paso: </label>
                            <div class="col-md-6">
                                <input id="step_2" type="number" class="form-control{{ $errors->has('step_2') ? ' is-invalid' : '' }}" name="step_2" value="{{ old('step_2') }}" >
                            </div>
                          </div>

                          <div class="form-group row">
                            <label for="example-number-input" class="col-md-4 col-form-label text-md-right">Tercer Paso: </label>
                            <div class="col-md-6">
                                <input id="step_3" type="number" class="form-control{{ $errors->has('step_3') ? ' is-invalid' : '' }}" name="step_3" value="{{ old('step_3') }}" >
                            </div>
                          </div>

                          <div class="form-group row">
                            <label for="example-number-input" class="col-md-4 col-form-label text-md-right">Cuarto Paso: </label>
                            <div class="col-md-6">
                                <input id="step_4" type="number" class="form-control{{ $errors->has('step_4') ? ' is-invalid' : '' }}" name="step_4" value="{{ old('step_4') }}" >
                            </div>
                          </div>

                          <div class="form-group row">
                            <label for="example-number-input" class="col-md-4 col-form-label text-md-right">Quinto Paso: </label>
                            <div class="col-md-6">
                                <input id="step_5" type="number" class="form-control{{ $errors->has('step_5') ? ' is-invalid' : '' }}" name="step_5" value="{{ old('step_5') }}" >
                            </div>
                          </div>
@endsection
