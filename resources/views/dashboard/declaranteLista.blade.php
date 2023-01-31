@extends('layouts.base')

@section('contenido')

<div class="card">
  <div class="card-header">
    <h4 class="card-title">Lista de declarantes:</h4>
    <a href="{{ url('inicio') }}" class="btn btn-sm btn-primary">Regresar al Inicio</a>
  </div>
  <div class="card-body">
    <div class="table-responsive">
  <table class="table header-border verticle-middle">
    <thead>
      <tr>
        <th colspan="2" scope="col" class="text-left">NOMBRE COMPLETO</th>
        <th scope="col">RFCHOMOCLAVE</th>
        <th scope="col">TIPO</th>
        <th scope="col">OPCIONES</th>
      </tr>
    </thead>
    <tbody>
      @foreach($declarantes as $declarante)
      <tr>
        <td>{{ $loop->remaining	}}</td>
        <td class="text-left">
          {{ $declarante->primerApellido }}
          {{ $declarante->segundoApellido }}
          {{ $declarante->name }}
        </td>
        <td>
          {{ $declarante->email }}
        </td>
        <td>@if($declarante->declaracionCompleta == true) COMPLETA @else SIMPLIFICADA @endif</td>
        <td>


          <div class="modal fade" id="ModalReiniciar-{{ $declarante->_id }}">
            <div class="modal-dialog" role="document">
              <div class="modal-content">

                <form action="{{ url('declarante/contrasena') }}" method="POST" autocomplete="off">
                  @csrf
                  @method('patch')
                  <input type="hidden" value="{{ $declarante->_id }}" name="id" />
                  <div class="modal-header">
                    <h4 class="modal-title"><strong>¿Realmente deseas hacerlo?</strong></h4>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                  </div>
                  <div class="modal-body"><strong>Reiniciar la contraseña del declarante.</strong></div>
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-success btn-sm">Reiniciar</button>
                  </div>
                </form>
              </div>
            </div>
          </div>



          <div class="btn-group" role="group">
            <button type="button" class="btn btn-danger btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
              <i class="fa fa-folder"></i>
              Datos
            </button>
            <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 56px, 0px); top: 0px; left: 0px; will-change: transform;">
              <a class="dropdown-item" href="{{ url('declarante/'.$declarante->email.'/editar') }}">
                <i class="fa fa-user"></i>
                Actualizar
              </a>
              <a class="dropdown-item" href="{{ url('declarante/'.$declarante->id.'/editar') }}" data-toggle="modal" data-target="#ModalReiniciar-{{ $declarante->id }}">
                <i class="fa fa-lock"></i> Contraseña
              </a>
              <a class="dropdown-item" href="javascript:void()" title="Borrar declarante" data-toggle="modal" data-target="#ModalBorrar-{{ $declarante->id }}">
                <i class="fa fa-trash"></i> Borrar
              </a>
            </div>
          </div>


          <div class="modal fade" id="ModalBorrar-{{ $declarante->_id }}">
            <div class="modal-dialog" role="document">
              <div class="modal-content">

                <form action="{{ url('declarante/borrar') }}" method="POST" autocomplete="off">
                  @csrf
                  @method('delete')
                  <input type="hidden" value="{{ $declarante->_id }}" name="id" />
                  <div class="modal-header">
                    <h4 class="modal-title"><strong>¿Realmente deseas hacerlo?</strong></h4>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                  </div>
                  <div class="modal-body"><strong>Borrar al declarante NO  afecta sus declaraciones ya firmadas.</strong></div>
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-danger btn-sm">Borrar</button>
                  </div>
                </form>
              </div>
            </div>
          </div>


          <a title="Historial de declaraciones" style="margin: 5px;" href="{{ url('declarante/'.$declarante->email ) }}" class="btn btn-info btn-sm">
            <i class="fa fa-clock-o"></i>&nbsp;
            Historial
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



@section('script')

@endsection
