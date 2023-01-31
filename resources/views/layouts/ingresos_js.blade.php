$('#aclaracionesObservaciones').attr("tabindex","128");
$('#send').attr("tabindex","129");


function numberWithCommas(x)
{
  return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}

$("#remuneracionNetaCargoPublico").ready(sumar);

$("#remuneracionNetaCargoPublico").blur(sumar);
$("#ingresoNetoAnualParejaDependiente_valor").blur(sumar);


$("#industria_remuneracion_0").blur(sumar);
$("#industria_remuneracion_1").blur(sumar);
$("#industria_remuneracion_2").blur(sumar);
$("#industria_remuneracion_3").blur(sumar);
$("#industria_remuneracion_4").blur(sumar);
$("#industria_remuneracion_5").blur(sumar);
$("#industria_remuneracion_6").blur(sumar);
$("#industria_remuneracion_7").blur(sumar);
$("#industria_remuneracion_8").blur(sumar);
$("#industria_remuneracion_9").blur(sumar);
$("#del").hover(sumar);
$("#add").hover(sumar);
$("#del").click(sumar);
$("#add").click(sumar);

$("#financiera_remuneracion_0").blur(sumar);
$("#financiera_remuneracion_1").blur(sumar);
$("#financiera_remuneracion_2").blur(sumar);
$("#financiera_remuneracion_3").blur(sumar);
$("#financiera_remuneracion_4").blur(sumar);
$("#financiera_remuneracion_5").blur(sumar);
$("#financiera_remuneracion_6").blur(sumar);
$("#financiera_remuneracion_7").blur(sumar);
$("#financiera_remuneracion_8").blur(sumar);
$("#financiera_remuneracion_9").blur(sumar);
$("#del2").hover(sumar);
$("#add2").hover(sumar);
$("#del2").click(sumar);
$("#add2").click(sumar);

$("#servicio_remuneracion_0").blur(sumar);
$("#servicio_remuneracion_1").blur(sumar);
$("#servicio_remuneracion_2").blur(sumar);
$("#servicio_remuneracion_3").blur(sumar);
$("#servicio_remuneracion_4").blur(sumar);
$("#servicio_remuneracion_5").blur(sumar);
$("#servicio_remuneracion_6").blur(sumar);
$("#servicio_remuneracion_7").blur(sumar);
$("#servicio_remuneracion_8").blur(sumar);
$("#servicio_remuneracion_9").blur(sumar);
$("#del3").hover(sumar);
$("#add3").hover(sumar);
$("#del3").click(sumar);
$("#add3").click(sumar);

$("#bien_remuneracion_0").blur(sumar);
$("#bien_remuneracion_1").blur(sumar);
$("#bien_remuneracion_2").blur(sumar);
$("#bien_remuneracion_3").blur(sumar);
$("#bien_remuneracion_4").blur(sumar);
$("#bien_remuneracion_5").blur(sumar);
$("#bien_remuneracion_6").blur(sumar);
$("#bien_remuneracion_7").blur(sumar);
$("#bien_remuneracion_8").blur(sumar);
$("#bien_remuneracion_9").blur(sumar);
$("#del4").hover(sumar);
$("#add4").hover(sumar);
$("#del4").click(sumar);
$("#add4").click(sumar);

$("#ingreso_remuneracion_0").blur(sumar);
$("#ingreso_remuneracion_1").blur(sumar);
$("#ingreso_remuneracion_2").blur(sumar);
$("#ingreso_remuneracion_3").blur(sumar);
$("#ingreso_remuneracion_4").blur(sumar);
$("#ingreso_remuneracion_5").blur(sumar);
$("#ingreso_remuneracion_6").blur(sumar);
$("#ingreso_remuneracion_7").blur(sumar);
$("#ingreso_remuneracion_8").blur(sumar);
$("#ingreso_remuneracion_9").blur(sumar);
$("#del5").hover(sumar);
$("#add5").hover(sumar);
$("#del5").click(sumar);
$("#add5").click(sumar);


