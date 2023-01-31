@extends('layouts.formulario')

@section('formulario')
                  <div id="form">
                    <fieldset>
                      <legend>
                        <h4 class="mb-3">
                          Datos generales de la persona:
                        </h4>
                      </legend>

                      <div class="row">
                        <div class="col-md-4 mb-3">
                          <label for="nombres">Nombre(s): <code>*</code></label>
                          <input type="text" tabindex="{{ ++$tabindex }}" autofocus class="form-control @error('nombre') is-invalid @enderror" id="nombres" name="nombre"
                          @if(old('nombre'))
                            value="{{ old('nombre') }}"
                          @elseif(isset(Route::current()->parameters()['array']))
                            value="{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][$tagsFormato->subformatos][Route::current()->parameters()['array']]['nombre'] }}"
                          @endif
                          maxlength="65" required="required">
                          @error('nombre')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>

                        <div class="col-md-4 mb-3">
                          <label for="primerApellido">Primer apellido: <code>*</code></label>
                          <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('primerApellido') is-invalid @enderror" id="primerApellido" name="primerApellido" placeholder=""
                          @if(old('primerApellido'))
                            value="{{ old('primerApellido') }}"
                          @elseif(isset(Route::current()->parameters()['array']))
                            value="{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][$tagsFormato->subformatos][Route::current()->parameters()['array']]['primerApellido'] }}"
                          @endif
                          maxlength="65" required="required">
                          @error('primerApellido')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>

                        <div class="col-md-4 mb-3">
                          <label for="segundoApellido">Segundo apellido: </label>
                          <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('segundoApellido') is-invalid @enderror" id="segundoApellido" name="segundoApellido" placeholder=""
                          @if(old('segundoApellido'))
                            value="{{ old('segundoApellido') }}"
                          @elseif(isset(Route::current()->parameters()['array']))
                            value="{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][$tagsFormato->subformatos][Route::current()->parameters()['array']]['segundoApellido'] }}"
                          @endif
                          maxlength="65">
                          @error('segundoApellido')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-4 mb-3">
                          <label for="fechaNacimiento">Fecha de Nacimiento: <code>*</code></label>
                          <input type="date" tabindex="{{ ++$tabindex }}" class="form-control @error('fechaObtencion') is-invalid @enderror" id="fechaNacimiento" name="fechaObtencion"
                          @if(old('fechaObtencion'))
                            value="{{ old('fechaObtencion') }}"
                          @elseif(isset(Route::current()->parameters()['array']))
                            value="{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][$tagsFormato->subformatos][Route::current()->parameters()['array']]['fechaNacimiento'] }}"
                          @endif
                          required="required" min="1950-01-01" max="{{ date('Y-m-d')}}">
                          @error('fechaObtencion')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>

                        <div class="col-md-5 mb-3">
                          <label for="curp">CURP:</label>
                          <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('curp') is-invalid @enderror" id="curp" name="curp" placeholder="(opcional)"
                          @if(old('curp'))
                            value="{{ old('curp') }}"
                          @elseif(isset(Route::current()->parameters()['array']))
                            value="{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][$tagsFormato->subformatos][Route::current()->parameters()['array']]['curp'] }}"
                          @endif
                          maxlength="18" minLength="18">
                          @error('curp')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>

                        <div class="col-md-3 mb-3">
                          <label for="rfcFisica">RFC: </label>
                          <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('rfcFisicaHomo') is-invalid @enderror" id="rfcFisica" name="rfcFisicaHomo"
                          @if(old('rfcFisicaHomo'))
                            value="{{ old('rfcFisicaHomo') }}"
                          @elseif(isset(Route::current()->parameters()['array']))
                            value="{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][$tagsFormato->subformatos][Route::current()->parameters()['array']]['rfc'] }}"
                          @endif
                          maxlength="13" minLength="13" placeholder="(opcional)">
                          @error('rfcFisicaHomo')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-6 mb-3">
                          <label for="parentescoRelacion_clave">Relación con el declarante: <code>*</code></label>
                          <select tabindex="{{ ++$tabindex }}" class="form-control @error('parentescoRelacion') is-invalid @enderror" id="parentescoRelacion_clave" name="parentescoRelacion" required="required">
                            <option value="">Seleccione...</option>
                            @foreach($declaracion->catalogo->parentescoRelacion() as $relacion)
                            <option value="{{ $relacion->clave }}"
                              @if(old('parentescoRelacion'))
                                @if(old('parentescoRelacion') == $relacion->clave)
                                  selected
                                @endif
                              @elseif(isset(Route::current()->parameters()['array']))
                                @if($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][$tagsFormato->subformatos][Route::current()->parameters()['array']]['parentescoRelacion']['clave'] == $relacion->clave)
                                selected
                                @endif
                              @endif
                            >
                              {{ $relacion->valor }}
                            </option>
                            @endforeach
                          </select>
                          @error('parentescoRelacion')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                          <label for="extranjero">¿Es ciudadano extranjero? <code>*</code></label>
                          <select class="form-control @error('extranjero') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="extranjero" name="extranjero" required>
                            <option value="">Seleccione...</option>
                            @foreach($declaracion->catalogo->boolean() as $fila)
                            <option value="{{ $fila->clave }}"
                              @if(old('extranjero') != null)
                                @if($fila->clave == old('extranjero')) selected @endif
                              @elseif(isset(Route::current()->parameters()['array']))
                                @if(isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][$tagsFormato->subformatos][Route::current()->parameters()['array']]['extranjero']))
                                  @if($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][$tagsFormato->subformatos][Route::current()->parameters()['array']]['extranjero'] == $fila->clave)
                                  selected
                                  @endif
                                @endif
                              @endif
                            >
                              {{ $fila->valor }}
                            </option>
                            @endforeach
                          </select>
                          @error('extranjero')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                          <label for="habitaDomicilioDeclarante">¿Habita en el domicilio del declarante? <code>*</code></label>
                          <select class="form-control @error('habitaDomicilioDeclarante') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="habitaDomicilioDeclarante" name="habitaDomicilioDeclarante" required>
                            <option value="">Seleccione...</option>
                            @foreach($declaracion->catalogo->boolean() as $fila)
                            <option value="{{ $fila->clave }}"
                              @if(old('habitaDomicilioDeclarante') != null)
                                @if($fila->clave == old('habitaDomicilioDeclarante')) selected @endif
                              @elseif(isset(Route::current()->parameters()['array']))
                                @if(isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][$tagsFormato->subformatos][Route::current()->parameters()['array']]['habitaDomicilioDeclarante']))
                                  @if($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][$tagsFormato->subformatos][Route::current()->parameters()['array']]['habitaDomicilioDeclarante'] == $fila->clave)
                                  selected
                                  @endif
                                @endif
                              @endif
                            >
                              {{ $fila->valor }}
                            </option>
                            @endforeach
                          </select>
                          @error('habitaDomicilioDeclarante')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>
                      </div>
                      <p>&nbsp;</p>
                    </fieldset>

                    <fieldset>
                      <legend>
                        <h4 class="mb-3">Domicilio del dependiente económico:</h4>
                      </legend>
                      @include('layouts.lugarDondeReside_html')

                      @include('layouts.domicilio_html')
                      <p>&nbsp;</p>
                    </fieldset>

                    @include('layouts.ambitoSector_html')
                  </div>
