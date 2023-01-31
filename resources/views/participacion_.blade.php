@extends('layouts.formulario')

@section('th')
  <th><strong>TIPO PARTICIPACIÓN</strong></th>
  <th><strong>NOMBRE DE LA EMPRESA, SOCIEDAD O ASOCIACIÓN</strong></th>
  <th><strong>OPCIONES</strong></th>
@endsection


@section('tbody')
  @foreach($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][$tagsFormato->subformatos] as $clave => $fila)
  <tr>
    <td>{{ $fila['tipoParticipacion']['valor'] }}</td>
    <td>{{ $fila['nombreEmpresaSociedadAsociacion'] }}</td>
    @include('layouts.delete')
  </tr>
  @endforeach
@endsection


@section('script')
  @include('layouts.ninguno_js')
@endsection
