@extends('layouts.formulario')

@section('formulario')

                  <input name="tipoOperacion" type="hidden" value="AGREGAR">

                  <label for="ninguno" class="col-sm-12 col-form-label">
                    <input type="hidden" name="ninguno" value="0">
                    <input type="checkbox" tabindex="{{ $tabindex }}" value="1" class="form-control @error('ninguno') is-invalid @enderror" name="ninguno" id="ninguno"
                    @if(old('nombre'))
                      @if(old('ninguno') == true)
                        checked
                      @endif
                    @else
                      @if($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['ninguno'] == 1)
                        checked
                      @endif
                    @endif>
                    NINGUNO
                    @error('ninguno')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </label>

                  <p>&nbsp;</p>

                  <div id="form">
                    <fieldset>
                      <legend>
                        <h4 class="mb-3">
                          Datos generales de la persona:
                        </h4>
                      </legend>

                      <div class="row">
                        <div class="col-md-4 mb-3">
                          <label for="nombre">Nombre(s): <code>*</code></label>
                          <input type="text" tabindex="{{ ++$tabindex }}" autofocus class="form-control @error('nombre') is-invalid @enderror" id="nombre" name="nombre"
                          @if(old('nombre'))
                            value="{{ old('nombre') }}"
                          @else
                            @isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['nombre'])
                              value="{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['nombre'] }}"
                            @endisset
                          @endif
                          maxlength="65">
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
                          @else
                            @isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['primerApellido'])
                              value="{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['primerApellido'] }}"
                            @endisset
                          @endif
                          maxlength="65">
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
                          @else
                            @isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['segundoApellido'])
                              value="{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['segundoApellido'] }}"
                            @endisset
                          @endif maxlength="65">
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
                          @else
                            @isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['fechaNacimiento'])
                              value="{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['fechaNacimiento'] }}"
                            @endisset
                          @endif min="1950-01-01" max="{{ date('Y-m-d')}}">
                          @error('fechaObtencion')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>

                        <div class="col-md-5 mb-3">
                          <label for="curp">CURP:</label>
                          <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('curp') is-invalid @enderror" id="curp" name="curp" placeholder=""
                          @if(old('curp'))
                            value="{{ old('curp') }}"
                          @else
                            @isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['curp'])
                              value="{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['curp'] }}"
                            @endisset
                          @endif
                          maxlength="18" minLength="18">
                          @error('curp')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>

                        <div class="col-md-3 mb-3">
                          <label for="rfcFisica">RFC:</label>
                          <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('rfcFisicaHomo') is-invalid @enderror" id="rfcFisica" name="rfcFisicaHomo" placeholder=""
                          @if(old('rfcFisicaHomo'))
                            value="{{ old('rfcFisicaHomo') }}"
                          @else
                            @isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['rfc'])
                              value="{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['rfc'] }}"
                            @endisset
                          @endif
                          maxlength="13" minLength="13">
                          @error('rfcFisicaHomo')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="relacionConDeclarante">Relación con el declarante: <code>*</code></label>
                            <select tabindex="{{ ++$tabindex }}" class="form-control @error('relacionConDeclarante') is-invalid @enderror" id="relacionConDeclarante" name="relacionConDeclarante">
                              <option value="">Seleccione...</option>
                              @foreach($declaracion->catalogo->relacionConDeclarante() as $fila)
                                <option value="{{ $fila->clave }}"
                                  @if(old('relacionConDeclarante') == $fila->clave)
                                    selected
                                  @else
                                    @isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['relacionConDeclarante'])
                                      @if(!is_null($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['relacionConDeclarante']))
                                        @if($fila->clave == $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['relacionConDeclarante']) selected @endif
                                      @endif
                                    @endisset
                                  @endif
                                >
                                  {{ $fila->valor }}
                                </option>
                              @endforeach
                          </select>
                          @error('relacionConDeclarante')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                          <label for="esDependienteEconomico">¿Es dependiente económico? <code>*</code></label>
                          <select class="form-control @error('esDependienteEconomico') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="esDependienteEconomico" name="esDependienteEconomico">
                            <option value="">Seleccione...</option>
                            @foreach($declaracion->catalogo->boolean() as $fila)
                            <option value="{{ $fila->clave }}"
                              @if(old('esDependienteEconomico') != null)
                                @if($fila->clave == old('esDependienteEconomico'))
                                  selected
                                @endif
                              @else
                                @isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['esDependienteEconomico'])
                                  @if($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['esDependienteEconomico'] === boolval($fila->clave))
                                    selected
                                  @endif
                                @endisset
                              @endif
                            >
                              {{ $fila->valor }}
                            </option>
                            @endforeach
                          </select>
                          @error('esDependienteEconomico')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-6 mb-3">
                          <label for="ciudadanoExtranjero">¿Es ciudadano extranjero?: <code>*</code></label>
                            <select class="form-control @error('ciudadanoExtranjero') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="ciudadanoExtranjero" name="ciudadanoExtranjero">
                              <option value="">Seleccione...</option>
                              @foreach($declaracion->catalogo->boolean() as $fila)
                              <option value="{{ $fila->clave }}"
                                @if(old('ciudadanoExtranjero') != null)
                                  @if($fila->clave == old('ciudadanoExtranjero'))
                                    selected
                                  @endif
                                @else
                                  @isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['ciudadanoExtranjero'])
                                    @if($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['ciudadanoExtranjero'] === boolval($fila->clave))
                                      selected
                                    @endif
                                  @endisset
                                @endif
                              >
                                {{ $fila->valor }}
                              </option>
                              @endforeach
                            </select>
                          @error('ciudadanoExtranjero')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                          <label for="habitaDomicilioDeclarante">¿Habita en el domicilio del declarante?: <code>*</code></label>
                          <select class="form-control @error('habitaDomicilioDeclarante') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="habitaDomicilioDeclarante" name="habitaDomicilioDeclarante">
                            <option value="">Seleccione...</option>
                            @foreach($declaracion->catalogo->boolean() as $fila)
                            <option value="{{ $fila->clave }}"
                              @if(old('habitaDomicilioDeclarante') != null)
                                @if($fila->clave == old('habitaDomicilioDeclarante'))
                                  selected
                                @endif
                              @else
                                @isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['habitaDomicilioDeclarante'])
                                  @if($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['habitaDomicilioDeclarante'] === boolval($fila->clave))
                                    selected
                                  @endif
                                @endisset
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
                        <h4 class="mb-3">Domicilio de la pareja:</h4>
                      </legend>
                      @include('layouts.lugarDondeReside_html')

                      @include('layouts.domicilio_html')
                      <p>&nbsp;</p>
                    </fieldset>

                      @include('layouts.ambitoSector_html')
                      <p>&nbsp;</p>
                  </div>
