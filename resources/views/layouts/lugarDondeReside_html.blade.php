<div class="row">
  <label for="lugarDondeReside" class="col-sm-12 col-form-label">
    <input type="checkbox" tabindex="{{ ++$tabindex }}" name="lugarDondeReside" value="SE_DESCONOCE" class="form-control @error('lugarDondeReside') is-invalid @enderror" id="lugarDondeReside"
    @if(old('nombre'))
      @if(old('lugarDondeReside') == "SE_DESCONOCE")
        checked
      @else
      @endif
    @else
      @isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['lugarDondeReside'])
        @if($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['lugarDondeReside'] == "SE_DESCONOCE")
          checked
        @endif
      @endisset

      @isset(Route::current()->parameters()['subformatoSlug'])
        @isset(Route::current()->parameters()['array'])
          @if($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['lugarDondeReside'] == "SE_DESCONOCE")
            checked
          @endif
        @endisset
      @endisset
    @endif
    >
    Se desconoce
    @error('lugarDondeReside')
    <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
    </span>
    @enderror
  </label>
  <p>&nbsp;</p>
</div>
