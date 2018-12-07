@extends('layouts.app')

@section('content')
  <script src="{{ asset('js/formUser.js') }}"></script>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card Transparent">
                <div class="card-header">Nuevo Usuario</div>

                <div class="card-body">
                    <form method="POST" class="form formCreateUser" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="firstName" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                            <div class="col-md-6">
                                <input id="firstName" type="text" class="form-control{{ $errors->has('firstName') ? ' is-invalid' : '' }}" name="firstName" value="{{ old('firstName') }}"  >
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
                                <input id="lastName" type="text" class="form-control{{ $errors->has('lastName') ? ' is-invalid' : '' }}" name="lastName" value="{{ old('lastName') }}" >


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
                                <input id="userName" type="text" class="form-control{{ $errors->has('userName') ? ' is-invalid' : '' }}" name="userName" value="{{ old('userName') }}" >
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
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" >
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
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" >
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
                                <input id="password-confirm" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password_confirmation" >
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
                                <select id="country" type="text" class="selectorCountry form-control{{ $errors->has('country') ? ' is-invalid' : '' }}" name="country" value="{{ old('country') }}" >
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
<br>
@endsection
