$("#recibeRemuneracion").ready(remunera);
$("#recibeRemuneracion").change(remunera);


$("#montoMoneda").change(moneda);

function moneda()
{
  var remuneraValue = $("#recibeRemuneracion").val();

  if(remuneraValue == 1)
  {
    var monedaValue = $("#montoMoneda").val();

    if(monedaValue == "")
    {
      $('#montoMoneda').val("MXN");
      $('#montoMoneda').attr('required',"required");
    }
  }
}


function remunera()
{
  var remuneraValue = $("#recibeRemuneracion").val();

  if(remuneraValue == 1)
  {
    $('#div_montoValor').show();
    $('#div_montoMoneda').show();

    $('#montoValor').attr('required',"required");
    $('#montoMoneda').attr('required',"required");

    moneda();
  }
  else
  {
    $('#div_montoValor').hide();
    $('#div_montoMoneda').hide();

    $('#montoValor').removeAttr('required');
    $('#montoMoneda').removeAttr('required');
  }
}

@if(old('montoMoneda'))
  $('#montoMoneda').val('{{ old('montoMoneda') }}');
@elseif(isset(Route::current()->parameters()['array']))
  @isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['montoMensual'])
    $('#montoMoneda').val('{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['montoMensual']['moneda'] }}');
  @endisset
@endif
