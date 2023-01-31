@extends('layouts.formulario')

@section('formulario')
                  <fieldset id="fieldset_participacion">
                    <legend><h4 class="mb-3">¿Qué participación hay en el fideicomiso?:</h4></legend>

                    <div class="row">
                      <div class="col-md-6 mb-3">
                        <label for="tipoRelacion">¿Quién participa en el fideicomiso?: 🌐 <code>*</code></label>
                        <select class="form-control @error('tipoRelacion') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="tipoRelacion" name="tipoRelacion" required autofocus>
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->tipoRelacion() as $relacion)
                          <option value="{{ $relacion->clave }}"
                            @if(old('tipoRelacion'))
                              @if($relacion->clave == old('tipoRelacion'))
                                selected
                              @endif
                            @elseif(isset(Route::current()->parameters()['array']))
                              @if($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['tipoRelacion'] == $relacion->clave)
                                selected
                              @endif
                            @endif
                          >
                            {{ $relacion->valor }}
                          </option>
                          @endforeach
                        </select>
                        @error('tipoRelacion')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-6 mb-3">
                        <label for="tipoParticipacion">¿Como participa?: 🌐 <code>*</code></label>
                        <select class="form-control @error('tipoParticipacion') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="tipoParticipacion" name="tipoParticipacion" required>
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->tipoParticipacionFideicomiso() as $tipo)
                          <option value="{{ $tipo->clave }}"
                            @if(old('tipoParticipacion'))
                              @if($tipo->clave == old('tipoParticipacion'))
                                selected
                              @endif
                            @elseif(isset(Route::current()->parameters()['array']))
                              @if($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['tipoParticipacion'] == $tipo->clave)
                                selected
                              @endif
                            @endif
                          >
                            {{ $tipo->valor }}
                          </option>
                          @endforeach
                        </select>
                        @error('tipoParticipacion')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>

                  </fieldset >

                  <p>&nbsp;</p>

                  <fieldset>
                    <legend><h4 class="mb-3">Datos del fideicomiso:</h4></legend>

                    <div class="row">
                      <div class="col-md-4 mb-3">
                        <label for="tipoFideicomiso">Tipo: 🌐 <code>*</code></label>
                        <select class="form-control @error('tipoFideicomiso') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="tipoFideicomiso" name="tipoFideicomiso" required="required">
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->tipoFideicomiso() as $tipo)
                          <option value="{{ $tipo->clave }}"
                            @if(old('tipoFideicomiso'))
                              @if($tipo->clave == old('tipoFideicomiso'))
                                selected
                              @endif
                            @elseif(isset(Route::current()->parameters()['array']))
                              @if($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['tipoFideicomiso'] == $tipo->clave)
                                selected
                              @endif
                            @endif
                          >
                            {{ $tipo->valor }}
                          </option>
                          @endforeach
                        </select>
                        @error('tipoFideicomiso')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-4 mb-3">
                        <label for="rfcFideicomiso">RFC: 🌐</label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('rfcMoralHomo') is-invalid @enderror" id="rfcFideicomiso" name="rfcMoralHomo"
                        @if(old('rfcMoralHomo'))
                          value="{{ old('rfcMoralHomo') }}"
                        @elseif(isset(Route::current()->parameters()['array']))
                          value="{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['rfcFideicomiso'] }}"
                        @endif
                        maxlength="12" minlength="12">
                        @error('rfcMoralHomo')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      @include('layouts.sector_html')

                      @include('layouts.ubicacion_html')
                    </div>
                  </fieldset>

                  <p class="datos_persona">&nbsp;</p>

                  <fieldset class="datos_persona">
                    <legend>
                      <h4 class="mb-3">
                        Datos del <span class="fideicomisario">fideicomisario:</span>
                                  <span class="fideicomitente">fideicomitente:</span>
                                  <span class="fiduciario">fiduciario:</span>
                      </h4>
                      <h5>
                        <small class="fideicomisario">
                        El fideicomisario es el beneficiario que fue nombrado en el contrato de fideicomiso. Puede ser una persona física o moral, que recibirá bienes, valores o recursos cuando se cumplan las condiciones establecidas.
                        </small>
                        <small class="fideicomitente">
                        El fideicomitente es la persona física o moral que establece un fideicomiso, es decir, que entrega ciertos bienes a otra persona, para que los administre y utilice de acuerdo con un fin determinado.
                        </small>
                        <small class="fiduciario">
                        El fiduciario es una persona que administra el dinero o los bienes de otras personas.
                        </small>
                      </h5>
                    </legend>

                    @include('layouts.tipoPersona_html')
                  </fieldset>
