@extends('layouts.formulario')

@section('formulario')
                  <fieldset>

                    <legend><h4 class="mb-3">Datos del titular:</h4></legend>

                    <div class="row">

                      <div class="col-md-6 mb-3">
                        <label for="multiselect" id="focus">Titular: 🌐 <code>*</code> </label>
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
                              @foreach($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['titular'] as $fila)
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
                  </fieldset>

                  <p>&nbsp;</p>

                  @include('layouts.terceros_html')

                  <fieldset>
                    <legend><h4 class="mb-3">Datos de la inversión:</h4></legend>

                    <div class="row">
                      <div class="col-md-4 mb-3">
                        <label for="tipoInversion">Tipo de inversion/activo: 🌐 <code>*</code></label>
                        <select class="form-control @error('tipoInversion') is-invalid @enderror" tabindex="33" id="tipoInversion" name="tipoInversion" required>
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->tipoInversion() as $relacion)
                          <option value="{{ $relacion->clave }}"
                          >
                            {{ $relacion->valor }}
                          </option>
                          @endforeach
                        </select>
                        @error('tipoInversion')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-4 mb-3" id="div_subTipoInversion">
                        <label for="subTipoInversion">Subtipo de inversion: 🌐 <code>*</code></label>
                        <select class="form-control @error('subTipoInversion') is-invalid @enderror" tabindex="34" id="subTipoInversion" name="subTipoInversion" required>
                          <option value="">Seleccione...</option>
                          @if(isset(Route::current()->parameters()['array']))
                            @foreach($declaracion->catalogo->subTipoInversion($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['tipoInversion']['clave']) as $sub)
                            <option value="{{ $sub->clave }}"
                              @if($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['subTipoInversion']['clave'] == $sub->clave)
                                selected
                              @endif
                            >
                              {{ $sub->valor }}
                            </option>
                            @endforeach
                          @endif
                        </select>
                        @error('subTipoInversion')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-4 mb-3">
                        <label for="numeroCuentaContrato">No. de cuenta, contrato: <code>*</code></label>
                        <input type="text" tabindex="35" class="form-control @error('numeroCuentaContrato') is-invalid @enderror" id="numeroCuentaContrato" name="numeroCuentaContrato"
                        @if(old('numeroCuentaContrato'))
                          value="{{ old('numeroCuentaContrato') }}"
                        @elseif(isset(Route::current()->parameters()['array']))
                          value="{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['numeroCuentaContrato'] }}"
                        @endif
                        maxlength="65" required>
                        @error('numeroCuentaContrato')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>

                    <p>&nbsp;</p>

                    <div class="form-group row">
                      <label for="saldoInsolutoSituacionActual_valor" class="col-sm-4 col-form-label">
                        @if($declaracion->metadata['tipo'] == "MODIFICACIÓN")
                          Entre 1 Enero y 31 Dic del año anterior:
                        @else
                          Saldo insoluto (situación actual):
                        @endif
                        🌐 <code>*</code>
                      </label>
                      <div class="col-sm-4 mb-3">
                        <div class="input-group input-default">
                          <div class="input-group-prepend">
                            <span class="input-group-text">$</span>
                          </div>
                          <input type="text" tabindex="36" class="number-separator form-control @error('saldoValor') is-invalid @enderror" id="saldoInsolutoSituacionActual_valor" name="saldoValor"
                          @if(old('saldoValor'))
                            value="{{ old('saldoValor') }}"
                          @elseif(isset(Route::current()->parameters()['array']))
                            @if(isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['saldoSituacionActual']['valor']))
                              value="@money($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['saldoSituacionActual']['valor'])"
                            @endif
                          @endif
                          maxlength="20"  style="text-align:right" required>
                          <div class="input-group-append">
                            <span class="input-group-text">.00</span>
                          </div>
                          @error('saldoValor')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>
                      </div>
                      <div class="col-sm-4 mb-3">
                        <select class="form-control @error('saldoMoneda') is-invalid @enderror" tabindex="37" id="saldoMoneda" name="saldoMoneda" required>
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->monedas() as $fila)
                          <option value="{{ $fila->code }}">
                            {{ $fila->code }}
                          </option>
                          @endforeach
                        </select>
                        @error('saldoMoneda')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>

                    @if($declaracion['metadata']['tipo'] != "INICIAL")
                    <div class="form-group row">
                      <label for="porcentaje" class="col-sm-8 col-form-label">
                        Porcentaje de incremento o decremento del saldo pagado: 🌐 <code>*</code>
                      </label>
                      <div class="col-sm-4 mb-3">
                        <div class="input-group input-default">
                          <input type="number" tabindex="38" class="form-control @error('porcentaje') is-invalid @enderror" id="porcentaje" name="porcentaje"
                          @if(old('porcentaje'))
                            value="{{ old('porcentaje') }}"
                          @elseif(isset(Route::current()->parameters()['array']))
                            @if(isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['porcentajeIncrementoDecremento']))
                              value="{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['porcentajeIncrementoDecremento'] }}"
                            @endif
                          @endif
                          min="0" max="100" required >
                          <div class="input-group-append">
                            <span class="input-group-text">%</span>
                          </div>
                          @error('porcentaje')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>
                      </div>

                    </div>
                    @endif

                  </fieldset>

                  <p>&nbsp;</p>

                  <fieldset id="fieldset_fideicomisario">
                    <legend>
                      <h4 class="mb-3">
                        Localización de la inversión:
                        <br>
                      </h4>
                    </legend>

                    <div class="row">
                      <div class="col-md-4 mb-3" id="div_pais">
                        <label for="pais">País: 🌐 <code>*</code></label>
                        <select class="form-control @error('pais') is-invalid @enderror" tabindex="39" id="pais" name="pais" required>
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->paises() as $pais)
                          <option value="{{ $pais->ISO2 }}"
                            @if($pais->ISO2 == old('pais'))
                            selected
                            @elseif(isset(Route::current()->parameters()['array']))
                              @if($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['localizacionInversion']['pais'] == $pais->ISO2)
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

                      <div class="col-md-5 mb-3">
                        <label for="nombreInstitucion">
                          Nombre institución: 🌐 <code>*</code>
                        </label>
                        <input id="nombreInstitucion" type="text" tabindex="40" class="form-control @error('nombreInstitucion') is-invalid @enderror" name="nombreInstitucion"
                        @if(old('nombreInstitucion'))
                          value="{{ old('nombreInstitucion') }}"
                        @elseif(isset(Route::current()->parameters()['array']))
                          value="{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['localizacionInversion']['institucionRazonSocial'] }}"
                        @endif
                         maxlength="65">
                        @error('nombreInstitucion')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-3 mb-3">
                        <label for="rfcMoralHomo">
                          RFC: 🌐
                        </label>
                        <input id="rfcMoralHomo" type="text" tabindex="41" class="form-control @error('rfcMoralHomo') is-invalid @enderror" name="rfcMoralHomo"
                        @if(old('rfcMoralHomo'))
                          value="{{ old('rfcMoralHomo') }}"
                        @elseif(isset(Route::current()->parameters()['array']))
                          value="{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['localizacionInversion']['rfc'] }}"
                        @endif
                        maxlength="12">
                        @error('rfcMoralHomo')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>
                  </fieldset>
