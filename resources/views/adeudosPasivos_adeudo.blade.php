@extends('layouts.formulario')

@section('formulario')
                  <fieldset>
                    <legend>
                      <h4 class="mb-3">
                        Datos del titular:
                      </h4>
                    </legend>

                    <div class="row">
                      <div class="col-md-6 mb-3">
                        <label for="multiselect" id="focus">Titular del adeudo: 🌐 <code>*</code></label>
                        <select class="form-control @error('titular.0') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="titular" name="titular[]" required multiple="multiple">
                          @foreach($declaracion->catalogo->titularBien() as $persona)
                          <option value="{{ $persona->clave }}"
                            @if(old('titular'))
                              @foreach(old('titular') as $fila)
                                @if($persona->clave == $fila)
                                  selected
                                @endif
                              @endforeach
                            @elseif(isset(Route::current()->parameters()['array']))
                              @foreach($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['titular'] as $fila)
                                @if($fila['clave'] == $persona->clave)
                                  selected
                                @endif
                              @endforeach
                            @endif
                          >
                            {{ $persona->valor }}
                          </option>
                          @endforeach
                        </select>
                        @error('titular.0')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                      </div>
                    </div>
                  </fieldset>

                  <p>&nbsp;</p>

                  @include('layouts.terceros_html')

                  <fieldset>
                    <legend>
                      <h4 class="mb-3">Datos del adeudo:</h4>
                    </legend>

                    <div class="row">

                      <div class="col-md-4 mb-3">
                        <label for="otro">Tipo: 🌐 <code>*</code></label>
                        <select class="form-control @error('tipoAdeudo') is-invalid @enderror" tabindex="33" id="otro" name="tipoAdeudo" required>
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->tipoAdeudo() as $adeudo)
                          <option value="{{ $adeudo->clave }}"
                            @if(old('tipoAdeudo'))
                              @if($adeudo->clave == old('tipoAdeudo'))
                                selected
                              @endif
                            @elseif(isset(Route::current()->parameters()['array']))
                              @if($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['tipoAdeudo']['clave'] == $adeudo->clave)
                                selected
                              @endif
                            @endif
                          >
                            {{ $adeudo->valor }}
                          </option>
                          @endforeach
                        </select>
                        @error('tipoAdeudo')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-4 mb-3">
                        <label for="numeroCuentaContrato">No. de cuenta o contrato: 🌐 <code>*</code></label>
                        <input type="text" tabindex="34" class="form-control @error('numeroCuentaContrato') is-invalid @enderror" id="numeroCuentaContrato" name="numeroCuentaContrato"
                        @if(old('numeroCuentaContrato'))
                          value="{{ old('numeroCuentaContrato') }}"
                        @elseif(isset(Route::current()->parameters()['array']))
                          value="{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['numeroCuentaContrato'] }}"
                        @endif
                        maxlength="65" required>
                        @error('numeroCuentaContrato')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-4 mb-3">
                        <label for="fechaObtencion">Fecha de adquisición: 🌐 <code>*</code></label>
                        <input type="date" tabindex="35" class="form-control @error('fechaObtencion') is-invalid @enderror" id="fechaObtencion" name="fechaObtencion"
                        @if(old('fechaObtencion'))
                          value="{{ old('fechaObtencion') }}"
                        @elseif(isset(Route::current()->parameters()['array']))
                          value="{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['fechaAdquisicion'] }}"
                        @endif
                        required max="{{ date('Y-m-d')}}" min="1950-01-01">
                        @error('fechaObtencion')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-4 mb-3">
                        <label for="pais">País: 🌐 <code>*</code></label>
                        <select class="form-control @error('pais') is-invalid @enderror" tabindex="36" id="pais" name="pais" required>
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->paises() as $pais)
                          <option value="{{ $pais->ISO2 }}">
                            {{ $pais->ESPANOL }}
                          </option>
                          @endforeach
                        </select>
                        @error('pais')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>

                    <p>&nbsp;</p>

                    <div class="form-group row">
                      <label for="montoValor" class="col-sm-4 col-form-label">
                        Monto original del adeudo: 🌐 <code>*</code>
                      </label>
                      <div class="col-md-4 mb-3" id="monto_valor">
                        <label for="montoValor"> </label>
                        <div class="input-group input-default">
                          <div class="input-group-prepend">
                            <span class="input-group-text">$</span>
                          </div>
                          <input type="text" tabindex="37" class="number-separator form-control @error('montoValor') is-invalid @enderror" id="montoValor" name="montoValor"
                          @if(old('montoValor'))
                            value="{{ old('montoValor') }}"
                          @elseif(isset(Route::current()->parameters()['array']))
                            value="@money($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['montoOriginal']['valor'])"
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
                      </div>

                      <div class="col-md-4 mb-3" id="monto_moneda">
                        <label for="montoMoneda">Moneda: 🌐 <code>*</code></label>
                        <select class="form-control @error('montoMoneda') is-invalid @enderror" tabindex="38" id="montoMoneda" name="montoMoneda" required>
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->monedas() as $fila)
                          <option value="{{ $fila->code }}">
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


                    <div class="form-group row">
                      <label for="saldoValor" class="col-sm-4 col-form-label">
                        @if($declaracion->metadata['tipo'] == "INICIAL")
                        Saldo insoluto (situación actual): 🌐 <code>*</code>
                        @elseif($declaracion->metadata['tipo'] == "MODIFICACIÓN")
                        Saldo insoluto al 31 de diciembre anterior: 🌐 <code>*</code>
                        @elseif($declaracion->metadata['tipo'] == "CONCLUSIÓN")
                        Saldo insoluto a la fecha de conclusión: 🌐 <code>*</code>
                        @endif
                      </label>
                      <div class="col-sm-4 mb-3">
                        <div class="input-group input-default">
                          <div class="input-group-prepend">
                            <span class="input-group-text">$</span>
                          </div>
                          <input type="text" tabindex="39" class="number-separator form-control @error('saldoValor') is-invalid @enderror" id="saldoValor" name="saldoValor"
                          @if(old('saldoValor'))
                            value="{{ old('saldoValor') }}"
                          @endif
                          maxlength="20" style="text-align:right" required>
                          <div class="input-group-append">
                            <span class="input-group-text">.00</span>
                          </div>
                          @error('saldoValor')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>
                      </div>

                      <div class="col-sm-4 mb-3">
                        <select class="form-control @error('saldoMoneda') is-invalid @enderror" tabindex="40" id="saldoMoneda" name="saldoMoneda" required>
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->monedas() as $fila)
                          <option value="{{ $fila->code }}">
                            {{ $fila->code }}
                          </option>
                          @endforeach
                        </select>
                        @error('saldoMoneda')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>


                    @if($declaracion['metadata']['tipo'] != "INICIAL")
                    <div class="form-group row">
                      <label for="porcentaje" class="col-sm-8 col-form-label">
                        Porcentaje de incremento o decremento del saldo pagado: 🌐 <code>*</code>
                      </label>
                      <div class="col-sm-4 mb-3">
                        <div class="input-group input-default">
                          <input type="number" tabindex="41" class="form-control @error('porcentaje') is-invalid @enderror" id="porcentaje" name="porcentaje"
                          @if(old('porcentaje'))
                            value="{{ old('porcentaje') }}"
                          @elseif(isset(Route::current()->parameters()['array']))
                            @if(isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['porcentajeIncrementoDecremento']))
                              value="{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['porcentajeIncrementoDecremento'] }}"
                            @endif
                          @endif
                          min="0" max="100" required >
                          <div class="input-group-append">
                            <span class="input-group-text">%</span>
                          </div>
                          @error('porcentaje')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>
                      </div>

                    </div>
                    @endif
                  </fieldset>

                  <p>&nbsp;</p>

                  <fieldset>
                    <legend>
                      <h4 class="mb-3">Datos del otorgante del crédito:</h4>
                    </legend>

                    @include('layouts.tipoPersona_html')

                  </fieldset>
