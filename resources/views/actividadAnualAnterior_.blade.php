@extends('layouts.formulario')

@section('formulario')

  <label for="ninguno" class="col-sm-12 col-form-label">
    <input type="hidden" name="servidorPublicoAnioAnterior" value="0">
    <input type="checkbox" tabindex="{{ ++$tabindex }}" value="1" class="form-control @error('ninguno') is-invalid @enderror" name="servidorPublicoAnioAnterior" id="ninguno" @if(old('ninguno') == true) checked  @else @if($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['servidorPublicoAnioAnterior'] == 1) checked @endif @endif>
    NINGUNO
    @error('ninguno')
    <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
    </span>
    @enderror
  </label>

  <p>&nbsp;</p>

  <fieldset class="form">
    <legend>
      <h4 class="mb-3">
        Ingresos del año anterior:
      </h4>
    </legend>

    <div class="row">
      <div class="col-md-5 mb-3">
        <label for="fechaIngreso">Fecha de ingreso: <code>*</code></label>
        <input type="date" tabindex="{{ ++$tabindex }}" class="form-control @error('fechaIngreso') is-invalid @enderror" id="fechaIngreso" name="fechaIngreso"
        @if(old('fechaIngreso'))
          value="{{ old('fechaIngreso') }}"
        @else
          @isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['fechaIngreso'])
            value="{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['fechaIngreso'] }}"
          @endisset
        @endif
          min="1950-01-01" max="{{ date('Y-m-d')}}" required>
        @error('fechaIngreso')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>

      <div class="col-md-5 mb-3">
        <label for="fechaEgreso">Fecha de conclusión: <code>*</code></label>
        <input type="date" tabindex="{{ ++$tabindex }}" class="form-control @error('fechaEgreso') is-invalid @enderror" id="fechaEgreso" name="fechaEgreso"
        @if(old('fechaEgreso'))
          value="{{ old('fechaEgreso') }}"
        @else
          @isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['fechaConclusion'])
            value="{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['fechaConclusion'] }}"
          @endisset
        @endif
        min="1950-01-01" max="{{ date('Y-m-d')}}" required>
        @error('fechaEgreso')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
    </div>

    <p>&nbsp;</p>
  </fieldset>

  @include('layouts.ingresos_html')
@endsection



@section('script')

  $("#ninguno").ready(form);
  $("#ninguno").change(form);

  function form()
  {
    if($("#ninguno").is(':checked'))
    {
      $('.form').hide();
      $('#fechaIngreso').removeAttr("required");
      $('#fechaEgreso').removeAttr("required");
      $('#remuneracionNetaCargoPublico').removeAttr("required");
      $('#ingresoNetoAnualParejaDependiente_valor').removeAttr("required");
    }
    else
    {
      $('.form').show();
      $('#fechaIngreso').focus();
      $('#fechaIngreso').attr("required","required");
      $('#fechaEgreso').attr("required","required");
      $('#remuneracionNetaCargoPublico').attr("required","required");
      $('#ingresoNetoAnualParejaDependiente_valor').attr("required","required");

      @include('layouts.ingresos_js')
    }
  }

@endsection
