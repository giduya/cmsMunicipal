@extends('layouts.formulario')

@section('formulario')
                  <fieldset>

                    <legend><h4 class="mb-3">Datos del titular del vehículo:</h4></legend>

                    <div class="row">

                      <div class="col-md-6 mb-3">
                        <label for="titular">Titular: 🌐 <code>*</code> </label>
                        <select class="form-control @error('titular') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="titular" name="titular[]" required multiple="multiple">
                          @foreach($declaracion->catalogo->titularBien() as $persona)
                          <option value="{{ $persona->clave }}"
                            @if(old('titular'))
                              @foreach(old('titular') as $fila)
                                @if($persona->clave == $fila)
                                  selected
                                @endif
                              @endforeach
                            @elseif(isset(Route::current()->parameters()['array']))
                              @foreach($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][$tagsFormato->subformatos][Route::current()->parameters()['array']]['titular'] as $fila)
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
                        @error('titular')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                    </div>

                    <p>&nbsp;</p>

                  </fieldset>


                  @include('layouts.terceros_html')


                  <fieldset>
                    <legend><h4 class="mb-3">Datos del vehículo:</h4></legend>

                    <div class="row">
                      <div class="form-group col-md-4 mb-3">
                        <label for="tipoVehiculo">Tipo: 🌐 <code>*</code></label>
                        <select class="form-control @error('tipoVehiculo') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="tipoVehiculo" name="tipoVehiculo" required autofocus>
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->tipoVehiculo() as $tipo)
                          <option value="{{ $tipo->clave }}"
                            @if(old('tipoVehiculo'))
                              @if($tipo->clave == old('tipoVehiculo'))
                                selected
                              @endif
                            @elseif(isset(Route::current()->parameters()['array']))
                              @if($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][$tagsFormato->subformatos][Route::current()->parameters()['array']]['tipoVehiculo']['clave'] == $tipo->clave)
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
                          value="{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][$tagsFormato->subformatos][Route::current()->parameters()['array']]['marca'] }}"
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
                          value="{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][$tagsFormato->subformatos][Route::current()->parameters()['array']]['modelo'] }}"
                        @endif
                        maxlength="65" required>
                        @error('modelo')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="form-group col-md-4 mb-3">
                        <label for="anio">Año: 🌐 <code>*</code></label>
                        <input type="number" step="1" tabindex="{{ ++$tabindex }}" class="form-control @error('anio') is-invalid @enderror" id="anio" name="anio"
                        @if(old('marca'))
                          value="{{ old('anio') }}"
                        @elseif(isset(Route::current()->parameters()['array']))
                          value="{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][$tagsFormato->subformatos][Route::current()->parameters()['array']]['anio'] }}"
                        @endif
                        required min="1950">
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
                          value="{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][$tagsFormato->subformatos][Route::current()->parameters()['array']]['numeroSerieRegistro'] }}"
                        @endif
                        maxlength="65" required>
                        @error('numeroSerieRegistro')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-4 mb-4">
                        <label for="pais">País de registro: <code>*</code></label>
                        <select tabindex="{{ ++$tabindex }}" class="form-control @error('pais') is-invalid @enderror" id="pais" name="pais" required="required">
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->paises() as $pais)
                          <option value="{{ $pais->ISO2 }}"
                            @if(old('pais'))
                              @if($pais->ISO2 == old('pais'))
                                selected
                              @endif
                            @elseif(isset(Route::current()->parameters()['array']))
                              @if(isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][$tagsFormato->subformatos][Route::current()->parameters()['array']]['lugarRegistro']['pais']))
                                @if($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][$tagsFormato->subformatos][Route::current()->parameters()['array']]['lugarRegistro']['pais'] == $pais->ISO2)
                                  selected
                                @elseif(empty($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][$tagsFormato->subformatos][Route::current()->parameters()['array']]['lugarRegistro']['pais']))
                                  @if($pais->ISO2 == "MX")
                                    selected
                                  @endif
                                @endif
                              @elseif($pais->ISO2 == "MX")
                                selected
                              @endif
                            @endif
                          >
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

                      <div class="col-md-4 mb-3" id="div_entidadFederativa">
                        <label for="entidadFederativa">Entidad Federativa: <code>*</code></label>
                        <select class="form-control @error('entidadFederativa') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="entidadFederativa" name="entidadFederativa" >
                          <option value="">Seleccionar:</option>
                          @foreach($declaracion->catalogo->inegiEntidades() as $entidad)
                          <option value="{{ $entidad->Cve_Ent }}"
                            @if($entidad->Cve_Ent == old('entidadFederativa'))
                              selected
                            @elseif(isset(Route::current()->parameters()['array']))
                              @if(isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][$tagsFormato->subformatos][Route::current()->parameters()['array']]['lugarRegistro']['entidadFederativa']['clave']))
                                @if($entidad->Cve_Ent == $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][$tagsFormato->subformatos][Route::current()->parameters()['array']]['lugarRegistro']['entidadFederativa']['clave'] and empty(old('entidadFederativa')))
                                  selected
                                @endif
                              @endif
                            @endif
                          >
                            {{ $entidad->Nom_Ent }}
                          </option>
                          @endforeach
                        </select>
                        @error('entidadFederativa')
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
                      <h4 class="mb-3">Datos de adquisición del vehículo:</h4>
                    </legend>
                    <div class="row" >
                      <div class="col-md-4 mb-3">
                        <label for="formaAdquisicion">Forma de adquisición 🌐 <code>*</code></label>
                        <select class="form-control @error('formaAdquisicion') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="formaAdquisicion" name="formaAdquisicion" required>
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->formaAdquisicion() as $adquisicion)
                          <option value="{{ $adquisicion->clave }}"
                            @if(old('formaAdquisicion'))
                              @if($adquisicion->clave == old('formaAdquisicion'))
                                selected
                              @endif
                            @elseif(isset(Route::current()->parameters()['array']))
                              @if($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][$tagsFormato->subformatos][Route::current()->parameters()['array']]['formaAdquisicion']['clave'] == $adquisicion->clave)
                                selected
                              @endif
                            @endif
                          >
                            {{ $adquisicion->valor }}
                          </option>
                          @endforeach
                        </select>
                        @error('formaAdquisicion')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-4 mb-3">
                        <label for="formaPago">Forma de pago: 🌐 <code>*</code></label>
                        <select class="form-control @error('formaPago') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="formaPago" name="formaPago" required>
                          <option value="">Seleccione...</option>
                        </select>
                        @error('formaPago')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-4 mb-3">
                        <label for="fechaAdquisicion"> Fecha de adquisición: 🌐 <code>*</code></label>
                        <input type="date" tabindex="{{ ++$tabindex }}" class="form-control @error('fechaObtencion') is-invalid @enderror" id="fechaAdquisicion" name="fechaObtencion"
                        @if(old('fechaObtencion'))
                          value="{{ old('fechaObtencion') }}"
                        @elseif(isset(Route::current()->parameters()['array']))
                          value="{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][$tagsFormato->subformatos][Route::current()->parameters()['array']]['fechaAdquisicion'] }}"
                        @endif
                        required max="{{ date('Y-m-d')}}" min="1950-01-01">
                        @error('fechaObtencion')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>

                    <div class="form-group row" id="div_valorAdquisicion">
                      <label for="montoValor" class="col-sm-4 col-form-label">
                        Valor de adquisición: 🌐 <code>*</code>
                      </label>
                      <div class="col-sm-4">
                        <div class="input-group input-default">
                          <div class="input-group-prepend">
                            <span class="input-group-text">$</span>
                          </div>
                          <input type="text" tabindex="{{ ++$tabindex }}" class="number-separator form-control @error('montoValor') is-invalid @enderror" id="montoValor" name="montoValor"
                          @if(old('montoValor'))
                            value="{{ old('montoValor') }}"
                          @elseif(isset(Route::current()->parameters()['array']))
                            @if(isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][$tagsFormato->subformatos][Route::current()->parameters()['array']]['valorAdquisicion']['valor']))
                              value="@money($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][$tagsFormato->subformatos][Route::current()->parameters()['array']]['valorAdquisicion']['valor'])"
                            @endif
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

                      <div class="col-sm-4" id="div_monedaAdquisicion">
                        <select class="form-control @error('montoMoneda') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="montoMoneda" name="montoMoneda" required>
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->monedas() as $fila)
                          <option value="{{ $fila->code }}"
                            @if(old('montoMoneda'))
                              @if($fila->code == old('montoMoneda'))
                                selected
                              @endif
                            @elseif(isset(Route::current()->parameters()['array']))
                              @if($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][$tagsFormato->subformatos][Route::current()->parameters()['array']]['valorAdquisicion']['moneda'] == $fila->code)
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

                  <p>&nbsp;</p>

                  @include('layouts.transmisores_html')

@endsection

@section('script')

@include('layouts.pais_js')

@include('layouts.formaAdquisicion')

@include('layouts.terceros_js')

@include('layouts.transmisores_js')

@endsection
