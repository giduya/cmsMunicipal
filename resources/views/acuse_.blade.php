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
<h4 class="mb-3">Protesto lo necesario:</h4>

  <fieldset>
    <p style="text-align: justify !important">
      Con fundamento en los artículos 108 y 109 de la Constitución Política de los Estados Unidos Mexicanos; 1, 2, 14, 16, 26 y 37, fracción XVI de la Ley Orgánica de la Administración Pública Federal; 1, 2, fracción I, 4, fracción I, 9, 29, 32, 33, 34, 35, 46, primer párrafo, 47 y 48 de la Ley General de Responsabilidades Administrativas, publicada en el Diario Oficial de la Federación el dieciocho de julio de dos mil dieciséis, en el ACUERDO por el que el Comité Coordinador del Sistema Nacional Anticorrupción emite el formato de declaraciones: de situación patrimonial y de intereses; y expide las normas e instructivo para su llenado y presentación, publicado en el Diario Oficial de la Federación el dieciséis de noviembre de dos mil dieciocho, en el ACUERDO por el que se modifican los Anexos Primero y Segundo del Acuerdo por el que el Comité Coordinador del Sistema Nacional Anticorrupción emite el formato de declaraciones: de situación patrimonial y de intereses; y expide las normas e instructivo para su llenado y presentación, publicado en el Diario Oficial de la Federación el veintitrés de septiembre de dos mil diecinueve, por el que se establece que de conformidad con los artículos 34 y 48 de la Ley general de responsabilidades administrativas, las declaraciones de situación patrimonial y de intereses deberán ser presentadas a través de medios electrónicos,
      hacemos constar que recibimos la <strong>DECLARACIÓN PATRIMONIAL ({{ $declaracion->metadata['tipo'] }})</strong>,
    presentada por: <strong>{{ $declaracion->declaracion['situacionPatrimonial']['datosGenerales']['nombre'] }} {{ $declaracion->declaracion['situacionPatrimonial']['datosGenerales']['primerApellido'] }}
    {{ $declaracion->declaracion['situacionPatrimonial']['datosGenerales']['segundoApellido'] }}</strong> bajo protesta de decir verdad, en cumplimiento de lo dispuesto en los artículos 32, 33, 34, de la Ley General de responsabilidades administrativas.
    </p>

    <p>
     La declaración de situación patrimonial y de interés ha sido presentada y sellada de manera electrónica, con caracteres de autenticidad del acuse de recibo electrónico, con el folio: <code>"{{ $declaracion->_id }}"</code>.<br>
    </p>

    <p>&nbsp;</p>
    <div class="row">
      <div class="col-md-4 mb-3">
        <p>
          <br>
          <img style="float:right; margin-right:5%" width="25%" src="data:image/svg+xml;base64,{{ base64_encode($qr) }}">
          Escanear con celular para validar.
        </p>
      </div>
      <div style="width:60%">
        <p>
          <h4 class="mb-3">SELLO DIGITAL DE {{ $config->municipio }} DE RECIBIDO:</h4>
          <strong>{{ $declaracion->_id }}{{ $declaracion->metadata['actualizacion'] }}</strong>
        </p>
        <p>
          <h4 class="mb-3">FIRMA ELECTRÓNICA DEL DECLARANTE:</h4>
          <strong>{{ $declaracion->_id }}{{ $declaracion->declaracion['situacionPatrimonial']['datosGenerales']['rfc']['rfc'] }}{{ $declaracion->declaracion['situacionPatrimonial']['datosGenerales']['rfc']['homoClave'] }}</strong>
        </p>
        <p>
          <h4 class="mb-3">LUGAR Y FECHA DE ENTREGA:</h4>
          <strong>{{ $config->municipio }} el {{ $declaracion->metadata['actualizacion']->toDateTime()->format('d-m-Y H:i:s') }}</strong>
        </p>
        <p style="text-align: justify !important">
          La firma y sello digital en sustituto de la firma autógrafa y sello municipal tienen el mismo valor probatorio, por lo tanto sólo es necesario conservar el código QR
          en formato PDF ó foto ó número de folio o cadena digital para dar fé del cumplimiento de la obligación. NO ES NECESARIO IMPRIMIR LA DECLARACIÓN O ACUSE DE RECIBIDO.
        </p>
      </div>
    </div>
  </fieldset>
  </body>
  </html>
