<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
  <title>{{ config('app.name', 'Declarapat') }}</title>
  <style>
  body {
    font-family: 'Helvetica';
    text-transform:uppercase;
    font-size: 9;
    line-height:1.6;
    background: url("{{ URL::asset('images') }}/bg_declaracion.png");
    background-repeat: no-repeat;
    background-position: center;
  }
  table th {
    text-align: left;
  }
  </style>
</head>


<body>
<p style="text-align:center;">
<strong>
SECRETARÍA DE LA FUNCIÓN PÚBLICA<br>
DECLARACIÓN DE SITUACIÓN PATRIMONIAL Y DE INTERESES DE LOS SERVIDORES PÚBLICOS<br>
DECLARACIÓN ({{ $declaracion->metadata['tipo'] }}) VERSIÓN PÚBLICA
</strong>
</p>

<br>

<p>
<strong>C. SECRETARIO DE LA FUNCIÓN PÚBLICA Y CONTRALORÍA</strong><br>
BAJO PROTESTA DE DECIR VERDAD, PRESENTO A USTED MI DECLARACIÓN DE SITUACIÓN PATRIMONIAL Y DE INTERESES, CONFORME A LO DISPUESTO
EN LA LEY GENERAL DE RESPONSABILIDADES ADMINISTRATIVAS, LA LEY GENERAL DEL SISTEMA NACIONAL ANTICORRUPCIÓN Y LA NORMATIVIDAD
APLICABLE.
</p>

<p style="text-align:right;">
  <strong>
  {{ $declaracion->declaracion['situacionPatrimonial']['datosGenerales']['rfc']['rfc'] }}-{{ $declaracion->declaracion['situacionPatrimonial']['datosGenerales']['rfc']['homoClave'] }}
  <br>
  FECHA DE RECEPCIÓN:
  {{ $declaracion->metadata['actualizacion']->toDateTime()->format('d-m-Y H:i:s') }}
  </strong>
</p>

<br>

<h3>1.- Datos Generales</h3>

<table>
  <tr>
    <th>Nombre(s):</th>
    <td>
      {{ $declaracion->declaracion['situacionPatrimonial']['datosGenerales']['nombre'] }}
      {{ $declaracion->declaracion['situacionPatrimonial']['datosGenerales']['primerApellido'] }}
      {{ $declaracion->declaracion['situacionPatrimonial']['datosGenerales']['segundoApellido'] }}
      / <strong>Email institucional:</strong> {{ $declaracion->declaracion['situacionPatrimonial']['datosGenerales']['correoElectronico']['institucional'] }}
    </td>
  </tr>
</table>


<h3>2.- Domicilio del declarante</h3>
<table>
  <tr>
    <th>Datos privados:</th>
    <td>De acuerdo a la ley de protección de datos personales, estos datos no serán públicos.</td>
  </tr>
</table>


<h3>3.- Datos curriculares</h3>
<table>
  @foreach($declaracion->declaracion['situacionPatrimonial']['datosCurricularesDeclarante']['escolaridad'] as $escolaridad)
  <tr>
    <th>Nivel:</th>
    <td>{{ $escolaridad['nivel']['valor'] }}, {{ $escolaridad['carreraAreaConocimiento'] }}, ({{ $escolaridad['estatus'] }}) / <strong>Documento:</strong> {{ $escolaridad['documentoObtenido'] }}, Obtenido el: {{ $escolaridad['fechaObtencion'] }}</td>
  </tr>
  <tr>
    <th>Institución:</th>
    <td>{{ $escolaridad['institucionEducativa']['nombre'] }}, {{ $escolaridad['institucionEducativa']['ubicacion'] }}</td>
  </tr>
  @endforeach
</table>