@endsection

@section("script")

$('#tipoPersona').attr("required","required");
$('#nombreRazonSocial').attr("required","required");

$('#send').attr("tabindex","45");
$('#nombreRazonSocial').attr("name","nombreInstitucion");

@if(old('montoMoneda'))
  $('#montoMoneda').val("{{ old('montoMoneda') }}");
  $('#saldoMoneda').val("{{ old('saldoMoneda') }}");
  $('#pais').val("{{ old('pais') }}");
  $('#nombreRazonSocial').val("{{ old('nombreInstitucion') }}");
@elseif(isset(Route::current()->parameters()['array']))
  @isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['montoOriginal']['moneda'])
    $('#montoMoneda').val("{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['montoOriginal']['moneda'] }}");
  @endif

  @isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['saldoInsolutoSituacionActual']['moneda'])
    $('#saldoValor').val("@money($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['saldoInsolutoSituacionActual']['valor'])");
    $('#saldoMoneda').val("{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['saldoInsolutoSituacionActual']['moneda'] }}");
  @endisset
  @isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['saldoInsolutoDiciembreAnterior']['moneda'])
    $('#saldoValor').val("@money($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['saldoInsolutoDiciembreAnterior']['valor'])");
    $('#saldoMoneda').val("{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['saldoInsolutoDiciembreAnterior']['moneda'] }}");
  @endisset
  @isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['saldoInsolutoFechaConclusion']['moneda'])
    $('#saldoValor').val("@money($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['saldoInsolutoFechaConclusion']['valor'])");
    $('#saldoMoneda').val("{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['saldoInsolutoFechaConclusion']['moneda'] }}");
  @endisset
  $('#pais').val("{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['localizacionAdeudo']['pais'] }}");

  $('#tipoPersona').val("{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['otorganteCredito']['tipoPersona'] }}");
  $('#nombreRazonSocial').val("{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['otorganteCredito']['nombreInstitucion'] }}");
  $('#rfc').val("{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['otorganteCredito']['rfc'] }}");
@else
  $('#pais').val("MX");
  $('#montoMoneda').val("MXN");
  $('#saldoMoneda').val("MXN");
@endif

@include('layouts.terceros_js')

@include('layouts.tipoPersona_js')

$('#focus').focus();

@endsection