@endsection


@section('script')

$('#pais').attr("tabindex","11");
$('#entidadFederativa').attr("tabindex","12");
$('#municipioAlcaldia').attr("tabindex","13");
$('#coloniaLocalidad').attr("tabindex","14");
$('#estadoProvincia').attr("tabindex","15");
$('#ciudadLocalidad').attr("tabindex","16");
$('#calle').attr("tabindex","17");
$('#numeroExterior').attr("tabindex","18");
$('#numeroInterior').attr("tabindex","19");
$('#codigoPostal').attr("tabindex","20");

$('#ambitoSectorClave').attr("tabindex","21");
$('#nombreInstitucion').attr("tabindex","22");
$('#rfc').attr("tabindex","23");
$('#nivelOrdenGobierno').attr("tabindex","24");
$('#ambitoPublico').attr("tabindex","25");
$('#areaAdscripcion').attr("tabindex","26");

$('#empleoCargoComision').attr("tabindex","27");
$('#funcionPrincipal').attr("tabindex","28");
$('#fechaObtencion').attr("tabindex","29");
$('#sector').attr("tabindex","30");
$('#proveedorContratistaGobierno').attr("tabindex","31");
$('#montoValor').attr("tabindex","32");
$('#montoMoneda').attr("tabindex","33");
$('#aclaracionesObservaciones').attr("tabindex","34");
$('#send').attr("tabindex","35");

@include('layouts.domicilio_js')

@include('layouts.ambitoSector_js')

@endsection
