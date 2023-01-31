@extends('layouts.formulario')

@section('th')
  <th><strong>BIEN</strong></th>
  <th><strong>OPCIONES</strong></th>
@endsection


@section('tbody')
  @foreach($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][$tagsFormato->subformatos] as $clave => $fila)
  <tr>
    <td>
      @if(isset($fila['tipoBien']['inmueble']['tipoInmueble']['clave']))
      {{ $fila['tipoBien']['inmueble']['tipoInmueble']['valor'] }} /
      @if(isset($fila['tipoBien']['inmueble']['domicilioMexico']))
        {{ $fila['tipoBien']['inmueble']['domicilioMexico']['calle'] }} {{ $fila['tipoBien']['inmueble']['domicilioMexico']['codigoPostal'] }}
      @else
        {{ $fila['tipoBien']['inmueble']['domicilioExtranjero']['calle'] }} {{ $fila['tipoBien']['inmueble']['domicilioExtranjero']['codigoPostal'] }}
      @endif
      @else
      {{ $fila['tipoBien']['vehiculo']['tipo']['valor'] }} / {{ $fila['tipoBien']['vehiculo']['marca'] }} / {{ $fila['tipoBien']['vehiculo']['modelo'] }}
      @endif
    </td>
    @include('layouts.delete')
    </tr>
    @endforeach
@endsection


@section('script')
  @include('layouts.ninguno_js')
@endsection
