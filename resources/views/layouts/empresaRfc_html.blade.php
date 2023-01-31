<div class="col-md-5 mb-3">
  <label for="nombreInstitucion">Empresa o asociación: 🌐 <code>*</code></label>
  <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('nombreInstitucion') is-invalid @enderror" id="nombreInstitucion" name="nombreInstitucion"
  @if(old('nombreInstitucion'))
    value="{{ old('nombreInstitucion') }}"
  @endif
  maxlength="65" required>
  @error('nombreInstitucion')
  <span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong>
  </span>
  @enderror
</div>

<div class="col-md-3 mb-3">
  <label for="rfc">RFC: 🌐</label>
  <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('rfcMoralHomo') is-invalid @enderror" id="rfc" name="rfcMoralHomo"
  @if(old('rfcMoralHomo'))
    value="{{ old('rfcMoralHomo') }}"
  @elseif(isset(Route::current()->parameters()['array']))
    @isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['rfc'])
    value="{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['rfc'] }}"
    @endisset
  @endif
  maxlength="12" minlength="12">
  @error('rfcMoralHomo')
  <span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong>
  </span>
  @enderror
</div>
