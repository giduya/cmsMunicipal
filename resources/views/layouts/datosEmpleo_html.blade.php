<input name="tipoOperacion" type="hidden" value="AGREGAR">

<fieldset>
  <legend>
    <h4 class="mb-3">Datos del ente público:</h4>
  </legend>

  <div class="row">
    <div class="col-md-4 mb-3">
      <label for="nombreInstitucion"> Nombre: 🌐 <code>*</code></label>
      <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('nombreInstitucion') is-invalid @enderror" id="nombreInstitucion" name="nombreInstitucion" autofocus
      @if(old('nombreInstitucion'))
        value="{{ old('nombreInstitucion') }}"
      @elseif(isset(Route::current()->parameters()['subformatoSlug']))
        @isset(Route::current()->parameters()['array'])
          value="{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['nombreEntePublico'] }}"
        @endisset
      @else
        value="{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['nombreEntePublico'] }}"
      @endif required maxlength="65">
      @error('nombreInstitucion')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>

    <div class="col-md-4 mb-3">
      <label for="nivelOrdenGobierno">Nivel: 🌐 <code>*</code></label>
      <select class="form-control @error('nivelOrdenGobierno') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="nivelOrdenGobierno" name="nivelOrdenGobierno" required>
        <option value="">Seleccione...</option>
        @foreach($declaracion->catalogo->nivelOrdenGobierno() as $fila)
        <option value="{{ $fila->clave }}"
          @if(old('nivelOrdenGobierno'))
            @if(old('nivelOrdenGobierno') == $fila->clave)
              selected
            @endif
          @elseif(isset(Route::current()->parameters()['subformatoSlug']))
            @isset(Route::current()->parameters()['array'])
              @if($fila->clave == $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['nivelOrdenGobierno']) selected @endif
            @endif
          @else
            @if($fila->clave == $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['nivelOrdenGobierno']) selected @endif
          @endif
        >
          {{ $fila->valor }}
        </option>
        @endforeach
      </select>
      @error('nivelOrdenGobierno')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>

    <div class="col-md-4 mb-3">
      <label for="ambitoPublico">Ámbito: 🌐 <code>*</code></label>
      <select class="form-control @error('ambitoPublico') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="ambitoPublico" name="ambitoPublico" required>
        <option value="">Seleccione...</option>
        @foreach($declaracion->catalogo->ambitoPublico() as $fila)
        <option value="{{ $fila->clave }}"
          @if(old('ambitoPublico'))
            @if(old('ambitoPublico') == $fila->clave)
              selected
            @endif
          @elseif(isset(Route::current()->parameters()['subformatoSlug']))
            @isset(Route::current()->parameters()['array'])
              @if($fila->clave == $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['ambitoPublico']) selected @endif
            @endisset
          @else
            @if($fila->clave == $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['ambitoPublico']) selected @endif
          @endif
        >
          {{ $fila->valor }}
        </option>
        @endforeach
      </select>
      @error('ambitoPublico')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>
  </div>

</fieldset>

<p>&nbsp;</p>

