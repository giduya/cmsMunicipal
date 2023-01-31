<fieldset>
  <legend>
    <h4 class="mb-3">Actividad laboral @if(isset(Route::current()->parameters()['subformatoSlug'])) del dependiente económico: @else de la pareja: @endif</h4>
  </legend>
  <div class="row">
    <div class="col-md-6 mb-3">
      <label for="ambitoSectorClave">Sector en el que labora: <code>*</code></label>
      <select class="form-control @error('actividadLaboralClave') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="ambitoSectorClave" name="actividadLaboralClave">
        <option value="">Seleccione...</option>
        @foreach($declaracion->catalogo->actividadLaboral() as $fila)
        <option value="{{ $fila->clave }}"
          @if(old('actividadLaboralClave') == $fila->clave)
            selected
          @elseif(isset(Route::current()->parameters()['subformatoSlug']))
            @isset(Route::current()->parameters()['array'])
              @isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['actividadLaboral'])
                @if(!is_null($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['actividadLaboral']['clave']))
                  @if($fila->clave == $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['actividadLaboral']['clave']) selected @endif
                @endif
              @endisset
            @endisset
          @else
            @isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['actividadLaboral'])
              @if(!is_null($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['actividadLaboral']['clave']))
                @if($fila->clave == $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['actividadLaboral']['clave']) selected @endif
              @endif
            @endisset
          @endif
        >
          {{ $fila->valor }}
        </option>
        @endforeach
      </select>
      @error('actividadLaboralClave')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>
  </div>
</fieldset>

<p class="fieldset_experiencia">&nbsp;</p>

<fieldset class="fieldset_experiencia">
<legend>
  <h4 class="mb-3">
    Actividad en
    <span class="pub">el sector público:</span>
    <span class="prv">el sector privado:</span>
    <span class="otr">otro sector:</span>
  </h4>