function sumar()
{
  var ingresoNetoAnual = parseInt($("#remuneracionNetaCargoPublico").val().replace(',', ''));

  isNaN(ingresoNetoAnual) ? (parseInt(ingresoNetoAnual = 0)) : (ingresoNetoAnual);

  var industria0Value = parseInt($("#industria_remuneracion_0").val().replace(',', ''));
  var industria1Value = parseInt($("#industria_remuneracion_1").val().replace(',', ''));
  var industria2Value = parseInt($("#industria_remuneracion_2").val().replace(',', ''));
  var industria3Value = parseInt($("#industria_remuneracion_3").val().replace(',', ''));
  var industria4Value = parseInt($("#industria_remuneracion_4").val().replace(',', ''));
  var industria5Value = parseInt($("#industria_remuneracion_5").val().replace(',', ''));
  var industria6Value = parseInt($("#industria_remuneracion_6").val().replace(',', ''));
  var industria7Value = parseInt($("#industria_remuneracion_7").val().replace(',', ''));
  var industria8Value = parseInt($("#industria_remuneracion_8").val().replace(',', ''));
  var industria9Value = parseInt($("#industria_remuneracion_9").val().replace(',', ''));

  isNaN(industria0Value) ? (parseInt(industria0Value = 0)) : (industria0Value);
  isNaN(industria1Value) ? (parseInt(industria1Value = 0)) : (industria1Value);
  isNaN(industria2Value) ? (parseInt(industria2Value = 0)) : (industria2Value);
  isNaN(industria3Value) ? (parseInt(industria3Value = 0)) : (industria3Value);
  isNaN(industria4Value) ? (parseInt(industria4Value = 0)) : (industria4Value);
  isNaN(industria5Value) ? (parseInt(industria5Value = 0)) : (industria5Value);
  isNaN(industria6Value) ? (parseInt(industria6Value = 0)) : (industria6Value);
  isNaN(industria7Value) ? (parseInt(industria7Value = 0)) : (industria7Value);
  isNaN(industria8Value) ? (parseInt(industria8Value = 0)) : (industria8Value);
  isNaN(industria9Value) ? (parseInt(industria9Value = 0)) : (industria9Value);

  var totalIndustria = + industria0Value + industria1Value + industria2Value + industria3Value + industria4Value + industria5Value + industria6Value + industria7Value + industria8Value + industria9Value;

  if(totalIndustria > 0)
  {
    $("#actividadIndustialComercialEmpresarial_remuneracionTotal").val(numberWithCommas(totalIndustria));
  }
  else
  {
    $("#actividadIndustialComercialEmpresarial_remuneracionTotal").val('');
  }




  var financiera0Value = parseInt($("#financiera_remuneracion_0").val().replace(',', ''));
  var financiera1Value = parseInt($("#financiera_remuneracion_1").val().replace(',', ''));
  var financiera2Value = parseInt($("#financiera_remuneracion_2").val().replace(',', ''));
  var financiera3Value = parseInt($("#financiera_remuneracion_3").val().replace(',', ''));
  var financiera4Value = parseInt($("#financiera_remuneracion_4").val().replace(',', ''));
  var financiera5Value = parseInt($("#financiera_remuneracion_5").val().replace(',', ''));
  var financiera6Value = parseInt($("#financiera_remuneracion_6").val().replace(',', ''));
  var financiera7Value = parseInt($("#financiera_remuneracion_7").val().replace(',', ''));
  var financiera8Value = parseInt($("#financiera_remuneracion_8").val().replace(',', ''));
  var financiera9Value = parseInt($("#financiera_remuneracion_9").val().replace(',', ''));


  isNaN(financiera0Value) ? (parseInt(financiera0Value = 0)) : (financiera0Value);
  isNaN(financiera1Value) ? (parseInt(financiera1Value = 0)) : (financiera1Value);
  isNaN(financiera2Value) ? (parseInt(financiera2Value = 0)) : (financiera2Value);
  isNaN(financiera3Value) ? (parseInt(financiera3Value = 0)) : (financiera3Value);
  isNaN(financiera4Value) ? (parseInt(financiera4Value = 0)) : (financiera4Value);
  isNaN(financiera5Value) ? (parseInt(financiera5Value = 0)) : (financiera5Value);
  isNaN(financiera6Value) ? (parseInt(financiera6Value = 0)) : (financiera6Value);
  isNaN(financiera7Value) ? (parseInt(financiera7Value = 0)) : (financiera7Value);
  isNaN(financiera8Value) ? (parseInt(financiera8Value = 0)) : (financiera8Value);
  isNaN(financiera9Value) ? (parseInt(financiera9Value = 0)) : (financiera9Value);


  var totalFinanciera = financiera0Value + financiera1Value + financiera2Value + financiera3Value + financiera4Value + financiera5Value + financiera6Value + financiera7Value + financiera8Value + financiera9Value;

  if(totalFinanciera > 0)
  {
    $("#actividadFinanciera_remuneracionTotal_valor").val(numberWithCommas(totalFinanciera));
  }
  else
  {
    $("#actividadFinanciera_remuneracionTotal_valor").val("");
  }




  var servicio0Value = parseInt($("#servicio_remuneracion_0").val().replace(',', ''));
  var servicio1Value = parseInt($("#servicio_remuneracion_1").val().replace(',', ''));
  var servicio2Value = parseInt($("#servicio_remuneracion_2").val().replace(',', ''));
  var servicio3Value = parseInt($("#servicio_remuneracion_3").val().replace(',', ''));
  var servicio4Value = parseInt($("#servicio_remuneracion_4").val().replace(',', ''));
  var servicio5Value = parseInt($("#servicio_remuneracion_5").val().replace(',', ''));
  var servicio6Value = parseInt($("#servicio_remuneracion_6").val().replace(',', ''));
  var servicio7Value = parseInt($("#servicio_remuneracion_7").val().replace(',', ''));
  var servicio8Value = parseInt($("#servicio_remuneracion_8").val().replace(',', ''));
  var servicio9Value = parseInt($("#servicio_remuneracion_9").val().replace(',', ''));


  isNaN(servicio0Value) ? (parseInt(servicio0Value = 0)) : (servicio0Value);
  isNaN(servicio1Value) ? (parseInt(servicio1Value = 0)) : (servicio1Value);
  isNaN(servicio2Value) ? (parseInt(servicio2Value = 0)) : (servicio2Value);
  isNaN(servicio3Value) ? (parseInt(servicio3Value = 0)) : (servicio3Value);
  isNaN(servicio4Value) ? (parseInt(servicio4Value = 0)) : (servicio4Value);
  isNaN(servicio5Value) ? (parseInt(servicio5Value = 0)) : (servicio5Value);
  isNaN(servicio6Value) ? (parseInt(servicio6Value = 0)) : (servicio6Value);
  isNaN(servicio7Value) ? (parseInt(servicio7Value = 0)) : (servicio7Value);
  isNaN(servicio8Value) ? (parseInt(servicio8Value = 0)) : (servicio8Value);
  isNaN(servicio9Value) ? (parseInt(servicio9Value = 0)) : (servicio9Value);


  var totalServicio = servicio0Value + servicio1Value + servicio2Value + servicio3Value + servicio4Value + servicio5Value + servicio6Value + servicio7Value + servicio8Value + servicio9Value;

  if(totalServicio > 0)
  {
    $("#serviciosProfesionales_remuneracionTotal_valor").val(numberWithCommas(totalServicio));
  }
  else
  {
    $("#serviciosProfesionales_remuneracionTotal_valor").val("");
  }




  var bien0Value = ($("#bien_remuneracion_0").val() === undefined) ? 0 : parseInt($("#bien_remuneracion_0").val().replace(',', '')) ;
  var bien1Value = ($("#bien_remuneracion_1").val() === undefined) ? 0 : parseInt($("#bien_remuneracion_1").val().replace(',', '')) ;
  var bien2Value = ($("#bien_remuneracion_2").val() === undefined) ? 0 : parseInt($("#bien_remuneracion_2").val().replace(',', '')) ;
  var bien3Value = ($("#bien_remuneracion_3").val() === undefined) ? 0 : parseInt($("#bien_remuneracion_3").val().replace(',', '')) ;
  var bien4Value = ($("#bien_remuneracion_4").val() === undefined) ? 0 : parseInt($("#bien_remuneracion_4").val().replace(',', '')) ;
  var bien5Value = ($("#bien_remuneracion_5").val() === undefined) ? 0 : parseInt($("#bien_remuneracion_5").val().replace(',', '')) ;
  var bien6Value = ($("#bien_remuneracion_6").val() === undefined) ? 0 : parseInt($("#bien_remuneracion_6").val().replace(',', '')) ;
  var bien7Value = ($("#bien_remuneracion_7").val() === undefined) ? 0 : parseInt($("#bien_remuneracion_7").val().replace(',', '')) ;
  var bien8Value = ($("#bien_remuneracion_8").val() === undefined) ? 0 : parseInt($("#bien_remuneracion_8").val().replace(',', '')) ;
  var bien9Value = ($("#bien_remuneracion_9").val() === undefined) ? 0 : parseInt($("#bien_remuneracion_9").val().replace(',', '')) ;


  isNaN(bien0Value) ? (parseInt(bien0Value = 0)) : (bien0Value);
  isNaN(bien1Value) ? (parseInt(bien1Value = 0)) : (bien1Value);
  isNaN(bien2Value) ? (parseInt(bien2Value = 0)) : (bien2Value);
  isNaN(bien3Value) ? (parseInt(bien3Value = 0)) : (bien3Value);
  isNaN(bien4Value) ? (parseInt(bien4Value = 0)) : (bien4Value);
  isNaN(bien5Value) ? (parseInt(bien5Value = 0)) : (bien5Value);
  isNaN(bien6Value) ? (parseInt(bien6Value = 0)) : (bien6Value);
  isNaN(bien7Value) ? (parseInt(bien7Value = 0)) : (bien7Value);
  isNaN(bien8Value) ? (parseInt(bien8Value = 0)) : (bien8Value);
  isNaN(bien9Value) ? (parseInt(bien9Value = 0)) : (bien9Value);


  var totalBien = bien0Value + bien1Value + bien2Value + bien3Value + bien4Value + bien5Value + bien6Value + bien7Value + bien8Value + bien9Value;

  if(totalBien > 0)
  {
    $("#enajenacionBienes_remuneracionTotal_valor").val(numberWithCommas(totalBien));
  }
  else
  {
    $("#enajenacionBienes_remuneracionTotal_valor").val("");
  }



  var ingreso0Value = parseInt($("#ingreso_remuneracion_0").val().replace(',', ''));
  var ingreso1Value = parseInt($("#ingreso_remuneracion_1").val().replace(',', ''));
  var ingreso2Value = parseInt($("#ingreso_remuneracion_2").val().replace(',', ''));
  var ingreso3Value = parseInt($("#ingreso_remuneracion_3").val().replace(',', ''));
  var ingreso4Value = parseInt($("#ingreso_remuneracion_4").val().replace(',', ''));
  var ingreso5Value = parseInt($("#ingreso_remuneracion_5").val().replace(',', ''));
  var ingreso6Value = parseInt($("#ingreso_remuneracion_6").val().replace(',', ''));
  var ingreso7Value = parseInt($("#ingreso_remuneracion_7").val().replace(',', ''));
  var ingreso8Value = parseInt($("#ingreso_remuneracion_8").val().replace(',', ''));
  var ingreso9Value = parseInt($("#ingreso_remuneracion_9").val().replace(',', ''));


  isNaN(ingreso0Value) ? (parseInt(ingreso0Value = 0)) : (ingreso0Value);
  isNaN(ingreso1Value) ? (parseInt(ingreso1Value = 0)) : (ingreso1Value);
  isNaN(ingreso2Value) ? (parseInt(ingreso2Value = 0)) : (ingreso2Value);
  isNaN(ingreso3Value) ? (parseInt(ingreso3Value = 0)) : (ingreso3Value);
  isNaN(ingreso4Value) ? (parseInt(ingreso4Value = 0)) : (ingreso4Value);
  isNaN(ingreso5Value) ? (parseInt(ingreso5Value = 0)) : (ingreso5Value);
  isNaN(ingreso6Value) ? (parseInt(ingreso6Value = 0)) : (ingreso6Value);
  isNaN(ingreso7Value) ? (parseInt(ingreso7Value = 0)) : (ingreso7Value);
  isNaN(ingreso8Value) ? (parseInt(ingreso8Value = 0)) : (ingreso8Value);
  isNaN(ingreso9Value) ? (parseInt(ingreso9Value = 0)) : (ingreso9Value);


  var totalOtros = ingreso0Value + ingreso1Value + ingreso2Value + ingreso3Value + ingreso4Value + ingreso5Value + ingreso6Value + ingreso7Value + ingreso8Value + ingreso9Value;

  if(totalOtros > 0)
  {
    $("#otrosIngresos_remuneracionTotal_valor").val(numberWithCommas(totalOtros));
  }
  else
  {
    $("#otrosIngresos_remuneracionTotal_valor").val("");
  }




  var totalIngresos = totalOtros + totalBien + totalServicio + totalFinanciera + totalIndustria;

  if(totalIngresos > 0)
  {
    $("#otrosIngresosTotal_valor").val(numberWithCommas(totalIngresos));
  }
  else
  {
    $("#otrosIngresosTotal_valor").val("");
  }


  var otrosIngresosSumaingresoNetoAnual = totalIngresos + ingresoNetoAnual;

  if(otrosIngresosSumaingresoNetoAnual > 0)
  {
    $("#ingresoNetoAnualDeclarante_valor").val(numberWithCommas(otrosIngresosSumaingresoNetoAnual));
  }
  else
  {
    $("#ingresoNetoAnualDeclarante_valor").val("");
  }




  var ingresoNetoAnualDependiente = parseInt($("#ingresoNetoAnualParejaDependiente_valor").val().replace(',', ''));
  isNaN(ingresoNetoAnualDependiente) ? (parseInt(ingresoNetoAnualDependiente = 0)) : (ingresoNetoAnualDependiente);

  var total = totalIngresos + ingresoNetoAnual + ingresoNetoAnualDependiente;

  if(total > 0)
  {
    $("#totalIngresosNetosAnuales_valor").val(numberWithCommas(total));
  }
  else
  {
    $("#totalIngresosNetosAnuales_valor").val("");
  }
};



