@extends('layouts.formulario')

@section('formulario')
  @include('layouts.datosEmpleo_html')
@endsection


@section('script')

  $('#send').attr("tabindex","24");

  @include('layouts.domicilio_js')

  @if(old('oficinaLada'))
    $("#oficinaLada").val("{{ old('oficinaLada') }}");
  @elseif(isset(Route::current()->parameters()['subformatoSlug']))
    @isset(Route::current()->parameters()['array'])
      $("#oficinaLada").val("{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['telefonoOficina']['lada'] }}");
    @else
      $("#oficinaLada").val("52");
    @endisset
  @endif
@endsection
