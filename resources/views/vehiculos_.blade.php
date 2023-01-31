@extends('layouts.formulario')

@section('th')
  <th><strong>TIPO DE VEHÍCULO</strong></th>
  <th><strong>MARCA</strong></th>
  <th><strong>MODELO</strong></th>
  <th><strong>OPCIONES</strong></th>
@endsection


@section('tbody')
  @foreach(
    $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][$tagsFormato->subformatos] as $clave => $fila)
  <tr>
    <td>{{ $fila['tipoVehiculo']['valor'] }}</td>
    <td>{{ $fila['marca'] }}</td>
    <td>{{ $fila['modelo'] }}</td>
    @include('layouts.delete')
  </tr>
  @endforeach
@endsection


@section('script')
  @include('layouts.ninguno_js')
@endsection
