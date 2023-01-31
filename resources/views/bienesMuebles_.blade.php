@extends('layouts.formulario')

@section('th')
  <th><strong>TIPO DEL BIEN</strong></th>
  <th><strong>DESCRIPCIÓN DEL BIEN</strong></th>
  <th><strong>OPCIONES</strong></th>
@endsection


@section('tbody')
  @foreach($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][$tagsFormato->subformatos] as $clave => $fila)
  <tr>
    <td>{{ $fila['tipoBien']['valor'] }}</td>
    <td>{{ $fila['descripcionGeneralBien'] }}</td>
    @include('layouts.delete')
  </tr>
  @endforeach
@endsection


@section('script')
  @include('layouts.ninguno_js')
@endsection
