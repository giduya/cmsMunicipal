@extends('layouts.formulario')

@section('th')
  <th><strong>MONTO ORIGINAL ADEUDO</strong></th>
  <th><strong>TIPO ADEUDO</strong></th>
  <th><strong>OTORGANTE DEL CRÉDITO</strong></th>
  <th><strong>OPCIONES</strong></th>
@endsection


@section('tbody')
  @foreach($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][$tagsFormato->subformatos] as $clave => $fila)
  <tr>
    <td>$@money($fila['montoOriginal']['valor'])</td>
    <td>{{ $fila['tipoAdeudo']['valor'] }}</td>
    <td>{{ $fila['otorganteCredito']['nombreInstitucion'] }}</td>
    @include('layouts.delete')
  </tr>
  @endforeach
@endsection


@section('script')
  @include('layouts.ninguno_js')
@endsection
