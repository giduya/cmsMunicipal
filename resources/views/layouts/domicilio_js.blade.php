$("#pais").ready(function() {
    mostrar_pais($("#pais").val());
});

$("#pais").change(function() {
    mostrar_pais($("#pais").val());
});


$("#entidadFederativa").change(mostrar_alcaldias);
$("#municipioAlcaldia").change(mostrar_localidades);
$("#coloniaLocalidad").change(mostrar_cp);

$("#lugarDondeReside").ready(mostrar_domicilio);
$("#lugarDondeReside").change(mostrar_domicilio);

function mostrar_domicilio()
{
  if($("#lugarDondeReside").is(':checked'))
  {
    $('#domicilio').hide();
    $("#pais").removeAttr("required");
    mostrar_pais("");

    $("#calle").removeAttr("required");
    $('#numeroExterior').removeAttr("required");
    $('#codigoPostal').removeAttr("required");
  }
  else
  {
    $('#domicilio').show();
    mostrar_pais($("#pais").val());

    $("#pais").attr("required");
    $('#calle').attr("required","required");
    $('#numeroExterior').attr("required","required");
    $('#codigoPostal').attr("required","required");
  }
}


function mostrar_pais(varPais)
{

  if(varPais == "MX")
  {
    mostrar_entidad(true);
    mostrar_provincia(false);
  }
  else if(varPais == "")
  {
    mostrar_entidad(false);
    mostrar_provincia(false);
  }
  else
  {
    mostrar_entidad(false);
    mostrar_provincia(true);
  }

}


function mostrar_entidad(varEntidad)
{
  if(varEntidad == true)
  {
    $('#div_entidadFederativa').show();
    $('#div_municipioAlcaldia').show();
    $('#div_coloniaLocalidad').show();

    mostrar_alcaldias();

    $('#entidadFederativa').attr("required","required");
    $('#municipioAlcaldia').attr("required","required");
    $('#coloniaLocalidad').attr("required","required");
    $('#codigoPostal').attr("readonly","readonly");
  }
  else
  {
    $('#div_entidadFederativa').hide();
    $('#div_municipioAlcaldia').hide();
    $('#div_coloniaLocalidad').hide();

    $("#entidadFederativa").removeAttr("required");
    $('#municipioAlcaldia').removeAttr("required");
    $('#coloniaLocalidad').removeAttr("required");

    $('#codigoPostal').attr("maxlength","7");
    $('#codigoPostal').removeAttr("readonly");
  }
}


function mostrar_provincia(varProvincia)
{
  if(varProvincia == true)
  {
    $('#div_estadoProvincia').show();
    $('#div_ciudadLocalidad').show();

    $('#estadoProvincia').attr("required","required");
    $('#ciudadLocalidad').attr("required","required");
  }
  else
  {
    $('#div_estadoProvincia').hide();
    $('#div_ciudadLocalidad').hide();

    $('#estadoProvincia').removeAttr("required");
    $('#ciudadLocalidad').removeAttr("required");
  }
}


