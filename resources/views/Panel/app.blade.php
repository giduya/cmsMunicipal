@include('Panel.head')

<body>
  <div id="fb-root"></div>
  <script async defer src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.2"></script>
  <div class="page-container">
    <div class="page-sidebar page-sidebar-fixed scroll">
      <ul class="x-navigation x-navigation-custom">
        <li class="xn-logo">
          <a>Ayuntamiento Digital</a>
          <a href="#" class="x-navigation-control"></a>
        </li>
        <li class="xn-profile">
          <a href="#" class="profile-mini">
            <img src="{{ asset('app/img/avatar.png') }}" alt="">
          </a>
          <div class="profile">
            <div class="profile-image">
              <img src="{{ asset('app/img/avatar.png') }}" alt="">
            </div>
            <div class="profile-data">
              <div class="profile-data-name">Bienvenido/a</div>
              <div class="profile-data-title"></div>
            </div>
            <div class="profile-controls">
              <a data-toggle="tooltip" data-placement="top" data-original-title="Perfil" class="profile-control-left" href="{{ URL::to('profile') }}"><span class="glyphicon glyphicon-user"></span></a>
              <a data-toggle="tooltip" data-placement="top" data-original-title="Ayuda"  class="profile-control-right" @yield('help')><span class="fa fa-question"></span></a>
            </div>
          </div>
        </li>

        <li class="">
          <a href="{{ url('/apps') }}">
            <span class="far fa-th"></span> &nbsp;
            <span class="xn-text"> Regresar a las Apps</span>
          </a>
        </li>

        @yield('menu')
      </ul><!-- END X-NAVIGATION -->
    </div><!-- END PAGE SIDEBAR -->

    <div class="page-content">

      <ul class="x-navigation x-navigation-horizontal x-navigation-panel">
        <li class="xn-icon-button">
          <a href="{{ url('menu/') }}" class="x-navigation-minimize"><span class="far fa-indent far fa-outdent"></span></a>
        </li><!-- END TOGGLE NAVIGATION -->

        <li class="xn-icon-button pull-right last">
          <a href="#" class="mb-control" data-box="#mb-signout"><span class="far fa-power-off"></span></a>
        </li><!-- END POWER OFF -->

      </ul><!-- END X-NAVIGATION VERTICAL -->


      <ul class="breadcrumb">
        <li><a href="{{ url('apps') }}">Apps</a></li>
        @yield('breadcumb')
      </ul><!-- END BREADCRUMB -->


      <div class="page-content-wrap">

        @hasSection ('h2')
        <div class="page-title">
          @yield('h2')
        </div>
        @endif

        <div class="row">
          <div class="col-md-12" id="alertas">
            @include('Panel.alert')
          </div>
        </div><!--row-->


        @hasSection('content')
          @yield('content')
        @else

          @yield('row-widgets')

          <div class="row">
            <div class="col-md-12">
              <div class="panel panel-default">
                <div class="panel-heading">
                  @yield('panel-heading')
                </div>

                @yield('panel-body')

                <div class="panel-footer">
                  @yield('panel-footer')
                </div><!--footer-->
              </div><!--panel-default-->
            </div><!--col-md-12-->
          </div><!--row-->
        @endif

      </div><!--content-wrap-->
    </div><!-- END PAGE CONTENT -->
  </div><!-- END PAGE CONTAINER -->

@include('Panel.logout')