@endsection



@section('script')

@if(isset(Route::current()->parameters()['array']))
  @empty(old('tipoRelacion'))
    @isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['fideicomisario'])
      $("#tipoPersona").val("{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['fideicomisario']['tipoPersona'] }}");
      $("#nombreRazonSocial").val("{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['fideicomisario']['nombreRazonSocial'] }}");
      $("#rfc").val("{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['fideicomisario']['rfc'] }}");
    @endif

    @isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['fideicomitente'])
      $("#tipoPersona").val("{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['fideicomitente']['tipoPersona'] }}");
      $("#nombreRazonSocial").val("{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['fideicomitente']['nombreRazonSocial'] }}");
      $("#rfc").val("{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['fideicomitente']['rfc'] }}");
    @endif

    @isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['fiduciario'])
      $("#nombreRazonSocial").val("{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['fiduciario']['nombreRazonSocial'] }}");
      $("#rfc").val("{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['fiduciario']['rfc'] }}");
    @endif
  @endif
@endif



@include('layouts.tipoPersona_js')

$('#extranjero').attr("tabindex","6");
$('#tipoPersona').attr("tabindex","8");
$('#nombreRazonSocial').attr("tabindex","8");
$('#rfc').attr("tabindex","9");
$('#send').attr("tabindex","10");

$("#tipoParticipacion").ready(mostrar_part);
$("#tipoParticipacion").change(mostrar_part);

function mostrar_part()
{
  var partValue = $("#tipoParticipacion").val();

  if(partValue == "")
  {
    $('.fiduciario').hide();
    $('.fideicomitente').hide();
    $('.fiduciario').hide();
    $(".datos_persona").hide();

    $('#tipoPersona').removeAttr("required");
    $('#nombreRazonSocial').removeAttr("required");
  }
  else if(partValue == "FIDEICOMISARIO")
  {
    $('.fideicomisario').show();
    $('.fideicomitente').hide();
    $('.fiduciario').hide();
    $(".datos_persona").show();
    $("#div_tipoPersona").show();

    $("#tipoPersona").ready(largo_rfc);

    $('#tipoPersona').attr("required","required");
    $('#nombreRazonSocial').attr("required","required");
  }
  else if(partValue == "FIDEICOMITENTE")
  {
    $('.fideicomisario').hide();
    $('.fideicomitente').show();
    $('.fiduciario').hide();
    $(".datos_persona").show();
    $("#div_tipoPersona").show();

    $("#tipoPersona").ready(largo_rfc);

    $('#tipoPersona').attr("required","required");
    $('#nombreRazonSocial').attr("required","required");
  }
  else if(partValue == "FIDUCIARIO")
  {
    $('.fideicomisario').hide();
    $('.fideicomitente').hide();
    $('.fiduciario').show();
    $('#myURL').attr("value", "");

    $(".datos_persona").show();
    $("#div_tipoPersona").hide();

    $('#rfc').attr("minlength","13");
    $('#rfc').attr("maxlength","13");

    $('#tipoPersona').removeAttr("required");
    $('#nombreRazonSocial').attr("required","required");
  }
  else if(partValue == "COMITE_TECNICO")
  {
    $('.fideicomisario').hide();
    $('.fideicomitente').hide();
    $('.fiduciario').hide();
    $(".datos_persona").hide();

    $('#tipoPersona').removeAttr("required");
    $('#nombreRazonSocial').removeAttr("required");
  }
}

@endsection
