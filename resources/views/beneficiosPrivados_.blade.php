@extends('layouts.formulario')

@section('th')
  <th><strong>OTORGANTE</strong></th>
  <th><strong>TIPO DE BENEFICIO</strong></th>
  <th><strong>FORMA</strong></th>
  <th><strong>MONTO VALOR</strong></th>
  <th><strong>OPCIONES</strong></th>
@endsection


@section('tbody')
  @foreach($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['beneficio'] as $clave=> $fila)
  <tr>
    <td>{{ $fila['otorgante']['nombreRazonSocial'] }}</td>
    <td>{{ $fila['tipoBeneficio']['valor'] }}</td>
    <td>{{ $fila['formaRecepcion'] }}</td>
    <td>
      @if(isset($fila['montoMensualAproximado']['valor']))
      $@money($fila['montoMensualAproximado']['valor']) {{ $fila['montoMensualAproximado']['moneda'] }}
      @else
      {{ $fila['especifiqueBeneficio'] }}
      @endif
    </td>
    @include('layouts.delete')
  </tr>
  @endforeach
@endsection


@section('script')
  @include('layouts.ninguno_js')
@endsection
