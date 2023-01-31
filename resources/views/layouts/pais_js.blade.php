$("#pais").ready(pais);
$("#pais").change(pais);

function pais()
{
  var paisValue = $("#pais").val();

  if(paisValue == "MX")
  {
    $('#div_entidadFederativa').show();
    $('#entidadFederativa').attr("required","required");
  }
  else if(paisValue == "")
  {
    $('#pais').val("MX");
    $('#entidadFederativa').attr("required","required");
  }
  else
  {
    $('#div_entidadFederativa').hide();
    $('#entidadFederativa').removeAttr("required");
  }
}

@if(old('pais'))
  $('#pais').val("{{ old('pais') }}");
  $('#entidadFederativa').val("{{ old('entidadFederativa') }}");
@elseif(isset(Route::current()->parameters()['array']))
  @if(Route::current()->parameters()['formatoSlug'] == "prestamoComodato")
    $('#pais').val("{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['tipoBien']['vehiculo']['lugarRegistro']['pais'] }}");
    $('#entidadFederativa').val("{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['tipoBien']['vehiculo']['lugarRegistro']['entidadFederativa']['clave'] }}");
  @else
    @isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['ubicacion']['pais']))
    $('#pais').val("{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['ubicacion']['pais'] }}");
    @endisset
    @isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['ubicacion']['entidadFederativa']['clave'])
    $('#entidadFederativa').val("{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['ubicacion']['entidadFederativa']['clave'] }}");
    @endisset
  @endif
@endif