$("#add5").click(mostrar_ingresos);
$("#del5").click(ocultar_ingresos);

function mostrar_ingresos()
{
  if($('#ingresos_0').css('display') == 'none')
  {
    $('#ingresos_0').show();
    $('#tipoIngreso_0').attr("required","required");
    $('#ingreso_remuneracion_0').attr("required","required");
    $('#div_del5').show();
  }
  else
  {
    if($('#ingresos_1').css('display') == 'none')
    {
      $('#ingresos_1').show();
      $('#tipoIngreso_1').attr("required","required");
      $('#ingreso_remuneracion_1').attr("required","required");

      $("#div_add5").show();
      $("#div_del5").show();
    }
    else
    {
      if($('#ingresos_2').css('display') == 'none')
      {
        $('#ingresos_2').show();
        $('#tipoIngreso_2').attr("required","required");
        $('#ingreso_remuneracion_2').attr("required","required");

        $("#div_add5").show();
        $("#div_del5").show();
      }
      else
      {
        if($('#ingresos_3').css('display') == 'none')
        {
          $('#ingresos_3').show();
          $('#tipoIngreso_3').attr("required","required");
          $('#ingreso_remuneracion_3').attr("required","required");

          $("#div_add5").show();
          $("#div_del5").show();
        }
        else
        {
          if($('#ingresos_4').css('display') == 'none')
          {
            $('#ingresos_4').show();
            $('#tipoIngreso_4').attr("required","required");
            $('#ingreso_remuneracion_4').attr("required","required");


            $("#div_add5").show();
            $("#div_del5").show();
          }
          else
          {
            if($('#ingresos_5').css('display') == 'none')
            {
              $('#ingresos_5').show();
              $('#tipoIngreso_5').attr("required","required");
              $('#ingreso_remuneracion_5').attr("required","required");

              $("#div_add5").show();
              $("#div_del5").show();
            }
            else
            {
              if($('#ingresos_6').css('display') == 'none')
              {
                $('#ingresos_6').show();
                $('#tipoIngreso_6').attr("required","required");
                $('#ingreso_remuneracion_6').attr("required","required");

                $("#div_add5").show();
                $("#div_del5").show();
              }
              else
              {
                if($('#ingresos_7').css('display') == 'none')
                {
                  $('#ingresos_7').show();
                  $('#tipoIngreso_7').attr("required","required");
                  $('#ingreso_remuneracion_7').attr("required","required");

                  $("#div_add5").show();
                  $("#div_del5").show();
                }
                else
                {
                  if($('#ingresos_8').css('display') == 'none')
                  {
                    $('#ingresos_8').show();
                    $('#tipoIngreso_8').attr("required","required");
                    $('#ingreso_remuneracion_8').attr("required","required");

                    $("#div_add5").show();
                    $("#div_del5").show();
                  }
                  else
                  {
                    if($('#ingresos_9').css('display') == 'none')
                    {
                      $('#ingresos_9').show();
                      $('#tipoIngreso_9').attr("required","required");
                      $('#ingreso_remuneracion_9').attr("required","required");

                      $("#div_add5").hide();
                      $("#div_del5").show();
                    }
                    else
                    {
                      $("#div_add5").hide();
                      $("#div_del5").show();
                    }
                  }
                }
              }
            }
          }
        }
      }
    }
  }
}

