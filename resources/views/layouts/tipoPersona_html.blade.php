<div class="row">
  <div class="col-md-4 mb-3" id="div_tipoPersona">
    <label for="tipoPersona">
      Persona: 🌐 <code>*</code>
    </label>
    <select class="form-control @error('tipoPersona') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="tipoPersona" name="tipoPersona">
      <option value="">Seleccione...</option>
      @foreach($declaracion->catalogo->tipoPersona() as $tipo)
      <option value="{{ $tipo->clave }}"
        @if(old('tipoPersona'))
          @if($tipo->clave == old('tipoPersona'))
            selected
          @endif
        @endif
      >
        {{ $tipo->valor }}
      </option>
      @endforeach
    </select>
    @error('tipoPersona')
    <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
    </span>
    @enderror
  </div>

  <div class="col-md-5 mb-3">
    <label for="nombreRazonSocial">
      Nombre o razón social: 🌐 <code>*</code>
    </label>
    <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('nombreRazonSocial') is-invalid @enderror @error('nombreInstitucion') is-invalid @enderror" id="nombreRazonSocial" name="nombreRazonSocial"
    @if(old('nombreRazonSocial'))
      value="{{ old('nombreRazonSocial') }}"
    @endif
    maxlength="65">
    @error('nombreRazonSocial')
    <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
    </span>
    @enderror
    @error('nombreInstitucion')
    <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
    </span>
    @enderror
  </div>

  <div class="col-md-3 mb-3" id="div_rfc">
    <label for="rfc">
      RFC: 🌐
    </label>
    <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('rfcHomo') is-invalid @enderror" id="rfc" name="rfcHomo"
    @if(old('rfcHomo'))
      value="{{ old('rfcHomo') }}"
    @endif
    >
    @error('rfcHomo')
    <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
    </span>
    @enderror
  </div>
</div>
