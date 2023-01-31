@extends('layouts.formulario')

@section('formulario')
                  <fieldset>
                    <legend>
                      <h4 class="mb-3">Datos del beneficiario:</h4>
                    </legend>

                    <div class="row">

                      <div class="col-md-4 mb-3">
                        <label for="tipoPersona">Persona: 🌐 <code>*</code></label>
                        <select class="form-control @error('tipoPersona') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="tipoPersona" name="tipoPersona" required autofocus>
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->tipopersona() as $persona)
                          <option value="{{ $persona->clave }}"
                            @if(old('tipoPersona'))
                              @if($persona->clave == old('tipoPersona'))
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
                        @error('tipoPersona')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-4 mb-3">
                        <label for="otro2">Beneficiario: 🌐 <code>*</code></label>
                        <select class="form-control @error('beneficiario') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="otro2" name="beneficiario" required>
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->beneficiarios() as $beneficiario)
                          <option value="{{ $beneficiario->clave }}"
                            @if(old('beneficiario'))
                              @if($beneficiario->clave == old('beneficiario'))
                                selected
                              @endif
                            @elseif(isset(Route::current()->parameters()['array']))
                              @if($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['beneficiarioPrograma']['clave'] == $beneficiario->clave)
                                selected
                              @endif
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

                    <legend><h4 class="mb-3">Datos del apoyo:</h4></legend>

                    <div class="row">
                      <div class="col-md-4 mb-3" id="Apoyo">
                        <label for="otro">Tipo: 🌐 <code>*</code></label>
                        <select class="form-control @error('tipoApoyo') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="otro" name="tipoApoyo" required>
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->tipoApoyo() as $apoyo)
                          <option value="{{ $apoyo->clave }}"
                            @if(old('tipoApoyo'))
                              @if($apoyo->clave == old('tipoApoyo'))
                                selected
                              @endif
                            @elseif(isset(Route::current()->parameters()['array']))
                              @if($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['tipoApoyo']['clave'] == $apoyo->clave)
                              selected
                              @endif
                            @endif
                          >
                            {{ $apoyo->valor }}
                          </option>
                          @endforeach
                        </select>
                        @error('tipoApoyo')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>


                      <div class="col-md-4 mb-3">
                        <label for="nombrePrograma">Programa: 🌐 <code>*</code></label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('nombrePrograma') is-invalid @enderror" id="nombrePrograma" name="nombrePrograma"
                        @if(old('nombrePrograma'))
                          value="{{ old('nombrePrograma') }}"
                        @elseif(isset(Route::current()->parameters()['array']))
                          value="{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['nombrePrograma'] }}"
                        @endif
                        maxlength="65" required>
                        @error('nombrePrograma')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      @include('layouts.formaRecepcion_html')
                    </div>
                  </fieldset>

                  <p>&nbsp;</p>

                  <fieldset>
                    <legend><h4 class="mb-3">Datos de quien da el apoyo:</h4></legend>
                    <div class="row">
                      <div class="col-md-4 mb-3">
                        <label for="nivelOrdenGobierno">Nivel de gobierno: 🌐 <code>*</code></label>
                        <select class="form-control @error('nivelOrdenGobierno') is-invalid @enderror" tabindex="9" id="nivelOrdenGobierno" name="nivelOrdenGobierno" required >
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->nivelOrdenGobierno() as $gobierno)
                          <option value="{{ $gobierno->clave}}"
                          @if(old('nivelOrdenGobierno'))
                            @if($gobierno->clave == old('nivelOrdenGobierno'))
                              selected
                            @endif
                          @elseif(isset(Route::current()->parameters()['array']))
                            @if($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['nivelOrdenGobierno'] == $gobierno->clave)
                              selected
                            @endif
                          @endif
                          >
                            {{ $gobierno->valor }}
                          </option>
                          @endforeach
                        </select>
                        @error('nivelOrdenGobierno')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-4 mb-3">
                        <label for="institucionOtorgante">Institución: 🌐 <code>*</code></label>
                        <input type="text" tabindex="10" class="form-control @error('nombreInstitucion') is-invalid @enderror" id="institucionOtorgante" name="nombreInstitucion"
                        @if(old('nombreInstitucion'))
                          value="{{ old('nombreInstitucion') }}"
                        @elseif(isset(Route::current()->parameters()['array']))
                          value="{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['institucionOtorgante'] }}"
                        @endif
                        maxlength="65" required>
                        @error('nombreInstitucion')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>
                  </fieldset>
@endsection


@section('script')

$('#send').attr("tabindex","11");

@include('layouts.formaRecepcion_js')
@include('layouts.numeroComas_js')

@if(isset(Route::current()->parameters()['array']))
  @empty(old())
    @isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['especifiqueApoyo'])
      $('#especifiqueEspecie').val("{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['especifiqueApoyo'] }}");
    @endisset
    @isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['montoApoyoMensual'])
      $('#montoValor').val(numberWithCommas({{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['montoApoyoMensual']['valor'] }}));
      $('#montoMoneda').val("{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['montoApoyoMensual']['moneda'] }}");
    @endisset
  @endempty
@endif

@endsection
