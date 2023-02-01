@extends('Panel.os')

@section('wall')
style="background-image: url('app/img/backgrounds/bg1.jpg') !important; background-attachment:fixed !important; padding-bottom:3px;"
@endsection


@section('content')
<div class="app_container">


  <div class="alert alert-warning" role="alert">
    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Cerrar</span></button>
    ¿Sabías que en mayo del 2020, da comienzo el gobierno electrónico? Ya estamos preparando las capacitaciones y manuales para ayudarte en este cambio. <code>ABRIL 2020</code>
  </div>



  <div class="app_icon">
    <a href="{{ url('help') }}">
      <img src="app/img/apps/soporte_icon.png" alt="Soporte"/>
      <span class="app_text">
        Ayuda <br/><br/>
      </span>
    </a>
  </div>



  <div class="app_icon">
    <a href="https://forms.gle/TyFMaLfCkZPz2kYk8" target="_blank">
      <img src="app/img/apps/dpt_icon.png" alt="Declaración Patrimonial"/>
      <span class="app_text">
        Declaración Patrimonial
      </span>
    </a>
  </div>



  <div class="app_icon">
    <a href="{{ url('cms') }}">
      <img src="app/img/apps/web_icon.png" alt="Página Web"/>
      <span class="app_text">
        Página Web<br><br>
      </span>
    </a>
  </div>



  <div class="app_icon">
    <a href="{{ url('pnt') }}">
      <img src="app/img/apps/pnt_icon.png" alt="Transparencia"/>
      <span class="app_text">
        Transparencia <br/><br/>
      </span>
    </a>
  </div>



  <div class="app_icon">
    <a href="{{ url('/sevac') }}">
      <img src="app/img/apps/sevac_icon.png" alt="Sevac"/>
      <span class="app_text">
        Sevac <br/><br/>
      </span>
    </a>
  </div>



  <div class="app_icon">
    <a href="{{ url('mail') }}">
      <img src="app/img/apps/mail_icon.png" alt="Correo" />
      <span class="app_text">
        Correos <br/><br/>
      </span>
    </a>
  </div>



  <div class="app_icon">
    <a href="{{ url('/') }}">
      <img class="proximamente" src="app/img/apps/apy_icon.png" alt="Apoyos"/>
      <span class="app_text proximamente">
        Apoyos <br/><br/>
      </span>
    </a>
  </div>



  <div class="app_icon">
    <a href="{{ url('/') }}">
      <img class="proximamente" src="app/img/apps/atc_icon.png" alt="Atención Ciudadana"/>
      <span class="app_text proximamente">
        Atención Ciudadana <br/>
      </span>
    </a>
  </div>



  <div class="app_icon">
    <a>
      <img src="app/img/apps/vtc_icon.png" class="proximamente" alt="Viáticos"/>
      <span class="app_text proximamente">
        Viáticos<br/><br/>
      </span>
    </a>
  </div>



  <div class="app_icon">
    <a>
      <img class="proximamente" src="app/img/apps/usuarios_icon.png" alt="Declaración Patrimonial"/>
      <span class="app_text proximamente">
        Usuarios <br><br>
      </span>
    </a>
  </div>



  <div class="app_icon">
    <a>
      <img class="proximamente" src="app/img/apps/odp_icon.png" alt="Declaración Patrimonial"/>
      <span class="app_text proximamente">
        Oficialía de Partes
      </span>
    </a>
  </div>



  <div class="app_icon">
    <a>
      <img class="proximamente" src="app/img/apps/rut_icon.png" alt="Declaración Patrimonial"/>
      <span class="app_text proximamente">
        Trámites en Línea
      </span>
    </a>
  </div>


  <div class="app_icon">
    <a>
      <img class="proximamente" src="app/img/apps/fiel_icon.png" alt="Firma Electrónica"/>
      <span class="app_text proximamente">
        Firma electrónica
      </span>
    </a>
  </div>



  <div class="app_icon">
    <a>
      <img class="proximamente" src="app/img/apps/noi_icon.png" alt="Nómina"/>
      <span class="app_text proximamente">
        Nómina <br><br>
      </span>
    </a>
  </div>



  <div class="app_icon">
    <a>
      <img class="proximamente" src="app/img/apps/proximamente_icon.png" alt="Declaración Patrimonial"/>
      <span class="app_text proximamente">
        Sistema Contable
      </span>
    </a>
  </div>



  <div class="app_icon">
    <a>
      <img class="proximamente" src="app/img/apps/proximamente_icon.png" alt="Declaración Patrimonial"/>
      <span class="app_text proximamente">
        Predial <br/><br/>
      </span>
    </a>
  </div>



  <div class="app_icon">
    <a>
      <img class="proximamente" src="app/img/apps/proximamente_icon.png" alt="Declaración Patrimonial"/>
      <span class="app_text proximamente">
        Nomina <br/><br/>
      </span>
    </a>
  </div>



  <div class="app_icon">
    <a>
      <img class="proximamente" src="app/img/apps/proximamente_icon.png" alt="Declaración Patrimonial"/>
      <span class="app_text proximamente">
        Agenda Municipal
      </span>
    </a>
  </div>



  <div class="app_icon">
    <a>
      <img class="proximamente" src="app/img/apps/proximamente_icon.png" alt="Declaración Patrimonial"/>
      <span class="app_text proximamente">
        Trámites en Línea
      </span>
    </a>
  </div>



  <div class="app_icon">
    <a>
      <img class="proximamente" src="app/img/apps/proximamente_icon.png" alt="Declaración Patrimonial"/>
      <span class="app_text proximamente">
        Atención Ciudadana
      </span>
    </a>
  </div>



  <div class="app_icon">
    <a>
      <img class="proximamente" src="app/img/apps/proximamente_icon.png" alt="Declaración Patrimonial"/>
      <span class="app_text proximamente">
        Contraloría <br/><br/>
      </span>
    </a>
  </div>



  <div class="app_icon">
    <a>
      <img class="proximamente" src="app/img/apps/proximamente_icon.png" alt="Declaración Patrimonial"/>
      <span class="app_text proximamente">
        Catastro <br/><br/>
      </span>
    </a>
  </div>



  <div class="app_icon">
    <a>
      <img class="proximamente" src="app/img/apps/proximamente_icon.png" alt="Declaración Patrimonial"/>
      <span class="app_text proximamente">
        Planeación <br/><br/>
      </span>
    </a>
  </div>



  <div class="app_icon">
    <a>
      <img class="proximamente" src="app/img/apps/proximamente_icon.png" alt="Declaración Patrimonial"/>
      <span class="app_text proximamente">
        Requisiciones<br/><br/>
      </span>
    </a>
  </div>



  <div class="app_icon">
    <a>
      <img class="proximamente" src="app/img/apps/proximamente_icon.png" alt="Declaración Patrimonial"/>
      <span class="app_text proximamente">
        Facturación <br/><br/>
      </span>
    </a>
  </div>



  <div class="app_icon">
    <a>
      <img class="proximamente" src="app/img/apps/proximamente_icon.png" alt="Declaración Patrimonial"/>
      <span class="app_text proximamente">
        Obras <br/><br/>
      </span>
    </a>
  </div>



  <div class="app_icon">
    <a>
      <img class="proximamente" src="app/img/apps/proximamente_icon.png" alt="Declaración Patrimonial"/>
      <span class="app_text proximamente">
        Pagos en línea<br/><br/>
      </span>
    </a>
  </div>



  <div class="app_icon">
    <a>
      <img class="proximamente" src="app/img/apps/proximamente_icon.png" alt="Declaración Patrimonial"/>
      <span class="app_text proximamente">
        Caja <br/><br/>
      </span>
    </a>
  </div>



  <div class="app_icon">
    <a>
      <img class="proximamente" src="app/img/apps/proximamente_icon.png" alt="Declaración Patrimonial"/>
      <span class="app_text proximamente">
        Agua <br/><br/>
      </span>
    </a>
  </div>

</div>
@endsection