function mostrar_alcaldias()
{
  var entidadSelect = $("#entidadFederativa").val();

  $('#municipioAlcaldia').find('option').not(':first').remove();

  $.ajax({
    url: '/catalogo/getAlcaldias/'+entidadSelect,
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
          var id = response[i].Cve_Mun;
          var nombre = response[i].Nom_Mun;
          var option = "<option  value='"+id+"'>"+nombre+"</option>";

          $("#municipioAlcaldia").append(option);
          $('#coloniaLocalidad').find('option').not(':first').remove();
        }

        @if(old('municipioAlcaldia'))
          $('#municipioAlcaldia option[value="{{ old('municipioAlcaldia') }}"]').attr("selected", "selected");
        @elseif(isset(Route::current()->parameters()['subformatoSlug']))
          @if(isset(Route::current()->parameters()['array']))
            @isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['tipoBien']['inmueble'])
              @isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['tipoBien']['inmueble']['domicilioMexico'])
                $('#municipioAlcaldia option[value="{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['tipoBien']['inmueble']['domicilioMexico']['municipioAlcaldia']['clave'] }}"]').attr("selected", "selected");
              @endisset
            @endisset

            @isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['domicilioMexico'])
              $('#municipioAlcaldia option[value="@sinZero($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['domicilioMexico']['municipioAlcaldia']['clave'])"]').attr("selected", "selected");
            @endisset
          @endif
        @else

          @isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['domicilioMexico'])
            @if($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['domicilioMexico']['entidadFederativa']['clave'] != null)
              var entidadBD = {{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['domicilioMexico']['entidadFederativa']['clave'] }};
              if(entidadBD == entidadSelect)
              {
                $('#municipioAlcaldia option[value="{{ (int)$declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['domicilioMexico']['municipioAlcaldia']['clave'] }}"]').attr("selected", "selected");
              }
            @endif
          @endisset
        @endif

        mostrar_localidades();
      }
    }
  });
};


function mostrar_localidades()
{
  var entidadClave = $("#entidadFederativa").val();
  var alcaldiaSelect = $("#municipioAlcaldia").val();

  $('#coloniaLocalidad').find('option').not(':first').remove();

  $.ajax({
    url: '/catalogo/getLocalidades/'+entidadClave+'/'+alcaldiaSelect,
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
        $("#coloniaLocalidad").empty();
        var ini = '<option value="">Seleccionar:</option>';
        $("#coloniaLocalidad").append(ini);

        for(var i=0; i<len; i++)
        {
          var nombre = response[i].Nom_Loc;
          var option = "<option value='"+nombre+"'>"+nombre+"</option>";
          $("#coloniaLocalidad").append(option);
        }

        @if(old('coloniaLocalidad'))
          $('#coloniaLocalidad option[value="{{ old('coloniaLocalidad') }}"]').attr("selected", "selected");
        @elseif(isset(Route::current()->parameters()['subformatoSlug']))
          @if(isset(Route::current()->parameters()['array']))
            @if(isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['tipoBien']['inmueble']))
              @isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['tipoBien']['inmueble']['domicilioMexico'])
                $('#coloniaLocalidad option[value="{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['tipoBien']['inmueble']['domicilioMexico']['coloniaLocalidad'] }}"]').attr("selected", "selected");
              @endisset
            @endif

            @isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['domicilioMexico'])
              $('#coloniaLocalidad option[value="@sinZero($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['domicilioMexico']['coloniaLocalidad'])"]').attr("selected", "selected");
            @endisset
          @endif
        @else
          @isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['domicilioMexico'])
            @isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['domicilioMexico']['municipioAlcaldia']['clave'])
              @if(!empty($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['domicilioMexico']['municipioAlcaldia']['clave']))
                var munBD = @sinZero($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['domicilioMexico']['municipioAlcaldia']['clave']);
                if(munBD == alcaldiaSelect)
                {
                  $('#coloniaLocalidad option[value="{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['domicilioMexico']['coloniaLocalidad'] }}"]').attr("selected", "selected");
                }
              @endif
            @endisset
          @endisset
        @endif

        mostrar_cp();
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
    url: '/catalogo/getCP/'+entidadValue+'/'+alcaldiaValue+'/'+localidadValue,
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


@if(old('calle'))
  $("#pais").val("{{ old('pais') }}").change();
  $('#entidadFederativa').val({{ old('entidadFederativa') }});
  $("#calle").val("{{ old('calle') }}");
  $("#numeroExterior").val("{{ old('numeroExterior') }}");
  $("#numeroInterior").val("{{ old('numeroInterior') }}");
  $("#codigoPostal").val("{{ old('codigoPostal') }}");
