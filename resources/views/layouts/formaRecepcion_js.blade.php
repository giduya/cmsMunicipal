$("#formaRecepcion").ready(mostrar_formRep);
$("#formaRecepcion").change(mostrar_formRep);


$("#montoMoneda").change(moneda);

function moneda()
{
  var recepcionValue = $("#formaRecepcion").val();

  if(recepcionValue == "MONETARIO")
  {
    var monedaValue = $("#montoMoneda").val();

    if(monedaValue == "")
    {
      $('#montoMoneda').val("MXN");
      $('#montoMoneda').attr('required',"required");
    }
  }
}


function mostrar_formRep()
{
  var formRepValue = $("#formaRecepcion").val();

 if(formRepValue == "ESPECIE")
  {
    $('#div_especifiqueBeneficio').show();
    $('.div_monto').hide();
    $('#especifiqueEspecie').attr("required", "required");
    $("#montoValor").removeAttr("required");
    $("#montoMoneda").removeAttr("required");
  }
  else if(formRepValue == "MONETARIO")
  {
    $('#div_especifiqueBeneficio').hide();
    $('.div_monto').show();
    $("#especifiqueEspecie").removeAttr("required");
    $('#montoValor').attr("required", "required");
    $('#montoMoneda').attr("required", "required");

    moneda();
  }
  else
  {
    $('#div_especifiqueBeneficio').hide();
    $('.div_monto').hide();
    $("#especifiqueEspecie").removeAttr("required");
    $("#montoValor").removeAttr("required");
    $("#montoMoneda").removeAttr("required");
  }
}

@if(old('montoMoneda'))
  $('#montoMoneda').val("{{ old('montoMoneda') }}");
@endif
