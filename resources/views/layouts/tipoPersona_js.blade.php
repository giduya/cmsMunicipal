$("#tipoPersona").ready(largo_rfc);
$("#tipoPersona").change(largo_rfc);

function largo_rfc()
{
  var fValue = $("#tipoPersona").val();

  if(fValue == "MORAL")
  {
    $('#rfc').attr("maxlength","12");
    $('#rfc').attr("minlength","12");
  }
  else
  {
    $('#rfc').attr("maxlength","13");
    $('#rfc').attr("minlength","13");
  }
}