<h3>4.- Datos del empleo, cargo o comisión que inicia</h3>
<table>
  <tr>
    <th>Ente:</th>
    <td>{{ $declaracion->declaracion['situacionPatrimonial']['datosEmpleoCargoComision']['nombreEntePublico'] }} / <strong>Gobierno</strong> {{ $declaracion->declaracion['situacionPatrimonial']['datosEmpleoCargoComision']['nivelOrdenGobierno'] }} / <strong>Ámbito público</strong>: {{ $declaracion->declaracion['situacionPatrimonial']['datosEmpleoCargoComision']['ambitoPublico'] }}</td>
  </tr>
  <tr>
    <th>Empleo:</th>
    <td>{{ $declaracion->declaracion['situacionPatrimonial']['datosEmpleoCargoComision']['empleoCargoComision'] }} / <strong>Área de adscripción</strong>: {{ $declaracion->declaracion['situacionPatrimonial']['datosEmpleoCargoComision']['areaAdscripcion'] }} / <strong>Por honorarios</strong>: @if($declaracion->declaracion['situacionPatrimonial']['datosEmpleoCargoComision']['contratadoPorHonorarios'] == true) SÍ @else NO @endif / <strong>Nivel:</strong> {{ $declaracion->declaracion['situacionPatrimonial']['datosEmpleoCargoComision']['nivelEmpleoCargoComision'] }}</td>
  </tr>
  <tr>
    <th>Función:</th>
    <td>{{ $declaracion->declaracion['situacionPatrimonial']['datosEmpleoCargoComision']['funcionPrincipal'] }} / <strong>Fecha posesión:</strong> {{ $declaracion->declaracion['situacionPatrimonial']['datosEmpleoCargoComision']['fechaTomaPosesion'] }} / <strong>Teléfono:</strong>{{ $declaracion->declaracion['situacionPatrimonial']['datosEmpleoCargoComision']['telefonoOficina']['telefono'] }} <strong>Ext:</strong> {{ $declaracion->declaracion['situacionPatrimonial']['datosEmpleoCargoComision']['telefonoOficina']['extension'] }}</td>
  </tr>
  <tr>
    <th>Domicilio:</th>
    <td>
      @isset($declaracion->declaracion['situacionPatrimonial']['datosEmpleoCargoComision']['domicilioMexico'])
        {{ $declaracion->declaracion['situacionPatrimonial']['datosEmpleoCargoComision']['domicilioMexico']['calle'] }},
        NO: {{ $declaracion->declaracion['situacionPatrimonial']['datosEmpleoCargoComision']['domicilioMexico']['numeroExterior'] }},
        INT: {{ $declaracion->declaracion['situacionPatrimonial']['datosEmpleoCargoComision']['domicilioMexico']['numeroInterior'] }},
        COL.: {{ $declaracion->declaracion['situacionPatrimonial']['datosEmpleoCargoComision']['domicilioMexico']['coloniaLocalidad'] }},
        {{ $declaracion->declaracion['situacionPatrimonial']['datosEmpleoCargoComision']['domicilioMexico']['municipioAlcaldia']['valor'] }},
        {{ $declaracion->declaracion['situacionPatrimonial']['datosEmpleoCargoComision']['domicilioMexico']['entidadFederativa']['valor'] }},
        {{ $declaracion->declaracion['situacionPatrimonial']['datosEmpleoCargoComision']['domicilioMexico']['codigoPostal'] }},
      @else
        {{ $declaracion->declaracion['situacionPatrimonial']['datosEmpleoCargoComision']['domicilioExtranjero']['calle'] }},
        NO: {{ $declaracion->declaracion['situacionPatrimonial']['datosEmpleoCargoComision']['domicilioExtranjero']['numeroExterior'] }},
        INT: {{ $declaracion->declaracion['situacionPatrimonial']['datosEmpleoCargoComision']['domicilioExtranjero']['numeroInterior'] }},
        COL.: {{ $declaracion->declaracion['situacionPatrimonial']['datosEmpleoCargoComision']['domicilioExtranjero']['ciudadLocalidad'] }},
        {{ $declaracion->declaracion['situacionPatrimonial']['datosEmpleoCargoComision']['domicilioExtranjero']['estadoProvincia'] }},
        {{ $declaracion->declaracion['situacionPatrimonial']['datosEmpleoCargoComision']['domicilioExtranjero']['pais'] }},
        {{ $declaracion->declaracion['situacionPatrimonial']['datosEmpleoCargoComision']['domicilioExtranjero']['codigoPostal'] }},
      @endif
    </td>
  </tr>
</table>