function ocultar_ingresos()
{
  if($('#ingresos_9').css('display') != 'none')
  {
    $('#ingresos_9').hide();
    $('#tipoIngreso_9').removeAttr("required");
    $('#ingreso_remuneracion_9').removeAttr("required");

    $('#tipoIngreso_9').val(null);
    $('#ingreso_remuneracion_9').val(null);

    $('#div_add5').show();
  }
  else
  {
    if($('#ingresos_8').css('display') != 'none')
    {
      $('#ingresos_8').hide();
      $('#tipoIngreso_8').removeAttr("required");
      $('#ingreso_remuneracion_8').removeAttr("required");

      $('#tipoIngreso_8').val(null);
      $('#ingreso_remuneracion_8').val(null);

      $('#div_add5').show();
    }
    else
    {
      if($('#ingresos_7').css('display') != 'none')
      {
        $('#ingresos_7').hide();
        $('#tipoIngreso_7').removeAttr("required");
        $('#ingreso_remuneracion_7').removeAttr("required");

        $('#tipoIngreso_7').val(null);
        $('#ingreso_remuneracion_7').val(null);

        $('#div_add5').show();
      }
      else
      {
        if($('#ingresos_6').css('display') != 'none')
        {
          $('#ingresos_6').hide();
          $('#tipoIngreso_6').removeAttr("required");
          $('#ingreso_remuneracion_6').removeAttr("required");

          $('#tipoIngreso_6').val(null);
          $('#ingreso_remuneracion_6').val(null);

          $('#div_add5').show();
        }
        else
        {
          if($('#ingresos_5').css('display') != 'none')
          {
            $('#ingresos_5').hide();
            $('#tipoIngreso_5').removeAttr("required");
            $('#ingreso_remuneracion_5').removeAttr("required");

            $('#tipoIngreso_5').val(null);
            $('#ingreso_remuneracion_5').val(null);

            $('#div_add5').show();
          }
          else
          {
            if($('#ingresos_4').css('display') != 'none')
            {
              $('#ingresos_4').hide();
              $('#tipoIngreso_4').removeAttr("required");
              $('#ingreso_remuneracion_4').removeAttr("required");

              $('#tipoIngreso_4').val(null);
              $('#ingreso_remuneracion_4').val(null);

              $('#div_add5').show();
            }
            else
            {
              if($('#ingresos_3').css('display') != 'none')
              {
                $('#ingresos_3').hide();
                $('#tipoIngreso_3').removeAttr("required");
                $('#ingreso_remuneracion_3').removeAttr("required");

                $('#tipoIngreso_3').val(null);
                $('#ingreso_remuneracion_3').val(null);

                $('#div_add5').show();
              }
              else
              {
                if($('#ingresos_2').css('display') != 'none')
                {
                  $('#ingresos_2').hide();
                  $('#tipoIngreso_2').removeAttr("required");
                  $('#ingreso_remuneracion_2').removeAttr("required");

                  $('#tipoIngreso_2').val(null);
                  $('#ingreso_remuneracion_2').val(null);

                  $('#div_add5').show();
                }
                else
                {
                  if($('#ingresos_1').css('display') != 'none')
                  {
                    $('#ingresos_1').hide();
                    $('#tipoIngreso_1').removeAttr("required");
                    $('#ingreso_remuneracion_1').removeAttr("required");

                    $('#tipoIngreso_1').val(null);
                    $('#ingreso_remuneracion_1').val(null);

                    $("#div_add5").show();
                  }
                  else
                  {
                    if($('#ingresos_0').css('display') != 'none')
                    {
                      $('#ingresos_0').hide();
                      $('#tipoIngreso_0').removeAttr("required");
                      $('#ingreso_remuneracion_0').removeAttr("required");

                      $('#tipoIngreso_0').val(null);
                      $('#ingreso_remuneracion_0').val(null);

                      $('#div_add5').show();
                      $('#div_del5').hide();
                    }
                  }
                }
              }
            }
          }
        }
      }
    }
  }
}





$("#add4").click(mostrar_bienes);
$("#del4").click(ocultar_bienes);

function mostrar_bienes()
{
  if($('#bienes_0').css('display') == 'none')
  {
    $('#bienes_0').show();
    $('#tipoBienEnajenado_0').attr("required","required");
    $('#bien_remuneracion_0').attr("required","required");
    $('#div_del4').show();
  }
  else
  {
    if($('#bienes_1').css('display') == 'none')
    {
      $('#bienes_1').show();
      $('#tipoBienEnajenado_1').attr("required","required");
      $('#bien_remuneracion_1').attr("required","required");

      $("#div_add4").show();
      $("#div_del4").show();
    }
    else
    {
      if($('#bienes_2').css('display') == 'none')
      {
        $('#bienes_2').show();
        $('#tipoBienEnajenado_2').attr("required","required");
        $('#bien_remuneracion_2').attr("required","required");

        $("#div_add4").show();
        $("#div_del4").show();
      }
      else
      {
        if($('#bienes_3').css('display') == 'none')
        {
          $('#bienes_3').show();
          $('#tipoBienEnajenado_3').attr("required","required");
          $('#bien_remuneracion_3').attr("required","required");

          $("#div_add4").show();
          $("#div_del4").show();
        }
        else
        {
          if($('#bienes_4').css('display') == 'none')
          {
            $('#bienes_4').show();
            $('#tipoBienEnajenado_4').attr("required","required");
            $('#bien_remuneracion_4').attr("required","required");

            $("#div_add4").show();
            $("#div_del4").show();
          }
          else
          {
            if($('#bienes_5').css('display') == 'none')
            {
              $('#bienes_5').show();
              $('#tipoBienEnajenado_5').attr("required","required");
              $('#bien_remuneracion_5').attr("required","required");

              $("#div_add4").show();
              $("#div_del4").show();
            }
            else
            {
              if($('#bienes_6').css('display') == 'none')
              {
                $('#bienes_6').show();
                $('#tipoBienEnajenado_6').attr("required","required");
                $('#bien_remuneracion_6').attr("required","required");

                $("#div_add4").show();
                $("#div_del4").show();
              }
              else
              {
                if($('#bienes_7').css('display') == 'none')
                {
                  $('#bienes_7').show();
                  $('#tipoBienEnajenado_7').attr("required","required");
                  $('#bien_remuneracion_7').attr("required","required");

                  $("#div_add4").show();
                  $("#div_del4").show();
                }
                else
                {
                  if($('#bienes_8').css('display') == 'none')
                  {
                    $('#bienes_8').show();
                    $('#tipoBienEnajenado_8').attr("required","required");
                    $('#bien_remuneracion_8').attr("required","required");

                    $("#div_add4").show();
                    $("#div_del4").show();
                  }
                  else
                  {
                    if($('#bienes_9').css('display') == 'none')
                    {
                      $('#bienes_9').show();
                      $('#tipoBienEnajenado_9').attr("required","required");
                      $('#bien_remuneracion_9').attr("required","required");

                      $("#div_add4").hide();
                      $("#div_del4").show();
                    }
                    else
                    {
                      $("#div_add4").hide();
                      $("#div_del4").show();
                    }
                  }
                }
              }
            }
          }
        }
      }
    }
  }
}

