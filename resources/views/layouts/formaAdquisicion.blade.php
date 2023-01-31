$("#formaAdquisicion").ready(mostrar_subtipo);
$("#formaAdquisicion").change(mostrar_subtipo);

function mostrar_subtipo()
{
  var subValue = $("#formaAdquisicion").val();

  var tipoValue = $("#formaAdquisicion").val();
  $('#formaPago').find('option').not(':first').remove();

  $.ajax({
      url: '/catalogo/getPago/'+tipoValue,
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
            var id = response[i].clave;
            var valor = response[i].valor;
            var option = "<option value='"+id+"'>"+valor+"</option>";

            $("#formaPago").append(option);

            @if(old('formaPago'))
              $('#formaPago option[value="{{ old('formaPago') }}"]').attr("selected", "selected");
            @elseif(isset(Route::current()->parameters()['array']))
              $('#formaPago option[value="{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['formaPago'] }}"]').attr("selected", "selected");
            @endif
          }
        }
      }
    });
}
