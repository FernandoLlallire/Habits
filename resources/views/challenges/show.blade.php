@extends ("layouts.app")

@section('content')

    @if ( session('errorDeleted') )
  		<div class="alert alert-danger">
  		  {{ session('errorDeleted') }}
  		</div>
  	@endif
  <ul>
    <p><b>Name: </b>{{$challenge->name}} <b>Descripcion: </b>{{$challenge->description}} </p>
    <p><b>Primer Paso: </b>{{$challenge->step_1}}  <b>Descripcion: </b>{{$challenge->description_step_1}}</p>
    <p><b>Primer Paso: </b>{{$challenge->step_2}}  <b>Descripcion: </b>{{$challenge->description_step_2}}</p>
    <p><b>Primer Paso: </b>{{$challenge->step_3}}  <b>Descripcion: </b>{{$challenge->description_step_3}}</p>
    <p><b>Primer Paso: </b>{{$challenge->step_4}}  <b>Descripcion: </b>{{$challenge->description_step_4}}</p>
    <p><b>Primer Paso: </b>{{$challenge->step_5}}  <b>Descripcion: </b>{{$challenge->description_step_5}}</p>
    <p><b>Categoria: </b>{{$challenge->category->name}} <b>Puntos: </b>{{$challenge->points}}</p>
  </ul>
  <form action="{{ route('challenges.delete', $challenge->id) }}" method="post" style="display: inline-block;">
    @csrf
    {{ method_field('DELETE') }}
    <button type="submit" class="btn btn-danger">Borrar</button>
  </form>
  <a href="{{route('challenges.edit',$challenge->id)}}" class="btn btn-info">Editar</a>
  <a href="{{route('challenges.index',$challenge->id)}}" class="btn btn-secondary">Atras</a>
@endsection
