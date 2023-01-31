@extends('layouts.formulario')

@section('formulario')
                  <fieldset>
                    <legend><h4 class="mb-3">¿Qué estudiaste?:</h4></legend>

                    <div class="row">
                      <div class="col-md-4 mb-3">
                        <label for="nivelClave">Nivel: 🌐 <code>*</code></label>
                        <select class="form-control @error('nivelClave') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="nivelClave" name="nivelClave" autofocus required="required">
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->nivel() as $nivel)
                          <option value="{{ $nivel->clave }}"
                            @if(old('nivelClave'))
                              @if(old('nivelClave') == $nivel->clave)
                                selected
                              @endif
                            @elseif(isset(Route::current()->parameters()['array']))
                              @if($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][$tagsFormato->subformatos][Route::current()->parameters()['array']]['nivel']['clave'] == $nivel->clave)
                              selected
                              @endif
                            @endif
                          >
                          {{ $nivel->valor }}
                          </option>
                          @endforeach
                        </select>
                        @error('nivelClave')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-8 mb-3">
                        <label for="carreraAreaConocimiento">Carrera o área de conocimiento: 🌐 <code>*</code></label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('carreraAreaConocimiento') is-invalid @enderror" id="carreraAreaConocimiento" name="carreraAreaConocimiento"
                        @if(old('carreraAreaConocimiento'))
                          value="{{ old('carreraAreaConocimiento') }}"
                        @elseif(isset(Route::current()->parameters()['array']))
                          value="{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][$tagsFormato->subformatos][Route::current()->parameters()['array']]['carreraAreaConocimiento'] }}"
                        @endif
                        required maxlength="65">
                        @error('carreraAreaConocimiento')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-4 mb-3">
                        <label for="ubicacion">Ubicación del instituto: 🌐 <code>*</code></label>
                        <select class="form-control @error('ubicacion') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="ubicacion" name="ubicacion" required>
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->extranjero() as $localizacion)
                          <option value="{{ $localizacion->clave }}"
                            @if(old('ubicacion'))
                              @if($localizacion->clave == old('ubicacion'))
                                selected
                              @endif
                            @elseif(isset(Route::current()->parameters()['array']))
                              @if($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][$tagsFormato->subformatos][Route::current()->parameters()['array']]['institucionEducativa']['ubicacion'] == $localizacion->clave)
                                selected
                              @endif
                            @endif
                          >
                          {{ $localizacion->valor }}
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
                        <label for="nombreInstitucion">Institución educativa: 🌐 <code>*</code></label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('nombreInstitucion') is-invalid @enderror" id="nombreInstitucion" name="nombreInstitucion"
                        @if(old('nombreInstitucion'))
                          value="{{ old('nombreInstitucion') }}"
                        @elseif(isset(Route::current()->parameters()['array']))
                          value="{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][$tagsFormato->subformatos][Route::current()->parameters()['array']]['institucionEducativa']['nombre'] }}"
                        @endif
                        required maxlength="65">
                        @error('nombreInstitucion')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-4 mb-3">
                        <label for="estatus">Estatus: 🌐 <code>*</code></label>
                        <select class="form-control @error('estatus') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="estatus" name="estatus" required>
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->estatus() as $estatus)
                          <option value="{{ $estatus->valor }}"
                          @if(old('estatus'))
                            @if($estatus->valor == old('estatus'))
                              selected
                            @endif
                          @elseif(isset(Route::current()->parameters()['array']))
                            @if($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][$tagsFormato->subformatos][Route::current()->parameters()['array']]['estatus'] == $estatus->valor)
                            selected
                            @endif
                          @endif
                          >
                          {{ $estatus->valor }}
                          </option>
                          @endforeach
                        </select>
                        @error('estatus')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                      <div class="col-md-4 mb-3">
                        <label for="documentoObtenido">Documento obtenido: 🌐 <code>*</code></label>
                        <select class="form-control @error('documentoObtenido') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="documentoObtenido" name="documentoObtenido" required>
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->documentoObtenido() as $documento)
                          <option value="{{ $documento->clave }}"
                          @if(old('documentoObtenido'))
                            @if($documento->valor == old('documentoObtenido'))
                              selected
                            @endif
                          @elseif(isset(Route::current()->parameters()['array']))
                            @if($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][$tagsFormato->subformatos][Route::current()->parameters()['array']]['documentoObtenido'] == $documento->clave)
                              selected
                            @endif
                          @endif
                          >
                          {{ $documento->valor }}
                          </option>
                          @endforeach
                        </select>
                        @error('documentoObtenido')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                      <div class="col-md-4 mb-3">
                        <label for="fechaObtencion">Fecha del documento 🌐 <code>*</code> </label>
                        <input type="date" tabindex="{{ ++$tabindex }}" class="form-control @error('fechaObtencion') is-invalid @enderror" id="fechaObtencion" name="fechaObtencion"
                        @if(old('fechaObtencion'))
                          value="{{ old('fechaObtencion') }}"
                        @elseif(isset(Route::current()->parameters()['array']))
                          value="{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][$tagsFormato->subformatos][Route::current()->parameters()['array']]['fechaObtencion'] }}"
                        @endif
                        required min="1950-01-01" max="{{ date('Y-m-d')}}">
                        @error('fechaObtencion')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>
                  </fieldset>
