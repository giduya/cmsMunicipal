@extends('layouts.base')


@section('contenido')

    <div class="row">
      <div class="col-xl-12">
        <ul class="nav nav-pills review-tab">
            <li class="nav-item">
              <a href="#navpills-1" class="nav-link active" data-toggle="tab" aria-expanded="false">
                Mis clientes
              </a>
            </li>
            <li class="nav-item">
              <a href="#navpills-2" class="nav-link" data-toggle="tab" aria-expanded="false">
                Agregar cliente
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
                      <th scope="col">ORGANISMO</th>
                      <th scope="col">SUBDOMINIO</th>
                      <th scope="col">LOGIN</th>
                      <th scope="col">OPCIONES</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($catalogo->clientes() as $cliente)
                    <tr>
                      <td><strong class="text-danger">{{ $cliente->municipio }}</strong></td>
                      <td style="text-align:left;" class="text-info">
                        <a href="https://{{ $cliente->subdominio }}.declarapat.gob.mx" target="_blank">
                          https://{{ $cliente->subdominio }}.declarapat.gob.mx
                        </a>
                      </td>
                      <td>@isset($cliente->login) {{ $cliente->login }} @else Nunca @endisset</td>
                      <td>
                        <a data-toggle="modal" data-target="#basicModal-{{ $cliente->subdominio }}" style="margin: 5px;" href="#" class="btn btn-danger btn-sm">Borrar</a>

                        <div class="modal fade" id="basicModal-{{ $cliente->subdominio }}">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title">¿Realmente deseas hacerlo?</h5>
                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                              </div>
                              <div class="modal-body">Si borras el subdominio no tendrán acceso a DECLARAPAT.</div>
                              <div class="modal-footer">
                                <a href="{{ url('cliente/'.$cliente->subdominio.'/borrar') }}" class="btn btn-danger">Borrar declaración</a>
                              </div>
                            </div>
                          </div>
                        </div>

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
              <p>&nbsp;</p>
              <form action="{{ url('cliente/crear') }}" method="post">
                @csrf
                <fieldset>
                  <legend><h4 class="mb-3">Crear subdominio:</h4></legend>
                  <div class="row">
                    <div class="col-md-3 mb-3">
                      <label for="municipio">Organismo: <code>*</code></label>
                      <input type="text" tabindex="{{ ++$tabindex }}" autofocus class="form-control @error('municipio') is-invalid @enderror" id="municipio" name="municipio" maxlength="65" required="required">
                      @error('municipio')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>

                    <div class="col-md-3 mb-3">
                      <label for="estado">Estado: <code>*</code></label>
                      <select class="form-control" id="estado" required name="estado" tabindex="{{ ++$tabindex }}">
                        <option>Selecciona un estado:</option>
                        <option value="15">Estado de México</option>
                        <option value="13">Hidalgo</option>
                        <option value="16">Michoacán</option>
                        <option value="17">Morelos</option>
                        <option value="29">Tlaxcala</option>
                      </select>
                      @error('estado')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>


                    <div class="col-md-3 mb-3">
                      <label for="periodo">Periodo: <code>*</code></label>
                      <select class="form-control" id="periodo" required name="periodo" tabindex="{{ ++$tabindex }}">
                        <option>Selecciona un estado:</option>
                      </select>
                      @error('periodo')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>


                    <div class="col-md-3 mb-3">
                      <label for="estatus">Estatus: <code>*</code></label>
                      <select class="form-control" id="estatus" required name="estatus" tabindex="{{ ++$tabindex }}">
                        <option>Selecciona un estado:</option>
                        <option value="Demo">Demo</option>
                        <option value="Cliente">Cliente</option>
                      </select>
                      @error('estatus')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>


                    <div class="col-md-3 mb-3">
                      <label for="nivelOrdenGobierno">Nivel: 🌐 <code>*</code></label>
                      <select class="form-control @error('nivelOrdenGobierno') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="nivelOrdenGobierno" name="nivelOrdenGobierno" required>
                        <option value="">Seleccione...</option>
                        @foreach($catalogo->nivelOrdenGobierno() as $fila)
                        <option value="{{ $fila->clave }}">
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


                    <div class="col-md-3 mb-3">
                      <label for="ambitoPublico">Ámbito: 🌐 <code>*</code></label>
                      <select class="form-control @error('ambitoPublico') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="ambitoPublico" name="ambitoPublico" required>
                        <option value="">Seleccione...</option>
                        @foreach($catalogo->ambitoPublico() as $fila)
                        <option value="{{ $fila->clave }}">
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


                    <div class="col-md-6 mb-3">
                      <label for="subdominio">Subdominio: <code>*</code></label>
                        <div class="input-group input-default">
                        <div class="input-group-prepend">
                          <span class="input-group-text">https://</span>
                        </div>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('subdominio') is-invalid @enderror" id="subdominio" name="subdominio"
                        @if(old('subdominio'))
                          value="{{ old('subdominio') }}"
                        @endif
                        maxlength="20" style="text-align:right" required>
                        <div class="input-group-append">
                          <span class="input-group-text">.declarapat.gob.mx</span>
                        </div>
                        @error('saldoValor')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      @error('subdominio')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>
                    <button class="btn btn-primary" tabindex="{{ ++$tabindex }}">Crear subdominio</button>
                </fieldset>
              </form>
              <p>&nbsp;</p>
              <p>&nbsp;</p>
              <form action="{{ url('cliente/deploy') }}" method="post">
                @csrf
                <fieldset>
                  <legend><h4 class="mb-3">Reiniciar servidor:</h4></legend>
                  <div class="row">
                    <div class="col-md-6 mb-3">
                      <label for="comando">Comando: <code>*</code></label>
                      <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('comando') is-invalid @enderror" id="comando" name="comando" maxlength="25" required="required">
                      <code>deploy-server-declarapat</code>
                      @error('comando')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>

                  </div>
                  <button class="btn btn-primary" tabindex="{{ ++$tabindex }}">Reiniciar servidor</button>
                </fieldset>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div><!--row-->

@endsection


@section('script')
      $("#estado").change(mostrar_periodos);


      function mostrar_periodos()
      {
        var entidadSelect = $("#estado").val();

        $('#periodo').find('option').not(':first').remove();

        $.ajax({
          url: '/catalogo/getPeriodos/'+entidadSelect,
          type: 'get',
          dataType: 'json',
          success: function(response)
          {
            var len = 0;
            if(response != null)
            {
              len = response.length;
            }

            if(len > 0)
            {

              for(var i=0; i<len; i++)
              {
                var id = response[i];
                var option = "<option  value='"+id+"'>"+id+"</option>";

                $("#periodo").append(option);
              }

            }
          }
        });
      };

@endsection
