<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>José Sixto Verduzco</title>
</head>

</body>
<form action="{{ url('subir') }}" method="post"  enctype="multipart/form-data">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">


<input id="imagen" type="file" name="imagen" title='Seleccionar Imagen:' accept="image/*">


<button class="btn btn-info pull-right" tabindex="5" type="submit" form="validate">Siguiente</button>

</form>
</body>


</html>
