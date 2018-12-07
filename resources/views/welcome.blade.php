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

    <link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styleFer.css') }}" rel="stylesheet">
    @if (Auth::user()->theme)
      <link href="{{ asset('css/theme-' . Auth::user()->theme . '.css') }}" rel="stylesheet">
    @endif
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel" style="background: transparent;">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                  Habits
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">Logear</a>
                            </li>
                            <li class="nav-item">
                                @if (Route::has('register'))
                                    <a class="nav-link" href="{{ route('register') }}">Registrar</a>
                                @endif
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->firstName }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
          <section class="p-0" id="portfolio">
            <div class="container-fluid p-0">
              <div class="row no-gutters popup-gallery">
                <div class="col-lg-4 col-sm-6">
                  <a class="portfolio-box" href="../../public/images/food.jpg">
                    <img class="img-fluid" src="../../public/images/food.jpg" alt="">
                    <div class="portfolio-box-caption">
                      <div class="portfolio-box-caption-content">
                        <div class="project-category text-faded">
                          Category
                        </div>
                        <div class="project-name">
                          Project Name
                        </div>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                  <a class="portfolio-box" href="img/portfolio/fullsize/2.jpg">
                    <img class="img-fluid" src="img/portfolio/thumbnails/2.jpg" alt="">
                    <div class="portfolio-box-caption">
                      <div class="portfolio-box-caption-content">
                        <div class="project-category text-faded">
                          Category
                        </div>
                        <div class="project-name">
                          Project Name
                        </div>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                  <a class="portfolio-box" href="img/portfolio/fullsize/3.jpg">
                    <img class="img-fluid" src="img/portfolio/thumbnails/3.jpg" alt="">
                    <div class="portfolio-box-caption">
                      <div class="portfolio-box-caption-content">
                        <div class="project-category text-faded">
                          Category
                        </div>
                        <div class="project-name">
                          Project Name
                        </div>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                  <a class="portfolio-box" href="img/portfolio/fullsize/4.jpg">
                    <img class="img-fluid" src="img/portfolio/thumbnails/4.jpg" alt="">
                    <div class="portfolio-box-caption">
                      <div class="portfolio-box-caption-content">
                        <div class="project-category text-faded">
                          Category
                        </div>
                        <div class="project-name">
                          Project Name
                        </div>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                  <a class="portfolio-box" href="img/portfolio/fullsize/5.jpg">
                    <img class="img-fluid" src="img/portfolio/thumbnails/5.jpg" alt="">
                    <div class="portfolio-box-caption">
                      <div class="portfolio-box-caption-content">
                        <div class="project-category text-faded">
                          Category
                        </div>
                        <div class="project-name">
                          Project Name
                        </div>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                  <a class="portfolio-box" href="img/portfolio/fullsize/6.jpg">
                    <img class="img-fluid" src="img/portfolio/thumbnails/6.jpg" alt="">
                    <div class="portfolio-box-caption">
                      <div class="portfolio-box-caption-content">
                        <div class="project-category text-faded">
                          Category
                        </div>
                        <div class="project-name">
                          Project Name
                        </div>
                      </div>
                    </div>
                  </a>
                </div>
              </div>
            </div>
          </section>
            @yield('content')
        </main>
    </div>



</body>
</html>
