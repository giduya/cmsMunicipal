@extends('layouts.base')

@section('contenido')

<div class="card">
  <div class="card-header">
    <h4 class="card-title">{{ $usuario->name }} {{ $usuario->primerApellido }} {{ $usuario->segundoApellido }} / {{ $usuario->email }}:</h4>
    <a href="{{ url('declarante/lista') }}" class="btn btn-sm btn-primary">Regresar a lista de declarantes</a>
  </div>
  <div class="card-body">
    <div class="table-responsive">
  <table class="table header-border verticle-middle">
    <thead>
      <tr>
        <th scope="col">TIPO DE DECLARACIÓN</th>
        <th scope="col">FECHA DE ENTREGA</th>
        <th scope="col">FECHA LÍMITE</th>
        <th scope="col">OPCIONES</th>
      </tr>
    </thead>
    <tbody>
      @foreach($declaraciones as $firmada)
      <tr>
        <td>{{ $firmada->metadata['tipo'] }}</td>
        <td>{{ $firmada->metadata['actualizacion']->toDateTime()->format('d-M-y') }}</td>
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
          @endif
        </td>
      </tr>
      @endforeach
      @foreach($respaldos as $respaldo)
      <tr>
        <td>{{ $respaldo['tipo'] }}</td>
        <td>{{ $respaldo['fecha']->toDateTime()->format('d-M-y') }}</td>
        <td>
        </td>
        <td>
          <a href="Https://{{ $config->subdominio }}.declaracionpatrimonial.gob.mx/declaracion-public?origin={{ $usuario->idRespaldo }}-{{ $respaldo['id'] }}" target="_blank" class="btn btn-info btn-sm">
            <span class="btn-icon"><i class="fa fa-solid fa-file"></i></span>
            Declaración
          </a>
          <a href="" target="_blank" class="btn btn-info btn-sm">
            <span class="btn-icon"><i class="fa fa-check-circle"></i></span>
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

@endsection