<h3>5.- EXPERIENCIA LABORAL</h3>
<table>
  @foreach($declaracion->declaracion['situacionPatrimonial']['experienciaLaboral']['experiencia'] as $experiencia)
    @if($experiencia['ambitoSector']['clave'] == "PUB")
    <tr>
      <th>EMPLEO:</th>
      <td>{{ $experiencia['empleoCargoComision'] }}</td>
    </tr>
    <tr>
      <th>ÁMBITO:</th>
      <td>{{ $experiencia['ambitoSector']['valor'] }} / {{ $experiencia['ambitoPublico'] }}, <strong>GOBIERNO:</strong> {{ $experiencia['nivelOrdenGobierno'] }},</td>
    </tr>
    <tr>
      <th>ENTE:</th>
      <td>{{ $experiencia['nombreEntePublico'] }} / <strong>UBICACIÓN:</strong> {{ $experiencia['ubicacion'] }}/ <strong>AREA DE ADSCRIPCIÓN:</strong> {{ $experiencia['areaAdscripcion'] }} / <strong>FUNCIÓN:</strong> {{ $experiencia['funcionPrincipal'] }}</td>
    </tr>
    <tr>
      <th>FECHAS:</th>
      <td><strong>INGRESO:</strong> {{ $experiencia['fechaIngreso'] }} / <strong>ENGRESO:</strong> {{ $experiencia['fechaEgreso'] }}</td>
    </tr>
    @else
    <tr>
      <th>EMPLEO:</th>
      <td>{{ $experiencia['puesto'] }}</td>
    </tr>
    <tr>
      <th>EMPRESA:</th>
      <td>{{ $experiencia['nombreEmpresaSociedadAsociacion'] }} / <strong>RFC:</strong> {{ $experiencia['rfc'] }} / <strong>SECTOR:</strong> {{ $experiencia['sector']['valor'] }} / <strong>UBICACIÓN:</strong> {{ $experiencia['ubicacion'] }}</td>
    </tr>
    <tr>
      <th>ÁREA:</th>
      <td>{{ $experiencia['area'] }} / <strong>PUESTO:</strong> {{ $experiencia['puesto'] }} / <strong>INGRESO:</strong> {{ $experiencia['fechaIngreso'] }} / <strong>ENGRESO:</strong> {{ $experiencia['fechaEgreso'] }}</td>
    </tr>
    <tr>
      <th></th>
      <td></td>
    </tr>
    @endif
  @endforeach
</table>


<h3>6.- Datos de pareja</h3>
<table>
  <tr>
    <th>Datos privados:</th>
    <td>De acuerdo a la ley de protección de datos personales, estos datos no serán públicos.</td>
  </tr>
</table>


<h3>7.- Datos del dependiente económico</h3>
<table>
  <tr>
    <th>Datos privados:</th>
    <td>De acuerdo a la ley de protección de datos personales, estos datos no serán públicos.</td>
  </tr>
</table>


