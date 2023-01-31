@extends('layouts.base')

@section('contenido')

  <ul class="nav nav-pills review-tab">
    <li class="nav-item">
      <a href="#navpills-1" class="nav-link " data-toggle="tab" aria-expanded="false">
        Declarantes
      </a>
    </li>
    <li class="nav-item">
      <a href="#navpills-2" class="nav-link" data-toggle="tab" aria-expanded="false">
        Configuración
      </a>
    </li>
    <li class="nav-item">
      <a href="#navpills-3" class="nav-link @if(old('nombre')) active @else  @endif" data-toggle="tab" aria-expanded="false">
        Titular contraloría
      </a>
    </li>
    <li class="nav-item">
      <a href="#navpills-4" class="nav-link" data-toggle="tab" aria-expanded="false">
        Transparencia
      </a>
    </li>
    <li class="nav-item">
      <a href="#navpills-5" class="nav-link" data-toggle="tab" aria-expanded="false">
        Interconexión
      </a>
    </li>
  </ul>
  <div class="tab-content">
    <div id="navpills-1" class="tab-pane @if(old('nombre'))  @else active  @endif">
      <div class="card review-table">
        <p>&nbsp;</p>
        <div class="row">
          <div class="col-md-4 mb-4 text-center">
            <a href="{{ url('declarante/crear') }}">
              <img class="brand-title" src="{{ asset('icons/dashboard/crear_usuario.png') }}" alt="Agregar usuario">
              <p>
                <b>Agregar declarante</b>
              </p>
            </a>
          </div>
          <div class="col-md-4 mb-4 text-center">
            <a href="{{ url('declarante/lista') }}">
              <img class="brand-title" src="{{ asset('icons/dashboard/usuarios.png') }}" alt="Usuarios">
              <p>
                <b>Lista de declarantes</b>
              </p>
            </a>
          </div>
          <div class="col-md-4 mb-4 text-center">
            <a href="{{ url('declarante/importar') }}">
              <img class="brand-title" src="{{ asset('icons/dashboard/importar.png') }}" alt="Usuarios">
              <p>
                <b>Importar declarantes</b>
              </p>
            </a>
          </div>
        </div>
      </div>
    </div>
    <div id="navpills-2" class="tab-pane @if(old('nombre'))  @else  @endif">
      <div class="card review-table">
        <br>
        <form action="{{ url('configuracion') }}" method="POST" autocomplete="off">
          <fieldset>
            <legend>
              <h4 class="mb-3">Datos del organismo gubernamental:<br>
              <code>Los datos del organismo solo pueden ser editados durante la instalación, verifica que sean correctos</code>
              </h4>
            </legend>
            <div class="row">
              <div class="col-md-8 mb-3">
                <label for="instituto">Nombre del municipio, instituto o ente gubernamental: <code>*</code></label>
                <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('instituto') is-invalid @enderror" id="instituto" name="instituto" value="{{ $config->municipio }}" maxlength="65" required="required" @if(!empty($config->municipio)) readonly @endif>
                @error('instituto')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              <div class="col-md-4 mb-3">
                <label for="periodo">Periodo de gobierno: <code>*</code></label>
                <select class="form-control @error('periodo') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="periodo" name="periodo">
                  <option>Seleccionar:</option>
                  @foreach($catalogo->periodosGobierno($config->estado) as $fila)
                  <option value="{{ $fila }}" @if($fila == $config->periodo) selected @endif>
                    {{ $fila }}
                  </option>
                  @endforeach
                </select>
                @error('periodo')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              <div class="col-md-4 mb-3">
                <label for="estado">Estado: <code>*</code></label>
                <select class="form-control @error('estado') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="estado" name="estado">
                  <option>Seleccionar:</option>
                  @foreach($catalogo->inegiEntidades() as $entidad)
                  <option value="{{ $entidad->Cve_Ent }}" @if($entidad->Cve_Ent == $config->estado) selected @else disabled @endif>
                    {{ $entidad->Nom_Ent }}
                  </option>
                  @endforeach
                </select>
                @error('estado')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              <div class="col-md-4 mb-3">
                <label for="nivelOrdenGobierno">Nivel: <code>*</code></label>
                <select class="form-control @error('nivelOrdenGobierno') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="nivelOrdenGobierno" name="nivelOrdenGobierno" required>
                  <option value="">Seleccione...</option>
                  @empty($config->nivelOrdenGobierno)
                  @else
                  @foreach($catalogo->nivelOrdenGobierno() as $fila)
                  <option value="{{ $fila->clave }}" @if($fila->clave == $config->nivelOrdenGobierno) selected @else disabled @endif>
                    {{ $fila->valor }}
                  </option>
                  @endforeach
                  @endempty
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
                  @empty($config->ambitoPublico)
                  @else
                  @foreach($catalogo->ambitoPublico() as $fila)
                  <option value="{{ $fila->clave }}" @if($fila->clave == $config->ambitoPublico) selected @else disabled @endif>
                    {{ $fila->valor }}
                  </option>
                  @endforeach
                  @endif
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
            <legend><h4 class="mb-3">Contraseña predeterminada para nuevos usuarios:</h4></legend>
            <div class="row">
              <div class="col-md-8 mb-3">
                <label for="contrasenaGeneral">Contraseña: <code>*</code></label>
                <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('contrasenaGeneral') is-invalid @enderror" id="contrasenaGeneral" name="contrasenaGeneral" @isset($config->password) value="{{ $config->password }}" @endisset maxlength="10" required="required">
                @error('contrasenaGeneral')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
          </fieldset>

          <p>&nbsp;</p>

          <button tabindex="{{ ++$tabindex }}" type="submit" id="send" class="btn btn-lg btn-block btn-primary">
            Guardar configuración
          </button>
          @csrf
        </form>
      </div>
    </div>
    <div id="navpills-3" class="tab-pane @if(old('nombre')) active @else  @endif">
      <div class="card review-table">
        <br>
        <form action="{{ url('inicio/titular') }}" method="POST" autocomplete="off">
          @csrf
          @method('patch')
          <fieldset>
            <legend><h4 class="mb-3">Datos del titular/responsable de contraloría:</h4></legend>
            <div class="row">
              <div class="col-md-4 mb-3">
                <label for="nombre">Nombre(s): <code>*</code></label>
                <input type="text" tabindex="{{ ++$tabindex }}"  class="form-control @error('nombre') is-invalid @enderror" id="nombre" name="nombre" @if(old('nombre')) value="{{ old('nombre') }}" @else value="{{ Auth::user()->name }}" @endif maxlength="65" required="required">
                @error('nombre')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              <div class="col-md-4 mb-3">
                <label for="primerApellido">Primer apellido: <code>*</code></label>
                <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('primerApellido') is-invalid @enderror" id="primerApellido" name="primerApellido" placeholder="" @if(old('primerApellido')) value="{{ old('primerApellido') }}" @else value="{{ Auth::user()->primerApellido }}" @endif maxlength="65" required="required">
                @error('primerApellido')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              <div class="col-md-4 mb-3">
                <label for="segundoApellido">Segundo apellido: </label>
                <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('segundoApellido') is-invalid @enderror" id="segundoApellido" name="segundoApellido" placeholder="" @if(old('segundoApellido')) value="{{ old('segundoApellido') }}" @else value="{{ Auth::user()->segundoApellido }}" @endif maxlength="65">
                @error('segundoApellido')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
          </fieldset>

          <p>&nbsp;</p>

          <fieldset>
            <legend><h4 class="mb-3">¿Dónde te contactamos?:</h4></legend>
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="correo">Correo: <code>*</code></label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="fa fa-envelope"></i>
                    </span>
                  </div>
                  <input tabindex="{{ ++$tabindex }}" type="email" class="form-control @error('correo') is-invalid @enderror" id="correo" name="correo" maxlength="65" @if(old('correo')) value="{{ old('correo') }}" @else value="{{ Auth::user()->correo }}" @endif required="required">
                  @error('correo')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="celular">Lada + teléfono celular: <code>*</code></label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="fa fa-phone"></i>
                    </span>
                  </div>
                  <input tabindex="{{ ++$tabindex }}" type="text" class="form-control @error('celular') is-invalid @enderror" id="celular" name="celular" minlength="10" maxlength="10" @if(old('celular')) value="{{ old('celular') }}" @else value="{{ Auth::user()->celular }}" @endif required="required">
                  @error('celular')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div>
            </div>
          </fieldset>

          <p>&nbsp;</p>

          <fieldset>
            <legend><h4 class="mb-3">Usuario y contraseña de acceso al panel de control para el contralor:</h4></legend>
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="celular">Usuario: <code>*</code></label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="fa fa-user"></i>
                    </span>
                  </div>
                  <input tabindex="{{ ++$tabindex }}" type="text" class="form-control @error('usuario') is-invalid @enderror" id="usuario" name="usuario" @if(old('usuario')) value="{{ old('usuario') }}" @else value="{{ Auth::user()->email }}" @endif required="required">
                  @error('usuario')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="contrasenaAdmin">Contraseña:</label>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="fa fa-key"></i>
                    </span>
                  </div>
                  <input tabindex="{{ ++$tabindex }}" type="text" class="form-control @error('contrasenaAdmin') is-invalid @enderror" id="contrasenaAdmin" name="contrasenaAdmin" maxlength="65" @if(old('contrasenaAdmin')) value="{{ old('contrasenaAdmin') }}" @else value="" @endif>
                </div>
                @error('contrasenaAdmin')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              <div class="col-md-6 mb-3">
                <label for="confirmarAdmin">Confirmar contraseña:</label>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="fa fa-key"></i>
                    </span>
                  </div>
                  <input tabindex="{{ ++$tabindex }}" type="text" class="form-control @error('confirmarAdmin') is-invalid @enderror" id="confirmarAdmin" name="confirmarAdmin" maxlength="65" >
                </div>
                @error('confirmarAdmin')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
          </fieldset>

          <p>&nbsp;</p>

          <button tabindex="{{ ++$tabindex }}" type="submit" class="btn btn-lg btn-block btn-primary">
            Guardar datos
          </button>
          @csrf
        </form>
      </div>
    </div>
    <div id="navpills-4" class="tab-pane @if(old('nombre')) active @else  @endif">
      <div class="card review-table">
        <br>
        <form action="{{ url('inicio/transparencia') }}" method="get" autocomplete="off" target="_blank">
          @csrf
          <fieldset>
            <legend><h4 class="mb-3">Descargar formatos de transparencia:</h4></legend>
            <div class="row">
              <div class="col-md-4 mb-3">
                <label for="formato">Formato: <code>*</code></label>
                <select class="form-control @error('formato') is-invalid @enderror" name="formato" required="required" id="formato" tabindex="{{ ++$tabindex }}">
                  <option>Seleccionar:</option>
                  <option value="Declaraciones">Declaraciones</option>
                </select>
                @error('formato')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              <div class="col-md-4 mb-3">
                <label for="año">Año: <code>*</code></label>
                <select class="form-control @error('año') is-invalid @enderror" name="año" required="required" id="año" tabindex="{{ ++$tabindex }}">
                  <option>Seleccionar:</option>
                  <option value="2022">2022</option>
                  <option value="2021">2021</option>
                </select>
                @error('año')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              <div class="col-md-4 mb-3">
                <label for="trimestre">Trimestre: <code>*</code></label>
                <select class="form-control @error('año') is-invalid @enderror" name="trimestre" required="required" id="trimestre" tabindex="{{ ++$tabindex }}">
                  <option>Seleccionar:</option>
                  <option value="1t">1er Trimestre</option>
                  <option value="2t">2do Trimestre</option>
                  <option value="3t">3er Trimestre</option>
                  <option value="4t">4to Trimestre</option>
                </select>
                @error('primerApellido')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              <div class="col-md-4 mb-3">
              </div>
            </div>
          </fieldset>

          <p>&nbsp;</p>

          <button tabindex="{{ ++$tabindex }}" type="submit" class="btn btn-lg btn-block btn-primary">
            DESCARGAR EXCEL
          </button>
        </form>
      </div>
    </div>
    <div id="navpills-5" class="tab-pane @if(old('nombre')) active @else  @endif">
      <div class="card review-table">
        <br>
      </div>
    </div>
  </div>
@endsection