@elseif(isset(Route::current()->parameters()['subformatoSlug']))
  @if(isset(Route::current()->parameters()['array']))
    @if(isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['tipoBien']['inmueble']))
      @if(empty($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['tipoBien']['inmueble']['domicilioMexico']['calle']))
        $("#pais").val("{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['tipoBien']['inmueble']['domicilioExtranjero']['pais'] }}");
        $("#estadoProvincia").val("{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['tipoBien']['inmueble']['domicilioExtranjero']['estadoProvincia'] }}");
        $("#ciudadLocalidad").val("{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['tipoBien']['inmueble']['domicilioExtranjero']['ciudadLocalidad'] }}");
        $("#calle").val("{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['tipoBien']['inmueble']['domicilioExtranjero']['calle'] }}");
        $("#numeroExterior").val("{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['tipoBien']['inmueble']['domicilioExtranjero']['numeroExterior'] }}");
        $("#numeroInterior").val("{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['tipoBien']['inmueble']['domicilioExtranjero']['numeroInterior'] }}");
        $("#codigoPostal").val("{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['tipoBien']['inmueble']['domicilioExtranjero']['codigoPostal'] }}");
      @elseif(empty($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['tipoBien']['domicilioExtranjero']['inmueble']['calle']))
        $("#pais").val("MX");
        $("#entidadFederativa").val("@sinZero($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['tipoBien']['inmueble']['domicilioMexico']['entidadFederativa']['clave'])");
        $("#calle").val("{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['tipoBien']['inmueble']['domicilioMexico']['calle'] }}");
        $("#numeroExterior").val("{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['tipoBien']['inmueble']['domicilioMexico']['numeroExterior'] }}");
        $("#numeroInterior").val("{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['tipoBien']['inmueble']['domicilioMexico']['numeroInterior'] }}");
      @endif
    @else
      @isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['domicilioExtranjero']['pais'])
        $("#pais").val("{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['domicilioExtranjero']['pais'] }}");
        $("#estadoProvincia").val("{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['domicilioExtranjero']['estadoProvincia'] }}");
        $("#ciudadLocalidad").val("{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['domicilioExtranjero']['ciudadLocalidad'] }}");
        $("#calle").val("{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['domicilioExtranjero']['calle'] }}");
        $("#numeroExterior").val("{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['domicilioExtranjero']['numeroExterior'] }}");
        $("#numeroInterior").val("{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['domicilioExtranjero']['numeroInterior'] }}");
        $("#codigoPostal").val("{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['domicilioExtranjero']['codigoPostal'] }}");
      @endisset
      @isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['domicilioMexico'])
        $("#pais").val("MX");
        $("#entidadFederativa").val("@sinZero($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['domicilioMexico']['entidadFederativa']['clave'])");
        $("#calle").val("{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['domicilioMexico']['calle'] }}");
        $("#numeroExterior").val("{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['domicilioMexico']['numeroExterior'] }}");
        $("#numeroInterior").val("{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['domicilioMexico']['numeroInterior'] }}");
      @endisset
    @endif
  @else
    $("#pais").val("MX");
  @endif
@else
  @isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['domicilioMexico'])
    $("#pais").val("MX").change();
    $("#entidadFederativa").val("@sinZero($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['domicilioMexico']['entidadFederativa']['clave'])");
    $("#calle").val("{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['domicilioMexico']['calle'] }}");
    $("#numeroExterior").val("{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['domicilioMexico']['numeroExterior'] }}");
    $("#numeroInterior").val("{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['domicilioMexico']['numeroInterior'] }}");
  @endisset
  @isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['domicilioExtranjero'])
    $("#pais").val("{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['domicilioExtranjero']['pais'] }}").change();
    $("#calle").val("{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['domicilioExtranjero']['calle'] }}");
    $("#numeroExterior").val("{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['domicilioExtranjero']['numeroExterior'] }}");
    $("#numeroInterior").val("{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['domicilioExtranjero']['numeroInterior'] }}");
    $("#codigoPostal").val("{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['domicilioExtranjero']['codigoPostal'] }}");
  @endisset
@endif
