<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">

  <title>{{ config('app.name', 'Declarapat') }}</title>
  <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/favicon.png') }}">
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">
  <script src="{{ asset('vendor/global/global.min.js') }}"></script>
  <script src="{{ asset('js/excelexportjs.js') }}"></script>
</head>
<body>
  <button id='DLtoExcel' class="btn btn-danger">Descargar en excel</button>

<div id="dvjson">

<table id="tableData">
  <tr>
    <th>EJERCICIO</th>
    <th>INICIO</th>
    <th>TERMINO</th>
    <th>CATÁLOGO</th>
    <th>PUESTO</th>
    <th>PUESTO</th>
    <th>CARGO</th>
    <th>ADSCRIPCIÓN</th>
    <th>NOMBRE</th>
    <th>PRIMER APELLIDO</th>
    <th>SEGUNDO APELLIDO</th>
    <th>TIPO</th>
    <th>HIPERVÍNCULO</th>
    <th>ÁREA QUE PUBLICA</th>
    <th>VALIDACIÓN</th>
    <th>ACTUALIZACIÓN</th>
  </tr>
  <tbody>
  @foreach($transparencia as $transparencia)
  <tr>
    <td>{{ $transparencia->metadata['actualizacion']->toDateTime()->format('Y') }}</td>
    <td>{{ $inicio->toDateTime()->format('d/m/Y') }}</td>
    <td>{{ $final->toDateTime()->format('d/m/Y') }}</td>
    @isset($transparencia->declaracion['situacionPatrimonial']['datosEmpleoCargoComision']['clasificacion'])
    <td>{{ $transparencia->declaracion['situacionPatrimonial']['datosEmpleoCargoComision']['clasificacion'] }}</td>
    @else
    <td></td>
    @endisset
    <td>{{ $transparencia->declaracion['situacionPatrimonial']['datosEmpleoCargoComision']['nivelEmpleoCargoComision'] }}</td>
    <td>{{ $transparencia->declaracion['situacionPatrimonial']['datosEmpleoCargoComision']['empleoCargoComision'] }}</td>
    <td>{{ $transparencia->declaracion['situacionPatrimonial']['datosEmpleoCargoComision']['empleoCargoComision'] }}</td>
    <td>{{ $transparencia->declaracion['situacionPatrimonial']['datosEmpleoCargoComision']['areaAdscripcion'] }}</td>
    <td>{{ $transparencia->declaracion['situacionPatrimonial']['datosGenerales']['nombre'] }}</td>
    <td>{{ $transparencia->declaracion['situacionPatrimonial']['datosGenerales']['primerApellido'] }}</td>
    <td>{{ $transparencia->declaracion['situacionPatrimonial']['datosGenerales']['segundoApellido'] }}</td>
    <td>@if($transparencia->metadata['tipo'] == "INICIAL") Inicial @endif @if($transparencia->metadata['tipo'] == "MODIFICACIÓN") Modificación @endif @if($transparencia->metadata['tipo'] == "Conclusión") Conclusión @endif</td>
    <td>
      <a href="{{ url('versionPublica/'.$transparencia->id.'/pdf') }}" target="_blank">
        https://{{ $subdominio }}.declarapat.gob.mx/versionPublica/{{ $transparencia->_id }}
      </a>
    </td>
    <td>Contraloría</td>
    <td>{{ $inicio->toDateTime()->format('d/m/Y') }}</td>
    <td>{{ $final->toDateTime()->format('d/m/Y') }}</td>
  </tr>
  @endforeach
  <tbody>
</table>

<script>

	//assuming you have a json data as above
	var data = {!! $json !!}


	var $btnDLtoExcel = $('#DLtoExcel');
    $btnDLtoExcel.on('click', function () {
      	$("#dvjson").excelexportjs({
                    table_id : "dvjson"
                       , datatype: 'json'
                       , dataset: data
                       , columns: getColumns(data)
                });

    });



</script>
</div>

</body>
</html>
