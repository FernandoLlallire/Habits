fetch('http://localhost:8000/apiChallengesGet')
  .then(function (response) {
    return response.json();
  })
  .then(function (data) {
    console.log(data);
    // for (let i of data) {
    //   ul.innerHTML += `<li>${i.title}</li>`;
    // }
  })
  .catch(function (error) {
    // console.log(`Error: ${error}`);
  });
  window.onload = function () {
    var contenedorChallenges = document.querySelector(".contenedorChallenges");
    contenedorChallenges += '<h5 class="card-title"> Actividad : {{$challenge->description}}</h5>'
    contenedorChallenges += '<p class="card-text"> Meta estipulada : {{$challenge->metaChallenge}}</p>'
    contenedorChallenges += '<p class="card-text"> Categoria : {{$challenge->category->name}}</p>'
    contenedorChallenges += '<p class="card-text"> Estado del Desafio : {{$challenge->points}}</p>'
    contenedorChallenges += '<div class="row">'
    contenedorChallenges += '<div class="col-sm-1"></div>'
    contenedorChallenges += '<a href="{{route('challenges.edit',$challenge->id)}}" class="btn btn-warning mr-4">Editar</a>'
    contenedorChallenges += '<form action="{{ route('challenges.delete', $challenge->id) }}" method="post" style="display: inline-block;">'
    contenedorChallenges += '@csrf'
    contenedorChallenges += '{{ method_field('DELETE') }}'
    contenedorChallenges += '<button type="submit" class="btn btn-danger mr-5">Borrar</button>'
    contenedorChallenges += '</form>'
    contenedorChallenges += '@if ($challenge->finish == 1)'
    contenedorChallenges += '<img src="{{asset('images/ok.png')}}" class="iconHabits" >'
    contenedorChallenges += '<p class="text-right d-inline-block text-success">Desafio Finalizado</p>'
    contenedorChallenges += '@endif'
    contenedorChallenges += '</div>'
  }
