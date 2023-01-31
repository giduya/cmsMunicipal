@extends('layouts.formulario')

@section('th')
  <th><strong>CLIENTE</strong></th>
  <th><strong>NOMBRE EMPRESA / SERVICIO</strong></th>
  <th><strong>GANANCIA</strong></th>
  <th><strong>OPCIONES</strong></th>
@endsection


@section('tbody')
  @foreach($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['cliente'] as $clave => $fila)
  <tr>
    <td>{{ $fila['clientePrincipal']['nombreRazonSocial'] }}</td>
    <td>{{ $fila['empresa']['nombreEmpresaServicio'] }}</td>
    <td>$@money($fila['montoAproximadoGanancia']['valor']) {{ $fila['montoAproximadoGanancia']['moneda'] }}</td>
    @include('layouts.delete')
  </tr>
  @endforeach
@endsection


@section('script')

  @include('layouts.ninguno_js')

@endsection