function ocultar_bienes()
{
  if($('#bienes_9').css('display') == 'flex')
  {
    $('#bienes_9').hide();

    $('#tipoBienEnajenado_9').removeAttr("required");
    $('#bien_remuneracion_9').removeAttr("required");

    $('#tipoBienEnajenado_9').val(null);
    $('#bien_remuneracion_9').val(null);

    $('#div_add4').show();
  }
  else
  {
    if($('#bienes_8').css('display') == 'flex')
    {
      $('#bienes_8').hide();

      $('#tipoBienEnajenado_8').removeAttr("required");
      $('#bien_remuneracion_8').removeAttr("required");

      $('#tipoBienEnajenado_8').val(null);
      $('#bien_remuneracion_8').val(null);

      $('#div_add4').show();
    }
    else
    {
      if($('#bienes_7').css('display') == 'flex')
      {
        $('#bienes_7').hide();

        $('#tipoBienEnajenado_7').removeAttr("required");
        $('#bien_remuneracion_7').removeAttr("required");

        $('#tipoBienEnajenado_7').val(null);
        $('#bien_remuneracion_7').val(null);

        $('#div_add4').show();
      }
      else
      {
        if($('#bienes_6').css('display') == 'flex')
        {
          $('#bienes_6').hide();

          $('#tipoBienEnajenado_6').removeAttr("required");
          $('#bien_remuneracion_6').removeAttr("required");

          $('#tipoBienEnajenado_6').val(null);
          $('#bien_remuneracion_6').val(null);

          $('#div_add4').show();
        }
        else
        {
          if($('#bienes_5').css('display') == 'flex')
          {
            $('#bienes_5').hide();

            $('#tipoBienEnajenado_5').removeAttr("required");
            $('#bien_remuneracion_5').removeAttr("required");

            $('#tipoBienEnajenado_5').val(null);
            $('#bien_remuneracion_5').val(null);

            $('#div_add4').show();
          }
          else
          {
            if($('#bienes_4').css('display') == 'flex')
            {
              $('#bienes_4').hide();

              $('#tipoBienEnajenado_4').removeAttr("required");
              $('#bien_remuneracion_4').removeAttr("required");

              $('#tipoBienEnajenado_4').val(null);
              $('#bien_remuneracion_4').val(null);

              $('#div_add4').show();
            }
            else
            {
              if($('#bienes_3').css('display') == 'flex')
              {
                $('#bienes_3').hide();

                $('#tipoBienEnajenado_3').removeAttr("required");
                $('#bien_remuneracion_3').removeAttr("required");

                $('#tipoBienEnajenado_3').val(null);
                $('#bien_remuneracion_3').val(null);

                $('#div_add4').show();
              }
              else
              {
                if($('#bienes_2').css('display') == 'flex')
                {
                  $('#bienes_2').hide();
                  $('#tipoBienEnajenado_2').removeAttr("required");
                  $('#bien_remuneracion_2').removeAttr("required");

                  $('#tipoBienEnajenado_2').val(null);
                  $('#bien_remuneracion_2').val(null);

                  $('#div_add4').show();
                }
                else
                {
                  if($('#bienes_1').css('display') == 'flex')
                  {
                    $('#bienes_1').hide();

                    $('#tipoBienEnajenado_1').removeAttr("required");
                    $('#bien_remuneracion_1').removeAttr("required");

                    $('#tipoBienEnajenado_1').val(null);
                    $('#bien_remuneracion_1').val(null);

                    $('#div_add4').show();
                  }
                  else
                  {
                    if($('#bienes_0').css('display') == 'flex')
                    {
                      $('#bienes_0').hide();

                      $('#tipoBienEnajenado_0').removeAttr("required");
                      $('#bien_remuneracion_0').removeAttr("required");

                      $('#tipoBienEnajenado_0').val(null);
                      $('#bien_remuneracion_0').val(null);

                      $('#div_add4').show();
                      $('#div_del4').hide();
                    }
                  }
                }
              }
            }
          }
        }
      }
    }
  }
}





$("#del3").click(ocultar_servicios);
$("#add3").click(mostrar_servicios);

function mostrar_servicios()
{
  if($('#servicios_0').css('display') == 'none')
  {
    $('#servicios_0').show();
    $('#tipoServicio_0').attr("required","required");
    $('#servicio_remuneracion_0').attr("required","required");
    $('#div_del3').show();
  }
  else
  {
    if($('#servicios_1').css('display') == 'none')
    {
      $('#servicios_1').show();
      $('#tipoServicio_1').attr("required","required");
      $('#servicio_remuneracion_1').attr("required","required");

      $("#div_add3").show();
      $("#div_del3").show();
    }
    else
    {
      if($('#servicios_2').css('display') == 'none')
      {
        $('#servicios_2').show();
        $('#tipoServicio_2').attr("required","required");
        $('#servicio_remuneracion_2').attr("required","required");

        $("#div_add3").show();
        $("#div_del3").show();
      }
      else
      {
        if($('#servicios_3').css('display') == 'none')
        {
          $('#servicios_3').show();
          $('#tipoServicio_3').attr("required","required");
          $('#servicio_remuneracion_3').attr("required","required");

          $("#div_add3").show();
          $("#div_del3").show();
        }
        else
        {
          if($('#servicios_4').css('display') == 'none')
          {
            $('#servicios_4').show();
            $('#tipoServicio_4').attr("required","required");
            $('#servicio_remuneracion_4').attr("required","required");

            $("#div_add3").show();
            $("#div_del3").show();
          }
          else
          {
            if($('#servicios_5').css('display') == 'none')
            {
              $('#servicios_5').show();
              $('#tipoServicio_5').attr("required","required");
              $('#servicio_remuneracion_5').attr("required","required");

              $("#div_add3").show();
              $("#div_del3").show();
            }
            else
            {
              if($('#servicios_6').css('display') == 'none')
              {
                $('#servicios_6').show();
                $('#tipoServicio_6').attr("required","required");
                $('#servicio_remuneracion_6').attr("required","required");

                $("#div_add3").show();
                $("#div_del3").show();
              }
              else
              {
                if($('#servicios_7').css('display') == 'none')
                {
                  $('#servicios_7').show();
                  $('#tipoServicio_7').attr("required","required");
                  $('#servicio_remuneracion_7').attr("required","required");

                  $("#div_add3").show();
                  $("#div_del3").show();
                }
                else
                {
                  if($('#servicios_8').css('display') == 'none')
                  {
                    $('#servicios_8').show();
                    $('#tipoServicio_8').attr("required","required");
                    $('#servicio_remuneracion_8').attr("required","required");

                    $("#div_add3").show();
                    $("#div_del3").show();
                  }
                  else
                  {
                    if($('#servicios_9').css('display') == 'none')
                    {
                      $('#servicios_9').show();
                      $('#tipoServicio_9').attr("required","required");
                      $('#servicio_remuneracion_9').attr("required","required");

                      $("#div_add3").hide();
                      $("#div_del3").show();
                    }
                    else
                    {
                      $("#div_add3").hide();
                      $("#div_del3").show();
                    }
                  }
                }
              }
            }
          }
        }
      }
    }
  }
}

