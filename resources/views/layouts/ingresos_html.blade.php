<fieldset class="form">
  <legend>
    <h4 class="mb-3">
      Desglose de ingresos
      @if(Route::current()->parameters()['formatoSlug'] == "ingresos")
        @if($declaracion->metadata['tipo'] == "INICIAL")
          mensuales:
        @elseif($declaracion->metadata['tipo'] == "MODIFICACIÓN")
          anual (Del 1-enero al 31 de diciembre del año anterior):
        @elseif($declaracion->metadata['tipo'] == "CONCLUSIÓN")
          del 1 de enero de este año al día de hoy:
        @endif
      @else
        del 1 de enero al 31 de dicimebre del año anterior o meses que hayas sido servidor público:
      @endif
    </h4>
  </legend>


    <div class="form-group row">
      <label for="remuneracionNetaCargoPublico" class="col-sm-8 col-form-label">
        I. Remuneración neta del declarante por su cargo público (incluyendo prestaciones, bonos y sueldos después de impuestos): 🌐 <code>*</code>
      </label>
      <div class="col-sm-4">
        <div class="input-group input-default">
          <div class="input-group-prepend">
            <span class="input-group-text">$</span>
          </div>
          <input type="text" tabindex="{{ ++$tabindex }}" class="number-separator form-control @error('remuneracionNetaCargoPublico') is-invalid @enderror" id="remuneracionNetaCargoPublico" name="remuneracionNetaCargoPublico" autofocus required
          @if(old('remuneracionNetaCargoPublico'))
            value="{{ old('remuneracionNetaCargoPublico') }}"
          @else
            @isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['remuneracionMensualCargoPublico'])
              value="@money($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['remuneracionMensualCargoPublico']['valor'])"
            @endisset
            @isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['remuneracionAnualCargoPublico'])
              value="@money($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['remuneracionAnualCargoPublico']['valor'])"
            @endisset
            @isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['remuneracionConclusionCargoPublico'])
              value="@money($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['remuneracionConclusionCargoPublico']['valor'])"
            @endisset
            @isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['remuneracionNetaCargoPublico'])
              value="@money($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['remuneracionNetaCargoPublico']['valor'])"
            @endisset
          @endif
          maxlength="20" style="text-align:right">
          <div class="input-group-append">
            <span class="input-group-text">.00</span>
          </div>
          @error('remuneracionNetaCargoPublico')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
      </div>
      <div class="col-sm-4">
      </div>
    </div>

    <p>&nbsp;</p>

    <div class="form-group row">
      <label for="otrosIngresosTotal_valor" class="col-sm-8 col-form-label">
        II. Otros ingresos del declarante (Suma del II.1 al II.5)🌐 <code>*</code>
      </label>
      <div class="col-sm-4">
        <div class="input-group input-default">
          <div class="input-group-prepend">
            <span class="input-group-text">$</span>
          </div>
          <input type="text" class="number-separator form-control @error('otrosIngresosTotal_valor') is-invalid @enderror" id="otrosIngresosTotal_valor" name="otrosIngresosTotal_valor"  readonly maxlength="20" style="text-align:right">
          <div class="input-group-append">
            <span class="input-group-text">.00</span>
          </div>
        </div>
        <code>No llenar, se suma automáticamente.</code>
      </div>
    </div>

    <p>&nbsp;</p>

    <div class="form-group row">
      <label for="actividadIndustialComercialEmpresarial_remuneracionTotal" class="col-sm-8 col-form-label">
      II.1 Por actividad industrial, comercial y/o empresarial 🌐 <code>*</code>
      </label>
      <div class="col-sm-4">
        <div class="input-group input-default">
          <div class="input-group-prepend">
            <span class="input-group-text">$</span>
          </div>
          <input type="text" class="number-separator form-control @error('actividadIndustialComercialEmpresarial_remuneracionTotal') is-invalid @enderror" id="actividadIndustialComercialEmpresarial_remuneracionTotal" name="actividadIndustialComercialEmpresarial_remuneracionTotal_valor" value="@if(old('actividadIndustialComercialEmpresarial_remuneracionTotal_valor')){{ old('actividadIndustialComercialEmpresarial_remuneracionTotal_valor') }}@endif" readonly maxlength="20" style="text-align:right">
          <div class="input-group-append">
            <span class="input-group-text">.00</span>
          </div>
        </div>
        <code>No llenar, se suma automáticamente.</code>
      </div>
    </div>

    <div class="row" id="industria_0" @if(old('industria.0.tipo') or old('industria.0.nombreRazonSocial') or old('industria.0.remuneracion')) @else style="display:none;" @endif>
      <div class="col-md-3 mb-3">
        <label for="industria_negocio_0">II.1.a) Tipo de negocio: </label>
        <input id="industria_negocio_0" type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('industria.0.tipo') is-invalid @enderror" name="industria[0][tipo]" @if(old('industria.0.tipo')) value="{{ old('industria.0.tipo') }}" @endif
        maxlength="65">
        @error('industria.0.tipo')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
      <div class="col-md-5 mb-3">
        <label for="industria_razon_0">Nombre o razón social: </label>
        <input id="industria_razon_0" type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('industria.0.nombreRazonSocial') is-invalid @enderror" name="industria[0][nombreRazonSocial]" @if(old('industria.0.nombreRazonSocial')) value="{{ old('industria.0.nombreRazonSocial') }}" @endif maxlength="65">
        @error('industria.0.nombreRazonSocial')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
      <div class="col-md-4 mb-3">
        <label for="industria_remuneracion_0">Remuneración: </label>
        <div class="input-group input-default">
          <div class="input-group-prepend">
            <span class="input-group-text">$</span>
          </div>
          <input id="industria_remuneracion_0" type="text" tabindex="{{ ++$tabindex }}" class="number-separator form-control @error('industria.0.remuneracion') is-invalid @enderror" name="industria[0][remuneracion]" @if(old('industria.0.remuneracion')) value="{{ old('industria.0.remuneracion') }}" @endif maxlength="20" style="text-align:right">
          <div class="input-group-append">
            <span class="input-group-text">.00</span>
          </div>
          @error('industria.0.remuneracion')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
      </div>
    </div>

    <div class="row" id="industria_1" @if(old('industria.1.tipo') or old('industria.1.nombreRazonSocial') or old('industria.1.remuneracion')) @else style="display:none;" @endif >
      <div class="col-md-3 mb-3">
        <label for="industria_negocio_1">II.1.b) Tipo de negocio: </label>
        <input id="industria_negocio_1" type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('industria.1.tipo') is-invalid @enderror" name="industria[1][tipo]" @if(old('industria.1.tipo')) value="{{ old('industria.1.tipo') }}" @endif maxlength="65">
        @error('industria.1.tipo')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
      <div class="col-md-5 mb-3">
        <label for="industria_razon_1">Nombre o razón social: </label>
        <input id="industria_razon_1" type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('industria.1.nombreRazonSocial') is-invalid @enderror" name="industria[1][nombreRazonSocial]" @if(old('industria.1.nombreRazonSocial')) value="{{ old('industria.1.nombreRazonSocial') }}" @endif maxlength="65">
        @error('industria.1.nombreRazonSocial')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
      <div class="col-md-4 mb-3">
        <label for="industria_remuneracion_1">Remuneración: </label>
        <div class="input-group input-default">
          <div class="input-group-prepend">
            <span class="input-group-text">$</span>
          </div>
          <input id="industria_remuneracion_1" type="text" tabindex="{{ ++$tabindex }}" class="number-separator form-control @error('industria.1.remuneracion') is-invalid @enderror" name="industria[1][remuneracion]"
          @if(old('industria.1.remuneracion'))
            value="{{ old('industria.1.remuneracion') }}"
          @endif
          maxlength="20" style="text-align:right">
          <div class="input-group-append">
            <span class="input-group-text">.00</span>
          </div>
          @error('industria.1.remuneracion')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
      </div>
    </div>

    <div class="row" id="industria_2" @if(old('industria.2.tipo') or old('industria.2.nombreRazonSocial') or old('industria.2.remuneracion')) @else style="display:none;" @endif >
      <div class="col-md-3 mb-3">
        <label for="industria_negocio_2">II.1.c) Tipo de negocio: </label>
        <input id="industria_negocio_2" type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('industria.2.tipo') is-invalid @enderror" name="industria[2][tipo]" @if(old('industria.2.tipo')) value="{{ old('industria.2.tipo') }}" @endif maxlength="65">
        @error('industria.2.tipo')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
      <div class="col-md-5 mb-3">
        <label for="industria_razon_2">Nombre o razón social: </label>
        <input id="industria_razon_2" type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('industria.2.nombreRazonSocial') is-invalid @enderror" name="industria[2][nombreRazonSocial]" @if(old('industria.2.nombreRazonSocial')) value="{{ old('industria.2.nombreRazonSocial') }}" @endif maxlength="65">
        @error('industria.2.nombreRazonSocial')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
      <div class="col-md-4 mb-3">
        <label for="industria_remuneracion_2">Remuneración: </label>
        <div class="input-group input-default">
          <div class="input-group-prepend">
            <span class="input-group-text">$</span>
          </div>
          <input id="industria_remuneracion_2" type="text" tabindex="{{ ++$tabindex }}" class="number-separator form-control @error('industria.2.remuneracion') is-invalid @enderror" name="industria[2][remuneracion]"
          @if(old('industria.2.remuneracion'))
            value="{{ old('industria.2.remuneracion') }}"
          @endif
          maxlength="20" style="text-align:right">
          <div class="input-group-append">
            <span class="input-group-text">.00</span>
          </div>
          @error('industria.2.remuneracion')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
      </div>
    </div>

    <div class="row" id="industria_3" @if(old('industria.3.tipo') or old('industria.3.nombreRazonSocial') or old('industria.3.remuneracion')) @else style="display:none;" @endif>
      <div class="col-md-3 mb-3">
        <label for="industria_negocio_3">II.1.d) Tipo de negocio: </label>
        <input id="industria_negocio_3" type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('industria.3.tipo') is-invalid @enderror" name="industria[3][tipo]" @if(old('industria.3.tipo')) value="{{ old('industria.3.tipo') }}" @endif maxlength="65">
        @error('industria.3.tipo')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
      <div class="col-md-5 mb-3">
        <label for="industria_razon_3">Nombre o razón social: </label>
        <input id="industria_razon_3" type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('industria.3.nombreRazonSocial') is-invalid @enderror" name="industria[3][nombreRazonSocial]" @if(old('industria.3.nombreRazonSocial')) value="{{ old('industria.3.nombreRazonSocial') }}" @endif maxlength="65">
        @error('industria.3.nombreRazonSocial')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
      <div class="col-md-4 mb-3">
        <label for="industria_remuneracion_3">Remuneración: </label>
        <div class="input-group input-default">
          <div class="input-group-prepend">
            <span class="input-group-text">$</span>
          </div>
          <input id="industria_remuneracion_3" type="text" tabindex="{{ ++$tabindex }}" class="number-separator form-control @error('industria.3.remuneracion') is-invalid @enderror" name="industria[3][remuneracion]" @if(old('industria.3.remuneracion')) value="{{ old('industria.3.remuneracion') }}" @endif maxlength="20" style="text-align:right">
          <div class="input-group-append">
            <span class="input-group-text">.00</span>
          </div>
          @error('industria.3.remuneracion')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
      </div>
    </div>

    <div class="row" id="industria_4" @if(old('industria.4.tipo') or old('industria.4.nombreRazonSocial') or old('industria.4.remuneracion')) @else style="display:none;" @endif>
      <div class="col-md-3 mb-3">
        <label for="industria_negocio_4">II.1.e) Tipo de negocio: </label>
        <input id="industria_negocio_4" type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('industria.4.tipo') is-invalid @enderror" name="industria[4][tipo]" @if(old('industria.4.tipo')) value="{{ old('industria.4.tipo') }}" @endif maxlength="65">
        @error('industria.4.tipo')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
      <div class="col-md-5 mb-3">
        <label for="industria_razon_4">Nombre o razón social: </label>
        <input id="industria_razon_4" type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('industria.4.nombreRazonSocial') is-invalid @enderror" name="industria[4][nombreRazonSocial]" @if(old('industria.4.nombreRazonSocial')) value="{{ old('industria.4.nombreRazonSocial') }}" @endif maxlength="65">
        @error('industria.4.nombreRazonSocial')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
      <div class="col-md-4 mb-3">
        <label for="industria_remuneracion_4">Remuneración: </label>
        <div class="input-group input-default">
          <div class="input-group-prepend">
            <span class="input-group-text">$</span>
          </div>
          <input id="industria_remuneracion_4" type="text" tabindex="{{ ++$tabindex }}" class="number-separator form-control @error('industria.4.remuneracion') is-invalid @enderror" name="industria[4][remuneracion]" @if(old('industria.4.remuneracion')) value="{{ old('industria.4.remuneracion') }}" @endif maxlength="20" style="text-align:right">
          <div class="input-group-append">
            <span class="input-group-text">.00</span>
          </div>
          @error('industria.4.remuneracion')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
      </div>
    </div>

    <div class="row" id="industria_5" @if(old('industria.5.tipo') or old('industria.5.nombreRazonSocial') or old('industria.5.remuneracion')) @else style="display:none;" @endif>
      <div class="col-md-3 mb-3">
        <label for="industria_negocio_5">II.1.f) Tipo de negocio: </label>
        <input id="industria_negocio_5" type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('industria.5.tipo') is-invalid @enderror" name="industria[5][tipo]" @if(old('industria.5.tipo')) value="{{ old('industria.5.tipo') }}" @endif maxlength="65">
        @error('industria.5.tipo')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
      <div class="col-md-5 mb-3">
        <label for="industria_razon_5">Nombre o razón social: </label>
        <input id="industria_razon_5" type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('industria.5.nombreRazonSocial') is-invalid @enderror" name="industria[5][nombreRazonSocial]" @if(old('industria.5.nombreRazonSocial')) value="{{ old('industria.5.nombreRazonSocial') }}" @endif maxlength="65">
        @error('industria.5.nombreRazonSocial')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
      <div class="col-md-4 mb-3">
        <label for="industria_remuneracion_5">Remuneración: </label>
        <div class="input-group input-default">
          <div class="input-group-prepend">
            <span class="input-group-text">$</span>
          </div>
          <input id="industria_remuneracion_5" type="text" tabindex="{{ ++$tabindex }}" class="number-separator form-control @error('industria.5.remuneracion') is-invalid @enderror" name="industria[5][remuneracion]" @if(old('industria.5.remuneracion')) value="{{ old('industria.5.remuneracion') }}" @endif maxlength="20" style="text-align:right">
          <div class="input-group-append">
            <span class="input-group-text">.00</span>
          </div>
          @error('industria.5.remuneracion')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
      </div>
    </div>

    <div class="row" id="industria_6" @if(old('industria.6.tipo') or old('industria.6.nombreRazonSocial') or old('industria.6.remuneracion')) @else style="display:none;" @endif>
      <div class="col-md-3 mb-3">
        <label for="industria_negocio_6">II.1.g) Tipo de negocio: </label>
        <input id="industria_negocio_6" type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('industria.6.tipo') is-invalid @enderror" name="industria[6][tipo]" @if(old('industria.6.tipo')) value="{{ old('industria.6.tipo') }}" @endif maxlength="65">
        @error('industria.6.tipo')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
      <div class="col-md-5 mb-3">
        <label for="industria_razon_6">Nombre o razón social: </label>
        <input id="industria_razon_6" type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('industria.6.nombreRazonSocial') is-invalid @enderror" name="industria[6][nombreRazonSocial]" @if(old('industria.6.nombreRazonSocial')) value="{{ old('industria.6.nombreRazonSocial') }}" @endif maxlength="65">
        @error('industria.6.nombreRazonSocial')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
      <div class="col-md-4 mb-3">
        <label for="industria_remuneracion_6">Remuneración: </label>
        <div class="input-group input-default">
          <div class="input-group-prepend">
            <span class="input-group-text">$</span>
          </div>
          <input id="industria_remuneracion_6" type="text" tabindex="{{ ++$tabindex }}" class="number-separator form-control @error('industria.6.remuneracion') is-invalid @enderror" name="industria[6][remuneracion]" @if(old('industria.6.remuneracion')) value="{{ old('industria.6.remuneracion') }}" @endif maxlength="20" style="text-align:right">
          <div class="input-group-append">
            <span class="input-group-text">.00</span>
          </div>
          @error('industria.6.remuneracion')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
      </div>
    </div>

    <div class="row" id="industria_7" @if(old('industria.7.tipo') or old('industria.7.nombreRazonSocial') or old('industria.7.remuneracion')) @else style="display:none;" @endif>
      <div class="col-md-3 mb-3">
        <label for="industria_negocio_7">II.1.h) Tipo de negocio: </label>
        <input id="industria_negocio_7" type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('industria.7.tipo') is-invalid @enderror" name="industria[7][tipo]" @if(old('industria.7.tipo')) value="{{ old('industria.7.tipo') }}" @endif maxlength="65">
        @error('industria.7.tipo')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
      <div class="col-md-5 mb-3">
        <label for="industria_razon_7">Nombre o razón social: </label>
        <input id="industria_razon_7" type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('industria.7.nombreRazonSocial') is-invalid @enderror" name="industria[7][nombreRazonSocial]" @if(old('industria.7.nombreRazonSocial')) value="{{ old('industria.7.nombreRazonSocial') }}" @endif maxlength="65">
        @error('industria.7.nombreRazonSocial')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
      <div class="col-md-4 mb-3">
        <label for="industria_remuneracion_7">Remuneración: </label>
        <div class="input-group input-default">
          <div class="input-group-prepend">
            <span class="input-group-text">$</span>
          </div>
          <input id="industria_remuneracion_7" type="text" tabindex="{{ ++$tabindex }}" class="number-separator form-control @error('industria.7.remuneracion') is-invalid @enderror" name="industria[7][remuneracion]" @if(old('industria.7.remuneracion')) value="{{ old('industria.7.remuneracion') }}" @endif maxlength="20" style="text-align:right">
          <div class="input-group-append">
            <span class="input-group-text">.00</span>
          </div>
          @error('industria.7.remuneracion')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
      </div>
    </div>

    <div class="row" id="industria_8" @if(old('industria.8.tipo') or old('industria.8.nombreRazonSocial') or old('industria.8.remuneracion')) @else style="display:none;" @endif>
      <div class="col-md-3 mb-3">
        <label for="industria_negocio_8">II.1.i) Tipo de negocio: </label>
        <input id="industria_negocio_8" type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('industria.8.tipo') is-invalid @enderror" name="industria[8][tipo]" @if(old('industria.8.tipo')) value="{{ old('industria.8.tipo') }}" @endif maxlength="65">
        @error('industria.8.tipo')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
      <div class="col-md-5 mb-3">
        <label for="industria_razon_8">Nombre o razón social: </label>
        <input id="industria_razon_8" type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('industria.8.nombreRazonSocial') is-invalid @enderror" name="industria[8][nombreRazonSocial]" @if(old('industria.8.nombreRazonSocial')) value="{{ old('industria.8.nombreRazonSocial') }}" @endif maxlength="65">
        @error('industria.8.nombreRazonSocial')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
      <div class="col-md-4 mb-3">
        <label for="industria_remuneracion_8">Remuneración: </label>
        <div class="input-group input-default">
          <div class="input-group-prepend">
            <span class="input-group-text">$</span>
          </div>
          <input id="industria_remuneracion_8" type="text" tabindex="{{ ++$tabindex }}" class="number-separator form-control @error('industria.8.remuneracion') is-invalid @enderror" name="industria[8][remuneracion]" @if(old('industria.8.remuneracion')) value="{{ old('industria.8.remuneracion') }}" @endif maxlength="20" style="text-align:right">
          <div class="input-group-append">
            <span class="input-group-text">.00</span>
          </div>
          @error('industria.8.remuneracion')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
      </div>
    </div>

    <div class="row" id="industria_9" @if(old('industria.9.tipo') or old('industria.9.nombreRazonSocial') or old('industria.9.remuneracion')) @else style="display:none;" @endif>
      <div class="col-md-3 mb-3">
        <label for="industria_negocio_9">II.1.j) Tipo de negocio: </label>
        <input id="industria_negocio_9" type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('industria.9.tipo') is-invalid @enderror" name="industria[9][tipo]" @if(old('industria.9.tipo')) value="{{ old('industria.9.tipo') }}" @endif maxlength="65">
        @error('industria.9.tipo')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
      <div class="col-md-5 mb-3">
        <label for="industria_razon_9">Nombre o razón social: </label>
        <input id="industria_razon_9" type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('industria.9.nombreRazonSocial') is-invalid @enderror" name="industria[9][nombreRazonSocial]" @if(old('industria.9.nombreRazonSocial')) value="{{ old('industria.9.nombreRazonSocial') }}" @endif maxlength="65">
        @error('industria.9.nombreRazonSocial')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
      <div class="col-md-4 mb-3">
        <label for="industria_remuneracion_9">Remuneración: </label>
        <div class="input-group input-default">
          <div class="input-group-prepend">
            <span class="input-group-text">$</span>
          </div>
          <input id="industria_remuneracion_9" type="text" tabindex="{{ ++$tabindex }}" class="number-separator form-control @error('industria.9.remuneracion') is-invalid @enderror" name="industria[9][remuneracion]" @if(old('industria.9.remuneracion')) value="{{ old('industria.9.remuneracion') }}" @endif maxlength="20" style="text-align:right">
          <div class="input-group-append">
            <span class="input-group-text">.00</span>
          </div>
          @error('industria.9.remuneracion')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-4 mb-3" id="div_add">
        <button id="add" tabindex="{{ ++$tabindex }}" class="btn btn-primary btn-sm btn-block" type="button">Agregar actividad</button>
      </div>
      <div class="col-md-4 mb-3" id="div_del" style="display:none;">
        <button id="del" tabindex="{{ ++$tabindex }}" class="btn btn-primary btn-sm btn-block" type="button">Eliminar actividad</button>
      </div>
    </div>

    <p>&nbsp;</p>

    <div class="form-group row">
      <label for="actividadFinanciera_remuneracionTotal_valor" class="col-sm-8 col-form-label">
      II.2 Por actividad financiera (rendimientos/ganancias después de impuestos) 🌐 <code>*</code>
      </label>
      <div class="col-sm-4">
        <div class="input-group input-default">
          <div class="input-group-prepend">
            <span class="input-group-text">$</span>
          </div>
          <input type="text" class="number-separator form-control @error('actividadFinanciera_remuneracionTotal_valor') is-invalid @enderror" id="actividadFinanciera_remuneracionTotal_valor" name="actividadFinanciera_remuneracionTotal_valor" value="@if(old('actividadFinanciera_remuneracionTotal_valor')){{ old('actividadFinanciera_remuneracionTotal_valor') }}@endif" readonly maxlength="20" style="text-align:right">
          <div class="input-group-append">
            <span class="input-group-text">.00</span>
          </div>
        </div>
        <code>No llenar, se suma automáticamente.</code>
      </div>
    </div>

    <div class="row" id="financiera_0" @if(old('financiera.0.tipoInstrumento') or old('financiera.0.remuneracion')) @else style="display:none;" @endif>
      <div class="col-md-8 mb-3">
        <label for="financiera_tipoInstrumento_0">II.2.a) Tipo de instrumento: </label>
        <select class="form-control @error('financiera.0.tipoInstrumento') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="financiera_tipoInstrumento_0" name="financiera[0][tipoInstrumento]" >
          <option value="">Seleccione...</option>
          @foreach($declaracion->catalogo->tipoInstrumento() as $tipo)
          <option value="{{ $tipo->clave }}"
            @if(old('financiera.0.tipoInstrumento') == $tipo->clave)
            selected
            @endif
          >
            {{ $tipo->valor }}
          </option>
          @endforeach
        </select>
        @error('financiera.0.tipoInstrumento')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
      <div class="col-md-4 mb-3">
        <label for="financiera_remuneracion_0">Remuneración: </label>
        <div class="input-group input-default">
          <div class="input-group-prepend">
            <span class="input-group-text">$</span>
          </div>
          <input id="financiera_remuneracion_0" type="text" tabindex="{{ ++$tabindex }}" class="number-separator form-control @error('financiera.0.remuneracion') is-invalid @enderror" name="financiera[0][remuneracion]" @if(old('financiera.0.remuneracion')) value="{{ old('financiera.0.remuneracion') }}" @endif maxlength="20" style="text-align:right">
          <div class="input-group-append">
            <span class="input-group-text">.00</span>
          </div>
          @error('financiera.0.remuneracion')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
      </div>
    </div>

    <div class="row" id="financiera_1" @if(old('financiera.1.tipoInstrumento') or old('financiera.1.remuneracion')) @else style="display:none;" @endif>
      <div class="col-md-8 mb-3">
        <label for="financiera_tipoInstrumento_1">II.2.b) Tipo de instrumento: </label>
        <select class="form-control @error('financiera.1.tipoInstrumento') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="financiera_tipoInstrumento_1" name="financiera[1][tipoInstrumento]" >
          <option value="">Seleccione...</option>
          @foreach($declaracion->catalogo->tipoInstrumento() as $tipo)
          <option value="{{ $tipo->clave }}"
            @if(old('financiera.1.tipoInstrumento') == $tipo->clave)
            selected
            @endif
          >
            {{ $tipo->valor }}
          </option>
          @endforeach
        </select>
        @error('financiera.1.tipoInstrumento')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
      <div class="col-md-4 mb-3">
        <label for="financiera_remuneracion_1">Remuneración: </label>
        <div class="input-group input-default">
          <div class="input-group-prepend">
            <span class="input-group-text">$</span>
          </div>
          <input id="financiera_remuneracion_1" type="text" tabindex="{{ ++$tabindex }}" class="number-separator form-control @error('financiera.1.remuneracion') is-invalid @enderror" name="financiera[1][remuneracion]" @if(old('financiera.1.remuneracion')) value="{{ old('financiera.1.remuneracion') }}" @endif maxlength="20" style="text-align:right">
          <div class="input-group-append">
            <span class="input-group-text">.00</span>
          </div>
          @error('financiera.1.remuneracion')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
      </div>
    </div>

    <div class="row" id="financiera_2" @if(old('financiera.2.tipoInstrumento') or old('financiera.2.remuneracion')) @else style="display:none;" @endif>
      <div class="col-md-8 mb-3">
        <label for="financiera_tipoInstrumento_2">II.2.c) Tipo de instrumento: </label>
        <select class="form-control @error('financiera.2.tipoInstrumento') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="financiera_tipoInstrumento_2" name="financiera[2][tipoInstrumento]" >
          <option value="">Seleccione...</option>
          @foreach($declaracion->catalogo->tipoInstrumento() as $tipo)
          <option value="{{ $tipo->clave }}"
            @if(old('financiera.2.tipoInstrumento') == $tipo->clave)
            selected
            @endif
          >
            {{ $tipo->valor }}
          </option>
          @endforeach
        </select>
        @error('financiera.2.tipoInstrumento')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
      <div class="col-md-4 mb-3">
        <label for="financiera_remuneracion_2">Remuneración: </label>
        <div class="input-group input-default">
          <div class="input-group-prepend">
            <span class="input-group-text">$</span>
          </div>
          <input id="financiera_remuneracion_2" type="text" tabindex="{{ ++$tabindex }}" class="number-separator form-control @error('financiera.2.remuneracion') is-invalid @enderror" name="financiera[2][remuneracion]" @if(old('financiera.2.remuneracion')) value="{{ old('financiera.2.remuneracion') }}" @endif maxlength="20" style="text-align:right">
          <div class="input-group-append">
            <span class="input-group-text">.00</span>
          </div>
          @error('financiera.2.remuneracion')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
      </div>
    </div>

    <div class="row" id="financiera_3" @if(old('financiera.3.tipoInstrumento') or old('financiera.3.remuneracion')) @else style="display:none;" @endif>
      <div class="col-md-8 mb-3">
        <label for="financiera_tipoInstrumento_3">II.2.d) Tipo de instrumento: </label>
        <select class="form-control @error('financiera.3.tipoInstrumento') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="financiera_tipoInstrumento_3" name="financiera[3][tipoInstrumento]" >
          <option value="">Seleccione...</option>
          @foreach($declaracion->catalogo->tipoInstrumento() as $tipo)
          <option value="{{ $tipo->clave }}"
            @if(old('financiera.3.tipoInstrumento') == $tipo->clave)
            selected
            @endif
          >
            {{ $tipo->valor }}
          </option>
          @endforeach
        </select>
        @error('financiera.3.tipoInstrumento')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
      <div class="col-md-4 mb-3">
        <label for="financiera_remuneracion_3">Remuneración: </label>
        <div class="input-group input-default">
          <div class="input-group-prepend">
            <span class="input-group-text">$</span>
          </div>
          <input id="financiera_remuneracion_3" type="text" tabindex="{{ ++$tabindex }}" class="number-separator form-control @error('financiera.3.remuneracion') is-invalid @enderror" name="financiera[3][remuneracion]" @if(old('financiera.3.remuneracion')) value="{{ old('financiera.3.remuneracion') }}" @endif maxlength="20" style="text-align:right">
          <div class="input-group-append">
            <span class="input-group-text">.00</span>
          </div>
          @error('financiera.3.remuneracion')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
      </div>
    </div>

    <div class="row" id="financiera_4" @if(old('financiera.4.tipoInstrumento') or old('financiera.4.remuneracion')) @else style="display:none;" @endif>
      <div class="col-md-8 mb-3">
        <label for="financiera_tipoInstrumento_4">II.2.e) Tipo de instrumento: </label>
        <select class="form-control @error('financiera.4.tipoInstrumento') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="financiera_tipoInstrumento_4" name="financiera[4][tipoInstrumento]" >
          <option value="">Seleccione...</option>
          @foreach($declaracion->catalogo->tipoInstrumento() as $tipo)
          <option value="{{ $tipo->clave }}"
            @if(old('financiera.4.tipoInstrumento') == $tipo->clave)
            selected
            @endif
          >
            {{ $tipo->valor }}
          </option>
          @endforeach
        </select>
        @error('financiera.4.tipoInstrumento')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
      <div class="col-md-4 mb-3">
        <label for="financiera_remuneracion_4">Remuneración: </label>
        <div class="input-group input-default">
          <div class="input-group-prepend">
            <span class="input-group-text">$</span>
          </div>
          <input id="financiera_remuneracion_4" type="text" tabindex="{{ ++$tabindex }}" class="number-separator form-control @error('financiera.4.remuneracion') is-invalid @enderror" name="financiera[4][remuneracion]" @if(old('financiera.4.remuneracion')) value="{{ old('financiera.4.remuneracion') }}" @endif maxlength="20" style="text-align:right">
          <div class="input-group-append">
            <span class="input-group-text">.00</span>
          </div>
          @error('financiera.4.remuneracion')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
      </div>
    </div>

    <div class="row" id="financiera_5" @if(old('financiera.5.tipoInstrumento') or old('financiera.5.remuneracion')) @else style="display:none;" @endif>
      <div class="col-md-8 mb-3">
        <label for="financiera_tipoInstrumento_5">II.2.f) Tipo de instrumento: </label>
        <select class="form-control @error('financiera.5.tipoInstrumento') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="financiera_tipoInstrumento_5" name="financiera[5][tipoInstrumento]" >
          <option value="">Seleccione...</option>
          @foreach($declaracion->catalogo->tipoInstrumento() as $tipo)
          <option value="{{ $tipo->clave }}"
            @if(old('financiera.5.tipoInstrumento') == $tipo->clave)
            selected
            @endif
          >
            {{ $tipo->valor }}
          </option>
          @endforeach
        </select>
        @error('financiera.5.tipoInstrumento')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
      <div class="col-md-4 mb-3">
        <label for="financiera_remuneracion_5">Remuneración: </label>
        <div class="input-group input-default">
          <div class="input-group-prepend">
            <span class="input-group-text">$</span>
          </div>
          <input id="financiera_remuneracion_5" type="text" tabindex="{{ ++$tabindex }}" class="number-separator form-control @error('financiera.5.remuneracion') is-invalid @enderror" name="financiera[5][remuneracion]" @if(old('financiera.5.remuneracion')) value="{{ old('financiera.5.remuneracion') }}" @endif maxlength="20" style="text-align:right">
          <div class="input-group-append">
            <span class="input-group-text">.00</span>
          </div>
          @error('financiera.5.remuneracion')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
      </div>
    </div>

    <div class="row" id="financiera_6" @if(old('financiera.6.tipoInstrumento') or old('financiera.6.remuneracion')) @else style="display:none;" @endif>
      <div class="col-md-8 mb-3">
        <label for="financiera_tipoInstrumento_6">II.2.g) Tipo de instrumento: </label>
        <select class="form-control @error('financiera.6.tipoInstrumento') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="financiera_tipoInstrumento_6" name="financiera[6][tipoInstrumento]" >
          <option value="">Seleccione...</option>
          @foreach($declaracion->catalogo->tipoInstrumento() as $tipo)
          <option value="{{ $tipo->clave }}"
            @if(old('financiera.6.tipoInstrumento') == $tipo->clave)
            selected
            @endif
          >
            {{ $tipo->valor }}
          </option>
          @endforeach
        </select>
        @error('financiera.6.tipoInstrumento')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
      <div class="col-md-4 mb-3">
        <label for="financiera_remuneracion_6">Remuneración: </label>
        <div class="input-group input-default">
          <div class="input-group-prepend">
            <span class="input-group-text">$</span>
          </div>
          <input id="financiera_remuneracion_6" type="text" tabindex="{{ ++$tabindex }}" class="number-separator form-control @error('financiera.6.remuneracion') is-invalid @enderror" name="financiera[6][remuneracion]" @if(old('financiera.6.remuneracion')) value="{{ old('financiera.6.remuneracion') }}" @endif maxlength="20" style="text-align:right">
          <div class="input-group-append">
            <span class="input-group-text">.00</span>
          </div>
          @error('financiera.6.remuneracion')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
      </div>
    </div>

    <div class="row" id="financiera_7" @if(old('financiera.7.tipoInstrumento') or old('financiera.7.remuneracion')) @else style="display:none;" @endif>
      <div class="col-md-8 mb-3">
        <label for="financiera_tipoInstrumento_7">II.2.h) Tipo de instrumento: </label>
        <select class="form-control @error('financiera.7.tipoInstrumento') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="financiera_tipoInstrumento_7" name="financiera[7][tipoInstrumento]" >
          <option value="">Seleccione...</option>
          @foreach($declaracion->catalogo->tipoInstrumento() as $tipo)
          <option value="{{ $tipo->clave }}"
            @if(old('financiera.7.tipoInstrumento') == $tipo->clave)
            selected
            @endif
          >
            {{ $tipo->valor }}
          </option>
          @endforeach
        </select>
        @error('financiera.7.tipoInstrumento')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
      <div class="col-md-4 mb-3">
        <label for="financiera_remuneracion_7">Remuneración: </label>
        <div class="input-group input-default">
          <div class="input-group-prepend">
            <span class="input-group-text">$</span>
          </div>
          <input id="financiera_remuneracion_7" type="text" tabindex="{{ ++$tabindex }}" class="number-separator form-control @error('financiera.7.remuneracion') is-invalid @enderror" name="financiera[7][remuneracion]" @if(old('financiera.7.remuneracion')) value="{{ old('financiera.7.remuneracion') }}" @endif maxlength="20" style="text-align:right">
          <div class="input-group-append">
            <span class="input-group-text">.00</span>
          </div>
          @error('financiera.7.remuneracion')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
      </div>
    </div>

    <div class="row" id="financiera_8" @if(old('financiera.8.tipoInstrumento') or old('financiera.8.remuneracion')) @else style="display:none;" @endif>
      <div class="col-md-8 mb-3">
        <label for="financiera_tipoInstrumento_8">II.2.i) Tipo de instrumento: </label>
        <select class="form-control @error('financiera.8.tipoInstrumento') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="financiera_tipoInstrumento_8" name="financiera[8][tipoInstrumento]" >
          <option value="">Seleccione...</option>
          @foreach($declaracion->catalogo->tipoInstrumento() as $tipo)
          <option value="{{ $tipo->clave }}"
            @if(old('financiera.8.tipoInstrumento') == $tipo->clave)
            selected
            @endif
          >
            {{ $tipo->valor }}
          </option>
          @endforeach
        </select>
        @error('financiera.8.tipoInstrumento')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
      <div class="col-md-4 mb-3">
        <label for="financiera_remuneracion_8">Remuneración: </label>
        <div class="input-group input-default">
          <div class="input-group-prepend">
            <span class="input-group-text">$</span>
          </div>
          <input id="financiera_remuneracion_8" type="text" tabindex="{{ ++$tabindex }}" class="number-separator form-control @error('financiera.8.remuneracion') is-invalid @enderror" name="financiera[8][remuneracion]" @if(old('financiera.8.remuneracion')) value="{{ old('financiera.8.remuneracion') }}" @endif maxlength="20" style="text-align:right">
          <div class="input-group-append">
            <span class="input-group-text">.00</span>
          </div>
          @error('financiera.8.remuneracion')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
      </div>
    </div>

    <div class="row" id="financiera_9" @if(old('financiera.9.tipoInstrumento') or old('financiera.9.remuneracion')) @else style="display:none;" @endif>
      <div class="col-md-8 mb-3">
        <label for="financiera_tipoInstrumento_9">II.2.j) Tipo de instrumento: </label>
        <select class="form-control @error('financiera.9.tipoInstrumento') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="financiera_tipoInstrumento_9" name="financiera[9][tipoInstrumento]" >
          <option value="">Seleccione...</option>
          @foreach($declaracion->catalogo->tipoInstrumento() as $tipo)
          <option value="{{ $tipo->clave }}"
            @if(old('financiera.9.tipoInstrumento') == $tipo->clave)
            selected
            @endif
          >
            {{ $tipo->valor }}
          </option>
          @endforeach
        </select>
        @error('financiera.9.tipoInstrumento')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
      <div class="col-md-4 mb-3">
        <label for="financiera_remuneracion_9">Remuneración: </label>
        <div class="input-group input-default">
          <div class="input-group-prepend">
            <span class="input-group-text">$</span>
          </div>
          <input id="financiera_remuneracion_9" type="text" tabindex="{{ ++$tabindex }}" class="number-separator form-control @error('financiera.9.remuneracion') is-invalid @enderror" name="financiera[9][remuneracion]" @if(old('financiera.9.remuneracion')) value="{{ old('financiera.9.remuneracion') }}" @endif maxlength="20" style="text-align:right">
          <div class="input-group-append">
            <span class="input-group-text">.00</span>
          </div>
          @error('financiera.9.remuneracion')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-4 mb-3" id="div_add2">
        <button id="add2" tabindex="{{ ++$tabindex }}" class="btn btn-primary btn-sm btn-block" type="button">Agregar actividad</button>
      </div>
      <div class="col-md-4 mb-3" id="div_del2" style="display:none;">
        <button id="del2" tabindex="{{ ++$tabindex }}" class="btn btn-primary btn-sm btn-block" type="button">Eliminar actividad</button>
      </div>
    </div>

    <p>&nbsp;</p>

    <div class="form-group row">
      <label for="serviciosProfesionales_remuneracionTotal_valor" class="col-sm-8 col-form-label">
      II.3 Por servicios profesionales, consejos, consultorías y / o asesorías 🌐 <code>*</code>
      </label>
      <div class="col-sm-4">
        <div class="input-group input-default">
          <div class="input-group-prepend">
            <span class="input-group-text">$</span>
          </div>
          <input type="text" class="number-separator form-control @error('serviciosProfesionales_remuneracionTotal_valor') is-invalid @enderror" id="serviciosProfesionales_remuneracionTotal_valor" name="serviciosProfesionales_remuneracionTotal_valor" value="@if(old('serviciosProfesionales_remuneracionTotal_valor')){{ old('serviciosProfesionales_remuneracionTotal_valor') }}@endif"  maxlength="20" style="text-align:right" readonly>
          <div class="input-group-append">
            <span class="input-group-text">.00</span>
          </div>
        </div>
        <code>No llenar, se suma automáticamente.</code>
      </div>
    </div>

    <div class="row" id="servicios_0" @if(old('servicio.0.tipoServicio') or old('servicio.0.remuneracion')) @else style="display:none;" @endif>
      <div class="col-md-8 mb-3">
        <label for="tipoServicio_0">II.3.a) Tipo de servicio: </label>
        <input id="tipoServicio_0" type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('servicio.0.tipoServicio') is-invalid @enderror" name="servicio[0][tipoServicio]" @if(old('servicio.0.tipoServicio')) value="{{ old('servicio.0.tipoServicio') }}" @endif maxlength="65">
        @error('servicio.0.tipoServicio')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
      <div class="col-md-4 mb-3">
        <label for="servicio_remuneracion_0">Remuneración: </label>
        <div class="input-group input-default">
          <div class="input-group-prepend">
            <span class="input-group-text">$</span>
          </div>
          <input id="servicio_remuneracion_0" type="text" tabindex="{{ ++$tabindex }}" class="number-separator form-control @error('servicio.0.remuneracion') is-invalid @enderror" name="servicio[0][remuneracion]" @if(old('servicio.0.remuneracion')) value="{{ old('servicio.0.remuneracion') }}" @endif maxlength="20" style="text-align:right">
          <div class="input-group-append">
            <span class="input-group-text">.00</span>
          </div>
          @error('servicio.0.remuneracion')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
      </div>
    </div>

    <div class="row" id="servicios_1" @if(old('servicio.1.tipoServicio') or old('servicio.1.remuneracion')) @else style="display:none;" @endif>
      <div class="col-md-8 mb-3">
        <label for="tipoServicio_1">II.3.b) Tipo de servicio: </label>
        <input id="tipoServicio_1" type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('servicio.1.tipoServicio') is-invalid @enderror" name="servicio[1][tipoServicio]" @if(old('servicio.1.tipoServicio')) value="{{ old('servicio.1.tipoServicio') }}" @endif maxlength="65">
        @error('servicio.1.tipoServicio')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
      <div class="col-md-4 mb-3">
        <label for="servicio_remuneracion_1">Remuneración: </label>
        <div class="input-group input-default">
          <div class="input-group-prepend">
            <span class="input-group-text">$</span>
          </div>
          <input id="servicio_remuneracion_1" type="text" tabindex="{{ ++$tabindex }}" class="number-separator form-control @error('servicio.1.remuneracion') is-invalid @enderror" name="servicio[1][remuneracion]" @if(old('servicio.1.remuneracion')) value="{{ old('servicio.1.remuneracion') }}" @endif maxlength="20" style="text-align:right">
          <div class="input-group-append">
            <span class="input-group-text">.00</span>
          </div>
          @error('servicio.1.remuneracion')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
      </div>
    </div>

    <div class="row" id="servicios_2" @if(old('servicio.2.tipoServicio') or old('servicio.2.remuneracion')) @else style="display:none;" @endif>
      <div class="col-md-8 mb-3">
        <label for="tipoServicio_2">II.3.c) Tipo de servicio: </label>
        <input id="tipoServicio_2" type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('servicio.2.tipoServicio') is-invalid @enderror" name="servicio[2][tipoServicio]" @if(old('servicio.2.tipoServicio')) value="{{ old('servicio.2.tipoServicio') }}" @endif maxlength="65">
        @error('servicio.2.tipoServicio')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
      <div class="col-md-4 mb-3">
        <label for="servicio_remuneracion_2">Remuneración: </label>
        <div class="input-group input-default">
          <div class="input-group-prepend">
            <span class="input-group-text">$</span>
          </div>
          <input id="servicio_remuneracion_2" type="text" tabindex="{{ ++$tabindex }}" class="number-separator form-control @error('servicio.2.remuneracion') is-invalid @enderror" name="servicio[2][remuneracion]" @if(old('servicio.2.remuneracion')) value="{{ old('servicio.2.remuneracion') }}" @endif maxlength="20" style="text-align:right">
          <div class="input-group-append">
            <span class="input-group-text">.00</span>
          </div>
          @error('servicio.2.remuneracion')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
      </div>
    </div>

    <div class="row" id="servicios_3" @if(old('servicio.3.tipoServicio') or old('servicio.3.remuneracion')) @else style="display:none;" @endif>
      <div class="col-md-8 mb-3">
        <label for="tipoServicio_3">II.3.d) Tipo de servicio: </label>
        <input id="tipoServicio_3" type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('servicio.3.tipoServicio') is-invalid @enderror" name="servicio[3][tipoServicio]" @if(old('servicio.3.tipoServicio')) value="{{ old('servicio.3.tipoServicio') }}" @endif maxlength="65">
        @error('servicio.3.tipoServicio')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
      <div class="col-md-4 mb-3">
        <label for="servicio_remuneracion_3">Remuneración: </label>
        <div class="input-group input-default">
          <div class="input-group-prepend">
            <span class="input-group-text">$</span>
          </div>
          <input id="servicio_remuneracion_3" type="text" tabindex="{{ ++$tabindex }}" class="number-separator form-control @error('servicio.3.remuneracion') is-invalid @enderror" name="servicio[3][remuneracion]" @if(old('servicio.3.remuneracion')) value="{{ old('servicio.3.remuneracion') }}" @endif maxlength="20" style="text-align:right">
          <div class="input-group-append">
            <span class="input-group-text">.00</span>
          </div>
          @error('servicio.3.remuneracion')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
      </div>
    </div>

    <div class="row" id="servicios_4" @if(old('servicio.4.tipoServicio') or old('servicio.4.remuneracion')) @else style="display:none;" @endif>
      <div class="col-md-8 mb-3">
        <label for="tipoServicio_4">II.3.e) Tipo de servicio: </label>
        <input id="tipoServicio_4" type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('servicio.4.tipoServicio') is-invalid @enderror" name="servicio[4][tipoServicio]" @if(old('servicio.4.tipoServicio')) value="{{ old('servicio.4.tipoServicio') }}" @endif maxlength="65">
        @error('servicio.4.tipoServicio')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
      <div class="col-md-4 mb-3">
        <label for="servicio_remuneracion_4">Remuneración: </label>
        <div class="input-group input-default">
          <div class="input-group-prepend">
            <span class="input-group-text">$</span>
          </div>
          <input id="servicio_remuneracion_4" type="text" tabindex="{{ ++$tabindex }}" class="number-separator form-control @error('servicio.4.remuneracion') is-invalid @enderror" name="servicio[4][remuneracion]" @if(old('servicio.4.remuneracion')) value="{{ old('servicio.4.remuneracion') }}" @endif maxlength="20" style="text-align:right">
          <div class="input-group-append">
            <span class="input-group-text">.00</span>
          </div>
          @error('servicio.4.remuneracion')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
      </div>
    </div>

    <div class="row" id="servicios_5" @if(old('servicio.5.tipoServicio') or old('servicio.5.remuneracion')) @else style="display:none;" @endif>
      <div class="col-md-8 mb-3">
        <label for="tipoServicio_5">II.3.f) Tipo de servicio: </label>
        <input id="tipoServicio_5" type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('servicio.5.tipoServicio') is-invalid @enderror" name="servicio[5][tipoServicio]" @if(old('servicio.5.tipoServicio')) value="{{ old('servicio.5.tipoServicio') }}" @endif maxlength="65">
        @error('servicio.5.tipoServicio')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
      <div class="col-md-4 mb-3">
        <label for="servicio_remuneracion_5">Remuneración: </label>
        <div class="input-group input-default">
          <div class="input-group-prepend">
            <span class="input-group-text">$</span>
          </div>
          <input id="servicio_remuneracion_5" type="text" tabindex="{{ ++$tabindex }}" class="number-separator form-control @error('servicio.5.remuneracion') is-invalid @enderror" name="servicio[5][remuneracion]" @if(old('servicio.5.remuneracion')) value="{{ old('servicio.5.remuneracion') }}" @endif maxlength="20" style="text-align:right">
          <div class="input-group-append">
            <span class="input-group-text">.00</span>
          </div>
          @error('servicio.5.remuneracion')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
      </div>
    </div>

    <div class="row" id="servicios_6" @if(old('servicio.6.tipoServicio') or old('servicio.6.remuneracion')) @else style="display:none;" @endif>
      <div class="col-md-8 mb-3">
        <label for="tipoServicio_6">II.3.g) Tipo de servicio: </label>
        <input id="tipoServicio_6" type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('servicio.6.tipoServicio') is-invalid @enderror" name="servicio[6][tipoServicio]" @if(old('servicio.6.tipoServicio')) value="{{ old('servicio.6.tipoServicio') }}" @endif maxlength="65">
        @error('servicio.6.tipoServicio')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
      <div class="col-md-4 mb-3">
        <label for="servicio_remuneracion_6">Remuneración: </label>
        <div class="input-group input-default">
          <div class="input-group-prepend">
            <span class="input-group-text">$</span>
          </div>
          <input id="servicio_remuneracion_6" type="text" tabindex="{{ ++$tabindex }}" class="number-separator form-control @error('servicio.6.remuneracion') is-invalid @enderror" name="servicio[6][remuneracion]" @if(old('servicio.6.remuneracion')) value="{{ old('servicio.6.remuneracion') }}" @endif maxlength="20" style="text-align:right">
          <div class="input-group-append">
            <span class="input-group-text">.00</span>
          </div>
          @error('servicio.6.remuneracion')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
      </div>
    </div>

    <div class="row" id="servicios_7" @if(old('servicio.7.tipoServicio') or old('servicio.7.remuneracion')) @else style="display:none;" @endif>
      <div class="col-md-8 mb-3">
        <label for="tipoServicio_7">II.3.h) Tipo de servicio: </label>
        <input id="tipoServicio_7" type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('servicio.7.tipoServicio') is-invalid @enderror" name="servicio[7][tipoServicio]" @if(old('servicio.7.tipoServicio')) value="{{ old('servicio.7.tipoServicio') }}" @endif maxlength="65">
        @error('servicio.7.tipoServicio')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
      <div class="col-md-4 mb-3">
        <label for="servicio_remuneracion_7">Remuneración: </label>
        <div class="input-group input-default">
          <div class="input-group-prepend">
            <span class="input-group-text">$</span>
          </div>
          <input id="servicio_remuneracion_7" type="text" tabindex="{{ ++$tabindex }}" class="number-separator form-control @error('servicio.7.remuneracion') is-invalid @enderror" name="servicio[7][remuneracion]" @if(old('servicio.7.remuneracion')) value="{{ old('servicio.7.remuneracion') }}" @endif maxlength="20" style="text-align:right">
          <div class="input-group-append">
            <span class="input-group-text">.00</span>
          </div>
          @error('servicio.7.remuneracion')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
      </div>
    </div>

    <div class="row" id="servicios_8" @if(old('servicio.8.tipoServicio') or old('servicio.8.remuneracion')) @else style="display:none;" @endif>
      <div class="col-md-8 mb-3">
        <label for="tipoServicio_8">II.3.i) Tipo de servicio: </label>
        <input id="tipoServicio_8" type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('servicio.8.tipoServicio') is-invalid @enderror" name="servicio[8][tipoServicio]" @if(old('servicio.8.tipoServicio')) value="{{ old('servicio.8.tipoServicio') }}" @endif maxlength="65">
        @error('servicio.8.tipoServicio')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
      <div class="col-md-4 mb-3">
        <label for="servicio_remuneracion_8">Remuneración: </label>
        <div class="input-group input-default">
          <div class="input-group-prepend">
            <span class="input-group-text">$</span>
          </div>
          <input id="servicio_remuneracion_8" type="text" tabindex="{{ ++$tabindex }}" class="number-separator form-control @error('servicio.8.remuneracion') is-invalid @enderror" name="servicio[8][remuneracion]" @if(old('servicio.8.remuneracion')) value="{{ old('servicio.8.remuneracion') }}" @endif maxlength="20" style="text-align:right">
          <div class="input-group-append">
            <span class="input-group-text">.00</span>
          </div>
          @error('servicio.8.remuneracion')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
      </div>
    </div>

    <div class="row" id="servicios_9" @if(old('servicio.9.tipoServicio') or old('servicio.9.remuneracion')) @else style="display:none;" @endif>
      <div class="col-md-8 mb-3">
        <label for="tipoServicio_9">II.3.j) Tipo de servicio: </label>
        <input id="tipoServicio_9" type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('servicio.9.tipoServicio') is-invalid @enderror" name="servicio[9][tipoServicio]" @if(old('servicio.9.tipoServicio')) value="{{ old('servicio.9.tipoServicio') }}" @endif maxlength="65">
        @error('servicio.9.tipoServicio')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
      <div class="col-md-4 mb-3">
        <label for="servicio_remuneracion_9">Remuneración: </label>
        <div class="input-group input-default">
          <div class="input-group-prepend">
            <span class="input-group-text">$</span>
          </div>
          <input id="servicio_remuneracion_9" type="text" tabindex="{{ ++$tabindex }}" class="number-separator form-control @error('servicio.9.remuneracion') is-invalid @enderror" name="servicio[9][remuneracion]" @if(old('servicio.9.remuneracion')) value="{{ old('servicio.9.remuneracion') }}" @endif maxlength="20" style="text-align:right">
          <div class="input-group-append">
            <span class="input-group-text">.00</span>
          </div>
          @error('servicio.9.remuneracion')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-4 mb-3" id="div_add3">
        <button id="add3" tabindex="{{ ++$tabindex }}" class="btn btn-primary btn-sm btn-block" type="button">Agregar servicio</button>
      </div>
      <div class="col-md-4 mb-3" id="div_del3" style="display:none;">
        <button id="del3" tabindex="{{ ++$tabindex }}" class="btn btn-primary btn-sm btn-block" type="button">Eliminar servicio</button>
      </div>
    </div>

    <p>&nbsp;</p>

    @if($declaracion->metadata['tipo'] == "INICIAL" and Route::current()->parameters()['formatoSlug'] == "actividadAnualAnterior" or $declaracion->metadata['tipo'] == "CONCLUSIÓN" and Route::current()->parameters()['formatoSlug'] == "actividadAnualAnterior" or $declaracion->metadata['tipo'] == "MODIFICACIÓN" and Route::current()->parameters()['formatoSlug'] == "ingresos" or $declaracion->metadata['tipo'] == "CONCLUSIÓN" and Route::current()->parameters()['formatoSlug'] == "ingresos")
    <div class="form-group row">
      <label for="enajenacionBienes_remuneracionTotal_valor" class="col-sm-8 col-form-label">
      II.4 Por enajenación de bienes (después de impuestos) 🌐 <code>*</code>
      </label>
      <div class="col-sm-4">
        <div class="input-group input-default">
          <div class="input-group-prepend">
            <span class="input-group-text">$</span>
          </div>
          <input type="text" class="number-separator form-control @error('enajenacionBienes_remuneracionTotal_valor') is-invalid @enderror" id="enajenacionBienes_remuneracionTotal_valor" name="enajenacionBienes_remuneracionTotal_valor" maxlength="20" style="text-align:right" readonly>
          <div class="input-group-append">
            <span class="input-group-text">.00</span>
          </div>
        </div>
        <code>No llenar, se suma automáticamente.</code>
      </div>
    </div>

    <div class="row" id="bienes_0" @if(old('bien.0.tipoBienEnajenado') or old('bien.0.remuneracion')) @else style="display:none;" @endif>
      <div class="col-md-8 mb-3">
        <label for="tipoBienEnajenado_0">II.4.a) Tipo de bien enajenado: </label>
        <select id="tipoBienEnajenado_0" class="form-control @error('bien.0.tipoBienEnajenado') is-invalid @enderror" tabindex="{{ ++$tabindex }}" name="bien[0][tipoBienEnajenado]" >
          <option value="">Seleccione...</option>
          @foreach($declaracion->catalogo->tipoBienEnajenado() as $tipo)
          <option value="{{ $tipo->clave }}"
            @if(old('bien.0.tipoBienEnajenado') == $tipo->clave)
            selected
            @endif
          >
            {{ $tipo->valor }}
          </option>
          @endforeach
        </select>
        @error('bien.0.tipoBienEnajenado')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
      <div class="col-md-4 mb-3">
        <label for="bien_remuneracion_0">Remuneración: </label>
        <div class="input-group input-default">
          <div class="input-group-prepend">
            <span class="input-group-text">$</span>
          </div>
          <input id="bien_remuneracion_0" type="text" tabindex="{{ ++$tabindex }}" class="number-separator form-control @error('bien.0.remuneracion') is-invalid @enderror" name="bien[0][remuneracion]" @if(old('bien.0.remuneracion')) value="{{ old('bien.0.remuneracion') }}" @endif maxlength="20" style="text-align:right">
          <div class="input-group-append">
            <span class="input-group-text">.00</span>
          </div>
          @error('bien.0.remuneracion')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
      </div>
    </div>

    <div class="row" id="bienes_1" @if(old('bien.1.tipoBienEnajenado') or old('bien.1.remuneracion')) @else style="display:none;" @endif>
      <div class="col-md-8 mb-3">
        <label for="tipoBienEnajenado_1">II.4.b) Tipo de bien enajenado: </label>
        <select id="tipoBienEnajenado_1" class="form-control @error('bien.1.tipoBienEnajenado') is-invalid @enderror" tabindex="{{ ++$tabindex }}" name="bien[1][tipoBienEnajenado]" >
          <option value="">Seleccione...</option>
          @foreach($declaracion->catalogo->tipoBienEnajenado() as $tipo)
          <option value="{{ $tipo->clave }}"
            @if(old('bien.1.tipoBienEnajenado') == $tipo->clave)
            selected
            @endif
          >
            {{ $tipo->valor }}
          </option>
          @endforeach
        </select>
        @error('bien.1.tipoBienEnajenado')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
      <div class="col-md-4 mb-3">
        <label for="bien_remuneracion_1">Remuneración: </label>
        <div class="input-group input-default">
          <div class="input-group-prepend">
            <span class="input-group-text">$</span>
          </div>
          <input id="bien_remuneracion_1" type="text" tabindex="{{ ++$tabindex }}" class="number-separator form-control @error('bien.1.remuneracion') is-invalid @enderror" name="bien[1][remuneracion]" @if(old('bien.1.remuneracion')) value="{{ old('bien.1.remuneracion') }}" @endif maxlength="20" style="text-align:right">
          <div class="input-group-append">
            <span class="input-group-text">.00</span>
          </div>
          @error('bien.1.remuneracion')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
      </div>
    </div>

    <div class="row" id="bienes_2" @if(old('bien.2.tipoBienEnajenado') or old('bien.2.remuneracion')) @else style="display:none;" @endif>
      <div class="col-md-8 mb-3">
        <label for="tipoBienEnajenado_2">II.4.c) Tipo de bien enajenado: </label>
        <select id="tipoBienEnajenado_2" class="form-control @error('bien.2.tipoBienEnajenado') is-invalid @enderror" tabindex="{{ ++$tabindex }}" name="bien[2][tipoBienEnajenado]" >
          <option value="">Seleccione...</option>
          @foreach($declaracion->catalogo->tipoBienEnajenado() as $tipo)
          <option value="{{ $tipo->clave }}"
            @if(old('bien.2.tipoBienEnajenado') == $tipo->clave)
            selected
            @endif
          >
            {{ $tipo->valor }}
          </option>
          @endforeach
        </select>
        @error('bien.2.tipoBienEnajenado')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
      <div class="col-md-4 mb-3">
        <label for="bien_remuneracion_2">Remuneración: </label>
        <div class="input-group input-default">
          <div class="input-group-prepend">
            <span class="input-group-text">$</span>
          </div>
          <input id="bien_remuneracion_2" type="text" tabindex="{{ ++$tabindex }}" class="number-separator form-control @error('bien.2.remuneracion') is-invalid @enderror" name="bien[2][remuneracion]" @if(old('bien.2.remuneracion')) value="{{ old('bien.2.remuneracion') }}" @endif maxlength="20" style="text-align:right">
          <div class="input-group-append">
            <span class="input-group-text">.00</span>
          </div>
          @error('bien.2.remuneracion')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
      </div>
    </div>

    <div class="row" id="bienes_3" @if(old('bien.3.tipoBienEnajenado') or old('bien.3.remuneracion')) @else style="display:none;" @endif>
      <div class="col-md-8 mb-3">
        <label for="tipoBienEnajenado_3">II.4.d) Tipo de bien enajenado: </label>
        <select id="tipoBienEnajenado_3" class="form-control @error('bien.3.tipoBienEnajenado') is-invalid @enderror" tabindex="{{ ++$tabindex }}" name="bien[3][tipoBienEnajenado]" >
          <option value="">Seleccione...</option>
          @foreach($declaracion->catalogo->tipoBienEnajenado() as $tipo)
          <option value="{{ $tipo->clave }}"
            @if(old('bien.3.tipoBienEnajenado') == $tipo->clave)
            selected
            @endif
          >
            {{ $tipo->valor }}
          </option>
          @endforeach
        </select>
        @error('bien.3.tipoBienEnajenado')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
      <div class="col-md-4 mb-3">
        <label for="bien_remuneracion_3">Remuneración: </label>
        <div class="input-group input-default">
          <div class="input-group-prepend">
            <span class="input-group-text">$</span>
          </div>
          <input id="bien_remuneracion_3" type="text" tabindex="{{ ++$tabindex }}" class="number-separator form-control @error('bien.3.remuneracion') is-invalid @enderror" name="bien[3][remuneracion]" @if(old('bien.3.remuneracion')) value="{{ old('bien.3.remuneracion') }}" @endif maxlength="20" style="text-align:right">
          <div class="input-group-append">
            <span class="input-group-text">.00</span>
          </div>
          @error('bien.3.remuneracion')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
      </div>
    </div>

    <div class="row" id="bienes_4" @if(old('bien.4.tipoBienEnajenado') or old('bien.4.remuneracion')) @else style="display:none;" @endif>
      <div class="col-md-8 mb-3">
        <label for="tipoBienEnajenado_4">II.4.e) Tipo de bien enajenado: </label>
        <select id="tipoBienEnajenado_4" class="form-control @error('bien.4.tipoBienEnajenado') is-invalid @enderror" tabindex="{{ ++$tabindex }}" name="bien[4][tipoBienEnajenado]" >
          <option value="">Seleccione...</option>
          @foreach($declaracion->catalogo->tipoBienEnajenado() as $tipo)
          <option value="{{ $tipo->clave }}"
            @if(old('bien.4.tipoBienEnajenado') == $tipo->clave)
            selected
            @endif
          >
            {{ $tipo->valor }}
          </option>
          @endforeach
        </select>
        @error('bien.4.tipoBienEnajenado')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
      <div class="col-md-4 mb-3">
        <label for="bien_remuneracion_4">Remuneración: </label>
        <div class="input-group input-default">
          <div class="input-group-prepend">
            <span class="input-group-text">$</span>
          </div>
          <input id="bien_remuneracion_4" type="text" tabindex="{{ ++$tabindex }}" class="number-separator form-control @error('bien.4.remuneracion') is-invalid @enderror" name="bien[4][remuneracion]" @if(old('bien.4.remuneracion')) value="{{ old('bien.4.remuneracion') }}" @endif maxlength="20" style="text-align:right">
          <div class="input-group-append">
            <span class="input-group-text">.00</span>
          </div>
          @error('bien.4.remuneracion')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
      </div>
    </div>

    <div class="row" id="bienes_5" @if(old('bien.5.tipoBienEnajenado') or old('bien.5.remuneracion')) @else style="display:none;" @endif>
      <div class="col-md-8 mb-3">
        <label for="tipoBienEnajenado_5">II.4.f) Tipo de bien enajenado: </label>
        <select id="tipoBienEnajenado_5" class="form-control @error('bien.5.tipoBienEnajenado') is-invalid @enderror" tabindex="{{ ++$tabindex }}" name="bien[5][tipoBienEnajenado]" >
          <option value="">Seleccione...</option>
          @foreach($declaracion->catalogo->tipoBienEnajenado() as $tipo)
          <option value="{{ $tipo->clave }}"
            @if(old('bien.5.tipoBienEnajenado') == $tipo->clave)
            selected
            @endif
          >
            {{ $tipo->valor }}
          </option>
          @endforeach
        </select>
        @error('bien.5.tipoBienEnajenado')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
      <div class="col-md-4 mb-3">
        <label for="bien_remuneracion_5">Remuneración: </label>
        <div class="input-group input-default">
          <div class="input-group-prepend">
            <span class="input-group-text">$</span>
          </div>
          <input id="bien_remuneracion_5" type="text" tabindex="{{ ++$tabindex }}" class="number-separator form-control @error('bien.5.remuneracion') is-invalid @enderror" name="bien[5][remuneracion]" @if(old('bien.5.remuneracion')) value="{{ old('bien.5.remuneracion') }}" @endif maxlength="20" style="text-align:right">
          <div class="input-group-append">
            <span class="input-group-text">.00</span>
          </div>
          @error('bien.5.remuneracion')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
      </div>
    </div>

    <div class="row" id="bienes_6" @if(old('bien.6.tipoBienEnajenado') or old('bien.6.remuneracion')) @else style="display:none;" @endif>
      <div class="col-md-8 mb-3">
        <label for="tipoBienEnajenado_6">II.4.g) Tipo de bien enajenado: </label>
        <select id="tipoBienEnajenado_6" class="form-control @error('bien.6.tipoBienEnajenado') is-invalid @enderror" tabindex="{{ ++$tabindex }}" name="bien[6][tipoBienEnajenado]" >
          <option value="">Seleccione...</option>
          @foreach($declaracion->catalogo->tipoBienEnajenado() as $tipo)
          <option value="{{ $tipo->clave }}"
            @if(old('bien.6.tipoBienEnajenado') == $tipo->clave)
            selected
            @endif
          >
            {{ $tipo->valor }}
          </option>
          @endforeach
        </select>
        @error('bien.6.tipoBienEnajenado')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
      <div class="col-md-4 mb-3">
        <label for="bien_remuneracion_6">Remuneración: </label>
        <div class="input-group input-default">
          <div class="input-group-prepend">
            <span class="input-group-text">$</span>
          </div>
          <input id="bien_remuneracion_6" type="text" tabindex="{{ ++$tabindex }}" class="number-separator form-control @error('bien.6.remuneracion') is-invalid @enderror" name="bien[6][remuneracion]" @if(old('bien.6.remuneracion')) value="{{ old('bien.6.remuneracion') }}" @endif maxlength="20" style="text-align:right">
          <div class="input-group-append">
            <span class="input-group-text">.00</span>
          </div>
          @error('bien.6.remuneracion')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
      </div>
    </div>

    <div class="row" id="bienes_7" @if(old('bien.7.tipoBienEnajenado') or old('bien.7.remuneracion')) @else style="display:none;" @endif>
      <div class="col-md-8 mb-3">
        <label for="tipoBienEnajenado_7">II.4.h) Tipo de bien enajenado: </label>
        <select id="tipoBienEnajenado_7" class="form-control @error('bien.7.tipoBienEnajenado') is-invalid @enderror" tabindex="{{ ++$tabindex }}" name="bien[7][tipoBienEnajenado]" >
          <option value="">Seleccione...</option>
          @foreach($declaracion->catalogo->tipoBienEnajenado() as $tipo)
          <option value="{{ $tipo->clave }}"
            @if(old('bien.7.tipoBienEnajenado') == $tipo->clave)
            selected
            @endif
          >
            {{ $tipo->valor }}
          </option>
          @endforeach
        </select>
        @error('bien.7.tipoBienEnajenado')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
      <div class="col-md-4 mb-3">
        <label for="bien_remuneracion_7">Remuneración: </label>
        <div class="input-group input-default">
          <div class="input-group-prepend">
            <span class="input-group-text">$</span>
          </div>
          <input id="bien_remuneracion_7" type="text" tabindex="{{ ++$tabindex }}" class="number-separator form-control @error('bien.7.remuneracion') is-invalid @enderror" name="bien[7][remuneracion]" @if(old('bien.7.remuneracion')) value="{{ old('bien.7.remuneracion') }}" @endif maxlength="20" style="text-align:right">
          <div class="input-group-append">
            <span class="input-group-text">.00</span>
          </div>
          @error('bien.7.remuneracion')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
      </div>
    </div>

    <div class="row" id="bienes_8" @if(old('bien.8.tipoBienEnajenado') or old('bien.8.remuneracion')) @else style="display:none;" @endif>
      <div class="col-md-8 mb-3">
        <label for="tipoBienEnajenado_8">II.4.i) Tipo de bien enajenado: </label>
        <select id="tipoBienEnajenado_8" class="form-control @error('bien.8.tipoBienEnajenado') is-invalid @enderror" tabindex="{{ ++$tabindex }}" name="bien[8][tipoBienEnajenado]" >
          <option value="">Seleccione...</option>
          @foreach($declaracion->catalogo->tipoBienEnajenado() as $tipo)
          <option value="{{ $tipo->clave }}"
            @if(old('bien.8.tipoBienEnajenado') == $tipo->clave)
            selected
            @endif
          >
            {{ $tipo->valor }}
          </option>
          @endforeach
        </select>
        @error('bien.8.tipoBienEnajenado')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
      <div class="col-md-4 mb-3">
        <label for="bien_remuneracion_8">Remuneración: </label>
        <div class="input-group input-default">
          <div class="input-group-prepend">
            <span class="input-group-text">$</span>
          </div>
          <input id="bien_remuneracion_8" type="text" tabindex="{{ ++$tabindex }}" class="number-separator form-control @error('bien.8.remuneracion') is-invalid @enderror" name="bien[8][remuneracion]" @if(old('bien.8.remuneracion')) value="{{ old('bien.8.remuneracion') }}" @endif maxlength="20" style="text-align:right">
          <div class="input-group-append">
            <span class="input-group-text">.00</span>
          </div>
          @error('bien.8.remuneracion')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
      </div>
    </div>

    <div class="row" id="bienes_9" @if(old('bien.9.tipoBienEnajenado') or old('bien.9.remuneracion')) @else style="display:none;" @endif>
      <div class="col-md-8 mb-3">
        <label for="tipoBienEnajenado_9">II.4.j) Tipo de bien enajenado: </label>
        <select id="tipoBienEnajenado_9" class="form-control @error('bien.9.tipoBienEnajenado') is-invalid @enderror" tabindex="{{ ++$tabindex }}" name="bien[9][tipoBienEnajenado]" >
          <option value="">Seleccione...</option>
          @foreach($declaracion->catalogo->tipoBienEnajenado() as $tipo)
          <option value="{{ $tipo->clave }}"
            @if(old('bien.9.tipoBienEnajenado') == $tipo->clave)
            selected
            @endif
          >
            {{ $tipo->valor }}
          </option>
          @endforeach
        </select>
        @error('bien.9.tipoBienEnajenado')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
      <div class="col-md-4 mb-3">
        <label for="bien_remuneracion_9">Remuneración: </label>
        <div class="input-group input-default">
          <div class="input-group-prepend">
            <span class="input-group-text">$</span>
          </div>
          <input id="bien_remuneracion_9" type="text" tabindex="{{ ++$tabindex }}" class="number-separator form-control @error('bien.9.remuneracion') is-invalid @enderror" name="bien[9][remuneracion]" @if(old('bien.9.remuneracion')) value="{{ old('bien.9.remuneracion') }}" @endif maxlength="20" style="text-align:right">
          <div class="input-group-append">
            <span class="input-group-text">.00</span>
          </div>
          @error('bien.9.remuneracion')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-4 mb-3" id="div_add4">
        <button id="add4" tabindex="{{ ++$tabindex }}" class="btn btn-primary btn-sm btn-block" type="button">Agregar bien</button>
      </div>
      <div class="col-md-4 mb-3" id="div_del4" style="display:none;">
        <button id="del4" tabindex="{{ ++$tabindex }}" class="btn btn-primary btn-sm btn-block" type="button">Eliminar bien</button>
      </div>
    </div>

    <p>&nbsp;</p>
    @endif

    <div class="form-group row">
      <label for="otrosIngresos_remuneracionTotal_valor" class="col-sm-8 col-form-label">
      II.5 Otros ingresos no considerados anteriormente 🌐 <code>*</code>
      </label>
      <div class="col-sm-4">
        <div class="input-group input-default">
          <div class="input-group-prepend">
            <span class="input-group-text">$</span>
          </div>
          <input type="text" class="number-separator form-control @error('otrosIngresos_remuneracionTotal_valor') is-invalid @enderror" id="otrosIngresos_remuneracionTotal_valor" name="otrosIngresos_remuneracionTotal_valor" maxlength="20" style="text-align:right" readonly>
          <div class="input-group-append">
            <span class="input-group-text">.00</span>
          </div>
        </div>
        <code>No llenar, se suma automáticamente.</code>
      </div>
    </div>

    <div class="row" id="ingresos_0" @if(old('ingreso.0.tipoIngreso') or old('ingreso.0.remuneracion')) @else style="display:none;" @endif>
      <div class="col-md-8 mb-3">
        <label for="tipoIngreso_0">II.5.a) Tipo de ingreso: </label>
        <input id="tipoIngreso_0" type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('ingreso.0.tipoIngreso') is-invalid @enderror" name="ingreso[0][tipoIngreso]" @if(old('ingreso.0.tipoIngreso')) value="{{ old('ingreso.0.tipoIngreso') }}" @endif maxlength="65">
        @error('ingreso.0.tipoIngreso')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
      <div class="col-md-4 mb-3">
        <label for="ingreso_remuneracion_0">Remuneración: </label>
        <div class="input-group input-default">
          <div class="input-group-prepend">
            <span class="input-group-text">$</span>
          </div>
          <input id="ingreso_remuneracion_0" type="text" tabindex="{{ ++$tabindex }}" class="number-separator form-control @error('ingreso.0.remuneracion') is-invalid @enderror" name="ingreso[0][remuneracion]" @if(old('ingreso.0.remuneracion')) value="{{ old('ingreso.0.remuneracion') }}" @endif  maxlength="20" style="text-align:right">
          <div class="input-group-append">
            <span class="input-group-text">.00</span>
          </div>
          @error('ingreso.0.remuneracion')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
      </div>
    </div>

    <div class="row" id="ingresos_1" @if(old('ingreso.1.tipoIngreso') or old('ingreso.1.remuneracion')) @else style="display:none;" @endif>
      <div class="col-md-8 mb-3">
        <label for="tipoIngreso_1">II.5.b) Tipo de ingreso: </label>
        <input id="tipoIngreso_1" type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('ingreso.1.tipoIngreso') is-invalid @enderror" name="ingreso[1][tipoIngreso]" @if(old('ingreso.1.tipoIngreso')) value="{{ old('ingreso.1.tipoIngreso') }}" @endif maxlength="65">
        @error('ingreso.1.tipoIngreso')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
      <div class="col-md-4 mb-3">
        <label for="ingreso_remuneracion_1">Remuneración: </label>
        <div class="input-group input-default">
          <div class="input-group-prepend">
            <span class="input-group-text">$</span>
          </div>
          <input id="ingreso_remuneracion_1" type="text" tabindex="{{ ++$tabindex }}" class="number-separator form-control @error('ingreso.1.remuneracion') is-invalid @enderror" name="ingreso[1][remuneracion]" @if(old('ingreso.1.remuneracion')) value="{{ old('ingreso.1.remuneracion') }}" @endif maxlength="20" style="text-align:right">
          <div class="input-group-append">
            <span class="input-group-text">.00</span>
          </div>
          @error('ingreso.1.remuneracion')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
      </div>
    </div>

    <div class="row" id="ingresos_2" @if(old('ingreso.2.tipoIngreso') or old('ingreso.2.remuneracion')) @else style="display:none;" @endif>
      <div class="col-md-8 mb-3">
        <label for="tipoIngreso_2">II.5.c) Tipo de ingreso: </label>
        <input id="tipoIngreso_2" type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('ingreso.2.tipoIngreso') is-invalid @enderror" name="ingreso[2][tipoIngreso]" @if(old('ingreso.2.tipoIngreso')) value="{{ old('ingreso.2.tipoIngreso') }}" @endif maxlength="65">
        @error('ingreso.2.tipoIngreso')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
      <div class="col-md-4 mb-3">
        <label for="ingreso_remuneracion_2">Remuneración: </label>
        <div class="input-group input-default">
          <div class="input-group-prepend">
            <span class="input-group-text">$</span>
          </div>
          <input id="ingreso_remuneracion_2" type="text" tabindex="{{ ++$tabindex }}" class="number-separator form-control @error('ingreso.2.remuneracion') is-invalid @enderror" name="ingreso[2][remuneracion]" @if(old('ingreso.2.remuneracion')) value="{{ old('ingreso.2.remuneracion') }}" @endif maxlength="20" style="text-align:right">
          <div class="input-group-append">
            <span class="input-group-text">.00</span>
          </div>
          @error('ingreso.2.remuneracion')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
      </div>
    </div>

    <div class="row" id="ingresos_3" @if(old('ingreso.3.tipoIngreso') or old('ingreso.3.remuneracion')) @else style="display:none;" @endif>
      <div class="col-md-8 mb-3">
        <label for="tipoIngreso_3">II.5.d) Tipo de ingreso: </label>
        <input id="tipoIngreso_3" type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('ingreso.3.tipoIngreso') is-invalid @enderror" name="ingreso[3][tipoIngreso]" @if(old('ingreso.3.tipoIngreso')) value="{{ old('ingreso.3.tipoIngreso') }}" @endif maxlength="65">
        @error('ingreso.3.tipoIngreso')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
      <div class="col-md-4 mb-3">
        <label for="ingreso_remuneracion_3">Remuneración: </label>
        <div class="input-group input-default">
          <div class="input-group-prepend">
            <span class="input-group-text">$</span>
          </div>
          <input id="ingreso_remuneracion_3" type="text" tabindex="{{ ++$tabindex }}" class="number-separator form-control @error('ingreso.3.remuneracion') is-invalid @enderror" name="ingreso[3][remuneracion]" @if(old('ingreso.3.remuneracion')) value="{{ old('ingreso.3.remuneracion') }}" @endif maxlength="20" style="text-align:right">
          <div class="input-group-append">
            <span class="input-group-text">.00</span>
          </div>
          @error('ingreso.3.remuneracion')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
      </div>
    </div>

    <div class="row" id="ingresos_4" @if(old('ingreso.4.tipoIngreso') or old('ingreso.4.remuneracion')) @else style="display:none;" @endif>
      <div class="col-md-8 mb-3">
        <label for="tipoIngreso_4">II.5.e) Tipo de ingreso: </label>
        <input id="tipoIngreso_4" type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('ingreso.4.tipoIngreso') is-invalid @enderror" name="ingreso[4][tipoIngreso]" @if(old('ingreso.4.tipoIngreso')) value="{{ old('ingreso.4.tipoIngreso') }}" @endif maxlength="65">
        @error('ingreso.4.tipoIngreso')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
      <div class="col-md-4 mb-3">
        <label for="ingreso_remuneracion_4">Remuneración: </label>
        <div class="input-group input-default">
          <div class="input-group-prepend">
            <span class="input-group-text">$</span>
          </div>
          <input id="ingreso_remuneracion_4" type="text" tabindex="{{ ++$tabindex }}" class="number-separator form-control @error('ingreso.4.remuneracion') is-invalid @enderror" name="ingreso[4][remuneracion]" @if(old('ingreso.4.remuneracion')) value="{{ old('ingreso.4.remuneracion') }}" @endif maxlength="20" style="text-align:right">
          <div class="input-group-append">
            <span class="input-group-text">.00</span>
          </div>
          @error('ingreso.4.remuneracion')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
      </div>
    </div>

    <div class="row" id="ingresos_5" @if(old('ingreso.5.tipoIngreso') or old('ingreso.5.remuneracion')) @else style="display:none;" @endif>
      <div class="col-md-8 mb-3">
        <label for="tipoIngreso_5">II.5.f) Tipo de ingreso: </label>
        <input id="tipoIngreso_5" type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('ingreso.5.tipoIngreso') is-invalid @enderror" name="ingreso[5][tipoIngreso]" @if(old('ingreso.5.tipoIngreso')) value="{{ old('ingreso.5.tipoIngreso') }}" @endif maxlength="65">
        @error('ingreso.5.tipoIngreso')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
      <div class="col-md-4 mb-3">
        <label for="ingreso_remuneracion_5">Remuneración: </label>
        <div class="input-group input-default">
          <div class="input-group-prepend">
            <span class="input-group-text">$</span>
          </div>
          <input id="ingreso_remuneracion_5" type="text" tabindex="{{ ++$tabindex }}" class="number-separator form-control @error('ingreso.5.remuneracion') is-invalid @enderror" name="ingreso[5][remuneracion]" @if(old('ingreso.5.remuneracion')) value="{{ old('ingreso.5.remuneracion') }}" @endif maxlength="20" style="text-align:right">
          <div class="input-group-append">
            <span class="input-group-text">.00</span>
          </div>
          @error('ingreso.5.remuneracion')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
      </div>
    </div>

    <div class="row" id="ingresos_6" @if(old('ingreso.6.tipoIngreso') or old('ingreso.6.remuneracion')) @else style="display:none;" @endif>
      <div class="col-md-8 mb-3">
        <label for="tipoIngreso_6">II.5.g) Tipo de ingreso: </label>
        <input id="tipoIngreso_6" type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('ingreso.6.tipoIngreso') is-invalid @enderror" name="ingreso[6][tipoIngreso]" @if(old('ingreso.6.tipoIngreso')) value="{{ old('ingreso.6.tipoIngreso') }}" @endif  maxlength="65">
        @error('ingreso.6.tipoIngreso')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
      <div class="col-md-4 mb-3">
        <label for="ingreso_remuneracion_6">Remuneración: </label>
        <div class="input-group input-default">
          <div class="input-group-prepend">
            <span class="input-group-text">$</span>
          </div>
          <input id="ingreso_remuneracion_6" type="text" tabindex="{{ ++$tabindex }}" class="number-separator form-control @error('ingreso.6.remuneracion') is-invalid @enderror" name="ingreso[6][remuneracion]" @if(old('ingreso.6.remuneracion')) value="{{ old('ingreso.6.remuneracion') }}" @endif maxlength="20" style="text-align:right">
          <div class="input-group-append">
            <span class="input-group-text">.00</span>
          </div>
          @error('ingreso.6.remuneracion')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
      </div>
    </div>

    <div class="row" id="ingresos_7" @if(old('ingreso.7.tipoIngreso') or old('ingreso.7.remuneracion')) @else style="display:none;" @endif>
      <div class="col-md-8 mb-3">
        <label for="tipoIngreso_7">II.5.h) Tipo de ingreso: </label>
        <input id="tipoIngreso_7" type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('ingreso.7.tipoIngreso') is-invalid @enderror" name="ingreso[7][tipoIngreso]" @if(old('ingreso.7.tipoIngreso')) value="{{ old('ingreso.7.tipoIngreso') }}" @endif maxlength="65">
        @error('ingreso.7.tipoIngreso')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
      <div class="col-md-4 mb-3">
        <label for="ingreso_remuneracion_7">Remuneración: </label>
        <div class="input-group input-default">
          <div class="input-group-prepend">
            <span class="input-group-text">$</span>
          </div>
          <input id="ingreso_remuneracion_7" type="text" tabindex="{{ ++$tabindex }}" class="number-separator form-control @error('ingreso.7.remuneracion') is-invalid @enderror" name="ingreso[7][remuneracion]" @if(old('ingreso.7.remuneracion')) value="{{ old('ingreso.7.remuneracion') }}" @endif style="text-align:right">
          <div class="input-group-append">
            <span class="input-group-text">.00</span>
          </div>
          @error('ingreso.7.remuneracion')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
      </div>
    </div>

    <div class="row" id="ingresos_8" @if(old('ingreso.8.tipoIngreso') or old('ingreso.8.remuneracion')) @else style="display:none;" @endif>
      <div class="col-md-8 mb-3">
        <label for="tipoIngreso_8">II.5.i) Tipo de ingreso: </label>
        <input id="tipoIngreso_8" type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('ingreso.8.tipoIngreso') is-invalid @enderror" name="ingreso[8][tipoIngreso]" @if(old('ingreso.8.tipoIngreso')) value="{{ old('ingreso.8.tipoIngreso') }}" @endif maxlength="65">
        @error('ingreso.8.tipoIngreso')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
      <div class="col-md-4 mb-3">
        <label for="ingreso_remuneracion_8">Remuneración: </label>
        <div class="input-group input-default">
          <div class="input-group-prepend">
            <span class="input-group-text">$</span>
          </div>
          <input id="ingreso_remuneracion_8" type="text" tabindex="{{ ++$tabindex }}" class="number-separator form-control @error('ingreso.8.remuneracion') is-invalid @enderror" name="ingreso[8][remuneracion]" @if(old('ingreso.8.remuneracion')) value="{{ old('ingreso.8.remuneracion') }}" @endif maxlength="20" style="text-align:right">
          <div class="input-group-append">
            <span class="input-group-text">.00</span>
          </div>
          @error('ingreso.8.remuneracion')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
      </div>
    </div>

    <div class="row" id="ingresos_9" @if(old('ingreso.9.tipoIngreso') or old('ingreso.9.remuneracion')) @else style="display:none;" @endif>
      <div class="col-md-8 mb-3">
        <label for="tipoIngreso_9">II.5.j) Tipo de ingreso: </label>
        <input id="tipoIngreso_9" type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('ingreso.9.tipoIngreso') is-invalid @enderror" name="ingreso[9][tipoIngreso]" @if(old('ingreso.9.tipoIngreso')) value="{{ old('ingreso.9.tipoIngreso') }}" @endif maxlength="65">
        @error('ingreso.9.tipoIngreso')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
      <div class="col-md-4 mb-3">
        <label for="ingreso_remuneracion_9">Remuneración: </label>
        <div class="input-group input-default">
          <div class="input-group-prepend">
            <span class="input-group-text">$</span>
          </div>
          <input id="ingreso_remuneracion_9" type="text" tabindex="{{ ++$tabindex }}" class="number-separator form-control @error('ingreso.9.remuneracion') is-invalid @enderror" name="ingreso[9][remuneracion]" @if(old('ingreso.9.remuneracion')) value="{{ old('ingreso.9.remuneracion') }}" @endif maxlength="20" style="text-align:right">
          <div class="input-group-append">
            <span class="input-group-text">.00</span>
          </div>
          @error('ingreso.9.remuneracion')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-4 mb-3" id="div_add5">
        <button id="add5" tabindex="{{ ++$tabindex }}" class="btn btn-primary btn-sm btn-block" type="button">Agregar ingreso</button>
      </div>
      <div class="col-md-4 mb-3" id="div_del5" style="display:none;">
        <button id="del5" tabindex="{{ ++$tabindex }}" class="btn btn-primary btn-sm btn-block" type="button">Eliminar ingreso</button>
      </div>
    </div>

    <p>&nbsp;</p>

    <div class="form-group row">
      <label for="ingresoNetoAnualDeclarante_valor" class="col-sm-8 col-form-label">
      A. Ingreso neto del declarante (suma del numeral I y II) 🌐 <code>*</code>
      </label>
      <div class="col-sm-4">
        <div class="input-group input-default">
          <div class="input-group-prepend">
            <span class="input-group-text">$</span>
          </div>
          <input type="text" class="number-separator form-control @error('ingresoNetoAnualDeclarante_valor') is-invalid @enderror" id="ingresoNetoAnualDeclarante_valor" maxlength="20" style="text-align:right" readonly>
          <div class="input-group-append">
            <span class="input-group-text">.00</span>
          </div>
        </div>
        <code>No llenar, se suma automáticamente.</code>
      </div>
    </div>

    <p>&nbsp;</p>

    <div class="form-group row">
      <label for="ingresoNetoAnualParejaDependiente_valor" class="col-sm-8 col-form-label">
      B. Ingreso neto de la pareja y/o dependientes económicos 🌐 <code>*</code>
      </label>
      <div class="col-sm-4">
        <div class="input-group input-default">
          <div class="input-group-prepend">
            <span class="input-group-text">$</span>
          </div>
          <input type="text" tabindex="{{ ++$tabindex }}" class="number-separator form-control @error('ingresoNetoAnualParejaDependiente_valor') is-invalid @enderror" id="ingresoNetoAnualParejaDependiente_valor" name="ingresoNetoAnualParejaDependiente_valor" required
          @if(old('ingresoNetoAnualParejaDependiente_valor'))
            value="{{ old('ingresoNetoAnualParejaDependiente_valor') }}"
          @else
            @isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['ingresoMensualNetoParejaDependiente'])
              value="@money($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['ingresoMensualNetoParejaDependiente']['valor'])"
            @endisset
            @isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['ingresoAnualNetoParejaDependiente'])
              value="@money($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['ingresoAnualNetoParejaDependiente']['valor'])"
            @endisset
            @isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['ingresoConclusionNetoParejaDependiente'])
              value="@money($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['ingresoConclusionNetoParejaDependiente']['valor'])"
            @endisset
            @isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['ingresoNetoAnualParejaDependiente'])
              value="@money($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['ingresoNetoAnualParejaDependiente']['valor'])"
            @endisset
          @endif
            maxlength="20" style="text-align:right">
          <div class="input-group-append">
            <span class="input-group-text">.00</span>
          </div>
          @error('ingresoNetoAnualParejaDependiente_valor')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
      </div>
    </div>

    <p>&nbsp;</p>

    <div class="form-group row">
      <label for="totalIngresosNetosAnuales_valor" class="col-sm-8 col-form-label">
      Total de ingresos netos percibidos por el declarante, pareja y / o dependientes económicos 🌐 <code>*</code>
      </label>
      <div class="col-sm-4">
        <div class="input-group input-default">
          <div class="input-group-prepend">
            <span class="input-group-text">$</span>
          </div>
          <input type="text" tabindex="{{ ++$tabindex }}" class="number-separator form-control @error('totalIngresosNetosAnuales_valor') is-invalid @enderror" id="totalIngresosNetosAnuales_valor" name="totalIngresosNetosAnuales_valor" maxlength="20" style="text-align:right" readonly>
          <div class="input-group-append">
            <span class="input-group-text">.00</span>
          </div>
          @error('totalIngresosNetosAnuales_valor')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        <code>No llenar, se suma automáticamente.</code>
      </div>
    </div>

</fieldset>
