@extends('layouts.formulario')

@section('formulario')
                  <fieldset>
                    <legend><h4 class="mb-3">Tus datos personales:</h4></legend>


                    <div class="row">
                      <div class="col-md-4 mb-3">
                        <label for="nombre">Nombre(s): 🌐 <code>*</code></label>
                        <input type="text" tabindex="{{ ++$tabindex }}" autofocus class="form-control @error('nombre') is-invalid @enderror" id="nombre" name="nombre" @if(old('nombre')) value="{{ old('nombre') }}" @else value="{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['nombre'] }}" @endif maxlength="65" required="required">
                        @error('nombre')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-4 mb-3">
                        <label for="primerApellido">Primer apellido: 🌐 <code>*</code></label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('primerApellido') is-invalid @enderror" id="primerApellido" name="primerApellido" placeholder="" @if(old('primerApellido')) value="{{ old('primerApellido') }}" @else value="{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['primerApellido'] }}" @endif maxlength="65" required="required">
                        @error('primerApellido')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-4 mb-3">
                        <label for="segundoApellido">Segundo apellido: 🌐</label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('segundoApellido') is-invalid @enderror" id="segundoApellido" name="segundoApellido" placeholder="" @if(old('segundoApellido')) value="{{ old('segundoApellido') }}" @else value="{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['segundoApellido'] }}" @endif maxlength="65">
                        @error('segundoApellido')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>


                    <div class="row">
                      <div class="col-md-6 mb-3">
                        <label for="pais">País de nacimiento: <code>*</code></label>
                        <select tabindex="{{ ++$tabindex }}" class="form-control @error('paisNacimiento') is-invalid @enderror" id="pais" name="paisNacimiento" required="required">
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->paises() as $pais)
                          <option value="{{ $pais->ISO2 }}">
                            {{ $pais->ESPANOL }}
                          </option>
                          @endforeach
                        </select>
                        @error('paisNacimiento')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-6 mb-3">
                        <label for="nacionalidad">Nacionalidad: <code>*</code></label>
                        <select tabindex="{{ ++$tabindex }}" class="form-control @error('nacionalidad') is-invalid @enderror" id="nacionalidad" name="nacionalidad" required="required">
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->paises() as $pais)
                          <option value="{{ $pais->ISO2 }}">
                            {{ $pais->Nacionalidad }}
                          </option>
                          @endforeach
                        </select>
                        @error('nacionalidad')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>


                    <div class="row">
                      <div class="col-md-6 mb-3">
                        <label for="curp">CURP: <code>*</code></label>
                        <input tabindex="{{ ++$tabindex }}" type="text" class="form-control @error('curp') is-invalid @enderror" id="curp" name="curp" placeholder="" @if(old('curp')) value="{{ old('curp') }}" @else value="{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['curp'] }}" @endif minlength="18" maxlength="18" required="required">
                        <code><a target="_blank" href="https://www.gob.mx/curp/">Buscar CURP</a></code>
                        @error('curp')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-4 mb-3">
                        <label for="rfc">RFC: <code>*</code></label>
                        <input tabindex="{{ ++$tabindex }}" type="text" class="form-control  @error("rfcFisica") is-invalid @enderror" id="rfc" name="rfcFisica" placeholder="" value="@rfc(Auth::user()->email)" minlength="10" maxlength="10" required="required" readonly>
                        @error("rfcFisica")
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-2 mb-3">
                        <label for="homoClave">Homoclave: <code>*</code></label>
                        <input tabindex="{{ ++$tabindex }}" type="text" class="form-control @error('homoClave') is-invalid @enderror" id="homoClave" name="homoClave" placeholder="" value="@homoClave(Auth::user()->email)" maxlength="3" minlength="3" required="required" readonly>
                        @error('homoClave')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                    </div>

                  </fieldset>

                  <p>&nbsp;</p>

                  <fieldset>
                    <legend><h4 class="mb-3">¿Dónde te contactamos?:</h4></legend>

                    <div class="row">
                      <div class="col-md-6 mb-3">
                      <label for="institucional">Correo institucional: 🌐</label>
                        <input tabindex="{{ ++$tabindex }}" type="email" class="form-control @error('correoInstitucional') is-invalid @enderror" id="institucional" name="correoInstitucional" placeholder="tu@ejemplo.gob.mx" maxlength="65" @if(old('correoInstitucional')) value="{{ old('correoInstitucional') }}" @else value="{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['correoElectronico']['institucional'] }}" @endif>
                        @error('correoInstitucional')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-6 mb-3">
                        <label for="personal">Correo personal:</label>
                        <input tabindex="{{ ++$tabindex }}" type="email" class="form-control @error('correoPersonal') is-invalid @enderror" id="personal" name="correoPersonal" placeholder="tu@ejemplo.com" maxlength="65" @if(old('correoPersonal')) value="{{ old('correoPersonal') }}" @else value="{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['correoElectronico']['personal'] }}" @endif>
                        @error('correoPersonal')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6 mb-3">
                        <label for="casa">Lada + teléfono casa: </label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text">+</span>
                          </div>
                          <select tabindex="{{ ++$tabindex }}" class="form-control @error('ladaCasa') is-invalid @enderror" id="ladaCasa" name="ladaCasa">
                            <option value="">Seleccione...</option>
                            @foreach($declaracion->catalogo->paises() as $pais)
                            <option value="{{ $pais->LADA }}">
                              {{ $pais->ESPANOL }}
                              {{ $pais->LADA }}
                            </option>
                            @endforeach
                          </select>
                          <input tabindex="{{ ++$tabindex }}" type="text" class="form-control @error('casa') is-invalid @enderror" id="casa" name="casa" @if(old('casa')) value="{{ old('casa') }}" @else value="{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['telefono']['casa'] }}" @endif minlength="10" maxlength="10">
                          @error('casa')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                          @error('ladaCasa')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>
                      </div>
                      <div class="col-md-6 mb-3">
                        <label for="celular">Lada + teléfono celular: <code>*</code></label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text">+</span>
                          </div>
                          <select tabindex="{{ ++$tabindex }}" class="form-control @error('ladaCelular') is-invalid @enderror" id="ladaCelular" name="ladaCelular" required>
                            <option value="">Seleccione...</option>
                            @foreach($declaracion->catalogo->paises() as $pais)
                            <option value="{{ $pais->LADA }}">
                              {{ $pais->ESPANOL }}
                              {{ $pais->LADA }}
                            </option>
                            @endforeach
                          </select>
                          <input tabindex="{{ ++$tabindex }}" type="text" class="form-control @error('celular') is-invalid @enderror" id="celular" name="celular" minlength="10" maxlength="10" @if(old('celular')) value="{{ old('celular') }}" @else value="{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['telefono']['celularPersonal'] }}" @endif required="required">
                          @error('celular')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                          @error('ladaCelular')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>
                      </div>
                    </div>

                  </fieldset>

                  <p>&nbsp;</p>

                  <fieldset>
                    <legend><h4 class="mb-3">¿Cúal es tu situación personal?:</h4></legend>
                    <div class="row">
                      <div class="col-md-4 mb-3">
                        <label for="otro">Estado civil: <code>*</code></label>
                        <select tabindex="{{ ++$tabindex }}" class="form-control @error('situacionPersonalEstadoCivil') is-invalid @enderror" id="otro" name="situacionPersonalEstadoCivil" required="required">
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->situacionPersonalEstadoCivil() as $civil)
                          <option value="{{ $civil->clave }}"
                            @if(old('situacionPersonalEstadoCivil') == $civil->clave)
                              selected
                            @elseif($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['situacionPersonalEstadoCivil']['clave'] == $civil->clave and old('situacionPersonalEstadoCivil') == null)
                              @if($civil->clave == $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['situacionPersonalEstadoCivil']['clave']) selected @endif
                            @endif
                          >
                            {{ $civil->valor }}
                          </option>
                          @endforeach
                        </select>
                        @error('situacionPersonalEstadoCivil')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div id="div_otro" class="col-md-4 mb-3">
                        <label for="especifiqueotro">Régimen matrimonial: <code>*</code></label>
                        <select tabindex="{{ ++$tabindex }}" class="form-control @error('regimenMatrimonial') is-invalid @enderror" id="especifiqueotro" name="regimenMatrimonial">
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->regimenMatrimonial() as $regimen)
                          <option value="{{ $regimen->clave }}"
                            @if(old('regimenMatrimonial') == $regimen->clave)
                              selected
                            @endif
                          >
                            {{ $regimen->valor }}
                          </option>
                          @endforeach
                        </select>
                        @error('regimenMatrimonial')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>
                  </fieldset>