function ocultar_servicios()
{
  if($('#servicios_9').css('display') == 'flex')
  {
    $('#servicios_9').hide();

    $('#tipoServicio_9').removeAttr("required");
    $('#servicio_remuneracion_9').removeAttr("required");

    $('#tipoServicio_9').val(null);
    $('#servicio_remuneracion_9').val(null);

    $('#div_add3').show();
  }
  else
  {
    if($('#servicios_8').css('display') == 'flex')
    {
      $('#servicios_8').hide();

      $('#tipoServicio_8').removeAttr("required");
      $('#servicio_remuneracion_8').removeAttr("required");

      $('#tipoServicio_8').val(null);
      $('#servicio_remuneracion_8').val(null);

      $('#div_add3').show();
    }
    else
    {
      if($('#servicios_7').css('display') == 'flex')
      {
        $('#servicios_7').hide();

        $('#tipoServicio_7').removeAttr("required");
        $('#servicio_remuneracion_7').removeAttr("required");

        $('#tipoServicio_7').val(null);
        $('#servicio_remuneracion_7').val(null);

        $('#div_add3').show();
      }
      else
      {
        if($('#servicios_6').css('display') == 'flex')
        {
          $('#servicios_6').hide();

          $('#tipoServicio_6').removeAttr("required");
          $('#servicio_remuneracion_6').removeAttr("required");

          $('#tipoServicio_6').val(null);
          $('#servicio_remuneracion_6').val(null);

          $('#div_add3').show();
        }
        else
        {
          if($('#servicios_5').css('display') == 'flex')
          {
            $('#servicios_5').hide();

            $('#tipoServicio_5').removeAttr("required");
            $('#servicio_remuneracion_5').removeAttr("required");

            $('#tipoServicio_5').val(null);
            $('#servicio_remuneracion_5').val(null);

            $('#div_add3').show();
          }
          else
          {
            if($('#servicios_4').css('display') == 'flex')
            {
              $('#servicios_4').hide();

              $('#tipoServicio_4').removeAttr("required");
              $('#servicio_remuneracion_4').removeAttr("required");

              $('#tipoServicio_4').val(null);
              $('#servicio_remuneracion_4').val(null);

              $('#div_add3').show();
            }
            else
            {
              if($('#servicios_3').css('display') == 'flex')
              {
                $('#servicios_3').hide();

                $('#tipoServicio_3').removeAttr("required");
                $('#servicio_remuneracion_3').removeAttr("required");

                $('#tipoServicio_3').val(null);
                $('#servicio_remuneracion_3').val(null);

                $('#div_add3').show();
              }
              else
              {
                if($('#servicios_2').css('display') == 'flex')
                {
                  $('#servicios_2').hide();

                  $('#tipoServicio_2').removeAttr("required");
                  $('#servicio_remuneracion_2').removeAttr("required");

                  $('#tipoServicio_2').val(null);
                  $('#servicio_remuneracion_2').val(null);

                  $('#div_add3').show();
                }
                else
                {
                  if($('#servicios_1').css('display') == 'flex')
                  {
                    $('#servicios_1').hide();

                    $('#tipoServicio_1').removeAttr("required");
                    $('#servicio_remuneracion_1').removeAttr("required");

                    $('#tipoServicio_1').val(null);
                    $('#servicio_remuneracion_1').val(null);

                    $("#div_add3").show();
                  }
                  else
                  {
                    if($('#servicios_0').css('display') == 'flex')
                    {
                      $('#servicios_0').hide();

                      $('#tipoServicio_0').removeAttr("required");
                      $('#servicio_remuneracion_0').removeAttr("required");

                      $('#tipoServicio_0').val(null);
                      $('#servicio_remuneracion_0').val(null);

                      $('#div_add3').show();
                      $('#div_del3').hide();
                    }
                  }
                }
              }
            }
          }
        }
      }
    }
  }
}





$("#add2").click(mostrar_financiera);
$("#del2").click(ocultar_financiera);

function mostrar_financiera()
{
  if($('#financiera_0').css('display') == 'none')
  {
    $('#financiera_0').show();
    $('#financiera_tipoInstrumento_0').attr("required","required");
    $('#financiera_remuneracion_0').attr("required","required");
    $("#div_del2").show();
  }
  else
  {
    if($('#financiera_1').css('display') == 'none')
    {
      $('#financiera_1').show();

      $('#financiera_tipoInstrumento_1').attr("required","required");
      $('#financiera_remuneracion_1').attr("required","required");

      $("#div_add2").show();
      $("#div_del2").show();
    }
    else
    {
      if($('#financiera_2').css('display') == 'none')
      {
        $('#financiera_2').show();

        $('#financiera_tipoInstrumento_2').attr("required","required");
        $('#financiera_remuneracion_2').attr("required","required");

        $("#div_add2").show();
        $("#div_del2").show();
      }
      else
      {
        if($('#financiera_3').css('display') == 'none')
        {
          $('#financiera_3').show();

          $('#financiera_tipoInstrumento_3').attr("required","required");
          $('#financiera_remuneracion_3').attr("required","required");

          $("#div_add2").show();
          $("#div_del2").show();
        }
        else
        {
          if($('#financiera_4').css('display') == 'none')
          {
            $('#financiera_4').show();

            $('#financiera_tipoInstrumento_4').attr("required","required");
            $('#financiera_remuneracion_4').attr("required","required");

            $("#div_add2").show();
            $("#div_del2").show();
          }
          else
          {
            if($('#financiera_5').css('display') == 'none')
            {
              $('#financiera_5').show();

              $('#financiera_tipoInstrumento_5').attr("required","required");
              $('#financiera_remuneracion_5').attr("required","required");

              $("#div_add2").show();
              $("#div_del2").show();
            }
            else
            {
              if($('#financiera_6').css('display') == 'none')
              {
                $('#financiera_6').show();

                $('#financiera_tipoInstrumento_6').attr("required","required");
                $('#financiera_remuneracion_6').attr("required","required");

                $("#div_add2").show();
                $("#div_del2").show();
              }
              else
              {
                if($('#financiera_7').css('display') == 'none')
                {
                  $('#financiera_7').show();

                  $('#financiera_tipoInstrumento_7').attr("required","required");
                  $('#financiera_remuneracion_7').attr("required","required");

                  $("#div_add2").show();
                  $("#div_del2").show();
                }
                else
                {
                  if($('#financiera_8').css('display') == 'none')
                  {
                    $('#financiera_8').show();
                    $('#financiera_tipoInstrumento_8').attr("required","required");
                    $('#financiera_remuneracion_8').attr("required","required");

                    $("#div_add2").show();
                    $("#div_del2").show();
                  }
                  else
                  {
                    if($('#financiera_9').css('display') == 'none')
                    {
                      $('#financiera_9').show();
                      $('#financiera_tipoInstrumento_9').attr("required","required");
                      $('#financiera_remuneracion_9').attr("required","required");

                      $("#div_add2").hide();
                      $("#div_del2").show();
                    }
                    else
                    {
                      $("#div_add2").hide();
                      $("#div_del2").show();
                    }
                  }
                }
              }
            }
          }
        }
      }
    }
  }
}