</legend>
<div class="row">
  <div class="col-md-8 mb-3">
    <label for="nombreInstitucion">
      <span class="pub">Nombre ente público:</span>
      <span class="prv">Nombre empresa:</span>
      <span class="otr">Nombre asociación:</span>
      🌐 <code>*</code>
    </label>
    <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('nombreInstitucion') is-invalid @enderror" id="nombreInstitucion" name="nombreInstitucion"
      @if(old('nombreInstitucion'))
        value="{{ old('nombreInstitucion') }}"
      @elseif(isset(Route::current()->parameters()['subformatoSlug']))
        @isset(Route::current()->parameters()['array'])
          @isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['actividadLaboral'])
            @if($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['actividadLaboral']['clave'] == "PRI" or $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['actividadLaboral']['clave'] == "OTRO")
              @isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['actividadLaboralSectorPrivadoOtro']['nombreEmpresaSociedadAsociacion'])
                value="{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['actividadLaboralSectorPrivadoOtro']['nombreEmpresaSociedadAsociacion'] }}"
              @endisset
            @elseif($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['actividadLaboral']['clave'] == "PUB")
              value="{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['actividadLaboralSectorPublico']['nombreEntePublico'] }}"
            @endif
          @endisset
        @endisset
      @else
        @isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['actividadLaboral'])
          @if($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['actividadLaboral']['clave'] == "PRI" or $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['actividadLaboral']['clave'] == "OTRO")
            @isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['actividadLaboralSectorPrivadoOtro']['nombreEmpresaSociedadAsociacion'])
              value="{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['actividadLaboralSectorPrivadoOtro']['nombreEmpresaSociedadAsociacion'] }}"
            @endisset
          @elseif($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['actividadLaboral']['clave'] == "PUB")
            value="{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['actividadLaboralSectorPublico']['nombreEntePublico'] }}"
          @endif
        @endisset
      @endif
    maxlength="65">
    @error('nombreInstitucion')
    <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
    </span>
    @enderror
  </div>

  <div class="col-md-4 mb-3 pub" id="div_actividadLaboral_nivelOrdenGobierno">
    <label for="nivelOrdenGobierno">Nivel de gobierno: <code>*</code></label>
    <select class="form-control @error('nivelOrdenGobierno') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="nivelOrdenGobierno" name="nivelOrdenGobierno">
      <option value="">Seleccione...</option>
      @foreach($declaracion->catalogo->nivelOrdenGobierno() as $fila)
      <option value="{{ $fila->clave }}"
      @if(old('nivelOrdenGobierno'))
        @if(old('nivelOrdenGobierno') == $fila->clave)
          selected
        @endif
      @elseif(isset(Route::current()->parameters()['subformatoSlug']))
        @isset(Route::current()->parameters()['array'])
          @isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['actividadLaboralSectorPublico'])
            @if($fila->clave == $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['actividadLaboralSectorPublico']['nivelOrdenGobierno']) selected @endif
          @endisset
        @endisset
      @else
        @isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['actividadLaboralSectorPublico'])
          @if($fila->clave == $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['actividadLaboralSectorPublico']['nivelOrdenGobierno']) selected @endif
        @endisset
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

  <div class="col-md-4 mb-3 pub">
    <label for="ambitoPublico">Ámbito público: <code>*</code></label>
    <select class="form-control @error('ambitoPublico') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="ambitoPublico" name="ambitoPublico" >
      <option value="">Seleccione...</option>
      @foreach($declaracion->catalogo->ambitoPublico() as $fila)
      <option value="{{ $fila->clave }}"
      @if(old('ambitoPublico'))
        @if($fila->clave == old('ambitoPublico'))
          selected
        @endif
      @elseif(isset(Route::current()->parameters()['subformatoSlug']))
        @isset(Route::current()->parameters()['array'])
          @isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['actividadLaboralSectorPublico']['ambitoPublico'])
            @if($fila->clave == $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['actividadLaboralSectorPublico']['ambitoPublico']) selected @endif
          @endif
        @endisset
      @else
        @isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['actividadLaboralSectorPublico']['ambitoPublico'])
          @if($fila->clave == $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['actividadLaboralSectorPublico']['ambitoPublico']) selected @endif
        @endif
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

  <div class="col-md-4 mb-3 sector">
    <label for="rfc">RFC:</label>
    <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('rfcMoralHomo') is-invalid @enderror" id="rfc" name="rfcMoralHomo"
    @if(old('rfcMoralHomo'))
      value="{{ old('rfcMoralHomo') }}"
    @elseif(isset(Route::current()->parameters()['subformatoSlug']))
      @isset(Route::current()->parameters()['array'])
        @isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['actividadLaboralSectorPrivadoOtro']['rfc'])
          value="{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['actividadLaboralSectorPrivadoOtro']['rfc'] }}"
        @endisset
      @endisset
    @else
      @isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['actividadLaboralSectorPrivadoOtro']['rfc'])
        value="{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['actividadLaboralSectorPrivadoOtro']['rfc'] }}"
      @endisset
    @endif
    maxlength="12" minLength="12">
    @error('rfcMoralHomo')
    <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
    </span>
    @enderror
  </div>

  <div class="col-md-4 mb-3 pub">
    <label for="areaAdscripcion">Área: <code>*</code></label>
    <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('areaAdscripcion') is-invalid @enderror" id="areaAdscripcion" name="areaAdscripcion"
    @if(old('areaAdscripcion'))
      value="{{ old('areaAdscripcion') }}"
    @elseif(isset(Route::current()->parameters()['subformatoSlug']))
      @isset(Route::current()->parameters()['array'])
        @isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['actividadLaboralSectorPublico'])
          value="{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['actividadLaboralSectorPublico']['areaAdscripcion'] }}"
        @endisset
      @endisset
    @else
      @isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['actividadLaboralSectorPublico'])
        value="{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['actividadLaboralSectorPublico']['areaAdscripcion'] }}"
      @endisset
    @endif
    maxlength="65" >
    @error('areaAdscripcion')
    <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
    </span>
    @enderror
  </div>

  <div class="col-md-4 mb-3">
    <label for="empleoCargoComision">Empleo: <code>*</code> </label>
    <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('empleoCargo') is-invalid @enderror" id="empleoCargoComision" name="empleoCargo"
    @if(old('empleoCargo'))
      value="{{ old('empleoCargo') }}"
    @elseif(isset(Route::current()->parameters()['subformatoSlug']))
      @isset(Route::current()->parameters()['array'])
        @isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['actividadLaboral'])
          @if($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['actividadLaboral']['clave'] == "PRI" or $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['actividadLaboral']['clave'] == "OTRO")
            @isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['actividadLaboralSectorPrivadoOtro'])
              value="{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['actividadLaboralSectorPrivadoOtro']['empleoCargo'] }}"
            @endisset
          @elseif($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['actividadLaboral']['clave'] == "PUB")
            value="{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['actividadLaboralSectorPublico']['empleoCargoComision'] }}"
          @endif
        @endisset
      @endisset
    @else
      @isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['actividadLaboral'])
        @if($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['actividadLaboral']['clave'] == "PRI" or $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['actividadLaboral']['clave'] == "OTRO")
          @isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['actividadLaboralSectorPrivadoOtro'])
            value="{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['actividadLaboralSectorPrivadoOtro']['empleoCargoComision'] }}"
          @endisset
        @elseif($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['actividadLaboral']['clave'] == "PUB")
          value="{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['actividadLaboralSectorPublico']['empleoCargoComision'] }}"
        @endif
      @endisset
    @endif
    maxlength="65" >
    @error('empleoCargo')
    <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
    </span>
    @enderror
  </div>

  <div class="col-md-4 mb-3 pub">
    <label for="funcionPrincipal">Función principal: <code>*</code></label>
    <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('funcionPrincipal') is-invalid @enderror" id="funcionPrincipal" name="funcionPrincipal"
    @if(old('funcionPrincipal'))
      value="{{ old('funcionPrincipal') }}"
    @elseif(isset(Route::current()->parameters()['subformatoSlug']))
      @isset(Route::current()->parameters()['array'])
        @isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['actividadLaboralSectorPublico'])
          value="{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['actividadLaboralSectorPublico']['funcionPrincipal'] }}"
        @endisset
      @endisset
    @else
      @isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['actividadLaboralSectorPublico'])
        value="{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['actividadLaboralSectorPublico']['funcionPrincipal'] }}"
      @endisset
    @endif
    maxlength="65">
    @error('funcionPrincipal')
    <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
    </span>
    @enderror
  </div>

  <div class="col-md-4 mb-3">
    <label for="fechaObtencion">Fecha ingreso: <code>*</code></label>
    <input type="date" tabindex="{{ ++$tabindex }}" class="form-control @error('fechaIngreso') is-invalid @enderror" id="fechaObtencion" name="fechaIngreso" max="{{ date('Y-m-d')}}" min="1950-01-01"
      @if(old('fechaIngreso'))
        value="{{ old('fechaIngreso') }}"
      @elseif(isset(Route::current()->parameters()['subformatoSlug']))
        @isset(Route::current()->parameters()['array'])
          @isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['actividadLaboral'])
            @if($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['actividadLaboral']['clave'] == "PRI" or $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['actividadLaboral']['clave'] == "OTRO")
              @isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['actividadLaboralSectorPrivadoOtro'])
                value="{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['actividadLaboralSectorPrivadoOtro']['fechaIngreso'] }}"
              @endisset
            @elseif($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['actividadLaboral']['clave'] == "PUB")
              value="{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['actividadLaboralSectorPublico']['fechaIngreso'] }}"
            @endif
          @endisset
        @endisset
      @else
        @isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['actividadLaboral'])
          @if($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['actividadLaboral']['clave'] == "PRI" or $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['actividadLaboral']['clave'] == "OTRO")
            @isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['actividadLaboralSectorPrivadoOtro'])
              value="{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['actividadLaboralSectorPrivadoOtro']['fechaIngreso'] }}"
            @endisset
          @elseif($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['actividadLaboral']['clave'] == "PUB")
            value="{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['actividadLaboralSectorPublico']['fechaIngreso'] }}"
          @endif
        @endisset
      @endif
    >
    @error('fechaIngreso')
    <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
    </span>
    @enderror
  </div>

  <div class="col-md-4 mb-3 sector">
    <label for="sector">Sector: <code>*</code></label>
    <select class="form-control @error('sectorClave') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="sector" name="sectorClave" >
      <option value="">Seleccione...</option>
      @foreach($declaracion->catalogo->sector() as $fila)
      <option value="{{ $fila->clave }}"
        @if(old('sectorClave') == $fila->clave)
          selected
        @elseif(isset(Route::current()->parameters()['subformatoSlug']))
          @isset(Route::current()->parameters()['array']))
            @isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['actividadLaboralSectorPrivadoOtro'])
              @if($fila->clave == $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['actividadLaboralSectorPrivadoOtro']['sector']['clave']) selected @endif
            @endif
          @endisset
        @else
          @isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['actividadLaboralSectorPrivadoOtro'])
            @if($fila->clave == $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['actividadLaboralSectorPrivadoOtro']['sector']['clave']) selected @endif
          @endif
        @endif
      >
        {{ $fila->valor }}
      </option>
      @endforeach
    </select>
    @error('sectorClave')
    <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
    </span>
    @enderror
  </div>

  <div class="col-md-4 mb-3 sector">
    <label for="proveedorContratistaGobierno">Proveedor de gobierno: <code>*</code></label>
    <select class="form-control @error('proveedorContratistaGobierno') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="proveedorContratistaGobierno" name="proveedorContratistaGobierno">
      <option value="">Seleccione...</option>
      @foreach($declaracion->catalogo->boolean() as $fila)
      <option value="{{ $fila->clave }}"
        @if(old('proveedorContratistaGobierno') != null)
          @if($fila->clave == old('proveedorContratistaGobierno'))
            selected
          @endif
        @elseif(isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['actividadLaboralSectorPrivadoOtro']['proveedorContratistaGobierno']))
          @if($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['actividadLaboralSectorPrivadoOtro']['proveedorContratistaGobierno'] === boolval($fila->clave))
            selected
          @endif
        @elseif(isset(Route::current()->parameters()['array']))
          @isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['actividadLaboralSectorPrivadoOtro']['proveedorContratistaGobierno'])
            @if($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['actividadLaboralSectorPrivadoOtro']['proveedorContratistaGobierno'] === boolval($fila->clave))
              selected
            @endif
          @endisset
        @endif
      >
        {{ $fila->valor }}
      </option>
      @endforeach
    </select>
    @error('proveedorContratistaGobierno')
    <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
    </span>
    @enderror
  </div>
