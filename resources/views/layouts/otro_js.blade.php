$("#otro").ready(mostrar_otro);
$("#otro").change(mostrar_otro);

function mostrar_otro()
{
  var otroValue = $("#otro").val();

  if(otroValue == "OTRO" || otroValue == "O" || otroValue == "OTR" || otroValue == "CAS")
  {
    $('#div_otro').show();
    $('#especifiqueotro').attr("required","required");
  }
  else
  {
    $('#div_otro').hide();
    $('#especifiqueotro').removeAttr("required");
  }
}
