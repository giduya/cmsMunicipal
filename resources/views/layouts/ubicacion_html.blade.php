<div class="col-md-4 mb-3">
  <label for="extranjero">Ubicación: 🌐 <code>*</code></label>
  <select class="form-control @error('ubicacion') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="extranjero" name="ubicacion" required>
    <option value="">Seleccione...</option>
    @foreach($declaracion->catalogo->extranjero() as $localizacion)
    <option value="{{ $localizacion->clave }}"
      @if(old('ubicacion'))
        @if($localizacion->clave == old('ubicacion'))
          selected
        @endif
      @elseif(isset(Route::current()->parameters()['array']))
        @if($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['extranjero'] == $localizacion->clave)
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