function ocultar_financiera()
{
  if($('#financiera_9').css('display') != 'none')
  {
    $('#financiera_9').hide();

    $('#financiera_tipoInstrumento_9').removeAttr("required");
    $('#financiera_remuneracion_9').removeAttr("required");

    $('#financiera_tipoInstrumento_9').val(null);
    $('#financiera_remuneracion_9').val(null);

    $('#div_add2').show();
  }
  else
  {
    if($('#financiera_8').css('display') != 'none')
    {
      $('#financiera_8').hide();

      $('#financiera_tipoInstrumento_8').removeAttr("required");
      $('#financiera_remuneracion_8').removeAttr("required");

      $('#financiera_tipoInstrumento_8').val(null);
      $('#financiera_remuneracion_8').val(null);

      $('#div_add2').show();
    }
    else
    {
      if($('#financiera_7').css('display') != 'none')
      {
        $('#financiera_7').hide();

        $('#financiera_tipoInstrumento_7').removeAttr("required");
        $('#financiera_remuneracion_7').removeAttr("required");

        $('#financiera_tipoInstrumento_7').val(null);
        $('#financiera_remuneracion_7').val(null);

        $('#div_add2').show();
      }
      else
      {
        if($('#financiera_6').css('display') != 'none')
        {
          $('#financiera_6').hide();

          $('#financiera_tipoInstrumento_6').removeAttr("required");
          $('#financiera_remuneracion_6').removeAttr("required");

          $('#financiera_tipoInstrumento_6').val(null);
          $('#financiera_remuneracion_6').val(null);

          $('#div_add2').show();
        }
        else
        {
          if($('#financiera_5').css('display') != 'none')
          {
            $('#financiera_5').hide();

            $('#financiera_tipoInstrumento_5').removeAttr("required");
            $('#financiera_remuneracion_5').removeAttr("required");

            $('#financiera_tipoInstrumento_5').val(null);
            $('#financiera_remuneracion_5').val(null);

            $('#div_add2').show();
          }
          else
          {
            if($('#financiera_4').css('display') != 'none')
            {
              $('#financiera_4').hide();

              $('#financiera_tipoInstrumento_4').removeAttr("required");
              $('#financiera_remuneracion_4').removeAttr("required");

              $('#financiera_tipoInstrumento_4').val(null);
              $('#financiera_remuneracion_4').val(null);

              $('#div_add2').show();
            }
            else
            {
              if($('#financiera_3').css('display') != 'none')
              {
                $('#financiera_3').hide();

                $('#financiera_tipoInstrumento_3').removeAttr("required");
                $('#financiera_remuneracion_3').removeAttr("required");

                $('#financiera_tipoInstrumento_3').val(null);
                $('#financiera_remuneracion_3').val(null);

                $('#div_add2').show();
              }
              else
              {
                if($('#financiera_2').css('display') != 'none')
                {
                  $('#financiera_2').hide();

                  $('#financiera_tipoInstrumento_2').removeAttr("required");
                  $('#financiera_remuneracion_2').removeAttr("required");

                  $('#financiera_tipoInstrumento_2').val(null);
                  $('#financiera_remuneracion_2').val(null);

                  $('#div_add2').show();
                }
                else
                {
                  if($('#financiera_1').css('display') != 'none')
                  {
                    $('#financiera_1').hide();

                    $('#financiera_tipoInstrumento_1').removeAttr("required");
                    $('#financiera_remuneracion_1').removeAttr("required");

                    $('#financiera_tipoInstrumento_1').val(null);
                    $('#financiera_remuneracion_1').val(null);

                    $('#div_add2').show();
                  }
                  else
                  {
                    if($('#financiera_0').css('display') != 'none')
                    {
                      $('#financiera_0').hide();

                      $('#financiera_tipoInstrumento_0').removeAttr("required");
                      $('#financiera_remuneracion_0').removeAttr("required");

                      $('#financiera_tipoInstrumento_0').val(null);
                      $('#financiera_remuneracion_0').val(null);

                      $('#div_add2').show();
                      $('#div_del2').hide();
                    }
                  }
                }
              }
            }
          }
        }
      }
    }
  }
}





$("#add").click(mostrar_industrial);
$("#del").click(ocultar_industrial);

function mostrar_industrial()
{
  if($('#industria_0').css('display') == 'none')
  {
    $('#industria_0').show();
    $('#industria_negocio_0').attr("required","required");
    $('#industria_razon_0').attr("required","required");
    $('#industria_remuneracion_0').attr("required","required");
    $("#div_del").show();
  }
  else
  {
    if($('#industria_1').css('display') == 'none')
    {
      $('#industria_1').show();
      $('#industria_negocio_1').attr("required","required");
      $('#industria_razon_1').attr("required","required");
      $('#industria_remuneracion_1').attr("required","required");

      $("#div_add").show();
      $("#div_del").show();
    }
    else
    {
      if($('#industria_2').css('display') == 'none')
      {
        $('#industria_2').show();
        $('#industria_negocio_2').attr("required","required");
        $('#industria_razon_2').attr("required","required");
        $('#industria_remuneracion_2').attr("required","required");

        $("#div_add").show();
        $("#div_del").show();
      }
      else
      {
        if($('#industria_3').css('display') == 'none')
        {
          $('#industria_3').show();
          $('#industria_negocio_3').attr("required","required");
          $('#industria_razon_3').attr("required","required");
          $('#industria_remuneracion_3').attr("required","required");

          $("#div_add").show();
          $("#div_del").show();
        }
        else
        {
          if($('#industria_4').css('display') == 'none')
          {
            $('#industria_4').show();
            $('#industria_negocio_4').attr("required","required");
            $('#industria_razon_4').attr("required","required");
            $('#industria_remuneracion_4').attr("required","required");

            $("#div_add").show();
            $("#div_del").show();
          }
          else
          {
            if($('#industria_5').css('display') == 'none')
            {
              $('#industria_5').show();
              $('#industria_negocio_5').attr("required","required");
              $('#industria_razon_5').attr("required","required");
              $('#industria_remuneracion_5').attr("required","required");

              $("#div_add").show();
              $("#div_del").show();
            }
            else
            {
              if($('#industria_6').css('display') == 'none')
              {
                $('#industria_6').show();
                $('#industria_negocio_6').attr("required","required");
                $('#industria_razon_6').attr("required","required");
                $('#industria_remuneracion_6').attr("required","required");

                $("#div_add").show();
                $("#div_del").show();
              }
              else
              {
                if($('#industria_7').css('display') == 'none')
                {
                  $('#industria_7').show();
                  $('#industria_negocio_7').attr("required","required");
                  $('#industria_razon_7').attr("required","required");
                  $('#industria_remuneracion_7').attr("required","required");

                  $("#div_add").show();
                  $("#div_del").show();
                }
                else
                {
                  if($('#industria_8').css('display') == 'none')
                  {
                    $('#industria_8').show();
                    $('#industria_negocio_8').attr("required","required");
                    $('#industria_razon_8').attr("required","required");
                    $('#industria_remuneracion_8').attr("required","required");

                    $("#div_add").show();
                    $("#div_del").show();
                  }
                  else
                  {
                    if($('#industria_9').css('display') == 'none')
                    {
                      $('#industria_9').show();
                      $('#industria_negocio_9').attr("required","required");
                      $('#industria_razon_9').attr("required","required");
                      $('#industria_remuneracion_9').attr("required","required");

                      $("#div_add").hide();
                      $("#div_del").show();
                    }
                    else
                    {
                      $("#div_add").hide();
                      $("#div_del").show();
                    }
                  }
                }
              }
            }
          }
        }
      }
    }
  }
}

