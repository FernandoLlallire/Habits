<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>challenges</title>
  </head>
  <body>
    {{-- enctype="multipart/form-data" esto es para que podamos pasarle como parametro una imagen al form!--}}
  <form method="post" action='{{route("challenges.save")}}' enctype="multipart/form-data">
    @csrf
    <div class="form-element">
      <label for="">Nombre: </label>
      <input type="text" name="name" value="">
      <br>
    </div>
    <div class="form-element">
      <label for=""> descripción:  </label>
      <input type="text" name="description" value="">
      <br>
    </div>
    <div class="form-element">
      <label for="">Categoria: </label>
      <select class="" name="category_id">
        @foreach ($categories as $category)
          <option value="{{$category->id}}">{{$category->name}}</option>
        @endforeach
      </select>
      <br>
    </div>
    <div class="form-element">
      <label for=""> Primer Paso:  </label>
      <input type="text" name="step_1" value="">
      <br>
    </div>
    <div class="form-element">
      <label for=""> Descripción Primer Paso:  </label>
      <input type="text" name="description_step_1" value="">
      <br>
    </div>

    <div class="form-element">
      <label for=""> Segundo Paso:  </label>
      <input type="text" name="step_2" value="">
      <br>
    </div>
    <div class="form-element">
      <label for=""> Descripción Segundo Paso:  </label>
      <input type="text" name="description_step_2" value="">
      <br>
    </div>

    <div class="form-element">
      <label for=""> Tercer Paso:  </label>
      <input type="text" name="step_3" value="">
      <br>
    </div>
    <div class="form-element">
      <label for=""> Descripción Tercer Paso:  </label>
      <input type="text" name="description_step_3" value="">
      <br>
    </div>

    <div class="form-element">
      <label for=""> Cuarto Paso:  </label>
      <input type="text" name="step_4" value="">
      <br>
    </div>
    <div class="form-element">
      <label for=""> Descripción Cuarto Paso:  </label>
      <input type="text" name="description_step_4" value="">
      <br>
    </div>

    <div class="form-element">
      <label for=""> Quinto Paso:  </label>
      <input type="text" name="step_5" value="">
      <br>
    </div>
    <div class="form-element">
      <label for=""> Descripción Quinto Paso:  </label>
      <input type="text" name="description_step_5" value="">
      <br>
    </div>
    <input type="submit" name="" value="Enviar">
  </form>
  </body>
</html>
