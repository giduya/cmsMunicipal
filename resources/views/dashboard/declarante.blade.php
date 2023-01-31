@extends('layouts.base')


@section('contenido')
<ul class="nav nav-pills review-tab">
  <li class="nav-item">
    <a href="#navpills-1" class="nav-link active" data-toggle="tab" aria-expanded="false">
      <i class="fa fa-file"></i>
      Mis declaraciones
    </a>
  </li>
  <li class="nav-item">
    <a href="#navpills-2" class="nav-link" data-toggle="tab" aria-expanded="false">
      <i class="fa fa-key"></i>
      Mi contraseña
    </a>
  </li>
</ul>
<div class="tab-content">
  <div id="navpills-1" class="tab-pane active">
    <div class="card review-table">
      <div class="table-responsive">
        <table class="table header-border verticle-middle">
          <thead>
            <tr>
              <th scope="col" style="width:195px;">TIPO DE DECLARACIÓN</th>
              <th scope="col" style="width:145px;">FECHA DE INICIO</th>
              <th scope="col">FECHA LÍMITE</th>
              <th scope="col">AVANCE</th>
              <th scope="col">OPCIONES</th>
            </tr>
          </thead>
          <tbody>
            @empty($pendiente)
            <tr>
              <th>
                <form id="declaracion" action="{{ url('declaracion/crear') }}" method="post">
                  @csrf
                  <select name="tipo" required class="form-control" id="tipo">
                    <option value="">Seleccionar:</option>
                    <option value="INICIAL">Inicial</option>
                    <option value="MODIFICACIÓN">Modificación</option>
                    <option value="CONCLUSIÓN">Conclusión</option>
                  </select>
                </form>
              </th>
              <td>@dMy(now())</td>
              <td>
                <span id="spanI">60 días naturales después <br>de tomar posesión del cargo</span>
                <span id="spanM">Del 1ro de mayo al 31 de mayo <br> de cada año</span>
                <span id="spanC">60 días naturales después <br>de finalizar el cargo</span>
              </td>
              <td><strong class="text-danger">0%</strong></td>
              <td>
                <button form="declaracion" type="submit" class="btn btn-success btn-sm">
                  <span class="btn-icon"><i class="fa fa-play-circle"></i></span>
                  Iniciar
                </button>
              </td>
            </tr>
            @endif
            @foreach($declaraciones as $firmada)
            <tr>
              <td><strong>{{ $firmada->metadata['tipo'] }}</strong></td>
              <td>{{ $firmada->metadata['actualizacion']->toDateTime()->format('d-M-y') }}</td>
              <td></td>
              <td>
                @if($firmada->avance()['listo'] == true)
                  Firmada en tiempo
                @else
                <div class="progress">
                  <div class="progress-bar bg-danger progress-animated" style="width:{{ $firmada->avance()['porcentaje'] }}%; height:6px;" role="progressbar">
                  </div>
                </div>
                <small style="font-size:14px">Completados {{ $firmada->avance()['completados'] }} de {{ $firmada->avance()['total'] }} formatos. ({{ $firmada->avance()['porcentaje'] }}%)</small>
                @endif
              </td>
              <td>
                @if($firmada->avance()['listo'] == true)
                  <a href="{{ url('versionPublica/'.$firmada->id.'/pdf') }}" target="_blank" class="btn btn-info btn-sm">
                    <span class="btn-icon"><i class="fa fa-solid fa-file"></i></span>
                    Declaración
                  </a>
                  <a href="{{ url('declaracion/'.$firmada->id.'/acuse') }}" target="_blank" class="btn btn-info btn-sm">
                    <span class="btn-icon"><i class="fa fa-check-circle"></i></span>
                    Acuse
                  </a>
                @else
                  <a href="{{ url('declaracion/'.$firmada->id.'/siguiente') }}" class="btn btn-success btn-sm">
                    <span class="btn-icon"><i class="fa fa-play-circle"></i></span>
                    Seguir
                  </a>
                  <a data-toggle="modal" data-target="#basicModal-{{ $firmada->id }}" style="margin: 5px;" href="#" class="btn btn-danger btn-sm">
                    <span class="btn-icon"><i class="fa fa-trash"></i></span>
                    Borrar
                  </a>
                  <div class="modal fade" id="basicModal-{{ $firmada->id }}">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">¿Realmente deseas hacerlo?</h5>
                          <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                        </div>
                        <div class="modal-body">Si borras tu declaración, perderas los avances hechos.</div>
                        <div class="modal-footer">
                          <a href="{{ url('declaracion/'.$firmada->id.'/borrar') }}" class="btn btn-danger">Borrar declaración</a>
                        </div>
                      </div>
                    </div>
                  </div>
                @endif
              </td>
            </tr>
            @endforeach

            @foreach($respaldos as $respaldo)
            <tr>
              <td>{{ $respaldo['tipo'] }}</td>
              <td>{{ $respaldo['fecha']->toDateTime()->format('d-M-y') }}</td>
              <td></td>
              <td>FIRMADA EN TIEMPO</td>
              <td>
                <a href="Https://{{ $config->subdominio }}.declaracionpatrimonial.gob.mx/declaracion-public?origin={{ Auth::user()->idRespaldo }}-{{ $respaldo['id'] }}" target="_blank" class="btn btn-info btn-sm">
                  <span class="btn-icon"><i class="fa fa-solid fa-file"></i></span>
                  Declaración
                </a>

                <a href="Https://{{ $config->subdominio }}.declaracionpatrimonial.gob.mx/declaracion-public?origin={{ Auth::user()->idRespaldo }}-{{ $respaldo['id'] }}" target="_blank" class="btn btn-info btn-sm">
                  <span class="btn-icon"><i class="fa fa-solid fa-file"></i></span>
                  Acuse
                </a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <div id="navpills-2" class="tab-pane">
    <div class="card review-table">

      <div class="card review-table">
        <br>
        <form action="{{ url('inicio/contrasena') }}" method="POST" autocomplete="off">
          @csrf
          @method('patch')
          <fieldset>
            <legend><h4 class="mb-3">Datos del declarante:</h4></legend>
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
            <legend><h4 class="mb-3">Usuario y contraseña para declarar:</h4></legend>
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="rfc">RFC: <code>*</code></label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="fa fa-user"></i>
                    </span>
                  </div>
                  <input tabindex="{{ ++$tabindex }}" type="text" class="form-control @error('rfc') is-invalid @enderror" id="rfc" name="rfc" maxlength="13" @if(old('rfc')) value="{{ old('rfc') }}" @else value="{{ Auth::user()->email }}" @endif required="required" readonly>
                  @error('rfc')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="tipo">Tipo de declarante: <code>*</code></label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="fa fa-user"></i>
                    </span>
                  </div>
                  <input tabindex="{{ ++$tabindex }}" type="text" class="form-control @error('tipo') is-invalid @enderror" name="tipo" @if(Auth::user()->declaracionCompleta == true) value="Completa" @else value="Simplificada" @endif required="required" readonly>
                  @error('tipo')
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
            Guardar datos {{ request()->get('tab') }}
          </button>
          @csrf
        </form>
      </div>

    </div>
  </div>
</div>
@endsection




@section('script')


$("#tipo").ready(span);
$("#tipo").change(span);

function span()
{
  var tipoValue = $("#tipo").val();

  if(tipoValue == "INICIAL")
  {
    $('#spanI').show();
    $('#spanM').hide();
    $('#spanC').hide();
  }
  else if(tipoValue == "MODIFICACIÓN")
  {
    $('#spanI').hide();
    $('#spanM').show();
    $('#spanC').hide();
  }
  else if(tipoValue == "CONCLUSIÓN")
  {
    $('#spanI').hide();
    $('#spanM').hide();
    $('#spanC').show();
  }
  else
  {
    $('#spanI').hide();
    $('#spanM').hide();
    $('#spanC').hide();
  }
}

@endsection