@endsection



@section('script')


@if(old('paisNacimiento'))
  $('#pais').val("{{ old('paisNacimiento') }}");
  $('#nacionalidad').val("{{ old('nacionalidad') }}");
  $('#ladaCasa').val("{{ old('ladaCasa') }}");
  $('#ladaCelular').val("{{ old('ladaCelular') }}");
@else

  @isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['especifiqueotro']['clave'])
    $('#especifiqueotro').val("{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['especifiqueotro']['clave'] }}");
  @endisset

  @if(empty($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['paisNacimiento']))
    $('#pais').val("MX");
    $('#nacionalidad').val("MX");
    $('#ladaCasa').val("52");
    $('#ladaCelular').val("52");
  @else
    $('#pais').val("{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['paisNacimiento'] }}");
    $('#nacionalidad').val("{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['nacionalidad'] }}");
    $('#ladaCasa').val("{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['telefono']['ladaCasa'] }}");
    $('#ladaCelular').val("{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['telefono']['ladaCelular'] }}");
    @isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['regimenMatrimonial']['clave'])
      $('#especifiqueotro').val("{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['regimenMatrimonial']['clave'] }}");
    @endisset
  @endif
@endif


@include('layouts.otro_js')


$("#casa").ready(ladaCasa);
$("#casa").change(ladaCasa);

function ladaCasa()
{
  $('#casa').blur(function()
  {
    if(!$(this).val())
    {
      $("#ladaCasa").removeAttr("required");
    }
    else
    {
      $("#ladaCasa").attr("required",true);
    }
  });
}

@endsection
