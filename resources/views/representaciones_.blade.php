@extends('layouts.formulario')

@section('th')
  <th><strong>PERSONA RELACIONADA</strong></th>
    <th><strong>TIPO REPRESENTACIÓN</strong></th>
    <th><strong>NOMBRE O RAZÓN SOCIAL</strong></th>
    <th><strong>OPCIONES</strong></th>
@endsection


@section('tbody')
  @foreach($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][$tagsFormato->subformatos] as $clave => $fila)
  <tr>
    <td>{{ $fila['tipoRelacion'] }}</td>
    <td>{{ $fila['tipoRepresentacion'] }}</td>
    <td>{{ $fila['nombreRazonSocial'] }}</td>
    @include('layouts.delete')
  </tr>
  @endforeach
@endsection


@section('script')
  @include('layouts.ninguno_js')
@endsection
