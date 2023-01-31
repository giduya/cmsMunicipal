@include('layouts.head')


<!--**********************************
  Sidebar start
***********************************-->
<div class="deznav">
  <div class="deznav-scroll">
    <ul class="metismenu" id="menu">

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
<!-- WhatsHelp.io widget -->
<script>
    (function () {
        var options = {
            facebook: "526392554052398", // Facebook page ID
            whatsapp: "+5217224277722", // WhatsApp number
            telegram: "ayudig", // Telegram bot username
            email: "hola@ayuntamientodigital.gob.mx", // Email
            call: "+527224277722", // Call phone number
            company_logo_url: "//storage.getbutton.io/widget/c3/c38f/c38f2acdaa482c27f766525b28083db9/logo.jpg", // URL of company logo (png, jpg, gif)
            greeting_message: "Hola, ¿En que podemos ayudarte?.", // Text of greeting message
            call_to_action: "¿Necesitas ayuda? Escríbenos!", // Call to action
            button_color: "#0072BB", // Color of button
            position: "left", // Position may be 'right' or 'left'
            order: "facebook,whatsapp,call,email,telegram", // Order of buttons
            ga: true, // Google Analytics enabled
            branding: true, // Show branding string
            mobile: true, // Mobile version enabled
            desktop: true, // Desktop version enabled
            greeting: true, // Greeting message enabled
            shift_vertical: 60, // Vertical position, px
            shift_horizontal: 50, // Horizontal position, px
            domain: "ayuntamientodigital.gob.mx", // site domain
            key: "5RebRaoKSxy1OPn3fvVlgg", // pro-widget key
        };
        var proto = document.location.protocol, host = "getbutton.io", url = proto + "//static." + host;
        var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
        s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
        var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
    })();
</script>
<!-- /WhatsHelp.io widget -->
<!--**********************************
  Sidebar end
***********************************-->






  <!--**********************************
      Content body start
  ***********************************-->
<div class="content-body">
  <div class="container-fluid">

    @include('layouts.alert')

    <div class="row">
      <div class="col-xl-12">

        @hasSection('formulario')

        <div class="card">
          <div class="card-header">
            <h4 class="card-title">
              Agregar declarante:
            </h4>
          </div>

          <div class="card-body">
            <p></p>
            <div class="row">
              <div class="col-md-12 order-md-1">
                <form action="{{ url('declarante/crear') }}" method="POST" autocomplete="off">
                  @yield('formulario')
                  <button tabindex="{{ ++$tabindex }}" type="submit" id="send" class="btn btn-lg btn-block btn-primary">
                    CREAR
                  </button>
                  @csrf
                  </form>
                </div>
              </div>

            </div>
          </div>



          @else



            @hasSection('tabla')

              @yield('tabla')

            @else
              <ul class="nav nav-pills review-tab">
                <li class="nav-item">
                  <a href="#navpills-1" class="nav-link active" data-toggle="tab" aria-expanded="false">
                    Declarantes
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#navpills-2" class="nav-link" data-toggle="tab" aria-expanded="false">
                    Configuración
                  </a>
                </li>
              </ul>
              <div class="tab-content">
                <div id="navpills-1" class="tab-pane active">
                  <div class="card review-table">

                    <p>&nbsp;</p>

                    <div class="row">
                      <div class="col-md-3 mb-4">
                      </div>
                      <div class="col-md-3 mb-4 text-center">
                        <a href="{{ url('declarante/crear') }}">
                          <img class="brand-title" src="{{ asset('icons/dashboard/crear_usuario.png') }}" alt="Agregar usuario">
                          <p>
                            <b>Agregar declarante</b>
                          </p>
                        </a>
                      </div>
                      <div class="col-md-3 mb-4 text-center">
                        <a href="{{ url('declarante/lista') }}">
                          <img class="brand-title" src="{{ asset('icons/dashboard/usuarios.png') }}" alt="Usuarios">
                          <p>
                            <b>Lista de declarantes</b>
                          </p>
                        </a>
                      </div>
                      <div class="col-md-3 mb-4">
                      </div>
                    </div>

                  </div>
                </div>
                <div id="navpills-2" class="tab-pane">
                  <div class="card review-table">
                    h2
                  </div>
                </div>
              </div>
            @endif



          @endif
        </div>
      </div>
    </div>
  </div>
  <!--**********************************
      Content body end
  ***********************************-->



  <!--**********************************
  Footer start
  ***********************************-->
  <div class="footer">
    <div class="copyright">
      <p>Copyright © Desarrollado por <a href="https://ayuntamiento.digital" target="_blank">Ayuntamiento Digital</a> 2021</p>
    </div>
  </div>
  <!--**********************************
    Footer end
  ***********************************-->
</div>
<!--**********************************
  Main wrapper end
***********************************-->


<!--**********************************
  Scripts
***********************************-->
  <!-- Required vendors -->
  <script src="{{ asset('vendor/global/global.min.js') }}"></script>
  <script src="{{ asset('js/custom.min.js') }}"></script>
  <script src="{{ asset('js/deznav-init.js') }}"></script>
  <script src="{{ asset('js/easy-number-separator.js') }}"></script>
  <script src="{{ asset('js/bootstrap-multiselect.js') }}"></script>
  <script src="{{ asset('js/AdDelFields.js') }}"></script>
  <script>
    $(document).ready(function(){
      @yield('script')
    });
  </script>
</body>
</html>
