$("#add2").click(mostrar_transmisor);

function mostrar_transmisor()
{
  if($('#transmisor_1').css('display') == 'none')
  {
    $('#transmisor_1').show();
    $('#transmisor_tipoPersona_1').attr("required","required");
    $('#transmisor_nombreRazonSocial_1').attr("required","required");
    $('#transmisor_relacion_1').attr("required","required");
    $('#div_del2').show();
  }
  else
  {
    if($('#transmisor_2').css('display') == 'none')
    {
      $('#transmisor_2').show();
      $('#transmisor_tipoPersona_2').attr("required","required");
      $('#transmisor_nombreRazonSocial_2').attr("required","required");
      $('#transmisor_relacion_2').attr("required","required");
    }
    else
    {
      if($('#transmisor_3').css('display') == 'none')
      {
        $('#transmisor_3').show();
        $('#transmisor_tipoPersona_3').attr("required","required");
        $('#transmisor_nombreRazonSocial_3').attr("required","required");
        $('#transmisor_relacion_3').attr("required","required");
      }
      else
      {
        if($('#transmisor_4').css('display') == 'none')
        {
          $('#transmisor_4').show();
          $('#transmisor_tipoPersona_4').attr("required","required");
          $('#transmisor_nombreRazonSocial_4').attr("required","required");
          $('#transmisor_relacion_4').attr("required","required");
        }
        else
        {
          if($('#transmisor_5').css('display') == 'none')
          {
            $('#transmisor_5').show();
            $('#transmisor_tipoPersona_5').attr("required","required");
            $('#transmisor_nombreRazonSocial_5').attr("required","required");
            $('#transmisor_relacion_5').attr("required","required");
          }
          else
          {
            if($('#transmisor_6').css('display') == 'none')
            {
              $('#transmisor_6').show();
              $('#transmisor_tipoPersona_6').attr("required","required");
              $('#transmisor_nombreRazonSocial_6').attr("required","required");
              $('#transmisor_relacion_6').attr("required","required");
            }
            else
            {
              if($('#transmisor_7').css('display') == 'none')
              {
                $('#transmisor_7').show();
                $('#transmisor_tipoPersona_7').attr("required","required");
                $('#transmisor_nombreRazonSocial_7').attr("required","required");
                $('#transmisor_relacion_7').attr("required","required");
              }
              else
              {
                if($('#transmisor_8').css('display') == 'none')
                {
                  $('#transmisor_8').show();
                  $('#transmisor_tipoPersona_8').attr("required","required");
                  $('#transmisor_nombreRazonSocial_8').attr("required","required");
                  $('#transmisor_relacion_8').attr("required","required");
                }
                else
                {
                  if($('#transmisor_9').css('display') == 'none')
                  {
                    $('#transmisor_9').show();
                    $('#transmisor_tipoPersona_9').attr("required","required");
                    $('#transmisor_nombreRazonSocial_9').attr("required","required");
                    $('#transmisor_relacion_9').attr("required","required");
                    $('#div_add2').hide();
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


$("#del2").click(ocultar_transmisor);

function ocultar_transmisor()
{
  if($('#transmisor_9').css('display') == 'flex')
  {
    $('#transmisor_9').hide();
    $('#transmisor_tipoPersona_9').removeAttr("required");
    $('#transmisor_nombreRazonSocial_9').removeAttr("required");
    $('#transmisor_relacion_9').removeAttr("required");
    $('#transmisor_especifiqueRelacion_9').removeAttr("required");
    $('#div_add2').show();
  }
  else
  {
    if($('#transmisor_8').css('display') == 'flex')
    {
      $('#transmisor_8').hide();
      $('#transmisor_tipoPersona_8').removeAttr("required");
      $('#transmisor_nombreRazonSocial_8').removeAttr("required");
      $('#transmisor_relacion_8').removeAttr("required");
      $('#transmisor_especifiqueRelacion_8').removeAttr("required");
      $('#div_add2').show();
    }
    else
    {
      if($('#transmisor_7').css('display') == 'flex')
      {
        $('#transmisor_7').hide();
        $('#transmisor_tipoPersona_7').removeAttr("required");
        $('#transmisor_nombreRazonSocial_7').removeAttr("required");
        $('#transmisor_relacion_7').removeAttr("required");
        $('#transmisor_especifiqueRelacion_7').removeAttr("required");
        $('#div_add2').show();
      }
      else
      {
        if($('#transmisor_6').css('display') == 'flex')
        {
          $('#transmisor_6').hide();
          $('#transmisor_tipoPersona_6').removeAttr("required");
          $('#transmisor_nombreRazonSocial_6').removeAttr("required");
          $('#transmisor_relacion_6').removeAttr("required");
          $('#transmisor_especifiqueRelacion_6').removeAttr("required");
          $('#div_add2').show();
        }
        else
        {
          if($('#transmisor_5').css('display') == 'flex')
          {
            $('#transmisor_5').hide();
            $('#transmisor_tipoPersona_5').removeAttr("required");
            $('#transmisor_nombreRazonSocial_5').removeAttr("required");
            $('#transmisor_relacion_5').removeAttr("required");
            $('#transmisor_especifiqueRelacion_5').removeAttr("required");
            $('#div_add2').show();
          }
          else
          {
            if($('#transmisor_4').css('display') == 'flex')
            {
              $('#transmisor_4').hide();
              $('#transmisor_tipoPersona_4').removeAttr("required");
              $('#transmisor_nombreRazonSocial_4').removeAttr("required");
              $('#transmisor_relacion_4').removeAttr("required");
              $('#transmisor_especifiqueRelacion_4').removeAttr("required");
              $('#div_add2').show();
            }
            else
            {
              if($('#transmisor_3').css('display') == 'flex')
              {
                $('#transmisor_3').hide();
                $('#transmisor_tipoPersona_3').removeAttr("required");
                $('#transmisor_nombreRazonSocial_3').removeAttr("required");
                $('#transmisor_relacion_3').removeAttr("required");
                $('#transmisor_especifiqueRelacion_3').removeAttr("required");
                $('#div_add2').show();
              }
              else
              {
                if($('#transmisor_2').css('display') == 'flex')
                {
                  $('#transmisor_2').hide();
                  $('#transmisor_tipoPersona_2').removeAttr("required");
                  $('#transmisor_nombreRazonSocial_2').removeAttr("required");
                  $('#transmisor_relacion_2').removeAttr("required");
                  $('#transmisor_especifiqueRelacion_2').removeAttr("required");
                  $('#div_add2').show();
                }
                else
                {
                  if($('#transmisor_1').css('display') == 'flex')
                  {
                    $('#transmisor_1').hide();
                    $('#transmisor_tipoPersona_1').removeAttr("required");
                    $('#transmisor_nombreRazonSocial_1').removeAttr("required");
                    $('#transmisor_relacion_1').removeAttr("required");
                    $('#transmisor_especifiqueRelacion_1').removeAttr("required");
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






$("#transmisor_tipoPersona").ready(largo_rfcH);
$("#transmisor_tipoPersona").change(largo_rfcH);

function largo_rfcH()
{
  var personaValue = $("#transmisor_tipoPersona").val();

  if(personaValue == "MORAL")
  {
    $('#transmisor_rfc').attr("maxlength","12");
    $('#transmisor_rfc').attr("minlength","12");
  }
  else
  {
    $('#transmisor_rfc').attr("maxlength","13");
    $('#transmisor_rfc').attr("minlength","13");
  }
}

$("#transmisor_tipoPersona_1").ready(tlargo_rfc1);
$("#transmisor_tipoPersona_1").change(tlargo_rfc1);

function tlargo_rfc1()
{
  var personaValue = $("#transmisor_tipoPersona_1").val();

  if(personaValue == "MORAL")
  {
    $('#transmisor_rfc_1').attr("maxlength","12");
    $('#transmisor_rfc_1').attr("minlength","12");
  }
  else
  {
    $('#transmisor_rfc_1').attr("maxlength","13");
    $('#transmisor_rfc_1').attr("minlength","13");
  }
}

$("#transmisor_tipoPersona_2").ready(tlargo_rfc2);
$("#transmisor_tipoPersona_2").change(tlargo_rfc2);

function tlargo_rfc2()
{
  var personaValue = $("#transmisor_tipoPersona_2").val();

  if(personaValue == "MORAL")
  {
    $('#transmisor_rfc_2').attr("maxlength","12");
    $('#transmisor_rfc_2').attr("minlength","12");
  }
  else
  {
    $('#transmisor_rfc_2').attr("maxlength","13");
    $('#transmisor_rfc_2').attr("minlength","13");
  }
}

$("#transmisor_tipoPersona_3").ready(tlargo_rfc3);
$("#transmisor_tipoPersona_3").change(tlargo_rfc3);

function tlargo_rfc3()
{
  var personaValue = $("#transmisor_tipoPersona_3").val();

  if(personaValue == "MORAL")
  {
    $('#transmisor_rfc_3').attr("maxlength","12");
    $('#transmisor_rfc_3').attr("minlength","12");
  }
  else
  {
    $('#transmisor_rfc_3').attr("maxlength","13");
    $('#transmisor_rfc_3').attr("minlength","13");
  }
}

$("#transmisor_tipoPersona_4").ready(tlargo_rfc4);
$("#transmisor_tipoPersona_4").change(tlargo_rfc4);

function tlargo_rfc4()
{
  var personaValue = $("#transmisor_tipoPersona_4").val();

  if(personaValue == "MORAL")
  {
    $('#transmisor_rfc_4').attr("maxlength","12");
    $('#transmisor_rfc_4').attr("minlength","12");
  }
  else
  {
    $('#transmisor_rfc_4').attr("maxlength","13");
    $('#transmisor_rfc_4').attr("minlength","13");
  }
}

$("#transmisor_tipoPersona_5").ready(tlargo_rfc5);
$("#transmisor_tipoPersona_5").change(tlargo_rfc5);

function tlargo_rfc5()
{
  var personaValue = $("#transmisor_tipoPersona_5").val();

  if(personaValue == "MORAL")
  {
    $('#transmisor_rfc_5').attr("maxlength","12");
    $('#transmisor_rfc_5').attr("minlength","12");
  }
  else
  {
    $('#transmisor_rfc_5').attr("maxlength","13");
    $('#transmisor_rfc_5').attr("minlength","13");
  }
}

$("#transmisor_tipoPersona_6").ready(tlargo_rfc6);
$("#transmisor_tipoPersona_6").change(tlargo_rfc6);

function tlargo_rfc6()
{
  var personaValue = $("#transmisor_tipoPersona_6").val();

  if(personaValue == "MORAL")
  {
    $('#transmisor_rfc_6').attr("maxlength","12");
    $('#transmisor_rfc_6').attr("minlength","12");
  }
  else
  {
    $('#transmisor_rfc_6').attr("maxlength","13");
    $('#transmisor_rfc_6').attr("minlength","13");
  }
}

$("#transmisor_tipoPersona_7").ready(tlargo_rfc7);
$("#transmisor_tipoPersona_7").change(tlargo_rfc7);

function tlargo_rfc7()
{
  var personaValue = $("#transmisor_tipoPersona_7").val();

  if(personaValue == "MORAL")
  {
    $('#transmisor_rfc_7').attr("maxlength","12");
    $('#transmisor_rfc_7').attr("minlength","12");
  }
  else
  {
    $('#transmisor_rfc_7').attr("maxlength","13");
    $('#transmisor_rfc_7').attr("minlength","13");
  }
}

$("#transmisor_tipoPersona_8").ready(tlargo_rfc8);
$("#transmisor_tipoPersona_8").change(tlargo_rfc8);

function tlargo_rfc8()
{
  var personaValue = $("#transmisor_tipoPersona_8").val();

  if(personaValue == "MORAL")
  {
    $('#transmisor_rfc_8').attr("maxlength","12");
    $('#transmisor_rfc_8').attr("minlength","12");
  }
  else
  {
    $('#transmisor_rfc_8').attr("maxlength","13");
    $('#transmisor_rfc_8').attr("minlength","13");
  }
}

$("#transmisor_tipoPersona_9").ready(tlargo_rfc9);
$("#transmisor_tipoPersona_9").change(tlargo_rfc9);

function tlargo_rfc9()
{
  var personaValue = $("#transmisor_tipoPersona_9").val();

  if(personaValue == "MORAL")
  {
    $('#transmisor_rfc_9').attr("maxlength","12");
    $('#transmisor_rfc_9').attr("minlength","12");
  }
  else
  {
    $('#transmisor_rfc_9').attr("maxlength","13");
    $('#transmisor_rfc_9').attr("minlength","13");
  }
}

$("#transmisor_tipoPersona_0").ready(tlargo_rfc0);
$("#transmisor_tipoPersona_0").change(tlargo_rfc0);

function tlargo_rfc0()
{
  var personaValue = $("#transmisor_tipoPersona_0").val();

  if(personaValue == "MORAL")
  {
    $('#transmisor_rfc_0').attr("maxlength","12");
    $('#transmisor_rfc_0').attr("minlength","12");
  }
  else
  {
    $('#transmisor_rfc_0').attr("maxlength","13");
    $('#transmisor_rfc_0').attr("minlength","13");
  }
}
