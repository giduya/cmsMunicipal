@extends('layouts.formulario')

@section('formulario')
                  <div class="form-group row">
                    <label for="realizaActividadLucrativa" class="col-sm-6 col-form-label">¿Realiza actividad lucrativa? 🌐 <code>*</code></label>
                    <div class="col-sm-4">
                      <select class="form-control @error('realizaActividadLucrativa') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="realizaActividadLucrativa" name="realizaActividadLucrativa" required autofocus>
                        <option value="">Seleccione...</option>
                        @foreach($declaracion->catalogo->boolean() as $fila)
                        <option value="{{ $fila->clave }}"
                          @if(old('realizaActividadLucrativa') != null)
                            @if($fila->clave == old('realizaActividadLucrativa'))
                              selected
                            @endif
                          @elseif(isset(Route::current()->parameters()['array']))
                            @if($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['realizaActividadLucrativa'] === boolval($fila->clave))
                              selected
                            @endif
                          @endif
                        >
                          {{ $fila->valor }}
                        </option>
                        @endforeach
                      </select>
                      @error('realizaActividadLucrativa')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>


                  <div class="form-group row">
                    <label for="tipoRelacion" class="col-sm-6 col-form-label">¿Quién se relaciona con el cliente?: 🌐 <code>*</code></label>
                    <div class="col-sm-4">
                      <select class="form-control @error('tipoRelacion') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="tipoRelacion" name="tipoRelacion" required>
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
                  </div>

                  <p>&nbsp;</p>

                  <fieldset>
                    <legend>
                      <h4 class="mb-3">
                        Datos de la empresa o servicio:
                        <small>
                          <br>
                          Nombre de la empresa o servicio con el que tú, pareja o dependiente económico realiza la actividad lucrativa prestando un servicio a algún cliente.
                        </small>
                      </h4>
                    </legend>

                    <div class="row">
                      <div class="col-md-9 mb-3">
                        <label for="nombreEmpresaServicio">Nombre de la empresa y/o servicio que proporciona: 🌐 <code>*</code></label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('nombreEmpresaServicio') is-invalid @enderror" id="nombreEmpresaServicio" name="nombreEmpresaServicio"
                        @if(old('nombreEmpresaServicio'))
                          value="{{ old('nombreEmpresaServicio') }}"
                        @elseif(isset(Route::current()->parameters()['array']))
                          @if($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['empresa']['nombreEmpresaServicio'])
                            value="{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['empresa']['nombreEmpresaServicio'] }}"
                          @endif
                        @endif
                        maxlength="191" required>
                        <small> Ejemplo: Consultoria Rogalsa S.A. de C.V. / Servicio de consultoría contable</small>
                        @error('nombreEmpresaServicio')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-3 mb-3">
                        <label for="empresa_rfc"> RFC: 🌐 </label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('rfcMoralHomo') is-invalid @enderror" id="empresa_rfc" name="rfcMoralHomo"
                        @if(old('rfcMoralHomo'))
                          value="{{ old('rfcMoralHomo') }}"
                        @elseif(isset(Route::current()->parameters()['array']))
                          @if($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['empresa']['rfc'])
                            value="{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['empresa']['rfc'] }}"
                          @endif
                        @endif
                        maxlength="12" minlength="12">
                        @error('rfcMoralHomo')
                        <span class="invalid-feedback" role="alert" >
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>

                    <div class="row">
                      @include('layouts.sector_html')

                      @include('layouts.pais_html')
                    </div><!--row-->

                  </fieldset>

                  <p>&nbsp;</p>

                  <fieldset>
                    <legend>
                      <h4 class="mb-3">
                        Datos del cliente principal:
                      </h4>
                    </legend>

                    @include('layouts.tipoPersona_html')

                  </fieldset>

                  <p>&nbsp;</p>

                  <fieldset>
                    <legend>
                      <h4 class="mb-3">
                        Ganancia obtenida del cliente principal los últimos 2 años:
                      </h4>
                    </legend>
                    <div class="form-group row">
                      <label for="montoAproximadoGanancia_valor" class="col-sm-4 col-form-label">
                        Monto mensual aproximado: 🌐 <code>*</code>
                      </label>
                      <div class="col-md-4 mb-3" id="div_montoAproximadoGanancia_valor">
                        <label for="montoAproximadoGanancia_valor">Monto mensual: 🌐 <code>*</code></label>
                        <div class="input-group input-default">
                          <div class="input-group-prepend">
                            <span class="input-group-text">$</span>
                          </div>
                          <input type="text" tabindex="{{ ++$tabindex }}" class="number-separator form-control @error('montoValor') is-invalid @enderror" id="montoAproximadoGanancia_valor" name="montoValor"
                          @if(old('montoValor'))
                            value="{{ old('montoValor') }}"
                          @elseif(isset(Route::current()->parameters()['array']))
                            value="@money($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['montoAproximadoGanancia']['valor'])"
                          @endif
                          maxlength="20" required style="text-align:right">
                          <div class="input-group-append">
                            <span class="input-group-text">.00</span>
                          </div>
                          @error('montoValor')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>
                        <code>Reportar ganancias mayores a: $@money($declaracion->catalogo->uma(250))</code>
                      </div>

                      <div class="col-md-4 mb-3" id="div_montoAproximadoGanancia_moneda">
                        <label for="montoMoneda">Moneda: 🌐 <code>*</code></label>
                        <select class="form-control @error('montoMoneda') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="montoMoneda" name="montoMoneda" required>
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->monedas() as $fila)
                          <option value="{{ $fila->code }}"
                            @if(old('montoMoneda'))
                              @if($fila->code == old('montoMoneda'))
                                selected
                              @endif
                            @elseif(isset(Route::current()->parameters()['array']))
                              @if($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['montoAproximadoGanancia']['moneda'] == $fila->code)
                                selected
                              @endif
                            @elseif($fila->code == "MXN")
                              selected
                            @endif
                          >
                            {{ $fila->code }}
                          </option>
                          @endforeach
                        </select>
                        @error('montoMoneda')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                    </div>

                  </fieldset>
@endsection



@section('script')

$('#pais').attr("tabindex","6");
$('#entidadFederativa').attr("tabindex","7");
$('#tipoPersona').attr("tabindex","8");
$('#nombreRazonSocial').attr("tabindex","9");
$('#rfc').attr("tabindex","10");
$('#montoAproximadoGanancia_valor').attr("tabindex","10");
$('#montoMoneda').attr("tabindex","11");
$('#send').attr("tabindex","12");

$('#tipoPersona').attr("required","required");
$('#nombreRazonSocial').attr("required","required");

$("#montoMoneda").change(moneda);

function moneda()
{
  var monedaValue = $("#montoMoneda").val();

  if(monedaValue == "")
  {
    $('#montoMoneda').val("MXN");
    $('#montoMoneda').attr('required',"required");
  }
}


@if(isset(Route::current()->parameters()['array']))
  @empty(old())
    $('#tipoPersona').val("{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['clientePrincipal']['tipoPersona'] }}");
    $('#nombreRazonSocial').val("{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['clientePrincipal']['nombreRazonSocial'] }}");
    $('#rfc').val("{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['clientePrincipal']['rfc'] }}");
  @endempty
@endif

@include('layouts.pais_js')

@include('layouts.tipoPersona_js')

@endsection
