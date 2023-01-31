@extends('layouts.formulario')

@section('formulario')
                  <fieldset>
                    <legend>
                      <h4 class="mb-3">Datos de representación:</h4>
                    </legend>

                    <div class="row">
                      <div class="col-md-4 mb-3">
                        <label for="tipoRelacion">Persona relacionada: 🌐 <code>*</code></label>
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

                      <div class="col-md-4 mb-3">
                        <label for="tipoRepresentacion">Rol: 🌐 <code>*</code></label>
                        <select class="form-control @error('tipoRepresentacion') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="tipoRepresentacion" name="tipoRepresentacion" required>
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->tipoRepresentacion() as $representacion)
                          <option value="{{ $representacion->valor }}"
                            @if(old('tipoRepresentacion'))
                              @if($representacion->valor == old('tipoRepresentacion'))
                                selected
                              @endif
                            @elseif(isset(Route::current()->parameters()['array']))
                              @if($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['tipoRepresentacion'] == $representacion->clave)
                                selected
                              @endif
                            @endif
                          >
                            {{ $representacion->valor }}
                          </option>
                          @endforeach
                        </select>
                        @error('tipoRepresentacion')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-4 mb-3">
                        <label for="fechaInicioRepresentacion">Fecha de inicio: 🌐 <code>*</code></label>
                        <input type="date" tabindex="{{ ++$tabindex }}" class="form-control @error('fechaObtencion') is-invalid @enderror" id="fechaInicioRepresentacion" name="fechaObtencion" required
                        @if(old('fechaObtencion'))
                          value="{{ old('fechaObtencion') }}"
                        @elseif(isset(Route::current()->parameters()['array']))
                          value="{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['fechaInicioRepresentacion'] }}"
                        @endif
                        min="{{ date('Y-m-d',strtotime("-2 Years")) }}" max="{{ date('Y-m-d') }}">
                        @error('fechaObtencion')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>

                  </fieldset>

                  <p class="fieldset_representante">&nbsp;</p>

                  <fieldset class="fieldset_representante">
                    <legend><h4 class="mb-3">Datos del <span id="span_representante">representante</span><span id="span_representado">representado</span>:</h4></legend>

                    @include('layouts.tipoPersona_html')

                    <div class="row">
                      @include('layouts.pais_html')

                      @include('layouts.sector_html')
                    </div>
                    <p>&nbsp;</p>

                  </fieldset>


                  <fieldset id=fieldset_remuneracion>
                    <legend>
                      <h4 class="mb-3">Remuneración por representación:</h4>
                    </legend>

                    @include('layouts.remuneracion_html')
                  </fieldset>
@endsection

@section('script')

$('#pais').attr("tabindex","7");
$('#entidadFederativa').attr("tabindex","8");
$('#sector').attr("tabindex","9");
$('#recibeRemuneracion').attr("tabindex","10");
$('#montoValor').attr("tabindex","11");
$('#montoMoneda').attr("tabindex","12");
$('#send').attr("tabindex","13");


@if(isset(Route::current()->parameters()['array']))
  @empty(old())
    $('#tipoPersona').val("{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['tipoPersona'] }}");
    $('#nombreRazonSocial').val("{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['nombreRazonSocial'] }}");
    $('#rfc').val("{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['rfc'] }}");
  @endempty
@endif


$("#tipoRepresentacion").ready(despliega);
$("#tipoRepresentacion").change(despliega);

function despliega()
{
  var muestraValue = $("#tipoRepresentacion").val();

  if(muestraValue == "")
  {
    $('.fieldset_representante').hide();
    $('#fieldset_remuneracion').hide();

    $('#entidadFederativa').removeAttr('required');
    $('#recibeRemuneracion').removeAttr('required');
    $('#sector').removeAttr('required');
    $('#tipoPersona').removeAttr('required');
    $('#nombreRazonSocial').removeAttr('required');
  }
  else
  {
    $('.fieldset_representante').show();
    $('#fieldset_remuneracion').show();

    $('#tipoPersona').attr("required","required");
    $('#nombreRazonSocial').attr("required","required");
    $('#sector').attr("required","required");
    $('#recibeRemuneracion').attr("required","required");
  }
}

$("#tipoRepresentacion").ready(span);
$("#tipoRepresentacion").change(span);

function span()
{
  var tipoValue = $("#tipoRepresentacion").val();

  if(tipoValue == "REPRESENTANTE")
  {
    $('#span_representante').show();
    $('#span_representado').hide();
  }
  else if(tipoValue == "REPRESENTADO")
  {
    $('#span_representante').hide();
    $('#span_representado').show();
  }
  else
  {
    $('#span_representado').hide();
    $('#span_representante').hide();
  }
}

@include('layouts.pais_js')
@include('layouts.tipoPersona_js')
@include('layouts.remuneracion_js')

@endsection