<h3>8.- Ingresos netos</h3>
<table>
  <tr>
    <th style="width:80%">I.- REMUNERACIÓN ANUAL NETA DEL DECLARANTE POR SU CARGO PÚBLICO. (DEDUCE IMPUESTOS</th>
    @isset($declaracion->declaracion['situacionPatrimonial']['ingresos']['remuneracionMensualCargoPublico'])
    <td style="text-align:right;">$@money($declaracion->declaracion['situacionPatrimonial']['ingresos']['remuneracionMensualCargoPublico']['valor']) MXN</td>
    @endisset
    @isset($declaracion->declaracion['situacionPatrimonial']['ingresos']['remuneracionConclusionCargoPublico'])
    <td style="text-align:right;">$@money($declaracion->declaracion['situacionPatrimonial']['ingresos']['remuneracionConclusionCargoPublico']['valor']) MXN</td>
    @endisset
  </tr>
  <tr>
    <th style="width:80%">II. OTROS INGRESOS ANUALES NETOS DEL DECLARANTE. (SUMA II.1 A II.4)</th>
    @isset($declaracion->declaracion['situacionPatrimonial']['ingresos']['otrosIngresosMensualesTotal'])
    <td style="text-align:right;">$@money($declaracion->declaracion['situacionPatrimonial']['ingresos']['otrosIngresosMensualesTotal']['valor']) MXN</td>
    @endisset
    @isset($declaracion->declaracion['situacionPatrimonial']['ingresos']['otrosIngresosConclusionTotal'])
    <td style="text-align:right;">$@money($declaracion->declaracion['situacionPatrimonial']['ingresos']['otrosIngresosConclusionTotal']['valor']) MXN</td>
    @endisset
  </tr>
  <tr>
    <th style="width:80%">II.1 POR ACTIVIDAD INDUSTRIAL Y/O COMERCIAL (DEDUCE IMPUESTOS)</th>
    <td style="text-align:right;">$@money($declaracion->declaracion['situacionPatrimonial']['ingresos']['actividadIndustrialComercialEmpresarial']['remuneracionTotal']['valor']) MXN</td>
  </tr>
  <tr>
    <th style="width:80%">I.2.- POR ACTIVIDAD FINANCIERA (RENDIMIENTOS O GANANCIAS) (DESPUÉS DE IMPUESTOS)</th>
    <td style="text-align:right;">$@money($declaracion->declaracion['situacionPatrimonial']['ingresos']['actividadFinanciera']['remuneracionTotal']['valor']) MXN</td>
  </tr>
  <tr>
    <th style="width:80%">II.3.- POR SERVICIOS PROFESIONALES, CONSEJOS, CONSULTORÍAS Y / O ASESORÍAS (DESPUÉS DE IMPUESTOS)</th>
    <td style="text-align:right;">$@money($declaracion->declaracion['situacionPatrimonial']['ingresos']['serviciosProfesionales']['remuneracionTotal']['valor']) MXN</td>
  </tr>
  <tr>
    <th style="width:80%">II.4.- OTROS INGRESOS NO CONSIDERADOS A LOS ANTERIORES (DESPÚES DE IMPUESTOS)</th>
    <td style="text-align:right;">$@money($declaracion->declaracion['situacionPatrimonial']['ingresos']['otrosIngresos']['remuneracionTotal']['valor']) MXN</td>
  </tr>
  <tr>
    <th style="width:80%">A.- INGRESO MENSUAL NETO DEL DECLARANTE (SUMA DEL NUMERAL I Y II))</th>
    @isset($declaracion->declaracion['situacionPatrimonial']['ingresos']['totalIngresosMensualesNetos'])
    <td style="text-align:right;">$@money($declaracion->declaracion['situacionPatrimonial']['ingresos']['totalIngresosMensualesNetos']['valor']) MXN</td>
    @endisset
    @isset($declaracion->declaracion['situacionPatrimonial']['ingresos']['totalIngresosConclusionNetos'])
    <td style="text-align:right;">$@money($declaracion->declaracion['situacionPatrimonial']['ingresos']['totalIngresosConclusionNetos']['valor']) MXN</td>
    @endisset
  </tr>
  <tr>
    <th style="width:80%">B.- INGRESO MENSUAL NETO DE LA PAREJA Y / O DEPENDIENTES ECONÓMICOS (DESPUÉS DE IMPUESTOS)</th>
    <td style="text-align:right;">PRIVADO POR LEY</td>
  </tr>
</table>