</div>

<p>&nbsp;</p>
</fieldset>

<fieldset class="fieldset_experiencia">
  <legend>
    <h4 class="mb-3">Ingresos @if(isset(Route::current()->parameters()['subformatoSlug']))  del dependiente económico: @else de la pareja: @endif</h4>
  </legend>
  <div class="row">
    <label for="montoValor" class="col-sm-4 col-form-label">
      Salario mensual neto: <code>*</code>
    </label>
    <div class="col-sm-4">
    <div class="input-group input-default">
      <div class="input-group-prepend">
        <span class="input-group-text">$</span>
      </div>
      <input type="text" tabindex="{{ ++$tabindex }}" class="number-separator form-control @error('montoValor') is-invalid @enderror" id="montoValor" name="montoValor" maxlength="20" style="text-align:right"
      @if(old('montoValor'))
        value="{{ old('montoValor') }}"
      @elseif(isset(Route::current()->parameters()['subformatoSlug']))
        @isset(Route::current()->parameters()['array'])
          @isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['actividadLaboral'])
            @if($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['actividadLaboral']['clave'] == "PRI" or $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['actividadLaboral']['clave'] == "OTRO")
              @isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['actividadLaboralSectorPrivadoOtro'])
                value="@money($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['actividadLaboralSectorPrivadoOtro']['salarioMensualNeto']['valor'])"
              @endisset
            @elseif($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['actividadLaboral']['clave'] == "PUB")
              value="@money($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['actividadLaboralSectorPublico']['salarioMensualNeto']['valor'])"
            @endif
          @endisset
        @endisset
      @else
        @isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['actividadLaboral'])
          @if($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['actividadLaboral']['clave'] == "PRI" or $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['actividadLaboral']['clave'] == "OTRO")
            @isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['actividadLaboralSectorPrivadoOtro'])
              value="@money($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['actividadLaboralSectorPrivadoOtro']['salarioMensualNeto']['valor'])"
            @endisset
          @elseif($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['actividadLaboral']['clave'] == "PUB")
            value="@money($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['actividadLaboralSectorPublico']['salarioMensualNeto']['valor'])"
          @endif
        @endisset
      @endif
      >
      <div class="input-group-append">
        <span class="input-group-text">.00</span>
      </div>
      @error('montoValor')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>
  </div>
    <div class="col-sm-4">
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
  </div>
</fieldset>
