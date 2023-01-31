@extends('layouts.formulario')

@section('formulario')
                <fieldset>
                  <legend><h4 class="mb-3">Datos de la participación:</h4></legend>

                  <div class="row">
                    @include('layouts.participa')
                  </div>
                </fieldset>

                <p>&nbsp;</p>

                <fieldset>
                  <legend><h4 class="mb-3">Datos de la empresa, sociedad o asociación:</h4></legend>

                  <div class="row">

                    <div class="col-md-4 mb-3">
                      <label for="otro">Tipo de asociación: 🌐 <code>*</code></label>
                      <select class="form-control @error('tipoInstitucion') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="otro" name="tipoInstitucion" required>
                        <option value="">Seleccione...</option>
                        @foreach($declaracion->catalogo->tipoInstitucion() as $relacion)
                        <option value="{{ $relacion->clave }}"
                          @if(old('tipoInstitucion'))
                            @if($relacion->clave == old('tipoInstitucion'))
                              selected
                            @endif
                          @elseif(isset(Route::current()->parameters()['array']))
                            @if($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['tipoInstitucion']['clave'] == $relacion->clave)
                              selected
                            @endif
                          @endif
                        >
                        {{ $relacion->valor }}
                        </option>
                        @endforeach
                      </select>
                      @error('tipoInstitucion')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>

                    @include('layouts.empresaRfc_html')

                    <div class="col-md-4 mb-3">
                      <label for="puestoRol">Puesto o rol: 🌐 <code>*</code></label>
                      <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('empleoCargoComision') is-invalid @enderror" id="puestoRol" name="empleoCargoComision"
                      @if(old('empleoCargoComision'))
                        value="{{ old('empleoCargoComision') }}"
                      @elseif(isset(Route::current()->parameters()['array']))
                        value="{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['puestoRol'] }}"
                      @endif
                      maxlength="65" required>
                      @error('empleoCargoComision')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>

                    <div class="col-md-4 mb-3">
                      <label for="fechaInicioParticipacion">Fecha de ingreso: 🌐 <code>*</code></label>
                      <input type="date" tabindex="{{ ++$tabindex }}" class="form-control @error('fechaObtencion') is-invalid @enderror" id="fechaInicioParticipacion" name="fechaObtencion" min="1950-01-01"
                      @if(old('fechaObtencion'))
                        value="{{ old('fechaObtencion') }}"
                      @elseif(isset(Route::current()->parameters()['array']))
                        value="{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['fechaInicioParticipacion'] }}"
                      @endif
                      required max="{{ date('Y-m-d')}}">
                      <code>Aproximada</code>
                      @error('fechaObtencion')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>

                    @include('layouts.pais_html')

                  </div>

                </fieldset>

                <p>&nbsp;</p>

                <fieldset>
                  <legend><h4 class="mb-3">Remuneración:</h4></legend>

                  @include('layouts.remuneracion_html')
                </fieldset>
@endsection

@section('script')

$('#otro').attr("tabindex","2");
$('#nombreInstitucion').attr("tabindex","3");
$('#rfc').attr("tabindex","4");
$('#puestoRol').attr("tabindex","5");
$('#fechaInicioParticipacion').attr("tabindex","6");
$('#pais').attr("tabindex","7");
$('#entidadFederativa').attr("tabindex","8");
$('#send').attr("tabindex","12");

@if(isset(Route::current()->parameters()['array']))
  @empty(old())
  $('#nombreInstitucion').val("{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['nombreInstitucion'] }}");
  @endempty
@endif

@include('layouts.remuneracion_js')

@include('layouts.pais_js')

@endsection
