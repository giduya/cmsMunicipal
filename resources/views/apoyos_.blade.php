@extends('layouts.formulario')

@section('th')
    <th><strong>BENEFICIARIO</strong></th>
    <th><strong>NOMBRE DEL PROGRAMA</strong></th>
    <th><strong>FORMA RECEPCIÓN</strong></th>
    <th><strong>OPCIONES</strong></th>
@endsection


@section('tbody')
  @foreach($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][$tagsFormato->subformatos] as $clave => $fila)
  <tr>
    <td>{{ $fila['beneficiarioPrograma']['valor'] }}</td>
    <td>{{ $fila['nombrePrograma'] }}</td>
    <td>{{ $fila['formaRecepcion'] }}</td>
    @include('layouts.delete')
  </tr>
  @endforeach
@endsection


@section('script')
  @include('layouts.ninguno_js')
@endsection