<h3>9.- ¿TE DESEMPEÑASTE COMO SERVIDOR PÚBLICO EN EL AÑO INMEDIATO ANTERIOR?</h3>
@isset($declaracion->declaracion['situacionPatrimonial']['actividadAnualAnterior'])
  @if($declaracion->declaracion['situacionPatrimonial']['actividadAnualAnterior']['servidorPublicoAnioAnterior'] == false)
  <table>
    <tr>
      <th style="width:80%">I.- REMUNERACIÓN ANUAL NETA DEL DECLARANTE POR SU CARGO PÚBLICO. (DEDUCE IMPUESTOS)</th>
      <td style="text-align:right;">$@money($declaracion->declaracion['situacionPatrimonial']['actividadAnualAnterior']['remuneracionNetaCargoPublico']['valor']) MXN</td>
    </tr>
    <tr>
      <th style="width:80%">II. OTROS INGRESOS ANUALES NETOS DEL DECLARANTE. (SUMA II.1 A II.4)</th>
      <td style="text-align:right;">$@money($declaracion->declaracion['situacionPatrimonial']['actividadAnualAnterior']['otrosIngresosTotal']['valor']) MXN</td>
    </tr>
    <tr>
      <th style="width:80%">II.1 POR ACTIVIDAD INDUSTRIAL Y/O COMERCIAL (DEDUCE IMPUESTOS)</th>
      <td style="text-align:right;">$$@money($declaracion->declaracion['situacionPatrimonial']['actividadAnualAnterior']['actividadIndustrialComercialEmpresarial']['remuneracionTotal']['valor']) MXN</td>
    </tr>
    <tr>
      <th style="width:80%">I.2.- POR ACTIVIDAD FINANCIERA (RENDIMIENTOS O GANANCIAS) (DESPUÉS DE IMPUESTOS)</th>
      <td style="text-align:right;">$$@money($declaracion->declaracion['situacionPatrimonial']['actividadAnualAnterior']['actividadFinanciera']['remuneracionTotal']['valor']) MXN</td>
    </tr>
    <tr>
      <th style="width:80%">II.3.- POR SERVICIOS PROFESIONALES, CONSEJOS, CONSULTORÍAS Y / O ASESORÍAS (DESPUÉS DE IMPUESTOS)</th>
      <td style="text-align:right;">$@money($declaracion->declaracion['situacionPatrimonial']['actividadAnualAnterior']['serviciosProfesionales']['remuneracionTotal']['valor']) MXN</td>
    </tr>
    <tr>
      <th style="width:80%">II.4.- OTROS INGRESOS NO CONSIDERADOS A LOS ANTERIORES (DESPÚES DE IMPUESTOS)</th>
      <td style="text-align:right;">$@money($declaracion->declaracion['situacionPatrimonial']['actividadAnualAnterior']['otrosIngresos']['remuneracionTotal']['valor']) MXN</td>
    </tr>
    <tr>
      <th style="width:80%">A.- INGRESO MENSUAL NETO DEL DECLARANTE (SUMA DEL NUMERAL I Y II))</th>
      <td style="text-align:right;">$@money($declaracion->declaracion['situacionPatrimonial']['actividadAnualAnterior']['totalIngresosNetosAnuales']['valor']) MXN</td>
    </tr>
    <tr>
      <th style="width:80%">B.- INGRESO MENSUAL NETO DE LA PAREJA Y / O DEPENDIENTES ECONÓMICOS (DESPUÉS DE IMPUESTOS)</th>
      <td style="text-align:right;">PRIVADO POR LEY</td>
    </tr>
  </table>
  @else
  <table>
    <tr>
      <th>SIN TRABAJOS COMO SERVIDOR PÚBLICO ANTERIORES</th>
    </tr>
  </table>
  @endif








@if($declaracion->metadata['declaracionCompleta'] == true)

<h3>10.- BIENES INMUEBLES</h3>
<table>
@foreach($declaracion->declaracion['situacionPatrimonial']['bienesInmuebles']['bienInmueble'] as $inmueble)
  @foreach($inmueble['titular'] as $titular)
    @if($titular['clave'] == "DEC")
    <tr>
      <td>
        {{ $inmueble['tipoInmueble']['valor'] }}
        <strong>Terreno:</strong> {{ $inmueble['superficieTerreno']['valor'] }} {{ $inmueble['superficieTerreno']['unidad'] }}
        <strong>Construcción:</strong> {{ $inmueble['superficieConstruccion']['valor'] }} {{ $inmueble['superficieConstruccion']['unidad'] }}
        <strong>Titular:</strong> Declarante <strong>Adquisición:</strong> {{ $inmueble['formaAdquisicion']['valor'] }}
        <strong>Pago:</strong> {{ $inmueble['formaPago'] }} <strong>Valor:</strong> $@money($inmueble['valorAdquisicion']['valor']) {{ $inmueble['valorAdquisicion']['moneda'] }} {{ $inmueble['fechaAdquisicion'] }} <strong>Conforme a:</strong> {{ $inmueble['valorConformeA'] }}
      </td>
    </tr>
    @endif
  @endforeach
@endforeach
</table>



