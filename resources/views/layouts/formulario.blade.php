@extends('layouts.base')


@section('contenido')
<div class="card">
  <div class="card-header">
    <h4 class="card-title">
        {{ $tagsFormato->titulo }}
        <br>
    </h4>
    @isset($declaracion)
      @isset($declaracion->metadata['avance'])
        @if($declaracion->metadata['avance'][Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']] == false)
        <span class="badge light badge-danger pull-right">Incompleto</span>
        @else
        <span class="badge light badge-success ">Completado</span>
        @endif
      @endisset
    @endif
  </div>
  <div class="card-body">
    <ol>{!! $tagsFormato->descripcion !!}</ol>
    <br>
    <div class="row">
      <div class="col-md-12 order-md-1">

        @hasSection('formulario')
          @isset(Route::current()->parameters()['subformatoSlug'])
            <form action="{{ url('declaracion/'.$declaracion->id.'/'.Route::current()->parameters()['tipoDeclaracion'].'/'.Route::current()->parameters()['formatoSlug'].'/'.Route::current()->parameters()['subformatoSlug']) }}" method="POST" autocomplete="off">
              <input name="tipoOperacion" type="hidden" value="AGREGAR">
          @else
            <form action="{{ url('declaracion/'.$declaracion->id.'/'.Route::current()->parameters()['tipoDeclaracion'].'/'.Route::current()->parameters()['formatoSlug']) }}" method="POST" autocomplete="off">
          @endisset
          @isset(Route::current()->parameters()['array'])
            <input name="array" type="hidden" value="{{ Route::current()->parameters()['array'] }}">
          @endisset
          @yield('formulario')
          <p>&nbsp;</p>
        @else

        <fieldset>
          <legend>
            <span class="pull-right" id="agregar">
              @isset($tagsFormato->agregar)
                <a tabindex="1" href="{{ url('declaracion/'.$declaracion->id.'/'.Route::current()->parameters()['tipoDeclaracion'].'/'.Route::current()->parameters()['formatoSlug'].'/'.$tagsFormato->subformatos) }}" class="btn btn-rounded btn-primary">
                  <span class="btn-icon-left text-primary">
                    <i class="fa fa-plus color-info"></i>
                  </span>
                  AGREGAR
                </a>
              @else
                <a href="{{ url('declaracion/'.$declaracion->id.'/'.Route::current()->parameters()['tipoDeclaracion'].'/'.Route::current()->parameters()['formatoSlug'].'/'.$tagsFormato->subformatos.'?tipoBien=vehiculo') }}" class="btn btn-rounded btn-primary">
                  <span class="btn-icon-left text-primary">
                    <i class="fa fa-car color-info"></i>
                  </span>
                  AGREGAR VEHÍCULO
                </a>

                <a href="{{ url('declaracion/'.$declaracion->id.'/'.Route::current()->parameters()['tipoDeclaracion'].'/'.Route::current()->parameters()['formatoSlug'].'/'.$tagsFormato->subformatos.'?tipoBien=inmueble') }}" class="btn btn-rounded btn-primary">
                  <span class="btn-icon-left text-primary">
                    <i class="fa fa-home color-info"></i>
                  </span>
                  AGREGAR INMUEBLE
                </a>
              @endisset
              </span>

              @isset($tagsFormato->ninguno)
              <h4 class="mb-3">
                <label>
                  <input type="hidden" value="0" name="ninguno">
                  <input type="checkbox" value="1" name="ninguno" id="ninguno"
                  @isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['ninguno'])
                    @if($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['ninguno'] == true or old('ninguno') == true)
                      checked
                    @endif
                  @else
                    @isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['cuentaConOtroCargoPublico'])
                      @if($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['cuentaConOtroCargoPublico'] == true or old('ninguno') == true)
                        checked
                      @endif
                    @endisset
                  @endif
                  >
                  {{ $tagsFormato->ninguno }}
                </label>
              </h4>
              @endisset
            </legend>
            <div class="table-responsive" id="tabla">
              <p>&nbsp;</p>
              <table class="table table-responsive-md">
                <thead>
                    <tr>
                      @yield('th')
                    </tr>
                </thead>
                <tbody>
                  @yield('tbody')
                </tbody>
                </table>
            </div>
          </fieldset>
        <p>&nbsp;</p>
        <form action="{{ url('declaracion/'.$declaracion->id.'/'.Route::current()->parameters()['tipoDeclaracion'].'/'.Route::current()->parameters()['formatoSlug']) }}" method="POST" autocomplete="off">

          @hasSection('formularioTabla')
            @yield('formularioTabla')
          @endif
        @endif

        @isset(Route::current()->parameters()['subformatoSlug'])
        @else
          @if(Route::current()->parameters()['formatoSlug'] != "electronicamente")
          <fieldset>
            <legend>
              <h4 class="mb-3">
                <label for="aclaracionesObservaciones">
                  Aclaraciones / Observaciones:
                </label>
              </h4>
            </legend>

            <div class="row">
              <div class="col-md-12 mb-3">
                <textarea tabindex="{{ ++$tabindex }}" class="form-control" id="aclaracionesObservaciones" rows="7" name="aclaracionesObservaciones" placeholder="En este espacio el Declarante podrá realizar las aclaraciones u observaciones que considere pertinentes respecto de alguno o algunos de los incisos de este apartado.">@if(old('aclaracionesObservaciones')){{ old('aclaracionesObservaciones') }}@else{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['aclaracionesObservaciones'] }}@endif</textarea>
              </div>
            </div>
          </fieldset>
          <p>&nbsp;</p>
          @endif
        @endisset
          <button tabindex="{{ ++$tabindex }}" type="submit" id="send" class="btn btn-lg btn-block btn-primary">
            Guardar y avanzar
          </button>
          @csrf
        </form>
      </div>
    </div>
  </div>

</div><!--card-->
@endsection
