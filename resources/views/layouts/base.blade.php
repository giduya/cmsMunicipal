<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">

  <title>{{ config('app.name', 'Declarapat') }}</title>
  <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/favicon.png') }}">
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">
  <link href="{{ asset('css/bootstrap-multiselect.css') }}" rel="stylesheet">
</head>

<body>
<div id="preloader">
  <div class="sk-three-bounce">
    <div class="sk-child sk-bounce1"></div>
    <div class="sk-child sk-bounce2"></div>
    <div class="sk-child sk-bounce3"></div>
  </div>
</div>


<div id="main-wrapper">
  <div class="nav-header">
    <a href="{{ url('inicio') }}" class="brand-logo">
      <img class="logo-abbr" src="{{ asset('images/logo.png') }}" alt="">
      <img class="logo-compact" src="{{ asset('images/logo-text.png') }}" alt="">
      <img class="brand-title" src="{{ asset('images/logo-text.png') }}" alt="">
    </a>

    <div class="nav-control">
      <div class="hamburger">
        <span class="line"></span><span class="line"></span><span class="line"></span>
      </div>
    </div>
  </div>

  <div class="header">
    <div class="header-content">
      <nav class="navbar navbar-expand">
        <div class="collapse navbar-collapse justify-content-between">
          <div class="header-left">
            <div class="dashboard_bar">
              @isset($declaracion)
                DECLARACIÓN:
                <span class="text-danger">{{ $declaracion->metadata['tipo'] }}</span>
                <div class="progress">
                  <div class="progress-bar bg-danger progress-animated" style="width:{{ $declaracion->avance()['porcentaje'] }}%; height:6px;" role="progressbar">
                  </div>
                </div>
                <small style="font-size:14px">Completados {{ $declaracion->avance()['completados'] }} de {{ $declaracion->avance()['total'] }} formatos que es el {{ $declaracion->avance()['porcentaje'] }}%</small>
              @else
                {{ auth()->user()->name }} {{ auth()->user()->primerApellido }} {{ auth()->user()->segundoApellido }}
              @endif
            </div>
          </div>
          <ul class="navbar-nav header-right">
            <li class="nav-item dropdown notification_dropdown">
              <a class="nav-link dz-fullscreen" href="#">
                <svg id="icon-full" viewBox="0 0 24 24" width="26" height="26" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M8 3H5a2 2 0 0 0-2 2v3m18 0V5a2 2 0 0 0-2-2h-3m0 18h3a2 2 0 0 0 2-2v-3M3 16v3a2 2 0 0 0 2 2h3"></path></svg>
                <svg id="icon-minimize" width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minimize"><path d="M8 3v3a2 2 0 0 1-2 2H3m18 0h-3a2 2 0 0 1-2-2V3m0 18v-3a2 2 0 0 1 2-2h3M3 16h3a2 2 0 0 1 2 2v3"></path></svg>
                <div class="pulse-css"></div>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dropdown-item ai-icon">
                <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                <span class="ml-2">{{ __('Salir') }}</span>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
                </form>
              </a>
            </li>
          </ul>
        </div>
      </nav>
    </div>
  </div><!--Header end ti-comment-alt-->


  <!--**********************************
    Sidebar start
  ***********************************-->
  <div class="deznav">
    <div class="deznav-scroll">
      <ul class="metismenu" id="menu">
        @isset($declaracion)
          @foreach($formatos as $tipoDeclaracion)
            @if($tipoDeclaracion->menu == "Firmar")
            <li class="mm-active">
              <a class="ai-icon" href="{{ url('declaracion/'.$declaracion->id.'/firmar/electronicamente') }}" aria-expanded="false">
                <i class="{{ $tipoDeclaracion->icon }}"></i>
                <span class="nav-text">{{ $tipoDeclaracion->menu }}</span>
              </a>
            </li>
            @else

            <li @if(Route::current()->parameters()['tipoDeclaracion'] == $tipoDeclaracion->slug) class="mm-active" @endif>
              <a class="has-arrow ai-icon" href="javascript:void(0)" aria-expanded="false">
                <i class="{{ $tipoDeclaracion->icon }}"></i>
                <span class="nav-text">{{ $tipoDeclaracion->menu }}</span>
              </a>
              <ul aria-expanded="false">
                @foreach($tipoDeclaracion->formatos as $formato)
                <li>
                  <a href="{{ url('declaracion/'.$declaracion->id.'/'.$tipoDeclaracion->slug.'/'.$formato->slug) }}"
                    @if($formato->slug == Route::current()->parameters()['formatoSlug']) class="mm-active" @endif
                  >
                  @isset($declaracion->metadata['avance'])
                  <span class="icon-warning @if($declaracion->metadata['avance'][$tipoDeclaracion->slug][$formato->slug] == true) text-success @else text-danger @endif"><i class="fa fa-circle" aria-hidden="true"></i></span>
                  @else
                  <span class="icon-warning text-success"><i class="fa fa-circle" aria-hidden="true"></i></span>
                  @endisset
                    {{ $formato->menu}}
                  </a>
                </li>
                @endforeach
              </ul>
            </li>


            @endif
          @endforeach
        @endisset
      </ul>
      <div class="plus-box">
        <p>¿Dudas? Escríbenos por Whatsapp</p>
      </div>
      <div class="copyright">
        <p>
          <strong>Declarapat</strong> 2022
        </p>
      </div>
    </div>
  </div>

  <!--**********************************
    Sidebar end
  ***********************************-->


  <div class="content-body">
    <div class="container-fluid">

      @if(count($errors) > 0)
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif



      @if(Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show">
          <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>
          <strong>Completado!</strong> {{ Session::get('success') }}
          <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span></button>
        </div>
      @endif


      @if(Session::get('danger'))
        <div class="alert alert-danger">{{ Session::get('danger') }}</div>
      @endif


      @if(Session::get('warning'))
      <div class="alert alert-warning alert-dismissible fade show">
        <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path><line x1="12" y1="9" x2="12" y2="13"></line><line x1="12" y1="17" x2="12.01" y2="17"></line></svg>
        <strong>Importante!</strong> {{ Session::get('warning') }}
        <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span></button>
      </div>
      @endif


      @if(Session::get('info'))
        <div class="alert alert-info">{{ Session::get('info') }}</div>
      @endif


      <div class="row">
        <div class="col-xl-12">

          @yield('contenido')

        </div>
      </div>
    </div>
  </div><!--content-body-->



  <div class="footer">
    <div class="copyright">
      <p>Copyright © Desarrollado por <a href="https://ayuntamiento.digital" target="_blank">Ayuntamiento Digital</a> 2022</p>
    </div>
  </div>

</div><!--wrapper-->

<script src="{{ asset('vendor/global/global.min.js') }}"></script>
<script src="{{ asset('js/custom.min.js') }}"></script>
<script src="{{ asset('js/deznav-init.js') }}"></script>
<script src="{{ asset('js/easy-number-separator.js') }}"></script>
<script src="{{ asset('js/bootstrap-multiselect.js') }}"></script>
<script src="{{ asset('js/AdDelFields.js') }}"></script>
<script src="{{ asset('js/excelexportjs.js') }}"></script>
<script>
  $(document).ready(function(){
    @yield('script')
  });
</script>

</body>
</html>