@endsection


@section('script')

@include('layouts.terceros_js')

@include('layouts.tipoPersona_js')

@if(old())
  $('#saldoMoneda').val("{{ old('saldoMoneda') }}");
  $('#tipoInversion').val("{{ old('tipoInversion') }}");
@elseif(isset(Route::current()->parameters()['array']))
  $('#saldoMoneda').val("{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['saldoSituacionActual']['moneda'] }}");
  $('#tipoInversion option[value="{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['tipoInversion']['clave'] }}"]').attr("selected", "selected");
  $('#subTipoInversion option[value="{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['subTipoInversion']['clave'] }}"]').attr("selected", "selected");
@endif

$("#tipoInversion").ready(mostrar_subtipo);
$("#tipoInversion").change(mostrar_subtipo);

function mostrar_subtipo()
{
  var tipoValue = $("#tipoInversion").val();

  $('#subTipoInversion').find('option').not(':first').remove();

  $.ajax({
      url: '/catalogo/getTipoInversion/'+tipoValue,
      type: 'get',
      dataType: 'json',
      success: function(response)
      {
        var len = 0;
        if(response != null)
        {
          len = response.length;
        }

        if(len > 0)
        {

          for(var i=0; i<len; i++)
          {
            var id = response[i].clave;
            var valor = response[i].valor;
            var option = "<option value='"+id+"'>"+valor+"</option>";

            $("#subTipoInversion").append(option);

            @if(old())
              $('#subTipoInversion option[value="{{ old('subTipoInversion') }}"]').attr("selected", "selected");
            @elseif(isset(Route::current()->parameters()['array']))
              $('#subTipoInversion option[value="{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['subTipoInversion']['clave'] }}"]').attr("selected", "selected");
            @endif
          }
        }
      }
    });
}

$('#focus').focus();

@endsection
