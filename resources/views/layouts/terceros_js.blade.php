$('#titular').multiselect();

$("#titular").ready(mostrar_tit);
$("#titular").change(mostrar_tit);

function mostrar_tit()
{
  var titValue = $("#titular").val();

  if(jQuery.inArray("CTER",titValue) !== -1)
  {
    $('#terceros').show();
    $('#tercero_tipoPersona_0').attr("required","required");
    $('#tercero_nombreRazonSocial_0').attr("required","required");
  }
  else
  {
    $('#terceros').hide();
    $('#tercero_tipoPersona_0').removeAttr("required");
    $('#tercero_nombreRazonSocial_0').removeAttr("required");
  }

}


$("#del").click(ocultar_tercero);

function ocultar_tercero()
{
  if($('#tercero_9').css('display') == 'flex')
  {
    $('#tercero_9').hide();
    $('#tercero_tipoPersona_9').removeAttr("required");
    $('#tercero_nombreRazonSocial_9').removeAttr("required");
    $('#div_add').show();
  }
  else
  {
    if($('#tercero_8').css('display') == 'flex')
    {
      $('#tercero_8').hide();
      $('#tercero_tipoPersona_8').removeAttr("required");
      $('#tercero_nombreRazonSocial_8').removeAttr("required");
      $('#div_add').show();
    }
    else
    {
      if($('#tercero_7').css('display') == 'flex')
      {
        $('#tercero_7').hide();
        $('#tercero_tipoPersona_7').removeAttr("required");
        $('#tercero_nombreRazonSocial_7').removeAttr("required");
        $('#div_add').show();
      }
      else
      {
        if($('#tercero_6').css('display') == 'flex')
        {
          $('#tercero_6').hide();
          $('#tercero_tipoPersona_6').removeAttr("required");
          $('#tercero_nombreRazonSocial_6').removeAttr("required");
          $('#div_add').show();
        }
        else
        {
          if($('#tercero_5').css('display') == 'flex')
          {
            $('#tercero_5').hide();
            $('#tercero_tipoPersona_5').removeAttr("required");
            $('#tercero_nombreRazonSocial_5').removeAttr("required");
            $('#div_add').show();
          }
          else
          {
            if($('#tercero_4').css('display') == 'flex')
            {
              $('#tercero_4').hide();
              $('#tercero_tipoPersona_4').removeAttr("required");
              $('#tercero_nombreRazonSocial_4').removeAttr("required");
              $('#div_add').show();
            }
            else
            {
              if($('#tercero_3').css('display') == 'flex')
              {
                $('#tercero_3').hide();
                $('#tercero_tipoPersona_3').removeAttr("required");
                $('#tercero_nombreRazonSocial_3').removeAttr("required");
                $('#div_add').show();
              }
              else
              {
                if($('#tercero_2').css('display') == 'flex')
                {
                  $('#tercero_2').hide();
                  $('#tercero_tipoPersona_2').removeAttr("required");
                  $('#tercero_nombreRazonSocial_2').removeAttr("required");
                  $('#div_add').show();
                }
                else
                {
                  if($('#tercero_1').css('display') == 'flex')
                  {
                    $('#tercero_1').hide();
                    $('#tercero_tipoPersona_1').removeAttr("required");
                    $('#tercero_nombreRazonSocial_1').removeAttr("required");
                    $('#div_add').show();
                    $('#div_del').hide();
                  }
                  else
                  {
                    if($('#tercero_0').css('display') == 'flex')
                    {
                      $('#tercero_0').hide();
                      $('#tercero_tipoPersona_0').removeAttr("required");
                      $('#tercero_nombreRazonSocial_0').removeAttr("required");
                      $('#div_add').show();
                      $('#div_del').hide();
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



$("#add").click(mostrar_tercero);

function mostrar_tercero()
{
  if($('#tercero_1').css('display') == 'none')
  {
    $('#tercero_1').show();
    $('#tercero_tipoPersona_1').attr("required","required");
    $('#tercero_nombreRazonSocial_1').attr("required","required");
    $('#div_del').show();
  }
  else
  {
    if($('#tercero_2').css('display') == 'none')
    {
      $('#tercero_2').show();
      $('#tercero_tipoPersona_2').attr("required","required");
      $('#tercero_nombreRazonSocial_2').attr("required","required");
    }
    else
    {
      if($('#tercero_3').css('display') == 'none')
      {
        $('#tercero_3').show();
        $('#tercero_tipoPersona_3').attr("required","required");
        $('#tercero_nombreRazonSocial_3').attr("required","required");
      }
      else
      {
        if($('#tercero_4').css('display') == 'none')
        {
          $('#tercero_4').show();
          $('#tercero_tipoPersona_4').attr("required","required");
          $('#tercero_nombreRazonSocial_4').attr("required","required");
        }
        else
        {
          if($('#tercero_5').css('display') == 'none')
          {
            $('#tercero_5').show();
            $('#tercero_tipoPersona_5').attr("required","required");
            $('#tercero_nombreRazonSocial_5').attr("required","required");
          }
          else
          {
            if($('#tercero_6').css('display') == 'none')
            {
              $('#tercero_6').show();
              $('#tercero_tipoPersona_6').attr("required","required");
              $('#tercero_nombreRazonSocial_6').attr("required","required");
            }
            else
            {
              if($('#tercero_7').css('display') == 'none')
              {
                $('#tercero_7').show();
                $('#tercero_tipoPersona_7').attr("required","required");
                $('#tercero_nombreRazonSocial_7').attr("required","required");
              }
              else
              {
                if($('#tercero_8').css('display') == 'none')
                {
                  $('#tercero_8').show();
                  $('#tercero_tipoPersona_8').attr("required","required");
                  $('#tercero_nombreRazonSocial_8').attr("required","required");
                }
                else
                {
                  if($('#tercero_9').css('display') == 'none')
                  {
                    $('#tercero_9').show();
                    $('#tercero_tipoPersona_9').attr("required","required");
                    $('#tercero_nombreRazonSocial_9').attr("required","required");
                    $('#div_add').hide();
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

$("#tercero_tipoPersona_1").ready(largo_rfc1);
$("#tercero_tipoPersona_1").change(largo_rfc1);

function largo_rfc1()
{
  var personaValue = $("#tercero_tipoPersona_1").val();

  if(personaValue == "MORAL")
  {
    $('#tercero_rfc_1').attr("maxlength","12");
    $('#tercero_rfc_1').attr("minlength","12");
  }
  else
  {
    $('#tercero_rfc_1').attr("maxlength","13");
    $('#tercero_rfc_1').attr("minlength","13");
  }
}

$("#tercero_tipoPersona_2").ready(largo_rfc2);
$("#tercero_tipoPersona_2").change(largo_rfc2);

function largo_rfc2()
{
  var personaValue = $("#tercero_tipoPersona_2").val();

  if(personaValue == "MORAL")
  {
    $('#tercero_rfc_2').attr("maxlength","12");
    $('#tercero_rfc_2').attr("minlength","12");
  }
  else
  {
    $('#tercero_rfc_2').attr("maxlength","13");
    $('#tercero_rfc_2').attr("minlength","13");
  }
}

$("#tercero_tipoPersona_3").ready(largo_rfc3);
$("#tercero_tipoPersona_3").change(largo_rfc3);

function largo_rfc3()
{
  var personaValue = $("#tercero_tipoPersona_3").val();

  if(personaValue == "MORAL")
  {
    $('#tercero_rfc_3').attr("maxlength","12");
    $('#tercero_rfc_3').attr("minlength","12");
  }
  else
  {
    $('#tercero_rfc_3').attr("maxlength","13");
    $('#tercero_rfc_3').attr("minlength","13");
  }
}

$("#tercero_tipoPersona_4").ready(largo_rfc4);
$("#tercero_tipoPersona_4").change(largo_rfc4);

function largo_rfc4()
{
  var personaValue = $("#tercero_tipoPersona_4").val();

  if(personaValue == "MORAL")
  {
    $('#tercero_rfc_4').attr("maxlength","12");
    $('#tercero_rfc_4').attr("minlength","12");
  }
  else
  {
    $('#tercero_rfc_4').attr("maxlength","13");
    $('#tercero_rfc_4').attr("minlength","13");
  }
}

$("#tercero_tipoPersona_5").ready(largo_rfc5);
$("#tercero_tipoPersona_5").change(largo_rfc5);

function largo_rfc5()
{
  var personaValue = $("#tercero_tipoPersona_5").val();

  if(personaValue == "MORAL")
  {
    $('#tercero_rfc_5').attr("maxlength","12");
    $('#tercero_rfc_5').attr("minlength","12");
  }
  else
  {
    $('#tercero_rfc_5').attr("maxlength","13");
    $('#tercero_rfc_5').attr("minlength","13");
  }
}

$("#tercero_tipoPersona_6").ready(largo_rfc6);
$("#tercero_tipoPersona_6").change(largo_rfc6);

function largo_rfc6()
{
  var personaValue = $("#tercero_tipoPersona_6").val();

  if(personaValue == "MORAL")
  {
    $('#tercero_rfc_6').attr("maxlength","12");
    $('#tercero_rfc_6').attr("minlength","12");
  }
  else
  {
    $('#tercero_rfc_6').attr("maxlength","13");
    $('#tercero_rfc_6').attr("minlength","13");
  }
}

$("#tercero_tipoPersona_7").ready(largo_rfc7);
$("#tercero_tipoPersona_7").change(largo_rfc7);

function largo_rfc7()
{
  var personaValue = $("#tercero_tipoPersona_7").val();

  if(personaValue == "MORAL")
  {
    $('#tercero_rfc_7').attr("maxlength","12");
    $('#tercero_rfc_7').attr("minlength","12");
  }
  else
  {
    $('#tercero_rfc_7').attr("maxlength","13");
    $('#tercero_rfc_7').attr("minlength","13");
  }
}

$("#tercero_tipoPersona_8").ready(largo_rfc8);
$("#tercero_tipoPersona_8").change(largo_rfc8);

function largo_rfc8()
{
  var personaValue = $("#tercero_tipoPersona_8").val();

  if(personaValue == "MORAL")
  {
    $('#tercero_rfc_8').attr("maxlength","12");
    $('#tercero_rfc_8').attr("minlength","12");
  }
  else
  {
    $('#tercero_rfc_8').attr("maxlength","13");
    $('#tercero_rfc_8').attr("minlength","13");
  }
}

$("#tercero_tipoPersona_9").ready(largo_rfc9);
$("#tercero_tipoPersona_9").change(largo_rfc9);

function largo_rfc9()
{
  var personaValue = $("#tercero_tipoPersona_9").val();

  if(personaValue == "MORAL")
  {
    $('#tercero_rfc_9').attr("maxlength","12");
    $('#tercero_rfc_9').attr("minlength","12");
  }
  else
  {
    $('#tercero_rfc_9').attr("maxlength","13");
    $('#tercero_rfc_9').attr("minlength","13");
  }
}

$("#tercero_tipoPersona_0").ready(largo_rfc0);
$("#tercero_tipoPersona_0").change(largo_rfc0);

function largo_rfc0()
{
  var personaValue = $("#tercero_tipoPersona_0").val();

  if(personaValue == "MORAL")
  {
    $('#tercero_rfc_0').attr("maxlength","12");
    $('#tercero_rfc_0').attr("minlength","12");
  }
  else
  {
    $('#tercero_rfc_0').attr("maxlength","13");
    $('#tercero_rfc_0').attr("minlength","13");
  }
}