<h3>11.- VEHÍCULOS</h3>
<table>
@foreach($declaracion->declaracion['situacionPatrimonial']['vehiculos']['vehiculo'] as $vehiculo)
  @foreach($vehiculo['titular'] as $titular)
    @if($titular['clave'] == "DEC")
    <tr>
      <th>Vehículo:</th>
      <td>
        {{ $vehiculo['tipoVehiculo']['valor'] }}
        {{ $vehiculo['marca'] }} {{ $vehiculo['modelo'] }} {{ $vehiculo['anio'] }}
        <strong>Adquisición:</strong> {{ $vehiculo['formaAdquisicion']['valor'] }}
        <strong>Pago:</strong> {{ $vehiculo['formaPago'] }} <strong>Valor:</strong> $@money($vehiculo['valorAdquisicion']['valor']) {{ $vehiculo['valorAdquisicion']['moneda'] }} {{ $vehiculo['fechaAdquisicion'] }}
        <strong>Titular:</strong> Declarante
      </td>
    </tr>
    @endif
  @endforeach
@endforeach
</table>



<h3>12.- BIENES MUEBLES:</h3>
<table>
@foreach($declaracion->declaracion['situacionPatrimonial']['bienesMuebles']['bienMueble'] as $mueble)
  @foreach($mueble['titular'] as $titular)
    @if($titular['clave'] == "DEC")
    <tr>
      <th>Bien Mueble:</th>
      <td>
        {{ $mueble['tipoBien']['valor'] }}
        {{ $mueble['descripcionGeneralBien'] }}
        <strong>Adquisición:</strong> {{ $mueble['formaAdquisicion']['valor'] }}
        <strong>Pago:</strong> {{ $mueble['formaPago'] }} <strong>Valor:</strong> $@money($mueble['valorAdquisicion']['valor']) {{ $mueble['valorAdquisicion']['moneda'] }} {{ $mueble['fechaAdquisicion'] }}
        <strong>Titular:</strong> Declarante
      </td>
    </tr>
    @endif
  @endforeach
@endforeach
</table>



<h3>13.- INVERSIONES, CUENTAS BANCARIAS Y OTRO TIPO DE VALORES:</h3>
<table>
@foreach($declaracion->declaracion['situacionPatrimonial']['inversionesCuentasValores']['inversion'] as $fila)
  @foreach($fila['titular'] as $titular)
    @if($titular['clave'] == "DEC")
    <tr>
      <th>Cuenta/Inversión:</th>
      <td>
        {{ $fila['tipoInversion']['valor'] }} {{ $fila['subTipoInversion']['valor'] }}
        {{ $fila['localizacionInversion']['pais'] }} {{ $fila['localizacionInversion']['institucionRazonSocial'] }}
        <strong>Titular:</strong> Declarante
      </td>
    </tr>
    @endif
  @endforeach
@endforeach
</table>



<h3>14.- ADEUDOS/PASIVOS:</h3>
<table>
@foreach($declaracion->declaracion['situacionPatrimonial']['adeudosPasivos']['adeudo'] as $fila)
  @foreach($fila['titular'] as $titular)
    @if($titular['clave'] == "DEC")
    <tr>
      <th>Adeudo/Pasivo:</th>
      <td>
        {{ $fila['tipoAdeudo']['valor'] }}
        {{ $fila['fechaAdquisicion'] }}
        {{ $fila['localizacionAdeudo']['pais'] }}
        @if($fila['otorganteCredito']['tipoPersona'] == "MORAL")
        {{ $fila['otorganteCredito']['nombreInstitucion'] }}
        @endif
        <strong>Titular:</strong> Declarante
      </td>
    </tr>
    @endif
  @endforeach
@endforeach
</table>



<h3>15.- PRÉSTAMO O COMODATO POR TERCEROS:</h3>
<table>
@foreach($declaracion->declaracion['situacionPatrimonial']['prestamoComodato']['prestamo'] as $fila)
  <tr>
    <th>Préstamo:</th>
    @isset($fila['tipoBien']['inmueble'])
    <td>
      {{ $fila['tipoBien']['inmueble']['tipoInmueble']['valor'] }}
    </td>
    @else
    <td>
      {{ $fila['tipoBien']['vehiculo']['tipo']['valor'] }}
      {{ $fila['tipoBien']['vehiculo']['marca'] }}
      {{ $fila['tipoBien']['vehiculo']['modelo'] }}
      {{ $fila['tipoBien']['vehiculo']['anio'] }}
    </td>
    @endif
  </tr>
