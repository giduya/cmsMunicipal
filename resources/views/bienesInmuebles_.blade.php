@extends('layouts.formulario')

@section('th')
  <th><strong>TIPO INMUEBLE</strong></th>
  <th><strong>DOMICILIO</strong></th>
  <th><strong>OPCIONES</strong></th>
@endsection


@section('tbody')
  @foreach($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['bienInmueble'] as $clave => $fila)
  <tr>
    <td>{{ $fila['tipoInmueble']['valor'] }}</td>
    <td>
      @isset($fila['domicilioMexico'])
        {{ $fila['domicilioMexico']['calle'] }} {{ $fila['domicilioMexico']['codigoPostal'] }}
      @else
        {{ $fila['domicilioExtranjero']['calle'] }} {{ $fila['domicilioExtranjero']['codigoPostal'] }}
      @endif
    </td>
    @include('layouts.delete')
  </tr>
  @endforeach
@endsection


@section('script')
  @include('layouts.ninguno_js')
@endsection