<fieldset>
  <legend>
    <h4 class="mb-3">Datos del cargo:</h4>
  </legend>

  <div class="row">
    <div class="col-md-4 mb-3">
      <label for="areaAdscripcion"> Área: 🌐 <code>*</code></label>
      <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('areaAdscripcion') is-invalid @enderror" id="areaAdscripcion" name="areaAdscripcion"
      @if(old('areaAdscripcion'))
        value="{{ old('areaAdscripcion') }}"
      @elseif(isset(Route::current()->parameters()['subformatoSlug']))
        @if(isset(Route::current()->parameters()['array']))
          value="{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['areaAdscripcion'] }}"
        @endif
      @else
        value="{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['areaAdscripcion'] }}"
      @endif required maxlength="65">
      @error('areaAdscripcion')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>

    <div class="col-md-4 mb-3">
      <label for="empleoCargoComision">Empleo o puesto: 🌐 <code>*</code></label>
      <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('empleoCargoComision') is-invalid @enderror" id="empleoCargoComision" name="empleoCargoComision"
      @if(old('empleoCargoComision'))
        value="{{ old('empleoCargoComision') }}"
      @elseif(isset(Route::current()->parameters()['subformatoSlug']))
        @if(isset(Route::current()->parameters()['array']))
          value="{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['empleoCargoComision'] }}"
        @endif
      @else
        value="{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['empleoCargoComision'] }}"
      @endif
      maxlength="65" required>
      @error('empleoCargoComision')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>

    <div class="col-md-4 mb-3">
      <label for="nivelEmpleoCargoComision">Nivel: 🌐 <code>*</code></label>
      <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('nivelEmpleoCargoComision') is-invalid @enderror" id="nivelEmpleoCargoComision" name="nivelEmpleoCargoComision" required
      @if(old('nivelEmpleoCargoComision'))
        value="{{ old('nivelEmpleoCargoComision') }}"
      @elseif(isset(Route::current()->parameters()['subformatoSlug']))
        @if(isset(Route::current()->parameters()['array']))
          value="{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['nivelEmpleoCargoComision'] }}"
        @endif
      @else
        value="{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['nivelEmpleoCargoComision'] }}"
      @endif
        maxlength="65" required>
      <code>(Proporcionado por tesoreria)</code>
      @error('nivelEmpleoCargoComision')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>
  </div>

  <div class="row">
    <div class="col-md-4 mb-3">
      <label for="funcionPrincipal">¿Cual es tu función?: 🌐 <code>*</code></label>
      <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('funcionPrincipal') is-invalid @enderror" id="funcionPrincipal" name="funcionPrincipal"
      @if(old('funcionPrincipal'))
        value="{{ old('funcionPrincipal') }}"
      @elseif(isset(Route::current()->parameters()['subformatoSlug']))
        @if(isset(Route::current()->parameters()['array']))
          value="{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['funcionPrincipal'] }}"
        @endif
      @else
        value="{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['funcionPrincipal'] }}"
      @endif
        maxlength="65" required>
      @error('funcionPrincipal')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>

    <div class="col-md-4 mb-3">
      <label for="fechaTomaPosesion">Fecha de ingreso: 🌐 <code>*</code></label>
      <input type="date" tabindex="{{ ++$tabindex }}" class="form-control @error('fechaTomaPosesion') is-invalid @enderror" id="fechaTomaPosesion" name="fechaTomaPosesion"
      @if(old('fechaTomaPosesion'))
        value="{{ old('fechaTomaPosesion') }}"
      @elseif(isset(Route::current()->parameters()['subformatoSlug']))
        @if(isset(Route::current()->parameters()['array']))
          value="{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['fechaTomaPosesion'] }}"
        @endif
      @else
        value="{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['fechaTomaPosesion'] }}"
      @endif required min="2010-01-01" max="{{ date('Y-m-d')}}">
      <code>Aproximada</code>
      @error('fechaTomaPosesion')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>

    <div class="col-md-4 mb-3">
      <label for="contratadoPorHonorarios">¿Contrato por honorarios?: 🌐 <code>*</code></label>
      <select class="form-control @error('contratadoPorHonorarios') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="contratadoPorHonorarios" name="contratadoPorHonorarios" required>
        <option value="">Seleccione...</option>
        @foreach($declaracion->catalogo->boolean() as $fila)
        <option value="{{ $fila->clave }}"
          @if(old('contratadoPorHonorarios') != null)
            @if($fila->clave == old('contratadoPorHonorarios'))
              selected
            @endif
          @elseif(isset(Route::current()->parameters()['subformatoSlug']))
            @if(isset(Route::current()->parameters()['array']))
              @if($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['contratadoPorHonorarios'] === boolval($fila->clave))
                selected
              @endif
            @endif
          @else
            @if($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['contratadoPorHonorarios'] === boolval($fila->clave))
              selected
            @endif
          @endif
        >
          {{ $fila->valor }}
        </option>
        @endforeach
      </select>
      @error('contratadoPorHonorarios')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>

    <div class="col-md-8 mb-3">
      <label for="clasificacion">Clasificación: <code>*</code></label>
      <select class="form-control @error('clasificacion') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="clasificacion" name="clasificacion" required>
        <option value="">Seleccione...</option>
        @foreach($declaracion->catalogo->clasificacion() as $fila)
        <option value="{{ $fila->clave }}"
          @if(old('clasificacion'))
            @if(old('clasificacion') == $fila->clave)
              selected
            @endif
          @elseif(isset(Route::current()->parameters()['subformatoSlug']))
            @isset(Route::current()->parameters()['array'])
              @if($fila->clave == $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['clasificacion']) selected @endif
            @endif
          @else
            @isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['clasificacion'])
              @if($fila->clave == $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['clasificacion']) selected @endif
            @endisset
          @endif
        >
          {{ $fila->valor }}
        </option>
        @endforeach
      </select>
      @error('clasificacion')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>
  </div>

</fieldset>

<p>&nbsp;</p>

<fieldset>
  <legend><h4 class="mb-3">Teléfonos de contacto:</h4></legend>

  <div class="row">
    <div class="col-md-6 mb-3">
      <label for="oficina">Lada + Teléfono de oficina: 🌐 <code>*</code></label>
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text">+</span>
        </div>
        <select tabindex="{{ ++$tabindex }}" class="form-control @error('oficinaLada') is-invalid @enderror" id="oficinaLada" name="oficinaLada" required>
          <option value="">Seleccione...</option>
          @foreach($declaracion->catalogo->paises() as $pais)
          <option value="{{ $pais->LADA }}">
            {{ $pais->ESPANOL }}
            {{ $pais->LADA }}
          </option>
          @endforeach
        </select>
        <input tabindex="{{ ++$tabindex }}" type="text" class="form-control @error('oficina') is-invalid @enderror" id="oficina" name="oficina"
        @if(old('oficina'))
          value="{{ old('oficina') }}"
        @elseif(isset(Route::current()->parameters()['subformatoSlug']))
          @if(isset(Route::current()->parameters()['array']))
            value="{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['telefonoOficina']['telefono'] }}"
          @endif
        @else
          value="{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['telefonoOficina']['telefono'] }}"
        @endif minlength="10" maxlength="10" required>
        @error('oficinaLada')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
        @error('oficina')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
    </div>

    <div class="col-md-3 mb-3">
      <label for="telefonoOficina_extension"> Extensión: 🌐</label>
      <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('oficinaExt') is-invalid @enderror" id="telefonoOficina_extension" name="oficinaExt"
      @if(old('oficinaExt'))
        value="{{ old('oficinaExt') }}"
      @elseif(isset(Route::current()->parameters()['subformatoSlug']))
        @if(isset(Route::current()->parameters()['array']))
          value="{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['telefonoOficina']['extension'] }}"
        @endif
      @else
        value="{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['telefonoOficina']['extension'] }}"
      @endif maxlength="5">
      @error('oficinaExt')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>
  </div>

</fieldset>

<p>&nbsp;</p>

<fieldset>

  <legend><h4 class="mb-3">Domicilio deL empleo:</h4></legend>

  @include('layouts.domicilio_html')
</fieldset>