@endforeach
</table>



<h3>16.- Participación en empresas, sociedades o asociaciones:</h3>
<table>
@foreach($declaracion->declaracion['interes']['participacion']['participacion'] as $fila)
  @if($fila['tipoRelacion'] == "DECLARANTE")
    <tr>
      <th>Participación:</th>
      <td>
        <strong>Participante:</strong> {{ $fila['tipoRelacion'] }}
        <strong>Empresa:</strong>
        {{ $fila['nombreEmpresaSociedadAsociacion'] }}
        {{ $fila['rfc'] }}
        <strong>Participación:</strong>
        {{ $fila['porcentajeParticipacion'] }}%
        {{ $fila['tipoParticipacion']['valor'] }}

        <strong>Remuneración:</strong>
        @if($fila['recibeRemuneracion'] == true)
        CON REMUNERACIÓN
        @else
        SIN REMUNERACIÓN
        @endif

        @isset($fila['montoMensual'])
          @money($fila['montoMensual']['valor']) {{ $fila['montoMensual']['moneda'] }}
        @endif

        {{ $fila['ubicacion']['pais'] }}         {{ $fila['ubicacion']['entidadFederativa']['valor'] }}
        {{ $fila['sector']['valor'] }}
      </td>
    </tr>
  @endif
@endforeach
</table>



<h3>17.- ¿Participa en la toma de decisiones de alguna de estas instituciones?:</h3>
<table>
@forelse($declaracion->declaracion['interes']['participacionTomaDecisiones']['participacion'] as $fila)
  @if($fila['tipoRelacion'] == "DECLARANTE")
    <tr>
      <th>Participación:</th>
      <td>
        <strong>Participante:</strong> {{ $fila['tipoRelacion'] }}
        <strong>Institución:</strong>
        {{ $fila['tipoInstitucion']['valor'] }}
        {{ $fila['nombreInstitucion'] }}
        {{ $fila['rfc'] }}
        <strong>Rol:</strong>
        {{ $fila['puestoRol'] }}
        {{ $fila['fechaInicioParticipacion'] }}
        <strong>Remuneración:</strong>
        @if($fila['recibeRemuneracion'] == true)
        CON REMUNERACIÓN
        @else
        SIN REMUNERACIÓN
        @endif

        @isset($fila['montoMensual'])
          @money($fila['montoMensual']['valor']) {{ $fila['montoMensual']['moneda'] }}
        @endif

        <strong>Ubicación:</strong>
        {{ $fila['ubicacion']['pais'] }}
        {{ $fila['ubicacion']['entidadFederativa']['valor'] }}
      </td>
    </tr>
  @endif
@empty
<tr>
  <th>Participación:</th>
  <td>NO SE PROPORCIONÓ INFORMACIÓN O ES PRIVADA DE ACUERDO A LA LEY DE DATOS PERSONALES</td>
</tr>
@endforelse
</table>



<h3>18.- Apoyos o beneficios públicos:</h3>
<table>
@forelse($declaracion->declaracion['interes']['apoyos']['apoyo'] as $fila)
    <tr>
      <th>Apoyo:</th>
      <td>
        <strong>Beneficiario:</strong> {{ $fila['beneficiarioPrograma']['valor'] }}
        <strong>Programa:</strong>
        {{ $fila['nombrePrograma'] }}
        <strong>Otorgante:</strong>
        {{ $fila['institucionOtorgante'] }}
        {{ $fila['nivelOrdenGobierno'] }}
        <strong>Apoyo:</strong>
        {{ $fila['tipoApoyo']['valor'] }}
        {{ $fila['formaRecepcion'] }}

        @isset($fila['montoApoyoMensual'])
          @money($fila['montoApoyoMensual']['valor']) {{ $fila['montoApoyoMensual']['moneda'] }}
        @endif

        @isset($fila['especifiqueApoyo'])
          {{ $fila['especifiqueApoyo'] }}
        @endif
      </td>
    </tr>
@empty
<tr>
  <th>Participación:</th>
  <td>NO SE PROPORCIONÓ INFORMACIÓN O ES PRIVADA DE ACUERDO A LA LEY DE DATOS PERSONALES</td>
</tr>
@endforelse
</table>



