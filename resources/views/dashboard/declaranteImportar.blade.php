@extends('layouts.base')

@section('contenido')

<div class="card">
  <div class="card-header">
    <h4 class="card-title">Importar declarantes desde excel:</h4>
    <a href="{{ url('inicio') }}" class="btn btn-sm btn-primary">Regresar al Inicio</a>
  </div>

  <div class="card-body">
    <div class="row">
      <div class="col-md-6 mb-3">
        <p>
          <div class="basic-form custom_file_input">
            <form action="{{ url('declarante/importar') }}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text">Subir excel</span>
                </div>
                <div class="custom-file">
                  <input type="file" class="custom-file-input" name="excel" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
                  <label class="custom-file-label">Buscar</label>
                </div>
              </div>
              <button class="btn btn-sm btn-primary">
                Subir excel
              </button>
            </form>
          </div>
        </p>
      </div>
      <div class="col-md-6 mb-3">
        <p></p>
        <a href="{{ asset('/docs/declarantesImportar.xlsx') }}" class="btn btn-sm btn-primary" style="margin-left:26px;" download>
          Descargar excel de llenado <span class="btn-icon-right"><i class="fa fa-file-excel-o"></i></span>
        </a>
      </div>
    </div>

  </div>
</div>

@endsection
