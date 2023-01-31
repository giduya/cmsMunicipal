
            <ul class="nav nav-pills review-tab">
                <li class="nav-item">
                  <a href="#navpills-1" class="nav-link active" data-toggle="tab" aria-expanded="false">
                    Declaraciones Pendientes
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#navpills-2" class="nav-link" data-toggle="tab" aria-expanded="false">
                    Declaración Anteriores
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
                            <th scope="col">TIPO DE DECLARACIÓN</th>
                            <th scope="col">FECHA DE INICIO</th>
                            <th scope="col">FECHA LÍMITE</th>
                            <th scope="col">FECHA FINALIZACIÓN</th>
                            <th scope="col">AVANCE</th>
                            <th scope="col">OPCIONES</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <th>
                              <form id="declaracion" action="{{ url('/inicio') }}" method="post">
                                @csrf
                                <select name="tipo" required class="form-control">
                                  <option value="">Seleccionar:</option>
                                  <option value="INICIAL">Inicial</option>
                                  <option value="MODIFICACIÓN">Modificación</option>
                                  <option value="CONCLUSIÓN">Conclusión</option>
                                </select>
                              </form>
                            </th>
                            <td>@dMy(now())</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                              <button form="declaracion" type="submit" class="btn btn-info btn-sm">Crear</button>
                            </td>
                          </tr>
                          @foreach($declaraciones as $pendiente)
                          <tr>
                            <td><strong>{{ $pendiente->metadata['tipo'] }}</strong></td>
                            <td>@dMy($pendiente->created_at)</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                              <a href="{{ url('declaracion/'.$pendiente->id.'/siguiente') }}" class="btn btn-success btn-sm">Seguir</a>
                              <a data-toggle="modal" data-target="#basicModal-{{ $pendiente->id }}" style="margin: 5px;" href="#" class="btn btn-danger btn-sm">Borrar</a>

                              <div class="modal fade" id="basicModal-{{ $pendiente->id }}">
                                <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title">¿Realmente deseas hacerlo?</h5>
                                      <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                    </div>
                                    <div class="modal-body">Si borras tu declaración, perderas los avances hechos.</div>
                                    <div class="modal-footer">
                                      <a href="{{ url('declaracion/'.$pendiente->id.'/borrar') }}" class="btn btn-danger">Borrar declaración</a>
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
                    h2
                  </div>
                </div>
              </div>
