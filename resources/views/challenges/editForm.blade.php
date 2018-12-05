@extends('layouts.app')
@section('content')

  <form method="post" action="{{route('challenges.update',$challenge->id)}}" enctype="multipart/form-data">
    @csrf
    {{ method_field('PUT') }}
    <div class="form-element">
      <label for="">Nombre: </label>
      <input type="text" name="name" value="{{ old('title', $challenge->name) }}">
      <br>
    </div>
    <div class="form-element">
      <label for=""> descripción:  </label>
      <input type="text" name="description" value="{{ old('title', $challenge->description) }}">
      <br>
    </div>
    <div class="form-element">
        <label>Categoria: </label>
        <select class="form-element" name="category_id">
          <option value="">Elegí una categoria</option>
          @foreach ($categories as $category)
            <option
              value="{{ $category->id }}"
              {{ $category->id == $challenge->category_id ? 'selected' : '' }}
            >
              {{ $category->name }}
            </option>
          @endforeach
         </select>
    </div>
    <div class="form-element">
      <label for=""> Primer Paso:  </label>
      <input type="text" name="step_1" value="{{ old('title', $challenge->step_1) }}">
      <br>
    </div>
    <div class="form-element">
      <label for=""> Descripción Primer Paso:  </label>
      <input type="text" name="description_step_1" value="{{ old('title', $challenge->description_step_1) }}">
      <br>
    </div>

    <div class="form-element">
      <label for=""> Segundo Paso:  </label>
      <input type="text" name="step_2" value="{{ old('title', $challenge->step_2) }}">
      <br>
    </div>
    <div class="form-element">
      <label for=""> Descripción Segundo Paso:  </label>
      <input type="text" name="description_step_2" value="{{ old('title', $challenge->description_step_2) }}">
      <br>
    </div>

    <div class="form-element">
      <label for=""> Tercer Paso:  </label>
      <input type="text" name="step_3" value="{{ old('title', $challenge->step_3) }}">
      <br>
    </div>
    <div class="form-element">
      <label for=""> Descripción Tercer Paso:  </label>
      <input type="text" name="description_step_3" value="{{ old('title', $challenge->description_step_3) }}">
      <br>
    </div>

    <div class="form-element">
      <label for=""> Cuarto Paso:  </label>
      <input type="text" name="step_4" value="{{ old('title', $challenge->step_4) }}">
      <br>
    </div>
    <div class="form-element">
      <label for=""> Descripción Cuarto Paso:  </label>
      <input type="text" name="description_step_4" value="{{ old('title', $challenge->description_step_4) }}">
      <br>
    </div>

    <div class="form-element">
      <label for=""> Quinto Paso:  </label>
      <input type="text" name="step_5" value="{{ old('title', $challenge->step_5) }}">
      <br>
    </div>
    <div class="form-element">
      <label for=""> Descripción Quinto Paso:  </label>
      <input type="text" name="description_step_5" value="{{ old('title', $challenge->description_step_5) }}">
      <br>
    </div>
    <input type="submit" class="btn btn-primary" value="Actualizar">
      <a href="/challenges" class="btn btn-warning">Volver</a>
  </form>



@endsection
