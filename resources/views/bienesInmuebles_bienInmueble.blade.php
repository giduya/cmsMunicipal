@extends('layouts.formulario')

@section('formulario')
                  <fieldset>
                    <legend>
                      <h4 class="mb-3">Datos del Inmueble:</h4>
                    </legend>

                    <div class="row">

                      <div class="form-group col-md-4 mb-3">
                        <label for="tipoInmueble">Tipo de inmueble: <code>*</code></label>
                        <select class="form-control @error('tipoInmueble') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="tipoInmueble" name="tipoInmueble" autofocus required>
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->tipoInmueble() as $tipoBien)
                          <option value="{{ $tipoBien->clave }}"
                            @if(old('tipoInmueble'))
                              @if(old('tipoInmueble') == $tipoBien->clave)
                                selected
                              @endif
                            @elseif(isset(Route::current()->parameters()['array']))
                              @if($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][$tagsFormato->subformatos][Route::current()->parameters()['array']]['tipoInmueble']['clave'] == $tipoBien->clave)
                                selected
                              @endif
                            @endif
                          >
                            {{ $tipoBien->valor }}
                          </option>
                          @endforeach
                        </select>
                        @error('tipoInmueble')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-4 mb-3">
                        <label for="numeroSerieRegistro"> Escritura, contrato, folio: <code>*</code></label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('numeroSerieRegistro') is-invalid @enderror" id="numeroSerieRegistro" name="numeroSerieRegistro"
                        @if(old('numeroSerieRegistro'))
                          value="{{ old('numeroSerieRegistro') }}"
                        @elseif(isset(Route::current()->parameters()['array']))
                          value="{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][$tagsFormato->subformatos][Route::current()->parameters()['array']]['datoIdentificacion'] }}"
                        @endif
                        maxlength="65" required>
                        @error('numeroSerieRegistro')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-4 mb-3">
                        <label for="superficieTerreno">Superficie del terreno: 🌐 <code>*</code></label>
                        <input type="number" tabindex="{{ ++$tabindex }}" class="form-control @error('superficieTerreno') is-invalid @enderror" id="superficieTerreno" name="superficieTerreno"
                        @if(old('superficieTerreno'))
                          value="{{ old('superficieTerreno') }}"
                        @elseif(isset(Route::current()->parameters()['array']))
                          value="{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][$tagsFormato->subformatos][Route::current()->parameters()['array']]['superficieTerreno']['valor'] }}"
                        @endif
                        max="1000000" min="1" required>
                        @error('superficieTerreno')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-4 mb-3">
                        <label for="superficieTerrenoUnidad">Unidad: 🌐 <code>*</code></label>
                        <select class="form-control @error('superficieTerrenoUnidad') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="superficieTerrenoUnidad" name="superficieTerrenoUnidad" required>
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->unidadMedida() as $unidad)
                          <option value="{{ $unidad->clave }}"
                            @if(old('superficieTerrenoUnidad'))
                              @if(old('superficieTerrenoUnidad') == $unidad->clave)
                                selected
                              @endif
                            @elseif(isset(Route::current()->parameters()['array']))
                              @if($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][$tagsFormato->subformatos][Route::current()->parameters()['array']]['superficieTerreno']['unidad'] == $unidad->clave)
                                selected
                              @endif
                            @endif
                          >
                            {{ $unidad->valor }}
                          </option>
                          @endforeach
                        </select>
                        @error('superficieTerrenoUnidad')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-4 mb-3">
                        <label for="superficieConstruccion">Superficie construida: 🌐 <code>*</code></label>
                        <input type="number" tabindex="{{ ++$tabindex }}" class="form-control @error('superficieConstruccion') is-invalid @enderror" id="superficieConstruccion" name="superficieConstruccion"
                        @if(old('superficieConstruccion'))
                          value="{{ old('superficieConstruccion') }}"
                        @elseif(isset(Route::current()->parameters()['array']))
                          value="{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][$tagsFormato->subformatos][Route::current()->parameters()['array']]['superficieConstruccion']['valor'] }}"
                        @endif
                        max="1000000" min="1" required>
                        @error('superficieConstruccion')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-4 mb-3">
                        <label for="superficieConstruccionUnidad">Unidad: 🌐 <code>*</code></label>
                        <select class="form-control @error('superficieConstruccionUnidad') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="superficieConstruccionUnidad" name="superficieConstruccionUnidad" required>
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->unidadMedida() as $unidad)
                          <option value="{{ $unidad->clave }}"
                            @if(old('superficieConstruccionUnidad'))
                              @if(old('superficieConstruccionUnidad') == $unidad->clave)
                                selected
                              @endif
                            @elseif(isset(Route::current()->parameters()['array']))
                              @if($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][$tagsFormato->subformatos][Route::current()->parameters()['array']]['superficieConstruccion']['unidad'] == $unidad->clave)
                                selected
                              @endif
                            @endif
                          >
                            {{ $unidad->valor }}
                          </option>
                          @endforeach
                        </select>
                        @error('superficieConstruccionUnidad')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div> {{--row--}}
                  </fieldset>

                  <p>&nbsp;</p>

                  <fieldset>
                    <legend>
                      <h4 class="mb-3">Domicilio del bien inmueble:</h4>
                    </legend>

                    @include('layouts.domicilio_html')
                  </fieldset>

                  <p>&nbsp;</p>

                  <fieldset>

                    <legend>
                      <h4 class="mb-3">Datos del titular:</h4>
                    </legend>

                    <div class="row">
                      <div class="form-group col-md-6 mb-3">
                        <label for="titular">Titular del bien: <code>*</code></label>
                        <select class="form-control @error('titular') is-invalid @enderror" tabindex="17" id="titular" name="titular[]" required multiple="multiple">
                          @foreach($declaracion->catalogo->titularBien() as $persona)
                          <option value="{{ $persona->clave }}"
                            @if(old('titular'))
                              @foreach(old('titular') as $old)
                                @if($old == $persona->clave)
                                  selected
                                @endif
                              @endforeach
                            @elseif(isset(Route::current()->parameters()['array']))
                              @foreach($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][$tagsFormato->subformatos][Route::current()->parameters()['array']]['titular'] as $titular)
                                @if($titular['clave'] == $persona->clave)
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

                      <div class="col-md-5 mb-3">
                        <label for="porcentaje">Porcentaje de propiedad: 🌐 <code>*</code></label>
                        <input type="number" tabindex="18" class="form-control @error('porcentaje') is-invalid @enderror" id="porcentaje" name="porcentaje"
                        @if(old('porcentaje'))
                          value="{{ old('porcentaje') }}"
                        @elseif(isset(Route::current()->parameters()['array']))
                          value="{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][$tagsFormato->subformatos][Route::current()->parameters()['array']]['porcentajePropiedad'] }}"
                        @endif

                          min="1" max=100 required>
                        @error('porcentaje')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>

                  </fieldset>

                  <p>&nbsp;<p>

                  @include('layouts.terceros_html')

                  <fieldset>
                    <legend>
                      <h4 class="mb-3">Datos de adquisición:</h4>
                    </legend>
                    <div class="row" >
                      <div class="form-group col-md-4 mb-3">
                        <label for="formaAdquisicion">Forma adquisición: 🌐 <code>*</code></label>
                        <select class="form-control @error('formaAdquisicion') is-invalid @enderror" tabindex="48" id="formaAdquisicion" name="formaAdquisicion" required>
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->formaAdquisicion() as $adquisicion)
                          <option value="{{ $adquisicion->clave }}"
                            @if($adquisicion->clave == old('formaAdquisicion'))
                              selected
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

                      <div class="form-group col-md-4 mb-3">
                        <label for="formaPago">Forma de pago: 🌐 <code>*</code></label>
                        <select class="form-control @error('formaPago') is-invalid @enderror" tabindex="49" id="formaPago" name="formaPago" required>
                          <option value="">Seleccione...</option>
                          @if(old('formaPago'))

                          @else

                          @endif
                        </select>
                        @error('formaPago')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-4 mb-3">
                        <label for="fechaObtencion"> Fecha de Adquisición: 🌐 <code>*</code></label>
                        <input type="date" tabindex="50" class="form-control @error('fechaObtencion') is-invalid @enderror" id="fechaObtencion" name="fechaObtencion"
                        @if(old('fechaObtencion'))
                          value="{{ old('fechaObtencion') }}"
                        @elseif(isset(Route::current()->parameters()['array']))
                          value="{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][$tagsFormato->subformatos][Route::current()->parameters()['array']]['fechaAdquisicion'] }}"
                        @endif

                        required  max="{{ date('Y-m-d')}}" min="1950-01-01">
                        @error('fechaObtencion')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>

                    <div class="row" >
                      <div class="col-md-4 mb-3">
                        <label for="valorConformeA">Valor conforme a: 🌐 <code>*</code></label>
                        <select class="form-control @error('valorConformeA') is-invalid @enderror" tabindex="51" id="valorConformeA" name="valorConformeA" required>
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->valorConformeA() as $valor)
                          <option value="{{ $valor->clave }}"
                            @if(old())
                              @if($valor->clave == old('valorConformeA'))
                                selected
                              @endif
                            @elseif(isset(Route::current()->parameters()['array']))
                              @if($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][$tagsFormato->subformatos][Route::current()->parameters()['array']]['valorConformeA'] == $valor->clave)
                                selected
                              @endif
                            @endif
                          >
                            {{ $valor->valor }}
                          </option>
                          @endforeach
                        </select>
                        @error('valorConformeA')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>


                      <div class="col-sm-4">
                        <label for="montoValor">
                          Valor de la adquisición: 🌐 <code>*</code>
                        </label>
                        <div class="input-group input-default">
                          <div class="input-group-prepend">
                            <span class="input-group-text">$</span>
                          </div>
                          <input type="text" tabindex="23" class="number-separator form-control @error('montoValor') is-invalid @enderror" id="montoValor" name="montoValor"
                          @if(old('montoValor'))
                            value="{{ old('montoValor') }}"
                          @elseif(isset(Route::current()->parameters()['array']))
                            value="@money($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][$tagsFormato->subformatos][Route::current()->parameters()['array']]['valorAdquisicion']['valor'])"
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


                      <div class="col-sm-4">
                        <label for="montoMoneda">Moneda: 🌐 <code>*</code></label>
                        <select class="form-control @error('montoMoneda') is-invalid @enderror" tabindex="24" id="montoMoneda" name="montoMoneda" required>
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->monedas() as $fila)
                          <option value="{{ $fila->code }}"
                            @if($fila->code == old('montoMoneda'))
                            selected
                            @elseif(old('montoMoneda') == null)
                              @if($fila->code == "MXN")
                              selected
                              @endif
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

