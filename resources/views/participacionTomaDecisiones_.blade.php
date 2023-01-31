@extends('layouts.formulario')

@section('th')
  <th><strong>TIPO INSTITUCIÓN</strong></th>
  <th><strong>NOMBRE DE LA INSTITUCIÓN</strong></th>
  <th><strong>OPCIONES</strong></th>
@endsection


@section('tbody')
  @foreach($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][$tagsFormato->subformatos] as $clave => $fila)
  <tr>
    <td>{{ $fila['tipoInstitucion']['valor'] }}</td>
    <td>{{ $fila['nombreInstitucion'] }}</td>
    @include('layouts.delete')
  </tr>
  @endforeach
@endsection


@section('script')
  @include('layouts.ninguno_js')
@endsection
