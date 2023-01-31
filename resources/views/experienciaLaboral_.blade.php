@extends('layouts.formulario')

@section('th')
  <th><strong>ÁMBITO</strong></th>
  <th><strong>ENTE PÚBLICO / EMPRESA, ASOCIACIÓN</strong></th>
  <th><strong>EMPLEO O CARGO</strong></th>
  <th><strong>OPCIONES</strong></th>
@endsection


@section('tbody')
  @foreach($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][$tagsFormato->subformatos] as $clave => $fila)
    <tr>
      <td>{{ $fila['ambitoSector']['valor'] }}</td>
      <td>@if(isset($fila['nombreEntePublico'])) {{ $fila['nombreEntePublico'] }} @else {{ $fila['nombreEmpresaSociedadAsociacion'] }} @endif</td>
      <td>@if(isset($fila['empleoCargoComision'])) {{ $fila['empleoCargoComision'] }} @else {{ $fila['puesto'] }} @endif</td>
      @include('layouts.delete')
    </tr>
  @endforeach
@endsection


@section('script')
  @include('layouts.ninguno_js')
@endsection
