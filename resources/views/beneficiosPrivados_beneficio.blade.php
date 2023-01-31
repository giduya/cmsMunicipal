@extends('layouts.formulario')

@section('formulario')
                <fieldset>
                  <legend>
                    <h4 class="mb-3">Datos del beneficiado:</h4>
                  </legend>

                  <div class="row">
                    <div class="col-md-4 mb-3">
                      <label for="beneficiario_tipoPersona">
                        Persona: 🌐 <code>*</code>
                      </label>
                      <select class="form-control @error('tipoPersona_dos') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="beneficiario_tipoPersona" name="tipoPersona_dos" required autofocus>
                        <option value="">Seleccione...</option>
                        @foreach($declaracion->catalogo->tipoPersona() as $persona)
                        <option value="{{ $persona->clave }}"
                          @if(old('tipoPersona_dos'))
                            @if($persona->clave == old('tipoPersona_dos'))
                              selected
                            @endif
                          @elseif(isset(Route::current()->parameters()['array']))
                            @if($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['tipoPersona'] == $persona->clave)
                              selected
                            @endif
                          @endif
                        >
                          {{ $persona->valor }}
                        </option>
                        @endforeach
                      </select>
                      @error('tipoPersona_dos')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>

                    <div class="col-md-4 mb-3">
                      <label for="multiselect">Beneficiario: 🌐 <code>*</code></label>
                      <select class="form-control @error('beneficiario') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="beneficiario_clave" name="beneficiario[]" required multiple="multiple">
                        @foreach($declaracion->catalogo->beneficiarios() as $beneficiario)
                        <option value="{{ $beneficiario->clave }}"
                          @if(old('beneficiario'))
                            @foreach(old('beneficiario') as $fila)
                              @if($beneficiario->clave == $fila)
                                selected
                              @endif
                            @endforeach
                          @elseif(isset(Route::current()->parameters()['array']))
                            @foreach($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['beneficiario'] as $fila)
                              @if($fila['clave'] == $beneficiario->clave)
                                selected
                              @endif
                            @endforeach
                          @endif
                        >
                          {{ $beneficiario->valor }}
                        </option>
                        @endforeach
                      </select>
                      @error('beneficiario')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>
                </fieldset>

                <p>&nbsp;</p>

                <fieldset>
                  <legend>
                    <h4 class="mb-3">Datos del beneficio:</h4>
                  </legend>

                  <div class="row" id="tipo_beneficio_clave">
                    <div class="col-md-4 mb-3">
                      <label for="otro">Tipo: 🌐 <code>*</code></label>
                      <select class="form-control @error('tipoBeneficio') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="otro" name="tipoBeneficio" required>
                        <option value="">Seleccione...</option>
                        @foreach($declaracion->catalogo->tipoBeneficio() as $beneficio)
                        <option value="{{ $beneficio->clave }}"
                          @if(old('tipoBeneficio'))
                            @if($beneficio->clave == old('tipoBeneficio'))
                              selected
                            @endif
                          @elseif(isset(Route::current()->parameters()['array']))
                            @if($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['tipoBeneficio']['clave'] == $beneficio->clave)
                              selected
                            @endif
                          @endif
                        >
                          {{ $beneficio->valor }}
                        </option>
                        @endforeach
                      </select>
                      @error('tipoBeneficio')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>

                    @include('layouts.sector_html')

                    @include('layouts.formaRecepcion_html')
                  </div><!--row-->
                </fieldset>

                <p>&nbsp;</p>

                <fieldset>
                  <legend>
                    <h4 class="mb-3">
                      Datos del otorgante del beneficio:
                    </h4>
                  </legend>

                  @include('layouts.tipoPersona_html')

                </fieldset>
@endsection

@section('script')

$('#tipoPersona').attr("required","required");
$('#nombreRazonSocial').attr("required","required");

$('#tipoPersona').attr("tabindex","8");
$('#nombreRazonSocial').attr("tabindex","9");
$('#rfc').attr("tabindex","10");
$('#send').attr("tabindex","11");

@if(isset(Route::current()->parameters()['array']))
  @if(old('tipoBeneficio'))
  $('#montoMoneda').val("{{ old('montoMoneda') }}");
  @endif
  @empty(old())
    @isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['especifiqueBeneficio'])
      $('#especifiqueEspecie').val("{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['especifiqueBeneficio'] }}");
    @endif
    @isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['montoMensualAproximado']['valor'])
      $('#montoValor').val(numberWithCommas({{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['montoMensualAproximado']['valor'] }}));
    @endisset
    @isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['montoMensualAproximado']['moneda'])
    $('#montoMoneda').val("{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['montoMensualAproximado']['moneda'] }}");
    @endisset
    $('#tipoPersona').val("{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['otorgante']['tipoPersona'] }}");
    $('#nombreRazonSocial').val("{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['otorgante']['nombreRazonSocial'] }}");
    $('#rfc').val("{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['otorgante']['rfc'] }}");
  @endempty
@endif

$('#beneficiario_clave').multiselect();
@include('layouts.numeroComas_js')
@include('layouts.formaRecepcion_js')
@include('layouts.tipoPersona_js')

@endsection
