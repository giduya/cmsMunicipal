@extends('layouts.base')

@section('contenido')

<div class="card">
  <div class="card-header">
    <h4 class="card-title">Agregar declarante:</h4>
    <a href="{{ url('inicio') }}" class="btn btn-sm btn-primary">Regresar al Inicio</a>
  </div>
  <div class="card-body">
    <div class="alert alert-warning alert-dismissible fade show">
      <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path><line x1="12" y1="9" x2="12" y2="13"></line><line x1="12" y1="17" x2="12.01" y2="17"></line></svg>
      Los datos de acceso para el usuario son:
      <strong>Usuario:</strong> <span id="email"></span> <strong>Contraseña:</strong> {{ $config->password }}
      <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span></button>
    </div>
    <br>
    <div class="row">
      <div class="col-md-12 order-md-1">
        <form action="{{ url('declarante/crear') }}" method="POST" autocomplete="off">
          @csrf

          @if(!empty($usuario))
            @method('patch')
          @endif

          <fieldset>
            <legend><h4 class="mb-3">Datos del declarante:</h4></legend>
            <div class="row">
              <div class="col-md-4 mb-3">
                <label for="nombre">Nombre(s):</label>
                <input type="text" tabindex="{{ ++$tabindex }}" autofocus class="form-control @error('nombre') is-invalid @enderror" id="nombre" name="nombre" @if(old('nombre')) value="{{ old('nombre') }}" @else @if(!empty($usuario)) value="{{ $usuario->name }}" @endif @endif maxlength="65" required="required">
                @error('nombre')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>

              <div class="col-md-4 mb-3">
                <label for="primerApellido">Primer apellido:</label>
                <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('primerApellido') is-invalid @enderror" id="primerApellido" name="primerApellido" placeholder="" @if(old('primerApellido')) value="{{ old('primerApellido') }}" @else @if(!empty($usuario)) value="{{ $usuario->primerApellido }}" @endif @endif maxlength="65" required="required">
                @error('primerApellido')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>

              <div class="col-md-4 mb-3">
                <label for="segundoApellido">Segundo apellido: </label>
                <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('segundoApellido') is-invalid @enderror" id="segundoApellido" name="segundoApellido" placeholder="" @if(old('segundoApellido')) value="{{ old('segundoApellido') }}" @else @if(!empty($usuario)) value="{{ $usuario->segundoApellido }}" @endif @endif maxlength="65">
                @error('segundoApellido')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>

            <div class="row">
              <div class="col-md-4 mb-3">
                <label for="rfc">RFC:</label>
                <input tabindex="{{ ++$tabindex }}" type="text" class="form-control  @error("rfcFisica") is-invalid @enderror" id="rfc" name="rfcFisica" placeholder="" @if(old('rfcFisica')) value="{{ old('rfcFisica') }}" @else @if(!empty($usuario)) value="{{\Illuminate\Support\Str::substr($usuario->email,0,10)}}" readonly @endif @endif minlength="10" maxlength="10" required="required">
                @error("rfcFisica")
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>

              <div class="col-md-2 mb-3">
                <label for="homoClave">Homoclave:</label>
                <input tabindex="{{ ++$tabindex }}" type="text" class="form-control @error('homoClave') is-invalid @enderror" id="homoClave" name="homoClave" placeholder="" @if(old('homoClave')) value="{{ old('homoClave') }}" @else @if(!empty($usuario)) value="{{\Illuminate\Support\Str::substr($usuario->email,-3)}}" readonly @endif @endif maxlength="3" minlength="3" required="required">
                @error('homoClave')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>

              <div class="col-md-3 mb-3">
                <label for="periodo">Tipo de declarante:</label>
                <select class="form-control @error('tipo') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="tipo" name="tipo">
                  <option>Seleccionar:</option>
                  <option value="0" @if(!empty($usuario)) @if($usuario->declaracionCompleta === false) selected @endif @endif>Simplificada</option>
                  <option value="1" @if(!empty($usuario)) @if($usuario->declaracionCompleta === true)  selected @endif @endif>Completa</option>
                </select>
                @error('tipo')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>

              <div class="col-md-3 mb-3">
                <label for="periodo">Periodo en el trabaja:</label>
                <select class="form-control @error('periodo') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="periodo" name="periodo">
                  <option>Seleccionar:</option>
                  @foreach($catalogo->periodosGobierno($config->estado) as $periodo)
                  <option value="{{ $periodo }}" @if(!empty($usuario)) @if($usuario->periodo == $periodo) selected @endif @endif>
                    {{ $periodo }}
                  </option>
                  @endforeach
                </select>
                @error('nombre')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>

          </fieldset>
          <p>&nbsp;</p>
          <button tabindex="17" type="submit" id="send" class="btn btn-lg btn-block btn-primary">
            Agregar declarante
          </button>
        </form>
      </div>
    </div>
  </div>

</div>

@endsection



@section('script')

$(function(){

  $("#rfc").blur(function () {

    var rfc = $("#rfc").val();
    var homo = $("#homoClave").val();
    var text = rfc+homo;
    $("#email").text(text);
  });

  $("#homoClave").blur(function () {
    var rfc = $("#rfc").val();
    var homo = $("#homoClave").val();
    var text = rfc+homo;
    $("#email").text(text);
  });
});

@endsection
