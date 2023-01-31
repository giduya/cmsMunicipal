@extends('layouts.formulario')

@section('th')
  <th><strong>TIPO DE FIDEICOMISO</strong></th>
  <th><strong>TIPO DE PARTICIPACIÓN</strong></th>
  <th><strong>RELACIÓN</strong></th>
  <th><strong>OPCIONES</strong></th>
@endsection


@section('tbody')
  @foreach($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][$tagsFormato->subformatos] as $clave => $fila)
  <tr>
    <td>{{ $fila['tipoFideicomiso'] }}</td>
    <td>{{ $fila['tipoParticipacion'] }}</td>
    <td>{{ $fila['tipoRelacion'] }}</td>
    @include('layouts.delete')
  </tr>
  @endforeach
@endsection


@section('script')
  @include('layouts.ninguno_js')
@endsection
