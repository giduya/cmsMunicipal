@extends('layouts.formulario')

@section('formulario')
                  @if(request()->input('tipoBien') == "vehiculo")

                  <fieldset>
                    <legend><h4 class="mb-3">Datos del vehículo:</h4></legend>

                    <div class="row">
                      <div class="form-group col-md-4 mb-3">
                        <label for="tipoBien">Tipo: 🌐 <code>*</code></label>
                        <select class="form-control @error('tipoVehiculo') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="tipoBien" name="tipoVehiculo" required autofocus>
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->tipoVehiculo() as $tipo)
                          <option value="{{ $tipo->clave }}"
                            @if(old('tipoVehiculo'))
                              @if($tipo->clave == old('tipoVehiculo'))
                                selected
                              @endif
                            @elseif(isset(Route::current()->parameters()['array']))
                              @if($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['tipoBien']['vehiculo']['tipo']['clave'] == $tipo->clave)
                                selected
                              @endif
                            @endif
                          >
                            {{ $tipo->valor }}
                          </option>
                          @endforeach
                        </select>
                        @error('tipoVehiculo')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="form-group col-md-4 mb-3">
                        <label for="marca">Marca: 🌐 <code>*</code></label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('marca') is-invalid @enderror" id="marca" name="marca"
                        @if(old('marca'))
                          value="{{ old('marca') }}"
                        @elseif(isset(Route::current()->parameters()['array']))
                          @if(isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['tipoBien']['vehiculo']['marca']))
                            value="{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['tipoBien']['vehiculo']['marca'] }}"
                          @endif
                        @endif
                        maxlength="65" required>
                        @error('marca')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="form-group col-md-4 mb-3">
                        <label for="modelo">Modelo: 🌐 <code>*</code></label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('modelo') is-invalid @enderror" id="modelo" name="modelo"
                        @if(old('modelo'))
                          value="{{ old('modelo') }}"
                        @elseif(isset(Route::current()->parameters()['array']))
                          @if(isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['tipoBien']['vehiculo']['modelo']))
                            value="{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['tipoBien']['vehiculo']['modelo'] }}"
                          @endif
                        @endif
                        maxlength="65" required >
                        @error('modelo')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="form-group col-md-4 mb-3">
                        <label for="anio">Año: 🌐 <code>*</code></label>
                        <input type="number" step="1" tabindex="{{ ++$tabindex }}" class="form-control @error('anio') is-invalid @enderror" id="anio" name="anio"
                        @if(old('anio'))
                          value="{{ old('anio') }}"
                        @elseif(isset(Route::current()->parameters()['array']))
                          @if(isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['tipoBien']['vehiculo']['anio']))
                            value="{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['tipoBien']['vehiculo']['anio'] }}"
                          @endif
                        @endif
                        required min="1950" max="{{ date('Y')}}">
                        @error('anio')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="form-group col-md-4 mb-3">
                        <label for="numeroSerieRegistro">No. serie / registro: <code>*</code></label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('numeroSerieRegistro') is-invalid @enderror" id="numeroSerieRegistro" name="numeroSerieRegistro"
                        @if(old('numeroSerieRegistro'))
                          value="{{ old('numeroSerieRegistro') }}"
                        @elseif(isset(Route::current()->parameters()['array']))
                          @if(isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['tipoBien']['vehiculo']['numeroSerieRegistro']))
                            value="{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['tipoBien']['vehiculo']['numeroSerieRegistro'] }}"
                          @endif
                        @endif
                        maxlength="65" required>
                        @error('numeroSerieRegistro')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      @include('layouts.pais_html')
                    </div>
                  </fieldset>

                  @elseif(request()->input('tipoBien') == "inmueble")

                  <fieldset>
                    <legend><h4 class="mb-3">Datos del inmueble:</h4></legend>

                    <div class="row">

                      <div class="col-md-4 mb-3">
                        <label for="otro">Tipo: 🌐 <code>*</code></label>
                        <select class="form-control @error('tipoInmueble') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="otro" name="tipoInmueble" autofocus required>
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->tipoInmueble() as $inmueble)
                          <option value="{{ $inmueble->clave }}"
                            @if(old('tipoInmueble'))
                              @if($inmueble->clave == old('tipoInmueble'))
                                selected
                              @endif
                            @elseif(isset(Route::current()->parameters()['array']))
                              @if($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['tipoBien']['inmueble']['tipoInmueble']['clave'] == $inmueble->clave)
                                selected
                              @endif
                            @endif
                          >
                            {{ $inmueble->valor }}
                          </option>
                          @endforeach
                        </select>
                        @error('tipoInmueble')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                    </div>

                    <p>&nbsp;</p>

                  </fieldset>

                  <fieldset>
                    <legend><h4 class="mb-3">Ubicación del inmueble:</h4></legend>

                    @include('layouts.domicilio_html')
                  </fieldset>

                  @endif
                  <p>&nbsp;</p>

                  <fieldset>
                    <legend><h4 class="mb-3">Datos del dueño o titular:</h4></legend>

                    <div class="row">
                      <div class="col-md-4 mb-3">
                        <label for="tipoPersona">
                          Persona: 🌐 <code>*</code>
                        </label>
                        <select class="form-control @error('tipoPersona') is-invalid @enderror" tabindex="12" id="tipoPersona" name="tipoPersona" required >
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->tipoPersona() as $tipo)
                          <option value="{{ $tipo->clave }}"
                            @if(old('tipoPersona'))
                              @if($tipo->clave == old('tipoPersona'))
                                selected
                              @endif
                            @elseif(isset(Route::current()->parameters()['array']))
                              @if($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['duenoTitular']['tipoDuenoTitular'] == $tipo->clave)
                                selected
                              @endif
                            @endif
                          >
                            {{ $tipo->valor }}
                          </option>
                          @endforeach
                        </select>
                        @error('tipoPersona')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-5 mb-3">
                        <label for="nombreTitular">
                          Nombre: 🌐 <code>*</code>
                        </label>
                        <input type="text" tabindex="13" class="form-control @error('nombre') is-invalid @enderror" id="nombreTitular" name="nombre"
                        @if(old('nombre'))
                          value="{{ old('nombre') }}"
                        @elseif(isset(Route::current()->parameters()['array']))
                          value="{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['duenoTitular']['nombreTitular'] }}"
                        @endif
                        maxlength="65" required>
                        @error('nombre')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-3 mb-3">
                        <label for="rfc">
                          RFC: 🌐
                        </label>
                        <input type="text" tabindex="14" class="form-control @error('rfcHomo') is-invalid @enderror" id="rfc" name="rfcHomo"
                        @if(old('rfcHomo'))
                          value="{{ old('rfcHomo') }}"
                        @elseif(isset(Route::current()->parameters()['array']))
                          value="{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['duenoTitular']['rfc'] }}"
                        @endif
                        >
                        @error('rfcHomo')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-4 mb-3">
                        <label for="relacionConTitular">
                          Relación con el titular: <code>*</code>
                        </label>
                        <input type="text" tabindex="15" class="form-control @error('relacionConTitular') is-invalid @enderror" id="relacionConTitular" name="relacionConTitular"
                        @if(old('relacionConTitular'))
                         value="{{ old('relacionConTitular') }}"
                        @elseif(isset(Route::current()->parameters()['array']))
                         value="{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['duenoTitular']['relacionConTitular'] }}"
                        @endif
                        maxlength="65" required>
                        <small>¿Que relación tiene el declarante con el dueño del bien? Ejemplo: Amigo</small>
                        @error('relacionConTitular')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                    </div>
                  </fieldset>
@endsection



@section('script')

$('#send').attr("tabindex","16");

@if(request()->input('tipoBien') == "inmueble")
  @include('layouts.domicilio_js')
@endif

@if(request()->input('tipoBien') == "vehiculo")
  @include('layouts.pais_js')
@endif

@include('layouts.tipoPersona_js')

@endsection
