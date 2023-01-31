<div class="row">
  <div class="col-md-4 mb-3">
    <label for="recibeRemuneracion">¿Recibe paga? 🌐 <code>*</code></label>
    <select class="form-control @error('recibeRemuneracion') is-invalid @enderror" tabindex="9" id="recibeRemuneracion" name="recibeRemuneracion" required>
      <option value="">Seleccione...</option>
      @foreach($declaracion->catalogo->boolean() as $fila)
      <option value="{{ $fila->clave }}"
        @if(old('recibeRemuneracion') != null)
          @if($fila->clave == old('recibeRemuneracion')) selected @endif
        @elseif(isset(Route::current()->parameters()['array']))
          @if($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['recibeRemuneracion'] === boolval($fila->clave))
            selected
          @endif
        @endif
      >
        {{ $fila->valor }}
      </option>
      @endforeach
    </select>
    @error('recibeRemuneracion')
    <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
    </span>
    @enderror
  </div>

  <div class="col-md-4 mb-3" id="div_montoValor">
    <label for="montoValor">Monto mensual: 🌐 <code>*</code></label>
    <div class="input-group input-default">
      <div class="input-group-prepend">
        <span class="input-group-text">$</span>
      </div>
      <input type="text" tabindex="10" class="number-separator form-control @error('montoValor') is-invalid @enderror" id="montoValor" name="montoValor"
      @if(old('montoValor'))
        value="{{ old('montoValor') }}"
      @elseif(isset(Route::current()->parameters()['array']))
        @isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['montoMensual'])
          value="@money($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['montoMensual']['valor'])"
        @endisset
      @endif
      required maxlength="20" style="text-align:right">
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

  <div class="col-md-4 mb-3" id="div_montoMoneda">
    <label for="montoMoneda">Moneda: 🌐 <code>*</code></label>
    <select class="form-control @error('montoMoneda') is-invalid @enderror" tabindex="11" id="montoMoneda" name="montoMoneda" required>
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
</div>