function ocultar_industrial()
{
  if($('#industria_9').css('display') != 'none')
  {
    $('#industria_9').hide();

    $('#industria_negocio_9').removeAttr("required");
    $('#industria_razon_9').removeAttr("required");
    $('#industria_remuneracion_9').removeAttr("required");

    $("#industria_negocio_9").val(null);
    $("#industria_razon_9").val(null);
    $("#industria_remuneracion_9").val(null);

    $("#div_add").show();
  }
  else
  {
    if($('#industria_8').css('display') != 'none')
    {
      $('#industria_8').hide();
      $('#industria_negocio_8').removeAttr("required");
      $('#industria_razon_8').removeAttr("required");
      $('#industria_remuneracion_8').removeAttr("required");

      $("#industria_negocio_8").val(null);
      $("#industria_razon_8").val(null);
      $("#industria_remuneracion_8").val(null);

      $("#div_add").show();
    }
    else
    {
      if($('#industria_7').css('display') != 'none')
      {
        $('#industria_7').hide();
        $('#industria_negocio_7').removeAttr("required");
        $('#industria_razon_7').removeAttr("required");
        $('#industria_remuneracion_7').removeAttr("required");

        $("#industria_negocio_7").val(null);
        $("#industria_razon_7").val(null);
        $("#industria_remuneracion_7").val(null);

        $("#div_add").show();
      }
      else
      {
        if($('#industria_6').css('display') != 'none')
        {
          $('#industria_6').hide();

          $('#industria_negocio_6').removeAttr("required");
          $('#industria_razon_6').removeAttr("required");
          $('#industria_remuneracion_6').removeAttr("required");

          $("#industria_negocio_6").val(null);
          $("#industria_razon_6").val(null);
          $("#industria_remuneracion_6").val(null);

          $("#div_add").show();
        }
        else
        {
          if($('#industria_5').css('display') != 'none')
          {
            $('#industria_5').hide();

            $('#industria_negocio_5').removeAttr("required");
            $('#industria_razon_5').removeAttr("required");
            $('#industria_remuneracion_5').removeAttr("required");

            $("#industria_negocio_5").val(null);
            $("#industria_razon_5").val(null);
            $("#industria_remuneracion_5").val(null);

            $("#div_add").show();
          }
          else
          {
            if($('#industria_4').css('display') != 'none')
            {
              $('#industria_4').hide();
              $('#industria_negocio_4').removeAttr("required");
              $('#industria_razon_4').removeAttr("required");
              $('#industria_remuneracion_4').removeAttr("required");

              $("#industria_negocio_4").val(null);
              $("#industria_razon_4").val(null);
              $("#industria_remuneracion_4").val(null);

              $("#div_add").show();
            }
            else
            {
              if($('#industria_3').css('display') != 'none')
              {
                $('#industria_3').hide();
                $('#industria_negocio_3').removeAttr("required");
                $('#industria_razon_3').removeAttr("required");
                $('#industria_remuneracion_3').removeAttr("required");

                $("#industria_negocio_3").val(null);
                $("#industria_razon_3").val(null);
                $("#industria_remuneracion_3").val(null);

                $("#div_add").show();
              }
              else
              {
                if($('#industria_2').css('display') != 'none')
                {
                  $('#industria_2').hide();
                  $('#industria_negocio_2').removeAttr("required");
                  $('#industria_razon_2').removeAttr("required");
                  $('#industria_remuneracion_2').removeAttr("required");

                  $("#industria_negocio_2").val(null);
                  $("#industria_razon_2").val(null);
                  $("#industria_remuneracion_2").val(null);

                  $("#div_add").show();
                }
                else
                {
                  if($('#industria_1').css('display') != 'none')
                  {
                    $('#industria_1').hide();
                    $('#industria_negocio_1').removeAttr("required");
                    $('#industria_razon_1').removeAttr("required");
                    $('#industria_remuneracion_1').removeAttr("required");

                    $("#industria_negocio_1").val(null);
                    $("#industria_razon_1").val(null);
                    $("#industria_remuneracion_1").val(null);

                    $("#div_add").show();
                  }
                  else
                  {
                    if($('#industria_0').css('display') != 'none')
                    {
                      $('#industria_0').hide();
                      $('#industria_negocio_0').removeAttr("required");
                      $('#industria_razon_0').removeAttr("required");
                      $('#industria_remuneracion_0').removeAttr("required");

                      $("#industria_negocio_0").val(null);
                      $("#industria_razon_0").val(null);
                      $("#industria_remuneracion_0").val(null);

                      $("#div_add").show();
                      $("#div_del").hide();
                    }
                  }
                }
              }
            }
          }
        }
      }
    }
  }
}




@empty(old())
  @isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['actividadIndustrialComercialEmpresarial'])
    @foreach($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['actividadIndustrialComercialEmpresarial']['actividades'] as $fila)
      $("#industria_negocio_{{ $loop->index }}").val("{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['actividadIndustrialComercialEmpresarial']['actividades'][$loop->index]['tipoNegocio'] }}");
      $("#industria_razon_{{ $loop->index }}").val("{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['actividadIndustrialComercialEmpresarial']['actividades'][$loop->index]['nombreRazonSocial'] }}");
      $("#industria_remuneracion_{{ $loop->index }}").val("@money($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['actividadIndustrialComercialEmpresarial']['actividades'][$loop->index]['remuneracion']['valor'])");
      $("#industria_{{ $loop->index }}").show();
      $("#div_del").show();
    @endforeach
  @endisset

  @isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['actividadFinanciera'])
    @foreach($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['actividadFinanciera']['actividades'] as $fila)
      $("#financiera_tipoInstrumento_{{ $loop->index }}").val("{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['actividadFinanciera']['actividades'][$loop->index]['tipoInstrumento']['clave'] }}");
      $("#financiera_remuneracion_{{ $loop->index }}").val("@money($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['actividadFinanciera']['actividades'][$loop->index]['remuneracion']['valor'])");
      $("#financiera_{{ $loop->index }}").show();
      $("#div_del2").show();
    @endforeach
  @endisset

  @isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['serviciosProfesionales'])
    @foreach($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['serviciosProfesionales']['servicios'] as $fila)
      $("#tipoServicio_{{ $loop->index }}").val("{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['serviciosProfesionales']['servicios'][$loop->index]['tipoServicio'] }}");
      $("#servicio_remuneracion_{{ $loop->index }}").val("@money($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['serviciosProfesionales']['servicios'][$loop->index]['remuneracion']['valor'])");
      $("#servicios_{{ $loop->index }}").show();
      $("#div_del3").show();
    @endforeach
  @endisset


  @isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['enajenacionBienes'])
    @foreach($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['enajenacionBienes']['bienes'] as $fila)
      $("#tipoBienEnajenado_{{ $loop->index }}").val("{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['enajenacionBienes']['bienes'][$loop->index]['tipoBienEnajenado'] }}");
      $("#bien_remuneracion_{{ $loop->index }}").val("@money($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['enajenacionBienes']['bienes'][$loop->index]['remuneracion']['valor'])");
      $("#bienes_{{ $loop->index }}").show();
      $("#div_del4").show();
    @endforeach
  @endisset

  @isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['otrosIngresos'])
    @foreach($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['otrosIngresos']['ingresos'] as $fila)
      $("#tipoIngreso_{{ $loop->index }}").val("{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['otrosIngresos']['ingresos'][$loop->index]['tipoIngreso'] }}");
      $("#ingreso_remuneracion_{{ $loop->index }}").val("@money($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['otrosIngresos']['ingresos'][$loop->index]['remuneracion']['valor'])");
      $("#ingresos_{{ $loop->index }}").show();
      $("#div_del5").show();
    @endforeach
  @endisset

@endempty
