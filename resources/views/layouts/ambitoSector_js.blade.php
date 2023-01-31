@if(isset(Route::current()->parameters()['array']))
  @empty(old())
    @isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['actividadLaboralSectorPrivadoOtro']['salarioMensualNeto']['moneda'])
      $('#montoMoneda').val("{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['actividadLaboralSectorPrivadoOtro']['salarioMensualNeto']['moneda'] }}");
    @endisset
    @isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['actividadLaboralSectorPublico']['salarioMensualNeto']['moneda'])
      $('#montoMoneda').val("{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['actividadLaboralSectorPublico']['salarioMensualNeto']['moneda'] }}");
    @endisset
  @endempty
@else
  @empty(old())
    @isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['actividadLaboralSectorPrivadoOtro']['salarioMensualNeto']['moneda'])
      $('#montoMoneda').val("{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['actividadLaboralSectorPrivadoOtro']['salarioMensualNeto']['moneda'] }}");
    @endisset
    @isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['actividadLaboralSectorPublico']['salarioMensualNeto']['moneda'])
      $('#montoMoneda').val("{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['actividadLaboralSectorPublico']['salarioMensualNeto']['moneda'] }}");
    @endisset
  @else
    $('#montoMoneda').val("{{ old('montoMoneda') }}");
  @endempty
@endif








$("#ambitoSectorClave").ready(required);
$("#ambitoSectorClave").change(required);


function required()
{
  var varAmbito = $("#ambitoSectorClave").val();

  if(varAmbito == "OTR" || varAmbito == "OTRO" || varAmbito == "PRV" || varAmbito == "PRI" || varAmbito == "PUB")
  {
    $('.fieldset_experiencia').show();

    $('#ubicacion').attr('required',"required");
    $('#nombreInstitucion').attr('required',"required");
    $('#empleoCargoComision').attr('required',"required");
    $('#fechaObtencion').attr('required',"required");
    $('#fechaEgreso').attr('required',"required");
    $('#montoMoneda').attr('required',"required");
    $('#montoValor').attr('required',"required");

    if(varAmbito == "PRI" || varAmbito == "PRV" || varAmbito == "OTR" || varAmbito == "OTRO")
    {
      $('.pub').hide();

      if(varAmbito == "PRI")
      {
        $('#areaAdscripcion').removeAttr('required');
      }
      if(varAmbito == "PRV")
      {

      }

      if(varAmbito == "PRV" || varAmbito == "PRI")
      {
        $('.prv').show();
        $('.otr').hide();
      }
      else if(varAmbito == "OTR" || varAmbito == "OTRO")
      {
        $('.prv').hide();
        $('.otr').show();
      }

      rfcSector(true);
      gob(false);
    }
    else if(varAmbito == "PUB")
    {
      rfcSector(false);
      gob(true);

      $('.prv').hide();
      $('.pub').show();
      $('.otr').hide();

      $('#areaAdscripcion').attr('required',"required");
    }
  }
  else
  {
    $('.fieldset_experiencia').hide();

    rfcSector(false);
    gob(false);

    $('#ubicacion').removeAttr('required');
    $('#nombreInstitucion').removeAttr('required');
    $('#areaAdscripcion').removeAttr('required');
    $('#empleoCargoComision').removeAttr('required');
    $('#fechaObtencion').removeAttr('required');
    $('#fechaEgreso').removeAttr('required');
    $('#montoMoneda').removeAttr('required');
    $('#montoValor').removeAttr('required');
  }
}


function rfcSector(varBoolean)
{
  if(varBoolean == true)
  {
    $('.sector').show();
    $('#sector').attr('required',"required");
    $('#proveedorContratistaGobierno').attr('required',"required");
  }
  else
  {
    $('.sector').hide();
    $('#sector').removeAttr('required');
    $('#proveedorContratistaGobierno').removeAttr('required');
  }
}


function gob(varBoolean)
{
  if(varBoolean == true)
  {
    $('#nivelOrdenGobierno').attr('required',"required");
    $('#ambitoPublico').attr('required',"required");
    $('#funcionPrincipal').attr('required',"required");
  }
  else
  {
    $('#nivelOrdenGobierno').removeAttr('required');
    $('#ambitoPublico').removeAttr('required');
    $('#funcionPrincipal').removeAttr('required');
  }
}
