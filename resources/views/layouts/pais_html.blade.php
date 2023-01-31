<div class="col-md-4 mb-3" id="div_pais">
  <label for="pais">País: 🌐 <code>*</code></label>
  <select class="form-control @error('pais') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="pais" name="pais" required>
    <option value="">Seleccione...</option>
    @foreach($declaracion->catalogo->paises() as $pais)
    <option value="{{ $pais->ISO2 }}">
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

<div class="col-md-4 mb-3" id="div_entidadFederativa">
  <label for="entidadFederativa">Estado: 🌐 <code>*</code></label>
  <select class="form-control @error('entidadFederativa') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="entidadFederativa" name="entidadFederativa">
    <option value="">Seleccione una entidad:</option>
    @foreach($declaracion->catalogo->inegiEntidades() as $tipo)
    <option value="{{ $tipo->Cve_Ent }}">
      {{ $tipo->Nom_Ent }}
    </option>
    @endforeach
  </select>
  @error('entidadFederativa')
  <span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong>
  </span>
  @enderror
</div>
