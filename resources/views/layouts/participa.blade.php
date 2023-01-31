<div class="col-md-4 mb-3">
  <label for="tipoRelacion">¿Quién participa?: 🌐 <code>*</code></label>
  <select class="form-control @error('tipoRelacion') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="tipoRelacion" name="tipoRelacion" required autofocus>
    <option value="">Seleccione...</option>
    @foreach($declaracion->catalogo->tipoRelacion() as $relacion)
    <option value="{{ $relacion->clave }}"
      @if(old('tipoRelacion'))
        @if($relacion->clave == old('tipoRelacion'))
          selected
        @endif
      @elseif(isset(Route::current()->parameters()['array']))
        @if($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['tipoRelacion'] == $relacion->clave)
          selected
        @endif
      @endif
    >
    {{ $relacion->valor }}
    </option>
    @endforeach
  </select>
  @error('tipoRelacion')
  <span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong>
  </span>
  @enderror
</div>