@endsection



@section('script')

$("#nivelClave").ready(area);
$("#nivelClave").change(area);

function area()
{
  var nivelClave = $("#nivelClave" ).val();

  if(nivelClave == "PRI")
  {
    $('#carreraAreaConocimiento').attr("value", "EDUCACIÓN BÁSICA");
    $('#carreraAreaConocimiento').attr("readonly", "readonly");
  }
  if(nivelClave == "SEC")
  {
    $('#carreraAreaConocimiento').attr("value", "EDUCACIÓN MEDIA");
    $('#carreraAreaConocimiento').attr("readonly", "readonly");
  }
  if(nivelClave == "BCH")
  {
    $('#carreraAreaConocimiento').attr("value", "EDUCACIÓN MEDIA SUPERIOR");
    $('#carreraAreaConocimiento').attr("readonly", "readonly");
  }
  if(nivelClave == "CTC" || nivelClave == "LIC")
  {
    $('#carreraAreaConocimiento').attr("value", "");
    $('#carreraAreaConocimiento').attr("value", @if(old('carreraAreaConocimiento')) "{{ old('carreraAreaConocimiento') }}" @elseif(isset(Route::current()->parameters()['array'])) "{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][$tagsFormato->subformatos][Route::current()->parameters()['array']]['carreraAreaConocimiento'] }}" @endif);
    $('#carreraAreaConocimiento').attr("placeholder", "¿Cual es tu carrera? ");
    $('#carreraAreaConocimiento').removeAttr("readonly");
  }
  if(nivelClave == "MAE" || nivelClave == "ESP" || nivelClave == "DOC")
  {
    $('#carreraAreaConocimiento').attr("value", "");
    $('#carreraAreaConocimiento').attr("value",  @if(old('carreraAreaConocimiento')) "{{ old('carreraAreaConocimiento') }}" @elseif(isset(Route::current()->parameters()['array'])) "{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][$tagsFormato->subformatos][Route::current()->parameters()['array']]['carreraAreaConocimiento'] }}" @endif);
    $('#carreraAreaConocimiento').attr("placeholder", "¿En que te especializaste?");
    $('#carreraAreaConocimiento').removeAttr("readonly");
  }
  if(0 === nivelClave.length)
  {
    $('#carreraAreaConocimiento').removeAttr("readonly");
    $('#carreraAreaConocimiento').removeAttr("value");
    $('#carreraAreaConocimiento').removeAttr("placeholder");
  }

  @if(old('documentoObtenido'))
    $('#documentoObtenido option[value="{{ old('documentoObtenido') }}"]').attr("selected", "selected");
  @endif

}
@endsection
