@extends('ayudig.cms.menu')




@section('h2')
<h2><span class="far fa-sitemap"></span> Editar Menú</h2>

<div class="pull-right">
  <a href="#" data-toggle="modal" data-target="#create_menu" class="btn btn-info" tabindex="{{ ++$tabindex }}">
    <span class="far fa-plus"></span> AGREGAR MENÚ
  </a>
</div>
@endsection




@section('panel-heading')
<h3 class="panel-title">Menús <strong>Creados</strong></h3>

  <ul class="panel-controls">
    <li>
      <span data-original-title="Editar Html del Menú (UL)" data-toggle="tooltip" data-placement="left" >
        <a href="{{ URL::to('cms/modulo/'.$modulo->id.'/html') }}" tabindex="{{ ++$tabindex }}" class="btn btn-primary btn-rounded btn-condesed btn-sm" >
          <span class="far fa-code"></span> Editar HTML
        </a>
      </span>
    </li>
  </ul>
@endsection




@section('panel-body')
<div class="panel-body" style="padding:50px;">
  <ol class="dd-list">
    @foreach($modulo->menus() as $menu)
    <li class="dd-item">
      <div class="dd-handle">
        <span class="seccion">
          {{ $menu->lista }}.- {{ $menu->menu }}
        </span>
        <ul class="panel-controls">
          @if($menu->id != 1)
          <li data-original-title="Agregar Submenú" data-toggle="tooltip" data-placement="top">
            <a tabindex="{{ ++$tabindex }}" data-toggle="modal" data-target="#modal_submenu{{ $menu->id }}" class="control-default">
              <span class="far fa-plus"></span>
            </a>
            <div class="modal animated fade" id="modal_submenu{{ $menu->id }}" tabindex="-1" role="dialog" aria-labelledby="smallModalHeadsubmenuceate{{ $menu->id }}" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">

                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                      <span aria-hidden="true">&times;</span>
                      <span class="sr-only">Cerrar</span>
                    </button>
                    <h4 class="modal-title" id="smallModalHeadsubmenuceate{{ $menu->id }}">
                      <span class="far fa-sitemap"></span>
                      Crear <strong>Submenú</strong>
                    </h4>
                  </div>

                  <form name="validate" action="{{ url('cms/Menu') }}" method="POST" autocomplete="off">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="superior" value="{{ $menu->id }}">
                    <input type="hidden" name="modulo_id" value="{{ $modulo->id }}">

                    <div class="modal-body form-horizontal">
                      <p>Los campos marcados con <code>*</code> son obligatorios.</p>
                    </div>
                    <div class="modal-body form-horizontal form-group-separated">
                      <div class="form-group">
                        <label for="menu{{ $menu->id }}" class="col-md-3 control-label">Submenú:<code>*</code></label>
                        <div class="col-md-8 col-xs-12">
                          <div class="input-group">
                            <span class="input-group-addon"><span class="far fa-font"></span></span>
                            <input id="menu{{ $menu->id }}" maxlength="20" class="validate[required,maxSize[31]] form-control" type="text" name="menu"/>
                          </div>
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="lista{{ $menu->id }}" class="col-md-3 control-label">No de Lista:<code>*</code></label>
                        <div class="col-md-9 col-xs-12">
                          <div class="input-group">
                            <span class="input-group-addon"><span class="far fa-sort-numeric-down"></span></span>
                            <input id="lista{{ $menu->id }}" type="number" class="validate[custom[integer],min[1],max[10]] form-control input-small" name="lista" value="1" />
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="modal-footer">
                      <button type="submit" class="btn btn-info">Enviar</button>
                      <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    </div>

                  </form>
                </div>
              </div>
            </div>
          </li>
          <li data-toggle="tooltip" data-placement="top" data-original-title="Mover">
            <a tabindex="{{ ++$tabindex }}" data-toggle="modal" data-target="#modal_mover{{ $menu->id }}" class="control-info" >
              <span class="far fa-arrows-alt"></span>
            </a>
            <div class="modal animated fade" id="modal_mover{{ $menu->id }}" tabindex="-1" role="dialog" aria-labelledby="modal_mover{{ $menu->id }}" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">

                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                      <span aria-hidden="true">&times;</span>
                      <span class="sr-only">Cerrar</span>
                    </button>
                    <h4 class="modal-title" id="smallModalHead{{ $menu->id }}">
                      <span class="far fa-arrows-alt"></span>
                      Mover <strong>Menú</strong>
                    </h4>
                  </div>

                  <form name="validate" action="{{ url('cms/Menu/'.$menu->id.'/mover') }}" method="POST" autocomplete="off">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="_method" value="PUT">

                    <div class="modal-body form-horizontal">
                      <p>Los campos marcados con <code>*</code> son obligatorios.</p>
                    </div>
                    <div class="modal-body form-horizontal form-group-separated">
                      <div class="form-group">
                        <label for="mover{{ $menu->id }}" class="col-md-3 control-label">Menú:</label>
                        <div class="col-md-8 col-xs-12">
                          <div class="input-group">
                            <span class="input-group-addon"><span class="far fa-arrows-alt"></span></span>
                            <select id="mover{{ $menu->id }}" class="validate[required] form-control" name="superior">
                              <option value="0">No convertir en submenú</option>
                              @foreach($modulo->menus() as $menu_modal)
                                @if($menu_modal->id != $menu->id)
                                  @if($menu_modal->id != 1)
                                    <option value="{{ $menu_modal->id }}">Convertir en submenú de: {{ $menu_modal->menu }}</option>
                                  @endif
                                @endif
                              @endforeach
                            </select>
                          </div>
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="mlista{{ $menu->id }}" class="col-md-3 control-label">No de Lista:<code>*</code></label>
                        <div class="col-md-9 col-xs-12">
                          <div class="input-group">
                            <span class="input-group-addon"><span class="far fa-sort-numeric-down"></span></span>
                            <input id="mlista{{ $menu->id }}" type="number" class="validate[custom[integer],min[1]] form-control input-small" name="lista" value="{{ $menu->lista }}" />
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="modal-footer">
                      <button type="submit" class="btn btn-info">Enviar</button>
                      <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    </div>

                  </form>
                </div>
              </div>
            </div>
          </li>
          @endif
          <li>
            <a tabindex="{{ ++$tabindex }}" data-toggle="tooltip" data-placement="top" data-original-title="Agregar Contenido" class="control-warning" href="{{ URL::to('cms/Menu/'.$menu->id.'/contenido') }}">
              <span class="far fa-pencil-alt"></span>
            </a>
          </li>
          @if($menu->id != 1)
          <li>
            <a tabindex="{{ ++$tabindex }}" data-toggle="tooltip" data-placement="top" data-original-title="Configurar" class="control-primary" href="{{ URL::to('cms/'.$modulo->tipo.'/'.$menu->id.'/paso_1') }}">
              <span class="far fa-wrench"></span>
            </a>
          </li>
          <li>
            <a tabindex="{{ ++$tabindex }}" data-toggle="tooltip" data-placement="top" data-original-title="Eliminar" class="control-danger mb-control" data-box="#mb-{{ $menu->id }}">
              <span class="fa fa-times"></span>
            </a>
            <div class="message-box message-box-danger animated fadeIn" data-sound="fail" id="mb-{{ $menu->id }}">
              <div class="mb-container">
                <div class="mb-middle">
                  <div class="mb-title"><span class="fa fa fa-times"></span>¿ Borrar <strong>Menú</strong> ?</div>
                  <div class="mb-content">
                    <p>Borrar este menú eliminará los módulos, imagenes, audios, documentos, etc. vinculados a él. ¿Realmente deseas hacerlo?</p>
                    <p>&nbsp;</p>
                    <p>Presiona <span class="label label-danger label-form">NO</span> para cancelar la operación. Presiona <span class="label label-success label-form">SÍ</span> para eliminar el menú.</p>
                  </div>
                  <div class="mb-footer">
                    <div class="pull-right">
                      <form action="{{ URL::to('cms/Menu/'.$menu->id) }}" method="POST">
                        <input name="_method" type="hidden" value="DELETE">
                        <input name="_token"  type="hidden" value="{{ csrf_token() }}">

                        <button class="btn btn-success btn-lg" type="submit">Sí</button>
                        <button class="btn btn-danger btn-lg mb-control-close">No</button>
                      </form>
                    </div><!--pull-right-->
                  </div><!--mb-footer-->
                </div><!--mb-middle-->
              </div><!--mb-container-->
            </div><!--id=mb-->
          </li>
          @endif
        </ul>
      </div><!--dd-handle-->
      <ol class="dd-list">
        @foreach($menu->submenus as $submenu)
        <li class="dd-item">
          <div class="dd-handle">
            <span class="seccion">
              {{ $submenu->lista }}.- {{ $submenu->menu }}
            </span>
            <ul class="panel-controls">
              <li data-toggle="tooltip" data-placement="top" data-original-title="Mover">
                <a tabindex="{{ ++$tabindex }}" data-toggle="modal" data-target="#modal_mover{{ $submenu->id }}" class="control-info" >
                  <span class="far fa-arrows-alt"></span>
                </a>
                <div class="modal animated fade" id="modal_mover{{ $submenu->id }}" tabindex="-1" role="dialog" aria-labelledby="modal_mover{{ $submenu->id }}" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">

                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">
                          <span aria-hidden="true">&times;</span>
                          <span class="sr-only">Cerrar</span>
                        </button>
                        <h4 class="modal-title" id="smallModalHead{{ $submenu->id }}">
                          <span class="far fa-arrows-alt"></span>
                          Mover <strong>Menú</strong>
                        </h4>
                      </div>

                      <form name="validate" action="{{ url('cms/Menu/'.$submenu->id.'/mover') }}" method="POST" autocomplete="off">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="_method" value="PUT">

                        <div class="modal-body form-horizontal">
                          <p>Los campos marcados con <code>*</code> son obligatorios.</p>
                        </div>
                        <div class="modal-body form-horizontal form-group-separated">
                          <div class="form-group">
                            <label for="mover{{ $submenu->id }}" class="col-md-3 control-label">Menú:</label>
                            <div class="col-md-8 col-xs-12">
                              <div class="input-group">
                                <span class="input-group-addon"><span class="far fa-arrows-alt"></span></span>
                                <select id="mover{{ $submenu->id }}" class="validate[required] form-control" name="superior">
                                  <option value="0">Convertir en menú principal</option>
                                  @foreach($modulo->menus() as $menu_modal)
                                    @if($menu_modal->id != 1)
                                      @if($menu_modal->id == $submenu->superior)
                                        <option value="{{ $menu_modal->id }}" selected>Actualmente es submenú de: {{ $menu_modal->menu }}</option>
                                      @else
                                        <option value="{{ $menu_modal->id }}">Convertir en submenú de: {{ $menu_modal->menu }}</option>
                                      @endif
                                    @endif
                                  @endforeach
                                </select>
                              </div>
                            </div>
                          </div>

                          <div class="form-group">
                            <label for="mlista{{ $submenu->id }}" class="col-md-3 control-label">No de Lista:<code>*</code></label>
                            <div class="col-md-9 col-xs-12">
                              <div class="input-group">
                                <span class="input-group-addon"><span class="far fa-sort-numeric-down"></span></span>
                                <input id="mlista{{ $submenu->id }}" type="number" class="validate[custom[integer],min[1]] form-control input-small" name="lista" value="{{ $submenu->lista }}" />
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="modal-footer">
                          <button type="submit" class="btn btn-info">Enviar</button>
                          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        </div>

                      </form>
                    </div>
                  </div>
                </div>
              </li>
              <li>
                <a tabindex="{{ ++$tabindex }}" data-toggle="tooltip" data-placement="top" data-original-title="Agregar Contenido" class="control-warning" href="{{ URL::to('cms/Menu/'.$submenu->id.'/contenido/' ) }}">
                  <span class="far fa-pencil-alt"></span>
                </a>
              </li>
              <li>
                <a tabindex="{{ ++$tabindex }}" data-toggle="tooltip" data-placement="top" data-original-title="Configurar" class="control-primary" href="{{ URL::to('cms/'.$modulo->tipo.'/'.$submenu->id.'/paso_1') }}">
                  <span class="fa fa-wrench"></span>
                </a>
              </li>
              <li>
                <a tabindex="{{ ++$tabindex }}" data-toggle="tooltip" data-placement="top" data-original-title="Eliminar" class="control-danger mb-control" data-box="#mbs-{{ $submenu->id }}">
                  <span class="fa fa-times"></span>
                </a>
                <div class="message-box message-box-danger animated fadeIn" data-sound="fail" id="mbs-{{ $submenu->id }}">
                  <div class="mb-container">
                    <div class="mb-middle">
                      <div class="mb-title"><span class="fa fa fa-times"></span>¿ Borrar <strong>Menú</strong> ?</div>
                      <div class="mb-content">
                        <p>Borrar este menú eliminará los módulos, imagenes, audios, documentos, etc. vinculados a él. ¿Realmente deseas hacerlo?</p>
                        <p>&nbsp;</p>
                        <p>Presiona <span class="label label-danger label-form">NO</span> para cancelar la operación. Presiona <span class="label label-success label-form">SÍ</span> para eliminar el menú.</p>
                      </div>
                      <div class="mb-footer">
                        <div class="pull-right">
                          <form action="{{ URL::to('cms/Menu/'.$submenu->id) }}" method="POST">
                            <input name="_method" type="hidden" value="DELETE">
                            <input name="_token"  type="hidden" value="{{ csrf_token() }}">

                            <button class="btn btn-success btn-lg" type="submit">Sí</button>
                            <button class="btn btn-danger btn-lg mb-control-close">No</button>
                          </form>
                        </div><!--pull-right-->
                      </div><!--mb-footer-->
                    </div><!--mb-middle-->
                  </div><!--mb-container-->
                </div><!--id=mb-->
              </li>
            </ul>
          </div>
        </li>
        @endforeach
      </ol>
    </li>
  @endforeach
  </ol>
</div>


<!--/////////////////////////////////////////////
////////////////////// MODALS
/////////////////////////////////////////////-->

@include('ayudig.cms.etcetera.Menu_create')

@endsection




@section('panel-footer')
 @include('ayudig.cms.etcetera.Panel_footer_anterior')
@endsection
