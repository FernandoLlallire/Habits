@extends('layouts.app')



@section('content')
<section class="container">
<div class="row justify-content-center">
  <h1 class="textFontHabits brandInPage">Habits</h1>
</div>
<section class="container">
  <div class="row">
    <div class="col-sm">
    </div>
    <div class="col-sm-8">
      <p>Cada vez que iniciás un desafío, empezás a competir contra vos mismo y con otros que tengan tu mismo propósito.
      Cada objetivo que logres para llegar a tu meta te da puntos que te hacen subir de nivel.
      ¡Preparate para lograr lo que quieras de la manera más divertida!</p>
    </div>
    <div class="col-sm">
    </div>
  </div>
</section>
  <br>
  <br>

<section class="container">
  <div class="row">
    <div class="col-2">
    </div>
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

</section>
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
