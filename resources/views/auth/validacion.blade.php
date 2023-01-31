@isset($config)
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">
<link href="images/favicon.png" rel="icon" />
<title>Declarapat - Tu app de declaraciones patrimoniales</title>
<meta name="description" content="Declarapat">
<meta name="author" content="harnishdesign.net">

<!-- Web Fonts
========================= -->
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900' type='text/css'>

<!-- Stylesheet
========================= -->
<link rel="stylesheet" type="text/css" href="{{ asset('loginForm/vendor/bootstrap/css/bootstrap.min.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('loginForm/vendor/font-awesome/css/all.min.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('loginForm/css/stylesheet.css') }}" />
</head>
<body>

<!-- Preloader -->
<div class="preloader">
  <div class="lds-ellipsis">
    <div></div>
    <div></div>
    <div></div>
    <div></div>
  </div>
</div>
<!-- Preloader End -->

<div id="main-wrapper" class="oxyy-login-register">
  <div class="container-fluid px-0">
    <div class="row g-0 min-vh-100">
      <!-- Welcome Text
      ========================= -->
      <div class="col-md-6">
        <div class="hero-wrap d-flex align-items-center h-100">
          <div class="hero-mask opacity-8 bg-primary"></div>
          <div class="hero-bg hero-bg-scroll" style="background-image:url('../loginForm/images/login-bg.jpg');"></div>
          <div class="hero-content w-100 min-vh-100 d-flex flex-column">
            <div class="row g-0">
              <div class="col-10 col-lg-9 mx-auto">
                <div class="logo mt-5 mb-5 mb-md-0"> <a class="d-flex" href="http://declarapat.gob.mx" title="Declarapat">
                  <img src="{{ asset('landing/images/footer_logo.png') }}" alt="Declarapat"></a>
                </div>
              </div>
            </div>
            <div class="row g-0 my-auto">
              <div class="col-10 col-lg-9 mx-auto">
                <h1 class="text-11 mb-4"><span style="background:#ffe01b;">{{ $config->municipio }}</span></h1>
                <h1 class="text-6 text-white lh-base mb-5">Presenta aquí tu declaración en línea, sin complicaciones.</h1>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Welcome Text End -->

      <!-- Login Form
      ========================= -->
      <div class="col-md-6 d-flex">
        <div class="container my-auto py-5">
          <div class="row g-0">
            <div class="col-10 col-lg-9 col-xl-8 mx-auto">
              <h4 class="fw-600 mb-4">Declaración patrimonial y de interés:</h4>

              @empty($declaracion)
              <div class="d-grid my-4">
                <a class="btn btn-danger">Esta declaración no es válida.</a>
              </div>
              @else
              <div class="d-grid my-4">
                <STRONG>
                {{ $declaracion->declaracion['situacionPatrimonial']['datosGenerales']['nombre'] }}
                {{ $declaracion->declaracion['situacionPatrimonial']['datosGenerales']['primerApellido'] }}
                {{ $declaracion->declaracion['situacionPatrimonial']['datosGenerales']['segundoApellido'] }}
                </STRONG>
                <br>
                <STRONG>
                {{ $declaracion->declaracion['situacionPatrimonial']['datosGenerales']['rfc']['rfc'] }}-{{ $declaracion->declaracion['situacionPatrimonial']['datosGenerales']['rfc']['homoClave'] }}
                </STRONG>
                <br>
                <STRONG>
                DECLARACIÓN {{ $declaracion->metadata['tipo'] }} PRESENTADA EL: {{ $declaracion->metadata['actualizacion']->toDateTime()->format('d-m-Y H:i:s') }}
                </STRONG>
                <br>
                @if($declaracion->avance()['listo'] == true)
                  CUMPLIÓ EN TIEMPO Y FORMA CON SU DECLARACIÓN.

                  <div class="d-grid my-4">
                    <a href="{{ url('declaracion/'.$declaracion->id.'/pdf') }}" target="_blank" class="btn btn-success">
                      Esta declaración es válida (Descargar)
                    </a>
                  </div>
                @else
                  DECLARACIÓN EN PROCESO DE LLENADO.

                  <div class="d-grid my-4">
                    <a target="_blank" class="btn btn-warning">
                      Esta declaración está incompleta
                    </a>
                  </div>
                @endif
              </div>
              @endif

            </div>
          </div>
        </div>
      </div>
      <!-- Login Form End -->
    </div>
  </div>
</div>

<!-- Script -->
<script src="{{ asset('loginForm/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('loginForm/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('loginForm/js/theme.js') }}"></script>
</body>
</html>
@else

@endisset
