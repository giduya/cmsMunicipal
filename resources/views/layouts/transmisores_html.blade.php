<fieldset>
  <legend>
    <h4 class="mb-3">Datos del transmisor:</h4>
  </legend>

  <div class="row">
    <div class="col-md-4 mb-3">
      <label for="transmisor_tipoPersona_0">Persona: 🌐 <code>*</code></label>
      <select class="form-control @error('transmisor.0.tipoPersona') is-invalid @enderror" tabindex="45" id="transmisor_tipoPersona_0" name="transmisor[0][tipoPersona]" required>
        <option value="">Seleccione...</option>
        @foreach($declaracion->catalogo->tipopersona() as $persona)
        <option value="{{ $persona->clave }}"
          @if(old('transmisor.0.tipoPersona'))
            @if($persona->clave == old('transmisor.0.tipoPersona'))
              selected
            @endif
          @elseif(isset(Route::current()->parameters()['array']))
            @if(isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['transmisor']['0']['tipoPersona']))
              @if($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['transmisor']['0']['tipoPersona'] == $persona->clave)
                selected
              @endif
            @endif
          @endif
        >
          {{ $persona->valor }}
        </option>
        @endforeach
      </select>
      @error('transmisor.0.tipoPersona')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>

    <div class="col-md-5 mb-3">
      <label for="transmisor_nombreRazonSocial_0"> Nombre: <code>*</code></label>
      <input type="text" tabindex="46" class="form-control @error('transmisor.0.nombreRazonSocial') is-invalid @enderror" id="transmisor_nombreRazonSocial_0" name="transmisor[0][nombreRazonSocial]"
      @if(old('transmisor.0.nombreRazonSocial'))
        value="{{ old('transmisor.0.nombreRazonSocial') }}"
      @elseif(isset(Route::current()->parameters()['array']))
        @if(isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['transmisor']['0']['nombreRazonSocial']))
          value="{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['transmisor']['0']['nombreRazonSocial'] }}"
        @endif
      @endif
      maxlength="65" required>
      @error('transmisor.0.nombreRazonSocial')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>

    <div class="col-md-3 mb-3">
      <label for="transmisor_rfc_0"> RFC:</label>
      <input type="text" tabindex="47" class="form-control @error('transmisor.0.rfc') is-invalid @enderror" id="transmisor_rfc_0" name="transmisor[0][rfc]"
      @if(old('transmisor.0.rfc'))
        value="{{ old('transmisor.0.rfc') }}"
      @elseif(isset(Route::current()->parameters()['array']))
        @if(isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['transmisor']['0']['rfc']))
          value="{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['transmisor']['0']['rfc'] }}"
        @endif
      @endif
      >
      @error('transmisor.0.rfc')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>

    <div class="col-md-4 mb-3">
      <label for="transmisor_relacion_0">Relación con transmisor: <code>*</code></label>
      <select class="form-control @error('transmisor.0.relacion') is-invalid @enderror" tabindex="48" id="transmisor_relacion_0" name="transmisor[0][relacion]" required>
        <option value="">Seleccione...</option>
        @foreach($declaracion->catalogo->parentescoRelacion() as $persona)
        <option value="{{ $persona->clave }}"
          @if(old('transmisor.0.relacion'))
            @if($persona->clave == old('transmisor.0.relacion'))
              selected
            @endif
          @elseif(isset(Route::current()->parameters()['array']))
            @isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['transmisor']['0']['relacion'])
              @if($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['transmisor']['0']['relacion']['clave'] == $persona->clave)
                selected
              @endif
            @endisset
          @endif
        >
          {{ $persona->valor }}
        </option>
        @endforeach
      </select>
      @error('transmisor.0.relacion')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>

    <br>
  </div>


  <div class="row" @if(isset(Route::current()->parameters()['array']))   @if(isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['transmisor']['1']['tipoPersona']) or old('transmisor.1.tipoPersona') or old('transmisor.1.nombreRazonSocial') or old('transmisor.1.rfc')) @else style="display:none;" @endif    @else   @if(old('transmisor.1.tipoPersona') or old('transmisor.1.nombreRazonSocial') or old('transmisor.1.rfc')) @else style="display:none; margin-top:15px;" @endif    @endif id="transmisor_1">

    <div class="col-md-4 mb-3">
      <label for="transmisor_tipoPersona_1">Persona: 🌐 <code>*</code></label>
      <select class="form-control @error('transmisor.1.tipoPersona') is-invalid @enderror" tabindex="50" id="transmisor_tipoPersona_1" name="transmisor[1][tipoPersona]">
        <option value="">Seleccione...</option>
        @foreach($declaracion->catalogo->tipopersona() as $persona)
        <option value="{{ $persona->clave }}"
          @if(old('transmisor.1.tipoPersona'))
            @if($persona->clave == old('transmisor.1.tipoPersona'))
              selected
            @endif
          @elseif(isset(Route::current()->parameters()['array']))
            @if(isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['transmisor']['1']['tipoPersona']))
              @if($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['transmisor']['1']['tipoPersona'] == $persona->clave)
                selected
              @endif
            @endif
          @endif
        >
          {{ $persona->valor }}
        </option>
        @endforeach
      </select>
      @error('transmisor.1.tipoPersona')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>

    <div class="col-md-5 mb-3">
      <label for="transmisor_nombreRazonSocial_1"> Nombre: <code>*</code></label>
      <input type="text" tabindex="51" class="form-control @error('transmisor.1.nombreRazonSocial') is-invalid @enderror" id="transmisor_nombreRazonSocial_1" name="transmisor[1][nombreRazonSocial]"
      @if(old('transmisor.1.nombreRazonSocial'))
        value="{{ old('transmisor.1.nombreRazonSocial') }}"
      @elseif(isset(Route::current()->parameters()['array']))
        @if(isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['transmisor']['1']['nombreRazonSocial']))
          value="{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['transmisor']['1']['nombreRazonSocial'] }}"
        @endif
      @endif
      maxlength="65">
      @error('transmisor.1.nombreRazonSocial')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>

    <div class="col-md-3 mb-3">
      <label for="transmisor_rfc_1"> RFC:</label>
      <input type="text" tabindex="52" class="form-control @error('transmisor.1.rfc') is-invalid @enderror" id="transmisor_rfc_1" name="transmisor[1][rfc]"
      @if(old('transmisor.1.rfc'))
        value="{{ old('transmisor.1.rfc') }}"
      @elseif(isset(Route::current()->parameters()['array']))
        @if(isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['transmisor']['1']['rfc']))
          value="{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['transmisor']['1']['rfc'] }}"
        @endif
      @endif
      >
      @error('transmisor.1.rfc')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>

    <div class="col-md-4 mb-3">
      <label for="transmisor_relacion_1">Relación con el transmisor: <code>*</code></label>
      <select class="form-control @error('transmisor.1.relacion') is-invalid @enderror" tabindex="53" id="transmisor_relacion_1" name="transmisor[1][relacion]">
        <option value="">Seleccione...</option>
        @foreach($declaracion->catalogo->parentescoRelacion() as $persona)
        <option value="{{ $persona->clave }}"
          @if(old('transmisor.1.relacion'))
            @if($persona->clave == old('transmisor.1.relacion'))
              selected
            @endif
          @elseif(isset(Route::current()->parameters()['array']))
            @if(isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['transmisor']['1']['relacion']))
              @if($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['transmisor']['1']['relacion']['clave'] == $persona->clave)
                selected
              @endif
            @endif
          @endif
        >
          {{ $persona->valor }}
        </option>
        @endforeach
      </select>
      @error('transmisor.1.relacion')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>
    <br>
  </div>


  <div class="row" @if(isset(Route::current()->parameters()['array']))   @if(isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['transmisor']['2']['tipoPersona']) or old('transmisor.2.tipoPersona') or old('transmisor.2.nombreRazonSocial') or old('transmisor.2.rfc')) @else style="display:none;" @endif    @else   @if(old('transmisor.2.tipoPersona') or old('transmisor.2.nombreRazonSocial') or old('transmisor.2.rfc')) @else style="display:none; margin-top:15px;" @endif    @endif id="transmisor_2">

    <div class="col-md-4 mb-3">
      <label for="transmisor_tipoPersona_2">Persona: 🌐 <code>*</code></label>
      <select class="form-control @error('transmisor.2.tipoPersona') is-invalid @enderror" tabindex="55" id="transmisor_tipoPersona_2" name="transmisor[2][tipoPersona]">
        <option value="">Seleccione...</option>
        @foreach($declaracion->catalogo->tipopersona() as $persona)
        <option value="{{ $persona->clave }}"
          @if(old('transmisor.2.tipoPersona'))
            @if($persona->clave == old('transmisor.2.tipoPersona'))
              selected
            @endif
          @elseif(isset(Route::current()->parameters()['array']))
            @if(isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['transmisor']['2']['tipoPersona']))
              @if($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['transmisor']['2']['tipoPersona'] == $persona->clave)
                selected
              @endif
            @endif
          @endif
        >
          {{ $persona->valor }}
        </option>
        @endforeach
      </select>
      @error('transmisor.2.tipoPersona')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>

    <div class="col-md-5 mb-3">
      <label for="transmisor_nombreRazonSocial_2"> Nombre: <code>*</code></label>
      <input type="text" tabindex="56" class="form-control @error('transmisor.0.nombreRazonSocial') is-invalid @enderror" id="transmisor_nombreRazonSocial_2" name="transmisor[2][nombreRazonSocial]"
      @if(old('transmisor.2.nombreRazonSocial'))
        value="{{ old('transmisor.2.nombreRazonSocial') }}"
      @elseif(isset(Route::current()->parameters()['array']))
        @if(isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['transmisor']['2']['nombreRazonSocial']))
          value="{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['transmisor']['2']['nombreRazonSocial'] }}"
        @endif
      @endif
      maxlength="65">
      @error('transmisor.2.nombreRazonSocial')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>

    <div class="col-md-3 mb-3">
      <label for="transmisor_rfc_2"> RFC:</label>
      <input type="text" tabindex="57" class="form-control @error('transmisor.2.rfc') is-invalid @enderror" id="transmisor_rfc_2" name="transmisor[2][rfc]"
      @if(old('transmisor.2.rfc'))
        value="{{ old('transmisor.2.rfc') }}"
      @elseif(isset(Route::current()->parameters()['array']))
        @if(isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['transmisor']['2']['rfc']))
          value="{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['transmisor']['2']['rfc'] }}"
        @endif
      @endif
      >
      @error('transmisor.2.rfc')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>

    <div class="col-md-4 mb-3">
      <label for="transmisor_relacion_2">Relación con transmisor: <code>*</code></label>
      <select class="form-control @error('transmisor.2.relacion') is-invalid @enderror" tabindex="58" id="transmisor_relacion_2" name="transmisor[2][relacion]">
        <option value="">Seleccione...</option>
        @foreach($declaracion->catalogo->parentescoRelacion() as $persona)
        <option value="{{ $persona->clave }}"
          @if(old('transmisor.2.relacion'))
            @if($persona->clave == old('transmisor.2.relacion'))
              selected
            @endif
          @elseif(isset(Route::current()->parameters()['array']))
            @if(isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['transmisor']['2']['relacion']))
              @if($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['transmisor']['2']['relacion']['clave'] == $persona->clave)
                selected
              @endif
            @endif
          @endif
        >
          {{ $persona->valor }}
        </option>
        @endforeach
      </select>
      @error('transmisor.2.relacion')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>

    <br>
  </div>



  <div class="row" @if(isset(Route::current()->parameters()['array']))   @if(isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['transmisor']['3']['tipoPersona']) or old('transmisor.3.tipoPersona') or old('transmisor.3.nombreRazonSocial') or old('transmisor.3.rfc')) @else style="display:none;" @endif    @else   @if(old('transmisor.3.tipoPersona') or old('transmisor.3.nombreRazonSocial') or old('transmisor.3.rfc')) @else style="display:none; margin-top:15px;" @endif    @endif id="transmisor_3">
    <div class="col-md-4 mb-3">
      <label for="transmisor_tipoPersona_3">Persona: 🌐 <code>*</code></label>
      <select class="form-control @error('transmisor.3.tipoPersona') is-invalid @enderror" tabindex="60" id="transmisor_tipoPersona_3" name="transmisor[3][tipoPersona]">
        <option value="">Seleccione...</option>
        @foreach($declaracion->catalogo->tipopersona() as $persona)
        <option value="{{ $persona->clave }}"
          @if(old('transmisor.3.tipoPersona'))
            @if($persona->clave == old('transmisor.3.tipoPersona'))
              selected
            @endif
          @elseif(isset(Route::current()->parameters()['array']))
            @if(isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['transmisor']['3']['tipoPersona']))
              @if($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['transmisor']['3']['tipoPersona'] == $persona->clave)
                selected
              @endif
            @endif
          @endif
        >
          {{ $persona->valor }}
        </option>
        @endforeach
      </select>
      @error('transmisor.3.tipoPersona')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>

    <div class="col-md-5 mb-3">
      <label for="transmisor_nombreRazonSocial_3"> Nombre: <code>*</code></label>
      <input type="text" tabindex="61" class="form-control @error('transmisor.0.nombreRazonSocial') is-invalid @enderror" id="transmisor_nombreRazonSocial_3" name="transmisor[3][nombreRazonSocial]"
      @if(old('transmisor.3.nombreRazonSocial'))
        value="{{ old('transmisor.3.nombreRazonSocial') }}"
      @elseif(isset(Route::current()->parameters()['array']))
        @if(isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['transmisor']['3']['nombreRazonSocial']))
          value="{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['transmisor']['3']['nombreRazonSocial'] }}"
        @endif
      @endif
      maxlength="65">
      @error('transmisor.3.nombreRazonSocial')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>

    <div class="col-md-3 mb-3">
      <label for="transmisor_rfc_3"> RFC:</label>
      <input type="text" tabindex="62" class="form-control @error('transmisor.3.rfc') is-invalid @enderror" id="transmisor_rfc_3" name="transmisor[3][rfc]"
      @if(old('transmisor.3.rfc'))
        value="{{ old('transmisor.3.rfc') }}"
      @elseif(isset(Route::current()->parameters()['array']))
        @if(isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['transmisor']['3']['rfc']))
          value="{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['transmisor']['3']['rfc'] }}"
        @endif
      @endif
      >
      @error('transmisor.3.rfc')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>

    <div class="col-md-4 mb-3">
      <label for="transmisor_relacion_3">Relación con el transmisor: <code>*</code></label>
      <select class="form-control @error('transmisor.3.relacion') is-invalid @enderror" tabindex="63" id="transmisor_relacion_3" name="transmisor[3][relacion]">
        <option value="">Seleccione...</option>
        @foreach($declaracion->catalogo->parentescoRelacion() as $persona)
        <option value="{{ $persona->clave }}"
          @if(old('transmisor.3.relacion'))
            @if($persona->clave == old('transmisor.3.relacion'))
              selected
            @endif
          @elseif(isset(Route::current()->parameters()['array']))
            @if(isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['transmisor']['3']['relacion']))
              @if($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['transmisor']['3']['relacion']['clave'] == $persona->clave)
                selected
              @endif
            @endif
          @endif
        >
          {{ $persona->valor }}
        </option>
        @endforeach
      </select>
      @error('transmisor.3.relacion')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>

    <br>
  </div>



  <div class="row" @if(isset(Route::current()->parameters()['array']))   @if(isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['transmisor']['4']['tipoPersona']) or old('transmisor.4.tipoPersona') or old('transmisor.4.nombreRazonSocial') or old('transmisor.4.rfc')) @else style="display:none;" @endif    @else   @if(old('transmisor.4.tipoPersona') or old('transmisor.4.nombreRazonSocial') or old('transmisor.4.rfc')) @else style="display:none; margin-top:15px;" @endif    @endif id="transmisor_4">
    <div class="col-md-4 mb-3">
      <label for="transmisor_tipoPersona_4">Persona: 🌐 <code>*</code></label>
      <select class="form-control @error('transmisor.4.tipoPersona') is-invalid @enderror" tabindex="65" id="transmisor_tipoPersona_4" name="transmisor[4][tipoPersona]">
        <option value="">Seleccione...</option>
        @foreach($declaracion->catalogo->tipopersona() as $persona)
        <option value="{{ $persona->clave }}"
          @if(old('transmisor.4.tipoPersona'))
            @if($persona->clave == old('transmisor.4.tipoPersona'))
              selected
            @endif
          @elseif(isset(Route::current()->parameters()['array']))
            @if(isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['transmisor']['4']['tipoPersona']))
              @if($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['transmisor']['4']['tipoPersona'] == $persona->clave)
                selected
              @endif
            @endif
          @endif
        >
          {{ $persona->valor }}
        </option>
        @endforeach
      </select>
      @error('transmisor.4.tipoPersona')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>

    <div class="col-md-5 mb-3">
      <label for="transmisor_nombreRazonSocial_4"> Nombre: <code>*</code></label>
      <input type="text" tabindex="66" class="form-control @error('transmisor.4.nombreRazonSocial') is-invalid @enderror" id="transmisor_nombreRazonSocial_4" name="transmisor[4][nombreRazonSocial]"
      @if(old('transmisor.4.nombreRazonSocial'))
        value="{{ old('transmisor.4.nombreRazonSocial') }}"
      @elseif(isset(Route::current()->parameters()['array']))
        @if(isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['transmisor']['4']['nombreRazonSocial']))
          value="{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['transmisor']['4']['nombreRazonSocial'] }}"
        @endif
      @endif
      maxlength="65">
      @error('transmisor.4.nombreRazonSocial')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>

    <div class="col-md-3 mb-3">
      <label for="transmisor_rfc_4"> RFC:</label>
      <input type="text" tabindex="67" class="form-control @error('transmisor.4.rfc') is-invalid @enderror" id="transmisor_rfc_4" name="transmisor[4][rfc]"
      @if(old('transmisor.4.rfc'))
        value="{{ old('transmisor.4.rfc') }}"
      @elseif(isset(Route::current()->parameters()['array']))
        @if(isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['transmisor']['4']['rfc']))
          value="{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['transmisor']['4']['rfc'] }}"
        @endif
      @endif
      >
      @error('transmisor.4.rfc')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>

    <div class="col-md-4 mb-3">
      <label for="transmisor_relacion_4">Relación con el transmisor: <code>*</code></label>
      <select class="form-control @error('transmisor.4.relacion') is-invalid @enderror" tabindex="68" id="transmisor_relacion_4" name="transmisor[4][relacion]">
        <option value="">Seleccione...</option>
        @foreach($declaracion->catalogo->parentescoRelacion() as $persona)
        <option value="{{ $persona->clave }}"
          @if(old('transmisor.4.relacion'))
            @if($persona->clave == old('transmisor.4.relacion'))
              selected
            @endif
          @elseif(isset(Route::current()->parameters()['array']))
            @if(isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['transmisor']['4']['relacion']))
              @if($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['transmisor']['4']['relacion']['clave'] == $persona->clave)
                selected
              @endif
            @endif
          @endif
        >
          {{ $persona->valor }}
        </option>
        @endforeach
      </select>
      @error('transmisor.4.relacion')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>
    <br>
  </div>



  <div class="row" @if(isset(Route::current()->parameters()['array']))   @if(isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['transmisor']['5']['tipoPersona']) or old('transmisor.5.tipoPersona') or old('transmisor.5.nombreRazonSocial') or old('transmisor.5.rfc')) @else style="display:none;" @endif    @else   @if(old('transmisor.5.tipoPersona') or old('transmisor.5.nombreRazonSocial') or old('transmisor.5.rfc')) @else style="display:none; margin-top:15px;" @endif    @endif id="transmisor_5">
    <div class="col-md-4 mb-3">
      <label for="transmisor_tipoPersona_5">Persona: 🌐 <code>*</code></label>
      <select class="form-control @error('transmisor.5.tipoPersona') is-invalid @enderror" tabindex="70" id="transmisor_tipoPersona_5" name="transmisor[5][tipoPersona]">
        <option value="">Seleccione...</option>
        @foreach($declaracion->catalogo->tipopersona() as $persona)
        <option value="{{ $persona->clave }}"
          @if(old('transmisor.5.tipoPersona'))
            @if($persona->clave == old('transmisor.5.tipoPersona'))
              selected
            @endif
          @elseif(isset(Route::current()->parameters()['array']))
            @if(isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['transmisor']['5']['tipoPersona']))
              @if($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['transmisor']['5']['tipoPersona'] == $persona->clave)
                selected
              @endif
            @endif
          @endif
        >
          {{ $persona->valor }}
        </option>
        @endforeach
      </select>
      @error('transmisor.5.tipoPersona')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>

    <div class="col-md-5 mb-3">
      <label for="transmisor_nombreRazonSocial_5"> Nombre: <code>*</code></label>
      <input type="text" tabindex="71" class="form-control @error('transmisor.5.nombreRazonSocial') is-invalid @enderror" id="transmisor_nombreRazonSocial_5" name="transmisor[5][nombreRazonSocial]"
      @if(old('transmisor.5.nombreRazonSocial'))
        value="{{ old('transmisor.5.nombreRazonSocial') }}"
      @elseif(isset(Route::current()->parameters()['array']))
        @if(isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['transmisor']['5']['nombreRazonSocial']))
          value="{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['transmisor']['5']['nombreRazonSocial'] }}"
        @endif
      @endif
      maxlength="65">
      @error('transmisor.5.nombreRazonSocial')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>

    <div class="col-md-3 mb-3">
      <label for="transmisor_rfc_5"> RFC:</label>
      <input type="text" tabindex="72" class="form-control @error('transmisor.5.rfc') is-invalid @enderror" id="transmisor_rfc_5" name="transmisor[5][rfc]"
      @if(old('transmisor.5.rfc'))
        value="{{ old('transmisor.5.rfc') }}"
      @elseif(isset(Route::current()->parameters()['array']))
        @if(isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['transmisor']['5']['rfc']))
          value="{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['transmisor']['5']['rfc'] }}"
        @endif
      @endif
      >
      @error('transmisor.5.rfc')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>

    <div class="col-md-4 mb-3">
      <label for="transmisor_relacion_5">Relación con el transmisor: <code>*</code></label>
      <select class="form-control @error('transmisor.5.relacion') is-invalid @enderror" tabindex="73" id="transmisor_relacion_5" name="transmisor[5][relacion]">
        <option value="">Seleccione...</option>
        @foreach($declaracion->catalogo->parentescoRelacion() as $persona)
        <option value="{{ $persona->clave }}"
          @if(old('transmisor.5.relacion'))
            @if($persona->clave == old('transmisor.5.relacion'))
              selected
            @endif
          @elseif(isset(Route::current()->parameters()['array']))
            @if(isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['transmisor']['5']['relacion']))
              @if($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['transmisor']['5']['relacion']['clave'] == $persona->clave)
                selected
              @endif
            @endif
          @endif
        >
          {{ $persona->valor }}
        </option>
        @endforeach
      </select>
      @error('transmisor.5.relacion')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>

    <br>
  </div>



  <div class="row" @if(isset(Route::current()->parameters()['array']))   @if(isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['transmisor']['6']['tipoPersona']) or old('transmisor.6.tipoPersona') or old('transmisor.6.nombreRazonSocial') or old('transmisor.6.rfc')) @else style="display:none;" @endif    @else   @if(old('transmisor.6.tipoPersona') or old('transmisor.6.nombreRazonSocial') or old('transmisor.6.rfc')) @else style="display:none; margin-top:15px;" @endif    @endif id="transmisor_6">
    <div class="col-md-4 mb-3">
      <label for="transmisor_tipoPersona_6">Persona: 🌐 <code>*</code></label>
      <select class="form-control @error('transmisor.6.tipoPersona') is-invalid @enderror" tabindex="75" id="transmisor_tipoPersona_6" name="transmisor[6][tipoPersona]">
        <option value="">Seleccione...</option>
        @foreach($declaracion->catalogo->tipopersona() as $persona)
        <option value="{{ $persona->clave }}"
          @if(old('transmisor.6.tipoPersona'))
            @if($persona->clave == old('transmisor.6.tipoPersona'))
              selected
            @endif
          @elseif(isset(Route::current()->parameters()['array']))
            @if(isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['transmisor']['6']['tipoPersona']))
              @if($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['transmisor']['6']['tipoPersona'] == $persona->clave)
                selected
              @endif
            @endif
          @endif
        >
          {{ $persona->valor }}
        </option>
        @endforeach
      </select>
      @error('transmisor.6.tipoPersona')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>

    <div class="col-md-5 mb-3">
      <label for="transmisor_nombreRazonSocial_6"> Nombre: <code>*</code></label>
      <input type="text" tabindex="76" class="form-control @error('transmisor.6.nombreRazonSocial') is-invalid @enderror" id="transmisor_nombreRazonSocial_6" name="transmisor[6][nombreRazonSocial]"
      @if(old('transmisor.6.nombreRazonSocial'))
        value="{{ old('transmisor.6.nombreRazonSocial') }}"
      @elseif(isset(Route::current()->parameters()['array']))
        @if(isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['transmisor']['6']['nombreRazonSocial']))
          value="{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['transmisor']['6']['nombreRazonSocial'] }}"
        @endif
      @endif
      maxlength="65">
      @error('transmisor.6.nombreRazonSocial')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>

    <div class="col-md-3 mb-3">
      <label for="transmisor_rfc_6"> RFC:</label>
      <input type="text" tabindex="77" class="form-control @error('transmisor.6.rfc') is-invalid @enderror" id="transmisor_rfc_6" name="transmisor[6][rfc]"
      @if(old('transmisor.6.rfc'))
        value="{{ old('transmisor.6.rfc') }}"
      @elseif(isset(Route::current()->parameters()['array']))
        @if(isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['transmisor']['6']['rfc']))
          value="{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['transmisor']['6']['rfc'] }}"
        @endif
      @endif
      >
      @error('transmisor.6.rfc')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>

    <div class="col-md-4 mb-3">
      <label for="transmisor_relacion_6">Relación con el transmisor: <code>*</code></label>
      <select class="form-control @error('transmisor.6.relacion') is-invalid @enderror" tabindex="78" id="transmisor_relacion_6" name="transmisor[6][relacion]">
        <option value="">Seleccione...</option>
        @foreach($declaracion->catalogo->parentescoRelacion() as $persona)
        <option value="{{ $persona->clave }}"
          @if(old('transmisor.6.relacion'))
            @if($persona->clave == old('transmisor.6.relacion'))
              selected
            @endif
          @elseif(isset(Route::current()->parameters()['array']))
            @if(isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['transmisor']['6']['relacion']))
              @if($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['transmisor']['6']['relacion']['clave'] == $persona->clave)
                selected
              @endif
            @endif
          @endif
        >
          {{ $persona->valor }}
        </option>
        @endforeach
      </select>
      @error('transmisor.6.relacion')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>

    <br>
  </div>



  <div class="row" @if(isset(Route::current()->parameters()['array']))   @if(isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['transmisor']['7']['tipoPersona']) or old('transmisor.7.tipoPersona') or old('transmisor.7.nombreRazonSocial') or old('transmisor.7.rfc')) @else style="display:none;" @endif    @else   @if(old('transmisor.7.tipoPersona') or old('transmisor.7.nombreRazonSocial') or old('transmisor.7.rfc')) @else style="display:none; margin-top:15px;" @endif    @endif id="transmisor_7">
    <div class="col-md-4 mb-3">
      <label for="transmisor_tipoPersona_7">Persona: 🌐 <code>*</code></label>
      <select class="form-control @error('transmisor.7.tipoPersona') is-invalid @enderror" tabindex="80" id="transmisor_tipoPersona_7" name="transmisor[7][tipoPersona]">
        <option value="">Seleccione...</option>
        @foreach($declaracion->catalogo->tipopersona() as $persona)
        <option value="{{ $persona->clave }}"
          @if(old('transmisor.7.tipoPersona'))
            @if($persona->clave == old('transmisor.7.tipoPersona'))
              selected
            @endif
          @elseif(isset(Route::current()->parameters()['array']))
            @if(isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['transmisor']['7']['tipoPersona']))
              @if($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['transmisor']['7']['tipoPersona']== $persona->clave)
                selected
              @endif
            @endif
          @endif
        >
          {{ $persona->valor }}
        </option>
        @endforeach
      </select>
      @error('transmisor.7.tipoPersona')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>

    <div class="col-md-5 mb-3">
      <label for="transmisor_nombreRazonSocial_7"> Nombre: <code>*</code></label>
      <input type="text" tabindex="81" class="form-control @error('transmisor.7.nombreRazonSocial') is-invalid @enderror" id="transmisor_nombreRazonSocial_7" name="transmisor[7][nombreRazonSocial]"
      @if(old('transmisor.7.nombreRazonSocial'))
        value="{{ old('transmisor.7.nombreRazonSocial') }}"
      @elseif(isset(Route::current()->parameters()['array']))
        @if(isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['transmisor']['7']['nombreRazonSocial']))
          value="{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['transmisor']['7']['nombreRazonSocial'] }}"
        @endif
      @endif
      maxlength="65">
      @error('transmisor.7.nombreRazonSocial')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>

    <div class="col-md-3 mb-3">
      <label for="transmisor_rfc_7"> RFC:</label>
      <input type="text" tabindex="82" class="form-control @error('transmisor.7.rfc') is-invalid @enderror" id="transmisor_rfc_7" name="transmisor[7][rfc]"
      @if(old('transmisor.7.rfc'))
        value="{{ old('transmisor.7.rfc') }}"
      @elseif(isset(Route::current()->parameters()['array']))
        @if(isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['transmisor']['7']['rfc']))
          value="{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['transmisor']['7']['rfc'] }}"
        @endif
      @endif
      >
      @error('transmisor.7.rfc')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>

    <div class="col-md-4 mb-3">
      <label for="transmisor_relacion_7">Relación con el transmisor: <code>*</code></label>
      <select class="form-control @error('transmisor.7.relacion') is-invalid @enderror" tabindex="83" id="transmisor_relacion_7" name="transmisor[7][relacion]">
        <option value="">Seleccione...</option>
        @foreach($declaracion->catalogo->parentescoRelacion() as $persona)
        <option value="{{ $persona->clave }}"
          @if(old('transmisor.7.relacion'))
            @if($persona->clave == old('transmisor.7.relacion'))
              selected
            @endif
          @elseif(isset(Route::current()->parameters()['array']))
            @if(isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['transmisor']['7']['relacion']))
              @if($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['transmisor']['7']['relacion']['clave'] == $persona->clave)
                selected
              @endif
            @endif
          @endif
        >
          {{ $persona->valor }}
        </option>
        @endforeach
      </select>
      @error('transmisor.7.relacion')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>

    <br>
  </div>



  <div class="row" @if(isset(Route::current()->parameters()['array']))   @if(isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['transmisor']['8']['tipoPersona']) or old('transmisor.8.tipoPersona') or old('transmisor.8.nombreRazonSocial') or old('transmisor.8.rfc')) @else style="display:none;" @endif    @else   @if(old('transmisor.8.tipoPersona') or old('transmisor.8.nombreRazonSocial') or old('transmisor.8.rfc')) @else style="display:none; margin-top:15px;" @endif    @endif id="transmisor_8">
    <div class="col-md-4 mb-3">
      <label for="transmisor_tipoPersona_8">Persona: 🌐 <code>*</code></label>
      <select class="form-control @error('transmisor.8.tipoPersona') is-invalid @enderror" tabindex="85" id="transmisor_tipoPersona_8" name="transmisor[8][tipoPersona]">
        <option value="">Seleccione...</option>
        @foreach($declaracion->catalogo->tipopersona() as $persona)
        <option value="{{ $persona->clave }}"
          @if(old('transmisor.8.tipoPersona'))
            @if($persona->clave == old('transmisor.8.tipoPersona'))
              selected
            @endif
          @elseif(isset(Route::current()->parameters()['array']))
            @if(isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['transmisor']['8']['tipoPersona']))
              @if($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['transmisor']['8']['tipoPersona'] == $persona->clave)
                selected
              @endif
            @endif
          @endif
        >
          {{ $persona->valor }}
        </option>
        @endforeach
      </select>
      @error('transmisor.8.tipoPersona')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>

    <div class="col-md-5 mb-3">
      <label for="transmisor_nombreRazonSocial_8"> Nombre: <code>*</code></label>
      <input type="text" tabindex="86" class="form-control @error('transmisor.8.nombreRazonSocial') is-invalid @enderror" id="transmisor_nombreRazonSocial_8" name="transmisor[8][nombreRazonSocial]"
      @if(old('transmisor.8.nombreRazonSocial'))
        value="{{ old('transmisor.8.nombreRazonSocial') }}"
      @elseif(isset(Route::current()->parameters()['array']))
        @if(isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['transmisor']['8']['nombreRazonSocial']))
          value="{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['transmisor']['8']['nombreRazonSocial'] }}"
        @endif
      @endif
      maxlength="65">
      @error('transmisor.8.nombreRazonSocial')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>

    <div class="col-md-3 mb-3">
      <label for="transmisor_rfc_8"> RFC:</label>
      <input type="text" tabindex="87" class="form-control @error('transmisor.8.rfc') is-invalid @enderror" id="transmisor_rfc_8" name="transmisor[8][rfc]"
      @if(old('transmisor.8.rfc'))
        value="{{ old('transmisor.8.rfc') }}"
      @elseif(isset(Route::current()->parameters()['array']))
        @if(isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['transmisor']['8']['rfc']))
          value="{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['transmisor']['8']['rfc'] }}"
        @endif
      @endif
      >
      @error('transmisor.8.rfc')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>

    <div class="col-md-4 mb-3">
      <label for="transmisor_relacion_8">Relación con el transmisor: <code>*</code></label>
      <select class="form-control @error('transmisor.8.relacion') is-invalid @enderror" tabindex="88" id="transmisor_relacion_8" name="transmisor[8][relacion]">
        <option value="">Seleccione...</option>
        @foreach($declaracion->catalogo->parentescoRelacion() as $persona)
        <option value="{{ $persona->clave }}"
          @if(old('transmisor.8.relacion'))
            @if($persona->clave == old('transmisor.8.relacion'))
              selected
            @endif
          @elseif(isset(Route::current()->parameters()['array']))
            @if(isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['transmisor']['8']['relacion']))
              @if($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['transmisor']['8']['relacion']['clave'] == $persona->clave)
                selected
              @endif
            @endif
          @endif
        >
          {{ $persona->valor }}
        </option>
        @endforeach
      </select>
      @error('transmisor.8.relacion')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>

    <br>
  </div>



  <div class="row" @if(isset(Route::current()->parameters()['array']))   @if(isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['transmisor']['9']['tipoPersona']) or old('transmisor.9.tipoPersona') or old('transmisor.9.nombreRazonSocial') or old('transmisor.9.rfc')) @else style="display:none;" @endif    @else   @if(old('transmisor.9.tipoPersona') or old('transmisor.9.nombreRazonSocial') or old('transmisor.9.rfc')) @else style="display:none; margin-top:15px;" @endif    @endif id="transmisor_9">
    <div class="col-md-4 mb-3">
      <label for="transmisor_tipoPersona_9">Persona: 🌐 <code>*</code></label>
      <select class="form-control @error('transmisor.9.tipoPersona') is-invalid @enderror" tabindex="90" id="transmisor_tipoPersona_9" name="transmisor[9][tipoPersona]">
        <option value="">Seleccione...</option>
        @foreach($declaracion->catalogo->tipopersona() as $persona)
        <option value="{{ $persona->clave }}"
          @if(old('transmisor.9.tipoPersona'))
            @if($persona->clave == old('transmisor.9.tipoPersona'))
              selected
            @endif
          @elseif(isset(Route::current()->parameters()['array']))
            @if(isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['transmisor']['9']['tipoPersona']))
              @if($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['transmisor']['9']['tipoPersona'] == $persona->clave)
                selected
              @endif
            @endif
          @endif
        >
          {{ $persona->valor }}
        </option>
        @endforeach
      </select>
      @error('transmisor.9.tipoPersona')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>

    <div class="col-md-5 mb-3">
      <label for="transmisor_nombreRazonSocial_9"> Nombre: <code>*</code></label>
      <input type="text" tabindex="91" class="form-control @error('transmisor.9.nombreRazonSocial') is-invalid @enderror" id="transmisor_nombreRazonSocial_9" name="transmisor[9][nombreRazonSocial]"
      @if(old('transmisor.9.nombreRazonSocial'))
        value="{{ old('transmisor.9.nombreRazonSocial') }}"
      @elseif(isset(Route::current()->parameters()['array']))
        @if(isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['transmisor']['9']['nombreRazonSocial']))
          value="{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['transmisor']['9']['nombreRazonSocial'] }}"
        @endif
      @endif
      maxlength="65">
      @error('transmisor.9.nombreRazonSocial')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>

    <div class="col-md-3 mb-3">
      <label for="transmisor_rfc_9"> RFC:</label>
      <input type="text" tabindex="92" class="form-control @error('transmisor.9.rfc') is-invalid @enderror" id="transmisor_rfc_9" name="transmisor[9][rfc]"
      @if(old('transmisor.9.rfc'))
        value="{{ old('transmisor.9.rfc') }}"
      @elseif(isset(Route::current()->parameters()['array']))
        @if(isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['transmisor']['9']['rfc']))
          value="{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['transmisor']['9']['rfc'] }}"
        @endif
      @endif
      >
      @error('transmisor.9.rfc')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>

    <div class="col-md-4 mb-3">
      <label for="transmisor_relacion_9">Relación con el transmisor: <code>*</code></label>
      <select class="form-control @error('transmisor.9.relacion') is-invalid @enderror" tabindex="93" id="transmisor_relacion_9" name="transmisor[9][relacion]">
        <option value="">Seleccione...</option>
        @foreach($declaracion->catalogo->parentescoRelacion() as $persona)
        <option value="{{ $persona->clave }}"
          @if(old('transmisor.9.relacion'))
            @if($persona->clave == old('transmisor.9.relacion'))
              selected
            @endif
          @elseif(isset(Route::current()->parameters()['array']))
            @if(isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['transmisor']['9']['relacion']))
              @if($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['transmisor']['9']['relacion']['clave'] == $persona->clave)
                selected
              @endif
            @endif
          @endif
        >
          {{ $persona->valor }}
        </option>
        @endforeach
      </select>
      @error('transmisor.9.relacion')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>

    <br>
  </div>



  <div class="row">
    <div class="col-md-4 mb-3" id="div_add2">
      <button id="add2" tabindex="95" class="btn btn-primary btn-sm btn-block" type="button">Agregar otro transmisor</button>
    </div>
    <div class="col-md-4 mb-3" id="div_del2" style="display:none;">
      <button id="del2" tabindex="96" class="btn btn-primary btn-sm btn-block" type="button">Eliminar transmisor</button>
    </div>
  </div>
</fieldset>
