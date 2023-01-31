@extends('layouts.formulario')



@section('formulario')

  @if($declaracion->metadata['tipo'] != "MODIFICACIÓN")
    @include('layouts.datosEmpleo_html')
  @else

    @section('formularioTabla')
      @include('layouts.datosEmpleo_html')
      <p>&nbsp;</p>
    @endsection

    @section('th')
    <th><strong>EMPLEO</strong></th>
    <th><strong>INSTITUCIÓN</strong></th>
    <th><strong>AREA</strong></th>
    <th><strong>OPCIONES</strong></th>
    @endsection

    @section('tbody')
    @foreach($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][$tagsFormato->subformatos] as $clave => $fila)
    <tr>
      <td>{{ $fila['empleoCargoComision'] }}</td>
      <td>{{ $fila['nombreEntePublico'] }}</td>
      <td>{{ $fila['areaAdscripcion'] }}</td>
      @include('layouts.delete')
    </tr>
    @endforeach
  @endsection

  @endif

@endsection



@section('script')

  $('#nombreInstitucion').val("{{ $config->municipio }}");
  $('#nombreInstitucion').attr("readonly","readonly");

  $('#nivelOrdenGobierno').val("{{ $config->nivelOrdenGobierno }}");
  $('#nivelOrdenGobierno').on('change', function() {
    $('#nivelOrdenGobierno').val("{{ $config->nivelOrdenGobierno }}");
  });

  $('#ambitoPublico').val("{{ $config->ambitoPublico }}");
  $('#ambitoPublico').on('change', function() {
    $('#ambitoPublico').val("{{ $config->ambitoPublico }}");
  });

  $('#areaAdscripcion').focus();
  $('#aclaracionesObservaciones').attr("tabindex","23");
  $('#send').attr("tabindex","24");

  @include('layouts.domicilio_js')
  @include('layouts.ninguno_js')

  @if(old('oficinaLada'))
    $("#oficinaLada").val("{{ old('oficinaLada') }}");
  @else
    $("#oficinaLada").val("{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['telefonoOficina']['lada'] }}");
  @endif
@endsection
