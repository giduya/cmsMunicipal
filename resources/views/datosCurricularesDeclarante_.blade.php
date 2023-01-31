@extends('layouts.formulario')

@section('th')
<th><strong>NIVEL</strong></th>
<th><strong>INSTITUCIÓN</strong></th>
<th><strong>ESTATUS</strong></th>
<th><strong>OPCIONES</strong></th>
@endsection

@section('tbody')

  @foreach($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][$tagsFormato->subformatos] as $clave => $fila)
  <tr>
    <td>{{ $fila['nivel']['valor'] }}</td>
    <td>{{ $fila['institucionEducativa']['nombre'] }}</td>
    <td>{{ $fila['estatus'] }}</td>
    @include('layouts.delete')
  </tr>
  @endforeach

@endsection
