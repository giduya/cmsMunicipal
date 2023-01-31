@extends('layouts.formulario')

@section('formulario')
                  <fieldset>
                    <legend>
                      <h4 class="mb-3">Datos del mueble:</h4>
                    </legend>

                    <div class="row">
                      <div class="col-md-4 mb-3">
                        <label for="tipoBien">Tipo de bien: 🌐 <code>*</code></label>
                        <select class="form-control @error('tipoBien') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="tipoBien" name="tipoBien" required autofocus>
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->tipoBien() as $tipoBien)
                          <option value="{{ $tipoBien->clave }}"
                            @if(old('tipoBien'))
                              @if($tipoBien->clave == old('tipoBien'))
                                selected
                              @endif
                            @elseif(isset(Route::current()->parameters()['array']))
                              @if($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][$tagsFormato->subformatos][Route::current()->parameters()['array']]['tipoBien']['clave'] == $tipoBien->clave)
                                selected
                              @endif
                            @endif
                          >
                            {{ $tipoBien->valor }}
                          </option>
                          @endforeach
                        </select>
                        @error('tipoBien')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-4 mb-3">
                        <label for="descripcionGeneralBien"> Descripción del bien: 🌐 <code>*</code></label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('descripcionGeneralBien') is-invalid @enderror" id="descripcionGeneralBien" name="descripcionGeneralBien"
                        @if(old('descripcionGeneralBien'))
                          value="{{ old('descripcionGeneralBien') }}"
                        @elseif(isset(Route::current()->parameters()['array']))
                          @if($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][$tagsFormato->subformatos][Route::current()->parameters()['array']]['descripcionGeneralBien'])
                            value="{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][$tagsFormato->subformatos][Route::current()->parameters()['array']]['descripcionGeneralBien'] }}"
                          @endif
                        @endif
                        maxlength="65" required>
                        @error('descripcionGeneralBien')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-4 mb-3">
                        <label for="multiselect">Titular del bien: 🌐 <code>*</code></label>
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
                    <legend>
                      <h4 class="mb-3">Datos de adquisición del bien mueble:</h4>
                    </legend>
                    <div class="row" >
                      <div class="col-md-4 mb-3">
                        <label for="formaAdquisicion">Forma de adquisición 🌐 <code>*</code></label>
                        <select class="form-control @error('formaAdquisicion') is-invalid @enderror" tabindex="36" id="formaAdquisicion" name="formaAdquisicion" required>
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->formaAdquisicion() as $forma)
                          <option value="{{ $forma->clave }}"
                            @if(old('formaAdquisicion'))
                              @if($beneficiario->clave == old('formaAdquisicion'))
                                selected
                              @endif
                            @endif
                          >
                            {{ $forma->valor }}
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
                        <select class="form-control @error('formaPago') is-invalid @enderror" tabindex="37" id="formaPago" name="formaPago" required>
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
                        <input type="date" tabindex="38" class="form-control @error('fechaObtencion') is-invalid @enderror" id="fechaAdquisicion" name="fechaObtencion"
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
                          <input type="text" tabindex="39" class="number-separator form-control @error('montoValor') is-invalid @enderror" id="montoValor" name="montoValor"
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
                        <select class="form-control @error('montoMoneda') is-invalid @enderror" tabindex="40" id="montoMoneda" name="montoMoneda" required>
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

@isset(Route::current()->parameters()['array']))
  $("#formaAdquisicion").val("{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['formaAdquisicion']['clave'] }}");
@endisset

$('#send').attr("tabindex","96");

@include('layouts.terceros_js')

@include('layouts.transmisores_js')

@include('layouts.formaAdquisicion')

@endsection
