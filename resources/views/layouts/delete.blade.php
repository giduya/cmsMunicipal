<td>
  <a href="{{ url('declaracion/'.$declaracion->id.'/'.Route::current()->parameters()['tipoDeclaracion'].'/'.Route::current()->parameters()['formatoSlug'].'/'.$tagsFormato->subformatos.'/'.$clave) }}" class="btn btn-primary shadow btn-xs sharp mr-1">
    <i class="fa fa-pencil"></i>
  </a>
  <a href="#" class="btn btn-danger shadow btn-xs sharp" data-toggle="modal" data-target="#basicModal{{ $clave }}">
    <i class="fa fa-trash"></i>
  </a>

  <form action="{{ url('declaracion/'.$declaracion->id.'/'.Route::current()->parameters()['tipoDeclaracion'].'/'.Route::current()->parameters()['formatoSlug'].'/'.$tagsFormato->subformatos.'/'.$clave) }}" method="POST" autocomplete="off">
    @csrf
    @method('DELETE')

    <div class="modal fade" id="basicModal{{ $clave }}">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-body">
            <svg xmlns="http://www.w3.org/2000/svg" width="72" height="72" fill="#f8bb86" class="bi bi-exclamation-circle" viewBox="0 0 16 16">
              <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
              <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z"/>
            </svg>
            <br><br>
            <div class="swal2-header">
              <h2 class="swal2-title">¿Borrar <span class="text-danger">"{{ $tagsFormato->delete }}"</span>?</h2>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger light" data-dismiss="modal">Cancelar</button>
            <button type="submit"  class="btn btn-success light">Borrar</button>
          </div>
        </div>
      </div>
    </div>
  </form>
</td>