<h3>19.- Representación:</h3>
<table>
@forelse($declaracion->declaracion['interes']['representaciones']['representacion'] as $fila)
    <tr>
      <th>Representación:</th>
      <td>
        <strong>Representación:</strong> {{ $fila['tipoRepresentacion'] }} {{ $fila['fechaInicioRepresentacion'] }}
        @if($fila['tipoPersona'] == "FISICA")
        {{ $fila['tipoPersona'] }}
        {{ $fila['nombreRazonSocial'] }}
        {{ $fila['rfc'] }}
        @endif
        @if($fila['recibeRemuneracion'] == true)
        CON REMUNERACIÓN
        @else
        SIN REMUNERACIÓN
        @endif

        @isset($fila['montoMensual'])
          @money($fila['montoMensual']['valor']) {{ $fila['montoMensual']['moneda'] }}
        @endif

        <strong>Ubicación:</strong>
        {{ $fila['ubicacion']['pais'] }}
        {{ $fila['ubicacion']['entidadFederativa']['valor'] }}

        {{ $fila['sector']['valor'] }}
      </td>
    </tr>
@empty
<tr>
  <th>Participación:</th>
  <td>NO SE PROPORCIONÓ INFORMACIÓN O ES PRIVADA DE ACUERDO A LA LEY DE DATOS PERSONALES</td>
</tr>
@endforelse
</table>



<h3>20.- Clientes principales:</h3>
<table>
@forelse($declaracion->declaracion['interes']['clientesPrincipales']['cliente'] as $fila)
  @if($fila['tipoRelacion'] == "DECLARANTE")
    <tr>
      <th>Cliente:</th>
      <td>
        {{ $fila['tipoRelacion'] }}
        <strong>Empresa que ofrece el servicio:</strong>
        {{ $fila['empresa']['nombreEmpresaServicio'] }}
        {{ $fila['empresa']['rfc'] }}
        <strong>Cliente:</strong>
        {{ $fila['clientePrincipal']['tipoPersona'] }}
        {{ $fila['clientePrincipal']['nombreRazonSocial'] }}
        {{ $fila['clientePrincipal']['rfc'] }}
        {{ $fila['sector']['valor'] }}
        <strong>Ganancia:</strong>
        @isset($fila['montoAproximadoGanancia'])
          @money($fila['montoAproximadoGanancia']['valor']) {{ $fila['montoAproximadoGanancia']['moneda'] }}
        @endif
        <strong>Ubicación:</strong>
        {{ $fila['ubicacion']['pais'] }}
        {{ $fila['ubicacion']['entidadFederativa']['valor'] }}
      </td>
    </tr>
  @endif
@empty
  <tr>
    <th>Participación:</th>
    <td>NO SE PROPORCIONÓ INFORMACIÓN O ES PRIVADA DE ACUERDO A LA LEY DE DATOS PERSONALES</td>
  </tr>
@endforelse
</table>



<h3>21.- Beneficios privados:</h3>
<table>
@forelse($declaracion->declaracion['interes']['clientesPrincipales']['cliente'] as $fila)
  @if($fila['tipoRelacion'] == "DECLARANTE")
    <tr>
      <th>Beneficio:</th>
      <td>



        @isset($fila['montoMensualAproximado'])
          @money($fila['montoMensualAproximado']['valor']) {{ $fila['montoMensualAproximado']['moneda'] }}
        @endif

        @isset($fila['especifiqueBeneficio'])
          {{ $fila['especifiqueApoyo'] }}
        @endif

        <strong>Sector:</strong>
        {{ $fila['sector']['valor'] }}
      </td>
    </tr>
  @endif
@empty
  <tr>
    <th>Participación:</th>
    <td>NO SE PROPORCIONÓ INFORMACIÓN O ES PRIVADA DE ACUERDO A LA LEY DE DATOS PERSONALES</td>
  </tr>
@endforelse
</table>



<h3>22.- Fideicomisos:</h3>
<table>
  <tr>
    <th>Participación:</th>
    <td>NO SE PROPORCIONÓ INFORMACIÓN O ES PRIVADA DE ACUERDO A LA LEY DE DATOS PERSONALES</td>
  </tr>
</table>





@endif


@endisset
</body>
</html>
