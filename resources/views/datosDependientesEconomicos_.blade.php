@extends('layouts.formulario')

@section('th')
<th><strong>NOMBRE</strong></th>
<th><strong>PRIMER APELLIDO</strong></th>
<th><strong>SEGUNDO APELLIDO</strong></th>
<th><strong>OPCIONES</strong></th>
@endsection


@section('tbody')
  @foreach($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['dependienteEconomico'] as $clave => $fila)
  <tr>
    <td>{{ $fila['nombre'] }}</td>
    <td>{{ $fila['primerApellido'] }}</td>
    <td>{{ $fila['segundoApellido'] }}</td>
    @include('layouts.delete')
  </tr>
  @endforeach
@endsection


@section('script')
  @include('layouts.ninguno_js')
@endsection
