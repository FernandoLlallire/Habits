<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <link href="https://fonts.googleapis.com/css?family=Dancing+Script" rel="stylesheet">
{{-- <link href="{{ asset('css/all.min.css') }}" rel="stylesheet">
<link href="{{ asset('css/simple-line-icons.css') }}" rel="stylesheet"> --}}
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/habitsStyle.css') }}" rel="stylesheet">
    @if (Auth::user())
      @if (Auth::user()->theme === "dark")
        <link href="{{ asset('css/theme-'. Auth::user()->theme. '.css') }}" rel="stylesheet">
      @endif
      @if (Auth::user()->theme === "light")
        <link href="{{ asset('css/theme-'. Auth::user()->theme. '.css') }}" rel="stylesheet">
      @endif
      @if (Auth::user()->theme === "pink")
        <link href="{{ asset('css/theme-'. Auth::user()->theme. '.css') }}" rel="stylesheet">
      @endif
    @endif
    {{-- @if (Auth::user()->theme === "light")
      <link href="{{ asset('css/theme- Auth::user()->theme .css') }}" rel="stylesheet">
    @endif
    @if (Auth::user()->theme === "pink")
      <link href="{{ asset('css/theme-{{ Auth::user()->theme }}.css') }}" rel="stylesheet">
    @endif
</head> --}}
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel Transparent colorWhite">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <span class="navbarTextSize colorWhite textFontHabits">Habits</span>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto colorWhite">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link colorWhite" href="{{ route('login') }}">Logear</a>
                            </li>
                            <li class="nav-item">
                                @if (Route::has('register'))
                                    <a class="nav-link colorWhite" href="{{ route('register') }}">Registrar</a>
                                @endif
                            </li>
                        @else

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle colorWhite" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->firstName }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                  <a class="dropdown-item" href="{{ route('user.show',Auth::user()->id) }}">
                                      Perfil
                                  </a>
                                  <a class="dropdown-item" href="{{ route('user.edit',Auth::user()->id) }}">
                                      Editar Usuario
                                  </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                              <img src="{{asset('storage/avatars/'.Auth::user()->avatar) }}" alt="" class="rounded-circle sizeImgHabits">
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
        <br><br>
        <footer class="footer transparent col-lg-12">
          <div class="container">
            <div class="col-lg-6 h-100 text-center text-lg-right my-auto">
              <ul class="list-inline mb-0">
                <li class="list-inline-item mr-3">
                  <a href="#">
                    <i class="fab fa-facebook fa-2x fa-fw"></i>
                  </a>
                </li>
                <li class="list-inline-item mr-3">
                  <a href="#">
                    <i class="fab fa-twitter-square fa-2x fa-fw"></i>
                  </a>
                </li>
                <li class="list-inline-item">
                  <a href="#">
                    <i class="fab fa-instagram fa-2x fa-fw"></i>
                  </a>
                </li>
              </ul>
            </div>
            <div class="row">
              <div class="col-lg-4">
              </div>
              <div class="col-lg-6 h-100 text-center text-lg-left my-auto">
                <p class="text-muted small mb-4 mb-lg-0">&copy; Habits - Fernando Llallire 2018 - All Rights Reserved.</p>
              </div>
            </div>
          </div>
        </footer>
    </div>
</body>
</html>
