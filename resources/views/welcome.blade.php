@extends('layouts.app')


@section('title', 'Bienvenido')
@section('content')
<section class="container-fluid">
<div class="row justify-content-center pb-4">
  <h1 class="textFontHabits brandInPage">Habits</h1>
</div>
<div class=" row  justify-content-around">
  <div class="col-md-6">
    <section class="container-fluid">
      <div class="row justify-content-center">
        <div class="">
          <p>
            Cada vez que iniciás un desafío, empezás a competir contra vos mismo y con otros que tengan tu mismo propósito.
            Cada objetivo que logres para llegar a tu meta te da puntos que te hacen subir de nivel.
            ¡Preparate para lograr lo que quieras de la manera más divertida!
          </p>
        </div>
      </div>
    </section>
    <br>
    <br>

    <section class="container ">
      <div class="row justify-content-center">
        <div class="col-8">
          <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active ">
                <img class="d-block w-100 imgCarrousel " src="{{ asset('images/food.jpg') }}" alt="First slide">
              </div>
              <div class="carousel-item ">
                <img class="d-block w-100 imgCarrousel " src="{{ asset('images/read.jpg') }}" alt="Second slide">
              </div>
              <div class="carousel-item ">
                <img class="d-block w-100 imgCarrousel " src="{{ asset('images/running.jpg') }}" alt="Third slide">
              </div>
              <div class="carousel-item ">
                <img class="d-block w-100 imgCarrousel maxSize" src="{{ asset('images/smok.jpg') }}" alt="Third slide">
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
        </div>
      </div>
      <br><br>
    </section>
  </div>
  <div class="col-md-6">
    <script src="{{ asset('js/formUser.js') }}"></script>
    <div class="container">
                <div class="card colorCardRegister">
                    {{-- <div class="card-header">Nuevo Usuario</div> --}}

                    <div class="card-body">
                        <form method="POST" class="form formCreateUser" action="{{ route('register') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label for="firstName" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                                <div class="col-md-6">
                                    <input id="firstName" type="text" class="form-control form-control-sm{{ $errors->has('firstName') ? ' is-invalid' : '' }}" name="firstName" value="{{ old('firstName') }}"  >
                                    <span class="invalid-feedback" role="alert">
                                    @if ($errors->has('firstName'))
                                            <strong>{{ $errors->first('firstName') }}</strong>
                                    @endif
                                    </span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="lastName" class="col-md-4 col-form-label text-md-right">{{ __('Apellido') }}</label>

                                <div class="col-md-6">
                                    <input id="lastName" type="text" class="form-control form-control-sm{{ $errors->has('lastName') ? ' is-invalid' : '' }}" name="lastName" value="{{ old('lastName') }}" >


                                    <span class="invalid-feedback" role="alert">
                                      @if ($errors->has('lastName'))
                                        <strong>{{ $errors->first('lastName') }}</strong>
                                      @endif
                                    </span>

                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="userName" class="col-md-4 col-form-label text-md-right">{{ __('Nombre de Usuario') }}</label>

                                <div class="col-md-6">
                                    <input id="userName" type="text" class="form-control form-control-sm{{ $errors->has('userName') ? ' is-invalid' : '' }}" name="userName" value="{{ old('userName') }}" >
                                    <span class="invalid-feedback" role="alert">
                                    @if ($errors->has('userName'))
                                            <strong>{{ $errors->first('userName') }}</strong>
                                    @endif
                                    </span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control form-control-sm{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" >
                                    <span class="invalid-feedback" role="alert">
                                    @if ($errors->has('email'))
                                            <strong>{{ $errors->first('email') }}</strong>
                                    @endif
                                    </span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control form-control-sm{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" >
                                    <span class="invalid-feedback" role="alert">
                                    @if ($errors->has('password'))
                                            <strong>{{ $errors->first('password') }}</strong>
                                    @endif
                                    </span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control form-control-sm{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password_confirmation" >
                                    <span class="invalid-feedback" role="alert">
                                    @if ($errors->has('password'))
                                            <strong>{{ $errors->first('password') }}</strong>
                                    @endif
                                    </span>
                                </div>
                            </div>

                            <div class="form-group row countryDiv">
                                <label for="country" class="col-md-4 col-form-label text-md-right">{{ __('Pais') }}</label>

                                <div class="col-md-6">
                                    <select id="country" type="text" class="selectorCountry form-control form-control-sm{{ $errors->has('country') ? ' is-invalid' : '' }}" name="country" value="{{ old('country') }}" >
                                    </select>
                                    <span class="invalid-feedback" role="alert">
                                    @if ($errors->has('country'))
                                            <strong>{{ $errors->first('country') }}</strong>
                                    @endif
                                    </span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="avatar" class="col-md-4 col-form-label text-md-right">{{ __('Avatar') }}</label>

                                <div class="col-md-6">
                                    <input id="avatar" type="file" class=" fcustom-file-input{{ $errors->has('avatar') ? ' is-invalid' : '' }}" name="avatar" >
                                    {{-- <span class="errorTxt"></span> --}}
                                    <br>
                                    <span class="invalid-feedback" role="alert">
                                    @if ($errors->has('avatar'))
                                            <strong>{{ $errors->first('avatar') }}</strong>
                                    @endif
                                    </span>
                                </div>
                            </div>
                            <div class="form-group row mb-0 justify-content-center">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Registrar
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
    </div>
  </div>
</div>
  @endsection
{{--
@section('content')
<div class="container">
    <div class="row justify-content-center">
      <p>Habits</p>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection--}}