@endsection


@section('script')

$('#pais').attr("tabindex","12");
$('#entidadFederativa').attr("tabindex","13");
$('#municipioAlcaldia').attr("tabindex","14");
$('#coloniaLocalidad').attr("tabindex","15");
$('#estadoProvincia').attr("tabindex","16");
$('#ciudadLocalidad').attr("tabindex","17");
$('#calle').attr("tabindex","18");
$('#numeroExterior').attr("tabindex","19");
$('#numeroInterior').attr("tabindex","20");
$('#codigoPostal').attr("tabindex","21");
$('#ambitoSectorClave').attr("tabindex","22");
$('#nombreInstitucion').attr("tabindex","23");
$('#rfc').attr("tabindex","24");
$('#nivelOrdenGobierno').attr("tabindex","25");
$('#ambitoPublico').attr("tabindex","26");
$('#areaAdscripcion').attr("tabindex","27");

$('#empleoCargoComision').attr("tabindex","28");
$('#funcionPrincipal').attr("tabindex","29");
$('#fechaObtencion').attr("tabindex","30");
$('#sector').attr("tabindex","31");
$('#proveedorContratistaGobierno').attr("tabindex","32");
$('#montoValor').attr("tabindex","33");
$('#montoMoneda').attr("tabindex","34");
$('#aclaracionesObservaciones').attr("tabindex","35");
$('#send').attr("tabindex","36");

$("#ninguno").ready(mostrar_fields);
$("#ninguno").change(mostrar_fields);

function mostrar_fields()
{
  if($("#ninguno").is(':checked'))
  {
    $('#form').hide();
    $("#nombre").removeAttr("required");
    $("#primerApellido").removeAttr("required");
    $("#fechaNacimiento").removeAttr("required");
    $("#relacionConDeclarante").removeAttr("required");
    $("#esDependienteEconomico").removeAttr("required");
    $("#ciudadanoExtranjero").removeAttr("required");
    $("#habitaDomicilioDeclarante").removeAttr("required");

    $("#lugarDondeReside").prop("checked",true);

    $("#ambitoSectorClave").removeAttr("required");

    mostrar_domicilio();
  }
  else
  {
    $('#form').show();
    $("#nombre").focus();
    $("#nombre").attr("required", "required");
    $("#primerApellido").attr("required", "required");
    $("#fechaNacimiento").attr("required", "required");
    $("#relacionConDeclarante").attr("required", "required");
    $("#esDependienteEconomico").attr("required", "required");
    $("#ciudadanoExtranjero").attr("required", "required");
    $("#habitaDomicilioDeclarante").attr("required", "required");

    mostrar_domicilio();

    $("#ambitoSectorClave").attr("required", "required");
  }
}

@include('layouts.domicilio_js')

@include('layouts.ambitoSector_js')

@endsection
