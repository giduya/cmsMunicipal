@extends('layouts.formulario')

@section('formulario')
                  <fieldset>
                    <legend><h4 class="mb-3">¿Dónde radicas actualmente?:</h4></legend>
                    @include('layouts.domicilio_html')
                  </fieldset>
@endsection





@section('script')
  @include('layouts.domicilio_js')

  $("#pais").ready(function() {
      focus($("#pais").val());
  });

  function focus(focus)
  {
    if(focus == "MX")
    {
      $("#entidadFederativa").focus();
    }
    else
    {
      $("#estadoProvincia").focus();
    }
  }

  $("#aclaracionesObservaciones").attr("tabindex",10);
  $("#send").attr("tabindex",11);
@endsection
