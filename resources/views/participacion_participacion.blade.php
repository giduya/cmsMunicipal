@extends('layouts.formulario')

@section('formulario')
                <fieldset>
                  <legend><h4 class="mb-3">Datos de la participación:</h4></legend>

                  <div class="row">

                    @include('layouts.participa')

                    <div class="col-md-4 mb-3">
                      <label for="porcentajeParticipacion">% de participación: 🌐</label>
                      <input type="number" tabindex="2" class="form-control @error('porcentaje') is-invalid @enderror" id="porcentajeParticipacion" name="porcentaje"
                      @if(old('porcentaje'))
                        value="{{ old('porcentaje') }}"
                      @elseif(isset(Route::current()->parameters()['array']))
                        @isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['porcentajeParticipacion'])
                          value="{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['porcentajeParticipacion'] }}"
                        @endisset
                      @endif
                      min="1" max="100">
                      <code>Si no tiene participación deje vacío.</code>
                      @error('porcentaje')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>

                    <div class="col-md-4 mb-3">
                      <label for="tipoParticipacion">¿Cómo participa?: 🌐 <code>*</code></label>
                      <select class="form-control @error('tipoParticipacion') is-invalid @enderror" tabindex="3" id="tipoParticipacion" name="tipoParticipacion" required>
                        <option value="">Seleccione...</option>
                        @foreach($declaracion->catalogo->tipoParticipacion() as $participacion)
                        <option value="{{ $participacion->clave }}"
                          @if(old('tipoParticipacion'))
                            @if($participacion->clave == old('tipoParticipacion'))
                              selected
                            @endif
                          @elseif(isset(Route::current()->parameters()['array']))
                            @if($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['tipoParticipacion']['clave'] == $participacion->clave)
                              selected
                            @endif
                          @endif
                        >
                          {{ $participacion->valor }}
                        </option>
                        @endforeach
                      </select>
                      @error('tipoParticipacion')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>
                </fieldset>

                <p>&nbsp;</p>

                <fieldset>
                  <legend><h4 class="mb-3">Datos de la empresa, sociedad o asociación:</h4></legend>
                  <div class="row">

                    @include('layouts.empresaRfc_html')

                    @include('layouts.sector_html')

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

$('#nombreInstitucion').attr("tabindex","4");
$('#rfc').attr("tabindex","5");
$('#sector').attr("tabindex","6");
$('#pais').attr("tabindex","7");
$('#entidadFederativa').attr("tabindex","8");
$('#send').attr("tabindex","12");

@if(isset(Route::current()->parameters()['array']))
  @empty(old())
  $('#nombreInstitucion').val("{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['nombreEmpresaSociedadAsociacion'] }}");
  @endempty
@endif

@include('layouts.remuneracion_js')

@include('layouts.pais_js')

@endsection
