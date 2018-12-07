@extends('layouts.app')

@section('content')
  <script src="{{ asset('js/editUser.js') }}"></script>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edicion de Usuario</div>

                <div class="card-body">
                    <form method="POST" class="form" action="{{ route('user.update',Auth::user()->id) }}" enctype="multipart/form-data">
                        @csrf
                        {{ method_field('PUT')}}
                        <div class="form-group row">
                            <label for="firstName" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                            <div class="col-md-6">
                                <input id="firstName" type="text" class="form-control{{ $errors->has('firstName') ? ' is-invalid' : '' }}" name="firstName" value="{{ old('firstName',$user->firstName) }}"  >
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
                                <input id="lastName" type="text" class="form-control{{ $errors->has('lastName') ? ' is-invalid' : '' }}" name="lastName" value="{{ old('lastName',$user->lastName) }}" >


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
                                <input id="userName" type="text" class="form-control{{ $errors->has('userName') ? ' is-invalid' : '' }}" name="userName" value="{{ old('userName',$user->userName) }}" >
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
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email',$user->email) }}" >
                                <span class="invalid-feedback" role="alert">
                                @if ($errors->has('email'))
                                        <strong>{{ $errors->first('email') }}</strong>
                                @endif
                                </span>
                            </div>
                        </div>

                        <div class="form-group row countryDiv">
                            <label for="country" class="col-md-4 col-form-label text-md-right">{{ __('Pais') }}</label>

                            <div class="col-md-6">
                                <select id="country" type="text" class="selectorCountry form-control{{ $errors->has('country') ? ' is-invalid' : '' }}" name="country" value="{{ old('country',$user->country."|".$user->province) }}" >
                                </select>
                                <span class="invalid-feedback" role="alert">
                                @if ($errors->has('country'))
                                        <strong>{{ $errors->first('country') }}</strong>
                                @endif
                                </span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="theme" class="col-md-4 col-form-label text-md-right">Tema</label>

                            <div class="col-md-6">
                                <select id="theme" type="text" class="form-control{{ $errors->has('theme') ? ' is-invalid' : '' }}" name="theme" >
                                  <option value="">Default</option>
                                  <option value="Dark">Dark</option>
                                  <option value="Light">Light</option>
                                  <option value="Pink">Pink</option>
                                </select>
                                <span class="invalid-feedback" role="alert">
                                @if ($errors->has('theme'))
                                        <strong>{{ $errors->first('theme') }}</strong>
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
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Actualizar
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
