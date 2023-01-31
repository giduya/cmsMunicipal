<div class="col-md-4 mb-3 sector">
  <label for="sector">Sector: 🌐 <code>*</code></label>
  <select class="form-control @error('sectorClave') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="sector" name="sectorClave" required>
    <option value="">Seleccione...</option>
    @foreach($declaracion->catalogo->sector() as $tipo)
    <option value="{{ $tipo->clave }}"
      @if(old('sectorClave'))
        @if($tipo->clave == old('sectorClave'))
          selected
        @endif
      @elseif(isset(Route::current()->parameters()['array']))
        @isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['sector']['clave'])
          @if($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['sector']['clave'] == $tipo->clave)
            selected
          @endif
        @endisset
      @endif
    >
      {{ $tipo->valor }}
    </option>
    @endforeach
  </select>
  @error('sectorClave')
  <span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong>
  </span>
  @enderror
</div>
