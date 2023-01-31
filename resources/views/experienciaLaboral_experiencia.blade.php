@extends('layouts.formulario')

@section('formulario')
                  <fieldset>
                    <legend>
                      <h4 class="mb-3">Trabajo anterior:</h4>
                    </legend>
                    <div class="row">
                      <div class="col-md-6 mb-3">
                        <label for="ambitoSectorClave">Ámbito en el que laboraste: 🌐 <code>*</code></label>
                        <select class="form-control @error('ambitoSectorClave') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="ambitoSectorClave" name="ambitoSectorClave" required autofocus>
                          <option value="">Seleccionar:</option>
                          @foreach($declaracion->catalogo->ambitoSector() as $fila)
                          <option value="{{ $fila->clave }}"
                            @if(old('ambitoSectorClave'))
                              @if($fila->clave == old('ambitoSectorClave'))
                                selected
                              @endif
                            @elseif(isset(Route::current()->parameters()['array']))
                              @if($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][$tagsFormato->subformatos][Route::current()->parameters()['array']]['ambitoSector']['clave'] == $fila->clave)
                              selected
                              @endif
                            @endif
                          >
                          {{ $fila->valor }}
                          </option>
                          @endforeach
                        </select>
                        @error('ambitoSectorClave')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                    </div>
                  </fieldset>

                  <p class="fieldset_experiencia">&nbsp;</p>

                  <fieldset class="fieldset_experiencia">
                    <legend>
                      <h4 class="mb-3">
                        Experiencia laboral en
                        <span class="pub">el sector público:</span>
                        <span class="prv">el sector privado:</span>
                        <span class="otr">otro sector:</span>
                      </h4>
                    </legend>

                    <div class="row">

                      <div class="col-md-4 mb-3">
                        <label for="ubicacion">Ubicación: 🌐 <code>*</code></label>
                        <select class="form-control @error('ubicacion') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="ubicacion" name="ubicacion" required>
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->extranjero() as $tipo)
                          <option value="{{ $tipo->clave }}"
                            @if(old('ubicacion'))
                              @if($tipo->clave == old('ubicacion'))
                                selected
                              @endif
                            @elseif(isset(Route::current()->parameters()['array']))
                              @if($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][$tagsFormato->subformatos][Route::current()->parameters()['array']]['ubicacion'] == $tipo->clave)
                              selected
                              @endif
                            @endif
                          >
                            {{ $tipo->valor }}
                          </option>
                          @endforeach
                        </select>
                        @error('ubicacion')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-8 mb-3">
                        <label for="nombreInstitucion">
                          <span class="pub">Nombre ente público:</span>
                          <span class="prv">Nombre empresa:</span>
                          <span class="otr">Nombre asociación:</span>
                          🌐 <code>*</code>
                        </label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('nombreInstitucion') is-invalid @enderror" id="nombreInstitucion" name="nombreInstitucion"
                        @if(old('nombreInstitucion'))
                          value="{{ old('nombreInstitucion') }}"
                        @elseif(isset(Route::current()->parameters()['array']))
                          @if(isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][$tagsFormato->subformatos][Route::current()->parameters()['array']]['nombreEntePublico']))
                            value="{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][$tagsFormato->subformatos][Route::current()->parameters()['array']]['nombreEntePublico'] }}"
                          @endif
                          @if(isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][$tagsFormato->subformatos][Route::current()->parameters()['array']]['nombreEmpresaSociedadAsociacion']))
                            value="{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][$tagsFormato->subformatos][Route::current()->parameters()['array']]['nombreEmpresaSociedadAsociacion'] }}"
                          @endif
                        @endif
                        required maxlength="65">
                        @error('nombreInstitucion')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-4 mb-3 sector">
                        <label for="rfc">RFC: 🌐</label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('rfcMoralHomo') is-invalid @enderror" id="rfc" name="rfcMoralHomo"
                        @if(old('rfcMoralHomo'))
                          value="{{ old('rfcMoralHomo') }}"
                        @elseif(isset(Route::current()->parameters()['array']))
                          @if(isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][$tagsFormato->subformatos][Route::current()->parameters()['array']]['rfc']))
                            value="{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][$tagsFormato->subformatos][Route::current()->parameters()['array']]['rfc'] }}"
                          @endif
                        @endif
                        maxlength="12" minlength="12">
                        @error('rfcMoralHomo')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-4 mb-3 pub" id="div_nivelOrdenGobierno">
                        <label for="nivelOrdenGobierno">Nivel de gobierno: 🌐 <code>*</code></label>
                        <select class="form-control @error('nivelOrdenGobierno') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="nivelOrdenGobierno" name="nivelOrdenGobierno" >
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->nivelOrdenGobierno() as $tipo)
                          <option value="{{ $tipo->clave }}"
                            @if(old('nivelOrdenGobierno'))
                              @if($tipo->clave == old('nivelOrdenGobierno'))
                                selected
                              @endif
                            @elseif(isset(Route::current()->parameters()['array']))
                              @if(isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][$tagsFormato->subformatos][Route::current()->parameters()['array']]['nivelOrdenGobierno']))
                                @if($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][$tagsFormato->subformatos][Route::current()->parameters()['array']]['nivelOrdenGobierno'] == $tipo->clave)
                                  selected
                                @endif
                              @endif
                            @endif
                          >
                            {{ $tipo->valor }}
                          </option>
                          @endforeach
                        </select>
                        @error('nivelOrdenGobierno')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-4 mb-3 pub" id="div_ambitoPublico">
                        <label for="ambitoPublico">Ámbito público: 🌐 <code>*</code></label>
                        <select class="form-control @error('ambitoPublico') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="ambitoPublico" name="ambitoPublico" >
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->ambitoPublico() as $tipo)
                          <option value="{{ $tipo->clave }}"
                          @if(old('ambitoPublico'))
                            @if($tipo->clave == old('ambitoPublico'))
                              selected
                            @endif
                          @elseif(isset(Route::current()->parameters()['array']))
                            @if(isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][$tagsFormato->subformatos][Route::current()->parameters()['array']]['ambitoPublico']))
                              @if($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][$tagsFormato->subformatos][Route::current()->parameters()['array']]['ambitoPublico'] == $tipo->clave)
                                selected
                              @endif
                            @endif
                          @endif
                          >
                            {{ $tipo->valor }}
                          </option>
                          @endforeach
                        </select>
                        @error('ambitoPublico')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-4 mb-3">
                        <label for="areaAdscripcion">Área: 🌐 <code>*</code></label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('areaAdscripcion') is-invalid @enderror" id="areaAdscripcion" name="areaAdscripcion"
                        @if(old('areaAdscripcion'))
                          value="{{ old('areaAdscripcion') }}"
                        @elseif(isset(Route::current()->parameters()['array']))
                          @if(isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][$tagsFormato->subformatos][Route::current()->parameters()['array']]['areaAdscripcion']))
                            value="{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][$tagsFormato->subformatos][Route::current()->parameters()['array']]['areaAdscripcion'] }}"
                          @endif
                          @if(isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][$tagsFormato->subformatos][Route::current()->parameters()['array']]['area']))
                            value="{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][$tagsFormato->subformatos][Route::current()->parameters()['array']]['area'] }}"
                          @endif
                        @endif
                        required maxlength="65">
                        @error('areaAdscripcion')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-4 mb-3">
                        <label for="empleoCargoComision">Cargo: 🌐 <code>*</code></label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('empleoCargoComision') is-invalid @enderror" id="empleoCargoComision" name="empleoCargoComision"
                        @if(old('empleoCargoComision'))
                          value="{{ old('empleoCargoComision') }}"
                        @elseif(isset(Route::current()->parameters()['array']))
                          @if(isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][$tagsFormato->subformatos][Route::current()->parameters()['array']]['empleoCargoComision']))
                            value="{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][$tagsFormato->subformatos][Route::current()->parameters()['array']]['empleoCargoComision'] }}"
                          @endif
                          @if(isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][$tagsFormato->subformatos][Route::current()->parameters()['array']]['puesto']))
                            value="{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][$tagsFormato->subformatos][Route::current()->parameters()['array']]['puesto'] }}"
                          @endif
                        @endif
                        required maxlength="65">
                        @error('empleoCargoComision')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-4 mb-3 pub" id="div_funcionPrincipal">
                        <label for="funcionPrincipal">Función principal: 🌐 <code>*</code></label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('funcionPrincipal') is-invalid @enderror" id="funcionPrincipal" name="funcionPrincipal"
                        @if(old('funcionPrincipal'))
                          value="{{ old('funcionPrincipal') }}"
                        @elseif(isset(Route::current()->parameters()['array']))
                          @if(isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][$tagsFormato->subformatos][Route::current()->parameters()['array']]['funcionPrincipal']))
                            value="{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][$tagsFormato->subformatos][Route::current()->parameters()['array']]['funcionPrincipal'] }}"
                          @endif
                        @endif
                        maxlength="65">
                        @error('funcionPrincipal')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      @include('layouts.sector_html')

                      <div class="col-md-4 mb-3">
                        <label for="fechaObtencion">Fecha ingreso: 🌐 <code>*</code></label>
                        <input type="date" tabindex="{{ ++$tabindex }}" class="form-control @error('fechaObtencion') is-invalid @enderror" id="fechaObtencion" name="fechaObtencion"
                        @if(old('fechaObtencion'))
                          value="{{ old('fechaObtencion') }}"
                        @elseif(isset(Route::current()->parameters()['array']))
                          @if(isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][$tagsFormato->subformatos][Route::current()->parameters()['array']]['fechaIngreso']))
                            value="{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][$tagsFormato->subformatos][Route::current()->parameters()['array']]['fechaIngreso'] }}"
                          @endif
                        @endif
                        required min="1950-01-01" max="{{ date('Y-m-d')}}">
                        <code>Aproximada</code>
                        @error('fechaObtencion')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-4 mb-3">
                        <label for="fechaEgreso">Fecha egreso: 🌐 <code>*</code></label>
                        <input type="date" tabindex="{{ ++$tabindex }}" class="form-control @error('fechaEgreso') is-invalid @enderror" id="fechaEgreso" name="fechaEgreso"
                        @if(old('fechaEgreso'))
                          value="{{ old('fechaEgreso') }}"
                        @elseif(isset(Route::current()->parameters()['array']))
                          @if(isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][$tagsFormato->subformatos][Route::current()->parameters()['array']]['fechaEgreso']))
                            value="{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][$tagsFormato->subformatos][Route::current()->parameters()['array']]['fechaEgreso'] }}"
                          @endif
                        @endif
                        required min="1950-01-01" max="{{ date('Y-m-d')}}">
                        <code>Aproximada</code>
                        @error('fechaEgreso')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                    </div>
                  </fieldset>
@endsection



@section('script')

  @include('layouts.ambitoSector_js')

@endsection
