<div class="col-md-4 mb-3">
  <label for="formaRecepcion">Recepción: 🌐 <code>*</code></label>
  <select class="form-control @error('formaRecepcion') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="formaRecepcion" name="formaRecepcion" required>
    <option value="">Seleccione...</option>
    @foreach($declaracion->catalogo->formaRecepcion() as $forma)
    <option value="{{ $forma->valor }}"
      @if(old('formaRecepcion'))
        @if($forma->valor == old('formaRecepcion'))
          selected
        @endif
      @elseif(isset(Route::current()->parameters()['array']))
        @if($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['formaRecepcion'] == $forma->clave)
          selected
        @endif
      @endif
    >
      {{ $forma->valor }}
    </option>
    @endforeach
  </select>
  @error('formaRecepcion')
  <span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong>
  </span>
  @enderror
</div>

<div class="col-md-4 mb-3" id="div_especifiqueBeneficio">
  <label for="especifiqueEspecie">Especifica la especie: 🌐 <code>*</code></label>
  <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('especifiqueEspecie') is-invalid @enderror" id="especifiqueEspecie" name="especifiqueEspecie"
  @if(old('especifiqueEspecie'))
    value="{{ old('especifiqueEspecie') }}"
  @endif
  maxlength="65">
  @error('especifiqueEspecie')
  <span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong>
  </span>
  @enderror
</div>

<div class="col-md-4 mb-3 div_monto">
  <label for="montoValor">Monto mensual: 🌐 <code>*</code></label>
  <div class="input-group input-default">
    <div class="input-group-prepend">
      <span class="input-group-text">$</span>
    </div>
    <input type="text" tabindex="{{ ++$tabindex }}" class="number-separator form-control @error('montoValor') is-invalid @enderror" id="montoValor" name="montoValor"
    @if(old('montoValor'))
      value="{{ old('montoValor') }}"
    @endif
    maxlength="20" style="text-align:right">
    <div class="input-group-append">
      <span class="input-group-text">.00</span>
    </div>
    @error('montoValor')
    <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
    </span>
    @enderror
  </div>
  <small>Aproximado sin decimales</small>
</div>

<div class="col-md-4 mb-3 div_monto">
  <label for="montoMoneda">Moneda: 🌐 <code>*</code></label>
  <select class="form-control @error('montoMoneda') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="montoMoneda" name="montoMoneda" required>
    <option value="">Seleccione...</option>
    @foreach($declaracion->catalogo->monedas() as $fila)
    <option value="{{ $fila->code }}">
      {{ $fila->code }}
    </option>
    @endforeach
  </select>
  @error('montoMoneda')
  <span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong>
  </span>
  @enderror
</div>
