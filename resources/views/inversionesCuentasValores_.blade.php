@extends('layouts.formulario')

@section('th')
    <th><strong>TITULAR</strong></th>
    <th><strong>TIPO INVERSIÓN</strong></th>
    <th><strong>SUBTIPO INVERSIÓN</strong></th>
    <th><strong>SUBTIPO INVERSIÓN</strong></th>
    <th><strong>OPCIONES</strong></th>
@endsection


@section('tbody')
  @foreach($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][$tagsFormato->subformatos] as $clave => $fila)
  <tr>
    <td>
      @foreach($fila['titular'] as $titular)
        {{ $titular['valor'] }}
      @endforeach
    </td>
    <td>{{ $fila['tipoInversion']['valor'] }}</td>
    <td>{{ $fila['subTipoInversion']['valor'] }}</td>
    <td>{{ $fila['localizacionInversion']['institucionRazonSocial'] }}</th>
    @include('layouts.delete')
  </tr>
  @endforeach
@endsection
