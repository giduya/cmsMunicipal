$("#pais").ready(mostrar_mexico);
$("#pais").change(mostrar_mexico);

function mostrar_mexico()
{
  var paisValue = $("#pais").val();

  if(paisValue == "")
  {
    $('#div_entidadFederativa').hide();
    $('#div_municipioAlcaldia').hide();
    $('#div_coloniaLocalidad').hide();
    $("#entidadFederativa").removeAttr("required");
    $('#municipioAlcaldia').removeAttr("required");
    $('#coloniaLocalidad').removeAttr("required");

    $('#div_estadoProvincia').hide();
    $('#div_ciudadLocalidad').hide();
    $('#estadoProvincia').removeAttr("required","required");
    $('#ciudadLocalidad').removeAttr("required","required");

    $('#codigoPostal').removeAttr("readonly","readonly");

    $('#div_exterior').hide();
    $('#div_interior').hide();
  }
  else if(paisValue == "MX")
  {
    $('#div_entidadFederativa').show();
    $('#div_municipioAlcaldia').show();
    $('#div_coloniaLocalidad').show();

    $('#div_estadoProvincia').hide();
    $('#div_ciudadLocalidad').hide();

    $('#entidadFederativa').attr("required","required");
    $('#municipioAlcaldia').attr("required","required");
    $('#coloniaLocalidad').attr("required","required");

    $('#estadoProvincia').removeAttr("required","required");
    $('#ciudadLocalidad').removeAttr("required","required");

    $('#codigoPostal').attr("readonly","readonly");

    $("#entidadFederativa").change(mostrar_alcaldias);
    $("#municipioAlcaldia").change(mostrar_localidades);
    $("#coloniaLocalidad").change(mostrar_cp);
  }
  else
  {
    $('#div_entidadFederativa').hide();
    $('#div_municipioAlcaldia').hide();
    $('#div_coloniaLocalidad').hide();
    $("#entidadFederativa").removeAttr("required");
    $('#municipioAlcaldia').removeAttr("required");
    $('#coloniaLocalidad').removeAttr("required");

    $('#div_estadoProvincia').show();
    $('#div_ciudadLocalidad').show();
    $('#estadoProvincia').attr("required","required");
    $('#ciudadLocalidad').attr("required","required");

    $('#codigoPostal').removeAttr("readonly");
    $('#codigoPostal').attr("maxlength","13");
  }
}


function mostrar_alcaldias()
{
  var entidadValue = $("#entidadFederativa").val();
  $('#municipioAlcaldia_clave').find('option').not(':first').remove();

  $.ajax({
    url: '/../../../../catalogo/getAlcaldias/'+entidadValue,
    type: 'get',
    dataType: 'json',
    success: function(response)
    {
      var len = 0;
      if(response != null)
      {
        len = response.length;
      }

      if(len > 0)
      {
        for(var i=0; i<len; i++ )
        {
          var id = response[i].Cve_Mun;
          var nombre = response[i].Nom_Mun;
          var entidad = response[i].Cve_Ent;
          var option = "<option value='"+id+"'>"+nombre+"</option>";

          $("#municipioAlcaldia").append(option);
          $('#coloniaLocalidad').find('option').not(':first').remove();
        }
      }
    }
  });
};


function mostrar_localidades()
{
  var entidadValue = $("#entidadFederativa").val();
  var alcaldiaValue = $("#municipioAlcaldia").val();

  $('#coloniaLocalidad').find('option').not(':first').remove();

  $.ajax({
    url: '/../../../../catalogo/getLocalidades/'+entidadValue+'/'+alcaldiaValue,
    type: 'get',
    dataType: 'json',
    success: function(response)
    {
      var len = 0;
      if(response != null)
      {
        len = response.length;
      }

      if(len > 0)
      {
        for(var i=0; i<len; i++)
        {
          var nombre = response[i].Nom_Loc;
          var option = "<option value='"+nombre+"'>"+nombre+"</option>";
          $("#coloniaLocalidad").append(option);
        }
      }
    }
  });
}


function mostrar_cp()
{
  var entidadValue = $("#entidadFederativa").val();
  var alcaldiaValue = $("#municipioAlcaldia").val();
  var localidadValue = $("#coloniaLocalidad").val();

  $.ajax({
    url: '/../../../../catalogo/getCP/'+entidadValue+'/'+alcaldiaValue+'/'+localidadValue,
    type: 'get',
    dataType: 'json',
    success: function(response)
    {
      var len = 0;
      if(response != null)
      {
        len = response.length;
      }

      if(len > 0)
      {
        for(var i=0; i<len; i++)
        {
          var cp = response[i].CP;
          $("#codigoPostal").val(cp);
          $("#codigoPostal").attr("readonly","readonly");
        }
      }
    }
  });
}
