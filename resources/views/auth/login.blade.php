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
          <div class="hero-bg hero-bg-scroll" style="background-image:url('loginForm/images/login-bg.jpg');"></div>
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
                <h1 class="text-11 mb-4"><span style="background:#ffe01b;">municipio </span></h1>
                <h1 class="text-6 text-white lh-base mb-5">Página web.</h1>
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
              <h4 class="fw-600 mb-4">Página web:</h4>

              <form method="POST" action="{{ route('login') }}" id="loginForm" >
                @csrf
                <div class="mb-3">
                  <label for="rfc" class="form-label">Ingresa tu usuario:</label>
                  <input type="text" id="rfc" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="off" autofocus placeholder="RFC con Homoclave">
                  @error('email')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="loginPassword" class="form-label">Ingresa tu contraseña:</label>
                  <input id="loginPassword" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Contraseña">
                  @error('password')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
                <div class="row mt-4">
                  <div class="col text-end"><a href="#">¿Olvidaste tu contraseña?</a></div>
                </div>
                <div class="d-grid my-4">
									<button class="btn btn-primary" type="submit">Entrar</button>
								</div>
              </form>
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