$('#tercero_tipoPersona_0').attr("tabindex","19");
$('#tercero_nombreRazonSocial_0').attr("tabindex","20");
$('#tercero_rfc_0').attr("tabindex","21");

$('#tercero_tipoPersona_1').attr("tabindex","22");
$('#tercero_nombreRazonSocial_1').attr("tabindex","23");
$('#tercero_rfc_1').attr("tabindex","24");

$('#tercero_tipoPersona_2').attr("tabindex","25");
$('#tercero_nombreRazonSocial_2').attr("tabindex","26");
$('#tercero_rfc_2').attr("tabindex","27");

$('#tercero_tipoPersona_3').attr("tabindex","28");
$('#tercero_nombreRazonSocial_3').attr("tabindex","29");
$('#tercero_rfc_3').attr("tabindex","30");

$('#tercero_tipoPersona_4').attr("tabindex","31");
$('#tercero_nombreRazonSocial_4').attr("tabindex","32");
$('#tercero_rfc_4').attr("tabindex","33");

$('#tercero_tipoPersona_5').attr("tabindex","34");
$('#tercero_nombreRazonSocial_5').attr("tabindex","35");
$('#tercero_rfc_5').attr("tabindex","36");

$('#tercero_tipoPersona_6').attr("tabindex","37");
$('#tercero_nombreRazonSocial_6').attr("tabindex","38");
$('#tercero_rfc_6').attr("tabindex","39");

$('#tercero_tipoPersona_7').attr("tabindex","40");
$('#tercero_nombreRazonSocial_7').attr("tabindex","41");
$('#tercero_rfc_7').attr("tabindex","42");

$('#tercero_tipoPersona_8').attr("tabindex","43");
$('#tercero_nombreRazonSocial_8').attr("tabindex","44");
$('#tercero_rfc_8').attr("tabindex","45");

$('#tercero_tipoPersona_9').attr("tabindex","46");
$('#tercero_nombreRazonSocial_9').attr("tabindex","47");
$('#tercero_rfc_9').attr("tabindex","48");

$('#add').attr("tabindex","46");
$('#del').attr("tabindex","47");

$('#send').attr("tabindex","200");




@include('layouts.terceros_js')

@include('layouts.transmisores_js')

@include('layouts.formaAdquisicion')

@include('layouts.localidades')

@include('layouts.domicilio_js')

@endsection
