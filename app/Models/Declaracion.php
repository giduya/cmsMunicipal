<?php namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;
//use Illuminate\Database\Eloquent\Model;

use App\Models\Catalogo;



class Declaracion extends Model
{
  use HasFactory;

  protected $connection = 'mongodb';

  protected $collection = 'declaraciones';

  protected $fillable = ['nombre'];

  public $timestamps = false;

  /////////////////////////////////////////////////////////////////////////////////
  /////////////////////// GETTERS
  /////////////////////////////////////////////////////////////////////////////////
  public function getcatalogoAttribute($catalogo)
  {
    $catalogo = new Catalogo;

    return $catalogo;
  }

  public function getfilasAttribute()
  {
    return [];
  }

  /////////////////////////////////////////////////////////////////////////////////
  /////////////////////// SCOPES
  /////////////////////////////////////////////////////////////////////////////////
    public function scopeId($query,$id)
    {
      if($id)
      {
        $id = Auxiliares::acentos($id);
        return $query->Where('id','regexp',"/.*$id/i");
      }
    }

    public function scopeNombres($query,$nombres)
    {
      if($nombres)
      {
        $nombres = Auxiliares::acentos($nombres);

        return $query->Where('declaracion.situacionPatrimonial.datosGenerales.nombre','regexp',"/.*$nombres/i");
      }
    }

    public function scopePrimerApellido($query,$primerApellido)
    {
      if($primerApellido)
      {
        $primerApellido = Auxiliares::acentos($primerApellido);

        return $query->Where('declaracion.situacionPatrimonial.datosGenerales.primerApellido','regexp',"/.*$primerApellido/i");
      }
    }

    public function scopeSegundoApellido($query,$segundoApellido)
    {
      if($segundoApellido)
      {
        $segundoApellido = Auxiliares::acentos($segundoApellido);

        return $query->Where('declaracion.situacionPatrimonial.datosGenerales.segundoApellido','regexp',"/.*$segundoApellido/i");
      }
    }

    public function scopeEscolaridadNivel($query,$escolaridadNivel)
    {
      if($escolaridadNivel)
      {
        $escolaridadNivel = Auxiliares::acentos($escolaridadNivel);

        return $query->Where('declaracion.situacionPatrimonial.datosCurricularesDeclarante.escolaridad.nivel.clave','=',$escolaridadNivel);
      }
    }

    public function scopeNombreEntePublico($query,$nombreEntePublico)
    {
      if($nombreEntePublico)
      {
        $nombreEntePublico = Auxiliares::acentos($nombreEntePublico);

        return $query->Where('declaracion.situacionPatrimonial.datosEmpleoCargoComision.nombreEntePublico','regexp',"/.*$nombreEntePublico/i");
      }
    }

    public function scopeEntidadFederativa($query,$entidadFederativa)
    {
      if($entidadFederativa)
      {
        return $query->Where('declaracion.situacionPatrimonial.datosEmpleoCargoComision.domicilioMexico.entidadFederativa.clave','=',$entidadFederativa);
      }
    }

    public function scopeMunicipioAlcaldia($query,$municipioAlcaldia)
    {
      if($municipioAlcaldia)
      {
        return $query->Where('declaracion.situacionPatrimonial.datosEmpleoCargoComision.domicilioMexico.municipioAlcaldia.clave','=',$municipioAlcaldia);
      }
    }

    public function scopeEmpleoCargoComision($query,$empleoCargoComision)
    {
      if($empleoCargoComision)
      {
        $empleoCargoComision = Auxiliares::acentos($empleoCargoComision);

        return $query->Where('declaracion.situacionPatrimonial.datosEmpleoCargoComision.empleoCargoComision','regexp',"/.*$empleoCargoComision/i");
      }
    }

    public function scopeNivelOrdenGobierno($query,$nivelOrdenGobierno)
    {
      if($nivelOrdenGobierno)
      {
        return $query->Where('declaracion.situacionPatrimonial.datosEmpleoCargoComision.nivelOrdenGobierno','=',$nivelOrdenGobierno);
      }
    }

    public function scopeNivelEmpleoCargoComision($query,$nivelEmpleoCargoComision)
    {
      if($nivelEmpleoCargoComision)
      {
        $nivelEmpleoCargoComision = Auxiliares::acentos($nivelEmpleoCargoComision);

        return $query->Where('declaracion.situacionPatrimonial.datosEmpleoCargoComision.nivelEmpleoCargoComision','regexp',"/.*$nivelEmpleoCargoComision/i");
      }
    }

    public function scopeSuperficieConstruccion($query,$superficieConstruccion)
    {
      if($superficieConstruccion)
      {
        $min = (int) filter_var($superficieConstruccion['min'], FILTER_SANITIZE_NUMBER_INT);
        $max = (int) filter_var($superficieConstruccion['max'], FILTER_SANITIZE_NUMBER_INT);

        if(empty($max) and !empty($min))
        {
          return $query->Where('declaracion.situacionPatrimonial.bienesInmuebles.bienInmueble.superficieConstruccion.valor','>',$min);
        }
        elseif(empty($min) and !empty($max))
        {
          return $query->Where('declaracion.situacionPatrimonial.bienesInmuebles.bienInmueble.superficieConstruccion.valor','<',$max);
        }
        elseif(!empty($min) and !empty($max))
        {
          return $query->WhereBetween('declaracion.situacionPatrimonial.bienesInmuebles.bienInmueble.superficieConstruccion.valor',[$min,$max]);
        }
      }
    }

    public function scopeSuperficieTerreno($query,$superficeTerreno)
    {
      if($superficeTerreno)
      {
        $min = (int) filter_var($superficeTerreno['min'], FILTER_SANITIZE_NUMBER_INT);
        $max = (int) filter_var($superficeTerreno['max'], FILTER_SANITIZE_NUMBER_INT);

        if(empty($max) and !empty($min))
        {
          return $query->Where('declaracion.situacionPatrimonial.bienesInmuebles.bienInmueble.superficieTerreno.valor','>',$min);
        }
        elseif(empty($min) and !empty($max))
        {
          return $query->Where('declaracion.situacionPatrimonial.bienesInmuebles.bienInmueble.superficieTerreno.valor','<',$max);
        }
        elseif(!empty($min) and !empty($max))
        {
          return $query->WhereBetween('declaracion.situacionPatrimonial.bienesInmuebles.bienInmueble.superficieTerreno.valor',[$min,$max]);
        }
      }
    }

    public function scopeFormaAdquisicion($query,$formaAdquisicion)
    {
      if($formaAdquisicion)
      {
        $formaAdquisicion = Auxiliares::acentos($formaAdquisicion);

        return $query->Where('declaracion.situacionPatrimonial.bienesInmuebles.bienInmueble.formaAdquisicion.clave','=',$formaAdquisicion);
      }
    }

    public function scopeValorAdquisicion($query,$valorAdquisicion)
    {
      if($valorAdquisicion)
      {
        $min = (int) filter_var($valorAdquisicion['min'], FILTER_SANITIZE_NUMBER_INT);
        $max = (int) filter_var($valorAdquisicion['max'], FILTER_SANITIZE_NUMBER_INT);

        if(empty($max) and !empty($min))
        {
          return $query->Where('declaracion.situacionPatrimonial.bienesInmuebles.bienInmueble.valorAdquisicion.valor','>',$min);
        }
        elseif(empty($min) and !empty($max))
        {
          return $query->Where('declaracion.situacionPatrimonial.bienesInmuebles.bienInmueble.valorAdquisicion.valor','<',$max);
        }
        elseif(!empty($min) and !empty($max))
        {
          return $query->WhereBetween('declaracion.situacionPatrimonial.bienesInmuebles.bienInmueble.valorAdquisicion.valor',[$min,$max]);
        }
      }
    }

    public function scopeTotalIngresosNetos($query,$totalIngresosNetos)
    {
      if($totalIngresosNetos)
      {
        $min = (int) filter_var($totalIngresosNetos['min'], FILTER_SANITIZE_NUMBER_INT);
        $max = (int) filter_var($totalIngresosNetos['max'], FILTER_SANITIZE_NUMBER_INT);

        if(empty($max) and !empty($min))
        {
          return $query->Where('declaracion.situacionPatrimonial.ingresos.ingresoMensualNetoDeclarante.valor','>',$min);
        }
        elseif(empty($min) and !empty($max))
        {
          return $query->Where('declaracion.situacionPatrimonial.ingresos.ingresoMensualNetoDeclarante.valor','<',$max);
        }
        elseif(!empty($min) and !empty($max))
        {
          return $query->WhereBetween('declaracion.situacionPatrimonial.ingresos.ingresoMensualNetoDeclarante.valor',[$min,$max]);
        }
      }
    }

    public function scopeRfcSolicitante($query,$rfcSolicitante)
    {
      if($rfcSolicitante)
      {
        $rfcSolicitante = Auxiliares::acentos($rfcSolicitante);

        return $query->Where('declaracion.situacionPatrimonial.datosGenerales.rfc.rfc','=',substr($rfcSolicitante,0,10))
                     ->Where('declaracion.situacionPatrimonial.datosGenerales.rfc.homoClave','=',substr($rfcSolicitante,10,3));
      }
    }

    /////////////////////////////////////////////////////////////////////////////////
    /////////////////////// FUNCIONES
    /////////////////////////////////////////////////////////////////////////////////

    public function crear($tipo)
    {
      $config = Dashboard::where('subdominio','=',explode(".", $_SERVER['SERVER_NAME'],2)['0'])->first();

      $declaracionPatrimonialEInteres = Catalogo::formatos($tipo,null,null,\Auth::user()->declaracionCompleta);

      foreach($declaracionPatrimonialEInteres as $patrimonialoInteres)
      {
        foreach($patrimonialoInteres->formatos as $formato)
        {
          $formatos[$patrimonialoInteres->slug][$formato->slug] = false;
        }
      }

      $this->id = $this->_id;
      $this->usuario = \Auth::user()->email;
      $this->metadata = array(
                              'actualizacion' => new \MongoDB\BSON\UTCDateTime(now(config('app.timezone'))),
                              'institucion' => $config->municipio, //Instituto Simulado
                              'tipo' => $tipo,
                              'declaracionCompleta' => \Auth::user()->declaracionCompleta,
                              'actualizacionConflictoInteres' => FALSE,
                              'avance' => $formatos,
                              );

      $this->declaracion = Catalogo::api(\Auth::user()->declaracionCompleta)->declaracion;
    }




    public function avance()
    {
      if(isset($this->metadata['avance']))
      {
        if(isset($this->metadata['avance']['interes']))
        {
          $totalFormatosInteres    = count($this->metadata['avance']['interes']);
          $totalCompletadosInteres = array_sum($this->metadata['avance']['interes']);
        }
        else
        {
          $totalFormatosInteres    = 0;
          $totalCompletadosInteres = 0;
        }

        $totalFormatosSituacion = (isset($this->declaracion['situacionPatrimonial'])) ? count($this->metadata['avance']['situacionPatrimonial']) : 0;
        $totalCompletadosSituacion = (isset($this->metadata['avance']['situacionPatrimonial'])) ? array_sum($this->metadata['avance']['situacionPatrimonial']) : 0;


        $totalFormatos = $totalFormatosSituacion + $totalFormatosInteres;
        $totalCompletados = $totalCompletadosSituacion + $totalCompletadosInteres;

        $total['total'] = $totalFormatos;
        $total['completados'] = $totalCompletados;
        $total['restantes'] = $totalFormatos - $totalCompletados;
        $total['porcentaje'] = round(($totalCompletados * 100) / $totalFormatos);
        $total['listo'] = ($total['porcentaje'] == 100) ? true : false;

        if($total['listo'] == true)
        {
          $this->unset('metadata.avance');
          $this->unset('firmar');
          $this->unset('updated_at');
        }
      }
      else
      {
        $totalFormatosSituacion = count($this->declaracion['situacionPatrimonial']);
        if(isset($this->declaracion['interes']))
        {
          $totalFormatosInteres   = count($this->declaracion['interes']);
        }
        else
        {
          $totalFormatosInteres = 0;
        }

        $total['total'] = $totalFormatosSituacion + $totalFormatosInteres;
        $total['completados'] = $total['total'];
        $total['restantes'] = 0;
        $total['porcentaje'] = 100;
        $total['listo'] = true;
      }

      return $total;
    }




    public function insertarFormato($formato)
    {
      $ruta = 'declaracion.'.request()->route()->parameters()['tipoDeclaracion'].'.'.request()->route()->parameters()['formatoSlug'];

      if(!isset(request()->route()->parameters()['subformatoSlug']))
      {
        switch(request()->route()->parameters()['formatoSlug'])
        {
          case "datosGenerales":
            $form = array(
                            'nombre' => Auxiliares::acentos(request()->input('nombre')),
                            'primerApellido' => Auxiliares::acentos(request()->input('primerApellido')),
                            'segundoApellido' => Auxiliares::nulo(request()->input('segundoApellido')),
                            'curp' => request()->input('curp'),
                            'rfc' => array(
                                            'rfc' => request()->input('rfcFisica'),
                                            'homoClave' => request()->input('homoClave'),
                                          ),
                            'correoElectronico' => array(
                                                          'institucional' => Auxiliares::nulo(request()->input('correoInstitucional')),
                                                          'personal' => Auxiliares::nulo(request()->input('correoPersonal')),
                                                        ),
                            'telefono' => array(
                                                'ladaCasa' => empty(request()->input('casa')) ? "" : request()->input('ladaCasa'),
                                                'casa' => Auxiliares::nulo(request()->input('casa')),
                                                'ladaCelular' => request()->input('ladaCelular'),
                                                'celularPersonal' => request()->input('celular'),
                                               ),
                            'situacionPersonalEstadoCivil' => array(
                                                                    'clave' => request('situacionPersonalEstadoCivil'),
                                                                    'valor' => $this->catalogo->situacionPersonalEstadoCivil(request('situacionPersonalEstadoCivil'))->valor,
                                                                  ),
                            'regimenMatrimonial' => array(
                                                          'clave' => request()->input('situacionPersonalEstadoCivil') == "CAS" ? request('regimenMatrimonial') : '',
                                                          'valor' => request()->input('situacionPersonalEstadoCivil') == "CAS" ? $this->catalogo->regimenMatrimonial(request('regimenMatrimonial'))->valor : '',
                                                         ),
                            'paisNacimiento' => request()->input('paisNacimiento'),
                            'nacionalidad' => request()->input('nacionalidad'),
                            'aclaracionesObservaciones' => Auxiliares::nulo(request()->input('aclaracionesObservaciones')),
                  );

            if(request('situacionPersonalEstadoCivil') != "CAS")
            {
              unset($form['regimenMatrimonial']);
            }

            $array = array($ruta => $form);

            $completado = true;
            break;
          case "domicilioDeclarante":
            $array = array($ruta => array_merge($this->domicilio(),['aclaracionesObservaciones' => Auxiliares::nulo(request()->input('aclaracionesObservaciones'))]),);
            $completado = true;
            break;
          case "datosEmpleoCargoComision":
            $empleo = $this->datosEmpleo();

            if($this->metadata['tipo'] == "INICIAL")
            {
              $booleano = false;
              $array = [];
            }
            elseif($this->metadata['tipo'] == "MODIFICACIÓN")
            {
              $booleano = $this->ninguno($formato);
              $array = $this->declaracion['situacionPatrimonial']['datosEmpleoCargoComision']['otroEmpleoCargoComision'];
            }
            elseif($this->metadata['tipo'] == "CONCLUSIÓN")
            {
              $booleano = false;
              $array = [];
            }

            $domicilio = array_merge($this->domicilio(),['aclaracionesObservaciones' => Auxiliares::nulo(request()->input('aclaracionesObservaciones')), 'cuentaConOtroCargoPublico' => $booleano,'otroEmpleoCargoComision' => $array]);

            $formato = array_merge($empleo,$domicilio);

            if($this->metadata['tipo'] == "INICIAL")
            {
              unset($formato['cuentaConOtroCargoPublico']);
              unset($formato['otroEmpleoCargoComision']);
            }

            $array = array( $ruta => $formato,);

            $completado = true;
            break;
          case "datosPareja":
            if($this->boolean(request()->input('ninguno')) == false)
            {
              $datos = array(
                              'ninguno'                   => $this->boolean(request()->input('ninguno')),
                              'tipoOperacion'             => (request()->input('ninguno') == false) ? request()->input('tipoOperacion') : "",
                              'nombre'                    => (request()->input('ninguno') == false) ? request()->input('nombre') : "",
                              'primerApellido'            => (request()->input('ninguno') == false) ? request()->input('primerApellido') : "",
                              'segundoApellido'           => (request()->input('ninguno') == false) ? Auxiliares::nulo(request()->input('segundoApellido')) : "",
                              'fechaNacimiento'           => (request()->input('ninguno') == false) ? request()->input('fechaObtencion') : "",
                              'rfc'                       => (request()->input('ninguno') == false) ? Auxiliares::nulo(request()->input('rfcFisicaHomo')) : "",
                              'relacionConDeclarante'     => (request()->input('ninguno') == false) ? request()->input('relacionConDeclarante') : "",
                              'ciudadanoExtranjero'       => (request()->input('ninguno') == false) ? $this->boolean(request()->input('ciudadanoExtranjero')) : "",
                              'curp'                      => (request()->input('ninguno') == false) ? Auxiliares::nulo(request()->input('curp')) : "",
                              'esDependienteEconomico'    => (request()->input('ninguno') == false) ? $this->boolean(request()->input('esDependienteEconomico')) : "",
                              'habitaDomicilioDeclarante' => (request()->input('ninguno') == false) ? $this->boolean(request()->input('habitaDomicilioDeclarante')) : "",
                              'lugarDondeReside'          => (request()->input('ninguno') == false) ? $this->lugarDondeReside() : "",
                            );

              $domicilio = array_merge($datos,$this->domicilio());

              if($datos['lugarDondeReside'] == "SE_DESCONOCE")
              {
                unset($domicilio['domicilioMexico']);
                unset($domicilio['domicilioExtranjero']);
              }

              $actividad = array_merge($domicilio,$this->actividadLaboral());
            }
            else
            {
              $actividad = array('ninguno' => $this->boolean(request()->input('ninguno')));
            }

            $formato = array_merge($actividad,['aclaracionesObservaciones' => Auxiliares::nulo(request()->input('aclaracionesObservaciones'))]);

            $array = array($ruta => $formato);

            $completado = true;
            break;
          case "ingresos":
            $aclaraciones = array_merge($this->ingreso(),['aclaracionesObservaciones' => Auxiliares::nulo(request()->input('aclaracionesObservaciones'))]);

            $array = array( $ruta => $aclaraciones,);

            $completado = true;
            break;
          case "actividadAnualAnterior":
            if($this->boolean(request()->input('servidorPublicoAnioAnterior')) == false)
            {
              $actividad = array(
                                  'servidorPublicoAnioAnterior' => $this->boolean(request()->input('servidorPublicoAnioAnterior')),
                                  'fechaIngreso' => request()->input('fechaIngreso'),
                                  'fechaConclusion' => request()->input('fechaEgreso'),
                                );

              $formatoIngreso = array_merge($actividad,$this->ingreso());
            }
            else
            {
              $formatoIngreso = array(
                                  'servidorPublicoAnioAnterior' => $this->boolean(request()->input('servidorPublicoAnioAnterior')),
                                );
            }

            $aclaraciones = array_merge($formatoIngreso,['aclaracionesObservaciones' => Auxiliares::nulo(request()->input('aclaracionesObservaciones'))]);

            $array = array( $ruta => $aclaraciones,);

            $completado = true;
            break;
          case "electronicamente":
            return true;
          default:
            $array = array(
                            $ruta.'.ninguno' => $this->ninguno($formato),
                            $ruta.'.aclaracionesObservaciones' => Auxiliares::nulo(request()->input('aclaracionesObservaciones')),
                          );

            $count = count($this->declaracion[request()->route()->parameters()['tipoDeclaracion']][request()->route()->parameters()['formatoSlug']][$formato->subformatos]);

            if($count >= 1)
            {
              $completado = true;
            }
            else
            {
              if($this->ninguno($formato) == true)
              {
                $completado = true;
              }
              else
              {
                $completado = false;
              }
            }
        }

        Declaracion::where('_id',$this->_id)->update($array);

        Declaracion::where('_id',$this->_id)->update(['metadata.avance.'.request()->route()->parameters()['tipoDeclaracion'].'.'.request()->route()->parameters()['formatoSlug'] => $completado]);

        return true;
      }
      else
      {
        switch(request()->route()->parameters()['formatoSlug'])
        {
          case "datosCurricularesDeclarante":
            $array = array(
                            'tipoOperacion' => request()->input('tipoOperacion'),
                            'nivel' => array(
                                              'clave' => request()->input('nivelClave'),
                                              'valor' => $this->catalogo->nivel(request()->input('nivelClave'))->valor,
                                            ),
                            'institucionEducativa' => array(
                                                            'nombre' => request()->input('nombreInstitucion'),
                                                            'ubicacion' => request()->input('ubicacion'),
                                                           ),
                            'carreraAreaConocimiento' => request()->input('carreraAreaConocimiento'),
                            'estatus' => request()->input('estatus'),
                            'documentoObtenido' => request()->input('documentoObtenido'),
                            'fechaObtencion' => request()->input('fechaObtencion'),
                          );
            break;
          case "datosEmpleoCargoComision":
            $empleo = $this->datosEmpleo();

            $array = array_merge($empleo,$this->domicilio());
            break;
          case "experienciaLaboral":
            if(request()->input('ambitoSectorClave') == "PUB")
            {
              $array = array(
                              'tipoOperacion' => request()->input('tipoOperacion'),
                              'ambitoSector' => array(
                                                      'clave' => request()->input('ambitoSectorClave'),
                                                      'valor' => $this->catalogo->ambitoSector(request()->input('ambitoSectorClave'))->valor,
                                                      ),
                              'nivelOrdenGobierno' => request()->input('nivelOrdenGobierno'),
                              'ambitoPublico' => request()->input('ambitoPublico'),
                              'nombreEntePublico' => request()->input('nombreInstitucion'),
                              'areaAdscripcion' => request()->input('areaAdscripcion'),
                              'empleoCargoComision' => request()->input('empleoCargoComision'),
                              'funcionPrincipal' => request()->input('funcionPrincipal'),
                              'fechaIngreso' => request()->input('fechaObtencion'),
                              'fechaEgreso' => request()->input('fechaEgreso'),
                              'ubicacion' => request()->input('ubicacion'),
                            );
            }
            else
            {
              $array = array(
                              'tipoOperacion' => request()->input('tipoOperacion'),
                              'ambitoSector' => array(
                                                      'clave' => request()->input('ambitoSectorClave'),
                                                      'valor' => $this->catalogo->ambitoSector(request()->input('ambitoSectorClave'))->valor,
                                                     ),
                              'nombreEmpresaSociedadAsociacion' => request()->input('nombreInstitucion'),
                              'rfc' => Auxiliares::nulo(request()->input('rfcMoralHomo')),
                              'area' => request()->input('areaAdscripcion'),
                              'puesto' => request()->input('empleoCargoComision'),
                              'sector' => array(
                                                'clave' => request()->input('sectorClave'),
                                                'valor' => $this->catalogo->sector(request()->input('sectorClave'))->valor,
                                               ),
                              'fechaIngreso' => request()->input('fechaObtencion'),
                              'fechaEgreso' => request()->input('fechaEgreso'),
                              'ubicacion' => request()->input('ubicacion'),
                            );
            }
            break;
          case "datosDependientesEconomicos":
            $datos = array(
                            'tipoOperacion' => request()->input('tipoOperacion'),
                            'nombre' => request()->input('nombre'),
                            'primerApellido' => request()->input('primerApellido'),
                            'segundoApellido' => Auxiliares::nulo(request()->input('segundoApellido')),
                            'fechaNacimiento' => request()->input('fechaObtencion'),
                            'rfc' => Auxiliares::nulo(request()->input('rfcFisicaHomo')),
                            'parentescoRelacion' => array(
                                                            'clave' => request()->input('parentescoRelacion'),
                                                            'valor' => $this->catalogo->parentescoRelacion(request('parentescoRelacion'))->valor,
                                                         ),
                            'extranjero' => $this->boolean(request()->input('extranjero')),
                            'curp' => Auxiliares::nulo(request()->input('curp')),
                            'habitaDomicilioDeclarante' => $this->boolean(request()->input('habitaDomicilioDeclarante')),
                            'lugarDondeReside'          => $this->lugarDondeReside(),
                          );

            $domicilio = array_merge($datos,$this->domicilio());

            if($datos['lugarDondeReside'] == "SE_DESCONOCE")
            {
              unset($domicilio['domicilioMexico']);
              unset($domicilio['domicilioExtranjero']);
            }

            $array = array_merge($domicilio,$this->actividadLaboral());
            break;
          case "bienesInmuebles":
            $datos = array(
                            'tipoOperacion' => request()->input('tipoOperacion'),
                            'tipoInmueble' => array('clave' => request()->input('tipoInmueble'),
                                                    'valor' => $this->catalogo->tipoInmueble(request()->input('tipoInmueble'))->valor,
                                                   ),
                            'titular' => $this->titularBien(request()->input('titular')),
                            'porcentajePropiedad' => $this->monto(request()->input('porcentaje')),
                            'superficieTerreno' => array('valor' => $this->monto(request()->input('superficieTerreno')),
                                                         'unidad' => request()->input('superficieTerrenoUnidad'),
                                                        ),
                            'superficieConstruccion' => array('valor' => $this->monto(request()->input('superficieConstruccion')),
                                                              'unidad' => request()->input('superficieConstruccionUnidad'),
                                                             ),
                            'tercero' => (in_array("CTER", request()->input('titular')) == true) ? $this->terceros(request()->input('tercero')) : [] ,
                            'transmisor' => $this->transmisores(request()->input('transmisor')),
                            'formaAdquisicion' => array(
                                                        'clave' => request()->input('formaAdquisicion'),
                                                        'valor' => $this->catalogo->formaAdquisicion(request()->input('formaAdquisicion'))->valor,
                                                       ),
                            'formaPago' => request()->input('formaPago'),
                            'valorAdquisicion' => array(
                                                        'valor' =>  $this->monto(request()->input('montoValor')),
                                                        'moneda' => $this->catalogo->monedas(request()->input('montoMoneda'))->code,
                                                       ),
                            'fechaAdquisicion' => request()->input('fechaObtencion'),
                            'datoIdentificacion' => request()->input('numeroSerieRegistro'),
                            'valorConformeA' => request()->input('valorConformeA'),
                          );

                  $array = array_merge($datos,$this->domicilio());
                  break;
          case "vehiculos":
            $array = array(
                            'tipoOperacion' => request()->input('tipoOperacion'),
                            'tipoVehiculo' => array('clave' => request()->input('tipoVehiculo'),
                                                    'valor' => $this->catalogo->tipoVehiculo(request()->input('tipoVehiculo'))->valor,
                                                   ),
                            'titular' => $this->titularBien(request()->input('titular')),
                            'transmisor' => $this->transmisores(request()->input('transmisor')),
                            'marca' => request()->input('marca'),
                            'modelo' => request()->input('modelo'),
                            'anio' => $this->monto(request()->input('anio')),
                            'numeroSerieRegistro' => request()->input('numeroSerieRegistro'),
                            'tercero' => (in_array("CTER", request()->input('titular')) == true) ? $this->terceros(request()->input('tercero')) : [] ,
                            'lugarRegistro' => array(
                                                      'pais' => request()->input('pais'),
                                                      'entidadFederativa' => array(
                                                                                    'clave' => (request()->input('pais') == "MX") ? str_pad(request()->input('entidadFederativa'),2, '0', STR_PAD_LEFT) : "",
                                                                                    'valor' => (request()->input('pais') == "MX") ? $this->catalogo->inegiEntidades(request()->input('entidadFederativa'))->Nom_Ent : "",
                                                                                  ),
                                                    ),
                            'formaAdquisicion' => array(
                                                        'clave' => request()->input('formaAdquisicion'),
                                                        'valor' => $this->catalogo->formaAdquisicion(request()->input('formaAdquisicion'))->valor,
                                                       ),
                            'formaPago' => request()->input('formaPago'),
                            'valorAdquisicion' => array(
                                                        'valor' =>  $this->monto(request()->input('montoValor')),
                                                        'moneda' => $this->catalogo->monedas(request()->input('montoMoneda'))->code,
                                                       ),
                            'fechaAdquisicion' => request()->input('fechaObtencion'),
                         );
             break;
          case "bienesMuebles":
            $array = array(
                           'tipoOperacion' => request()->input('tipoOperacion'),
                           'titular' => $this->titularBien(request()->input('titular')),
                           'tipoBien' => array(
                                               'clave' => request()->input('tipoBien'),
                                               'valor' => $this->catalogo->tipoBien(request()->input('tipoBien'))->valor,
                                              ),
                           'transmisor' => $this->transmisores(request()->input('transmisor')),
                           'tercero' => (in_array("CTER", request()->input('titular')) == true) ? $this->terceros(request()->input('tercero')) : [] ,
                           'descripcionGeneralBien' => request()->input('descripcionGeneralBien'),
                           'formaAdquisicion' => array(
                                                        'clave' => request()->input('formaAdquisicion'),
                                                        'valor' => $this->catalogo->formaAdquisicion(request()->input('formaAdquisicion'))->valor,
                                                      ),
                           'formaPago' => request()->input('formaPago'),
                           'valorAdquisicion' => array(
                                                       'valor' =>  $this->monto(request()->input('montoValor')),
                                                       'moneda' => $this->catalogo->monedas(request()->input('montoMoneda'))->code,
                                                      ),
                           'fechaAdquisicion' => request()->input('fechaObtencion'),
                         );
              break;
          case "inversionesCuentasValores":
            if($this->metadata['tipo'] == "INICIAL")
            {
              $object = 'saldoSituacionActual';
            }
            elseif($this->metadata['tipo'] == "MODIFICACIÓN")
            {
              $object = 'saldoDiciembreAnterior';
            }
            elseif($this->metadata['tipo'] == "CONCLUSIÓN")
            {
              $object = 'saldoFechaConclusion';
            }
            $array = array(
                           'tipoOperacion' => request()->input('tipoOperacion'),
                           'tipoInversion' => array(
                                              'clave' => request()->input('tipoInversion'),
                                              'valor' => $this->catalogo->tipoInversion(request()->input('tipoInversion'))->valor,
                                                    ),
                           'subTipoInversion' => array(
                                                       'clave' => request()->input('subTipoInversion'),
                                                       'valor' => $this->catalogo->subTipoInversion(request()->input('tipoInversion'),request()->input('subTipoInversion'))->valor,
                                                      ),
                           'titular' => $this->titularBien(request()->input('titular')),
                           'tercero' => (in_array("CTER", request()->input('titular')) == true) ? $this->terceros(request()->input('tercero')) : [] ,
                           'numeroCuentaContrato' => request()->input('numeroCuentaContrato'),
                           'localizacionInversion' => array(
                                                            'pais' => request()->input('pais'),
                                                            'institucionRazonSocial' => request()->input('nombreInstitucion'),
                                                            'rfc' => Auxiliares::nulo(request()->input('rfcMoralHomo')),
                                                           ),
                           $object => array(
                                                            'valor' => $this->monto(request()->input('saldoValor')),
                                                            'moneda' => $this->catalogo->monedas(request()->input('saldoMoneda'))->code,
                                                          ),
                           'porcentajeIncrementoDecremento' => $this->monto(request()->input('porcentaje')),
                          );
             break;
          case "adeudosPasivos":
            if($this->metadata['tipo'] == "INICIAL")
            {
              $object = 'saldoInsolutoSituacionActual';
            }
            elseif($this->metadata['tipo'] == "MODIFICACIÓN")
            {
              $object = 'saldoInsolutoDiciembreAnterior';
            }
            elseif($this->metadata['tipo'] == "CONCLUSIÓN")
            {
              $object = 'saldoInsolutoFechaConclusion';
            }

             $array = array(
                            'tipoOperacion' => request()->input('tipoOperacion'),
                            'titular' => $this->titularBien(request()->input('titular')),
                            'tipoAdeudo' => array(
                                                  'clave' => request()->input('tipoAdeudo'),
                                                  'valor' => $this->catalogo->tipoAdeudo(request()->input('tipoAdeudo'))->valor,
                                                 ),
                            'numeroCuentaContrato' => request()->input('numeroCuentaContrato'),
                            'fechaAdquisicion' => request()->input('fechaObtencion'),
                            'montoOriginal' => array(
                                                     'valor' => $this->monto(request()->input('montoValor')),
                                                     'moneda' => $this->catalogo->monedas(request()->input('montoMoneda'))->code,
                                                     ),
                            $object => array(
                                              'valor' => $this->monto(request()->input('saldoValor')),
                                              'moneda' => $this->catalogo->monedas(request()->input('saldoMoneda'))->code,
                                            ),
                            'porcentajeIncrementoDecremento' => $this->monto(request()->input('porcentaje')),
                            'tercero' => (in_array("CTER", request()->input('titular')) == true) ? $this->terceros(request()->input('tercero')) : [] ,
                            'otorganteCredito' => array(
                                                        'tipoPersona' => request()->input('tipoPersona'),
                                                        'nombreInstitucion' => request()->input('nombreInstitucion'),
                                                        'rfc' => Auxiliares::nulo(request()->input('rfcHomo')),
                                                       ),
                           'localizacionAdeudo' => array(
                                                          'pais' => request()->input('pais'),
                                                        ),
                             );
                break;
          case "prestamoComodato":
            $tipoBien = "Inmueble";
            if(request()->input('tipoVehiculo') != null)
            {
              $tipoBien = array('vehiculo' => array('tipo' => array('clave' => request()->input('tipoVehiculo'),
                                                                    'valor' => $this->catalogo->tipoVehiculo(request()->input('tipoVehiculo'))->valor,
                                                                   ),
                                                    'marca' => request()->input('marca'),
                                                    'modelo' => request()->input('modelo'),
                                                    'anio' => request()->input('anio'),
                                                    'numeroSerieRegistro' => request()->input('numeroSerieRegistro'),
                                                    'lugarRegistro' => array('pais' => request()->input('pais'),
                                                                             'entidadFederativa' => array(
                                                                                                          'clave' => (request()->input('pais') == "MX") ? str_pad(request()->input('entidadFederativa'),2, '0', STR_PAD_LEFT) : "",
                                                                                                          'valor' => (request()->input('pais') == "MX") ? $this->catalogo->inegiEntidades(request()->input('entidadFederativa'))->Nom_Ent : "",
                                                                                                         ),
                                                                            ),
                                                  ),
                               );
            }
            else
            {
              $tipoBien = array('inmueble' => array_merge(['tipoInmueble' => array('clave' => request()->input('tipoInmueble'),
                                                                                   'valor' => $this->catalogo->tipoInmueble(request()->input('tipoInmueble'))->valor,
                                                         )],$this->domicilio()),);
            }

            $array = array(
                             'tipoOperacion' => request()->input('tipoOperacion'),
                             'tipoBien' => $tipoBien,
                             'duenoTitular' => array(
                                                      'tipoDuenoTitular' => request()->input('tipoPersona'),
                                                      'nombreTitular' => request()->input('nombre'),
                                                      'rfc' => Auxiliares::nulo(request()->input('rfcHomo')),
                                                      'relacionConTitular' => request()->input('relacionConTitular'),
                                                     ),
                             );
            break;
          case "participacion":
            $array = array(
                            'tipoOperacion' => request()->input('tipoOperacion'),
                            'tipoRelacion' => request()->input('tipoRelacion'),
                            'nombreEmpresaSociedadAsociacion' => request()->input('nombreInstitucion'),
                            'rfc' => Auxiliares::nulo(request()->input('rfcMoralHomo')),
                            'porcentajeParticipacion' => $this->monto(request()->input('porcentaje')),
                            'tipoParticipacion' => array(
                                                          'clave' => request()->input('tipoParticipacion'),
                                                          'valor' => $this->catalogo->tipoParticipacion(request()->input('tipoParticipacion'))->valor,
                                                        ),
                            'recibeRemuneracion' => $this->boolean(request()->input('recibeRemuneracion')),
                            'montoMensual' => array(
                                                    'valor' => ($this->boolean(request()->input('recibeRemuneracion')) == true) ? $this->monto(request()->input('montoValor')) : "",
                                                    'moneda' =>($this->boolean(request()->input('recibeRemuneracion')) == true) ? $this->catalogo->monedas(request()->input('montoMoneda'))->code : "",
                                                   ),
                            'ubicacion' => array(
                                                 'pais' => request()->input('pais'),
                                                 'entidadFederativa' => array(
                                                                               'clave' => (request()->input('pais') == "MX") ? str_pad(request()->input('entidadFederativa'),2, '0', STR_PAD_LEFT) : "",
                                                                               'valor' => (request()->input('pais') == "MX") ? $this->catalogo->inegiEntidades(request()->input('entidadFederativa'))->Nom_Ent : "",
                                                                             ),
                                                ),
                            'sector' => array(
                                              'clave' => request()->input('sectorClave'),
                                              'valor' =>  $this->catalogo->sector(request()->input('sectorClave'))->valor,
                                             ),
                          );

            if(empty(request('porcentaje')))
            {
              unset($array['porcentajeParticipacion']);
            }
            if(request('pais') != "MX")
            {
              unset($array['ubicacion']['entidadFederativa']);
            }
            if($this->boolean(request()->input('recibeRemuneracion')) == false)
            {
              unset($array['montoMensual']);
            }
            break;
          case "participacionTomaDecisiones":
            $array = array(
                            'tipoOperacion' => request()->input('tipoOperacion'),
                            'tipoRelacion' => request()->input('tipoRelacion'),
                            'tipoInstitucion' => array(
                                                        'clave' => request()->input('tipoInstitucion'),
                                                        'valor' => $this->catalogo->tipoInstitucion(request()->input('tipoInstitucion'))->valor,
                                                      ),
                            'nombreInstitucion' => request()->input('nombreInstitucion'),
                            'rfc' => Auxiliares::nulo(request()->input('rfcMoralHomo')),
                            'puestoRol' => request()->input('empleoCargoComision'),
                            'fechaInicioParticipacion' => request()->input('fechaObtencion'),
                            'recibeRemuneracion' => $this->boolean(request()->input('recibeRemuneracion')),
                            'montoMensual' => array(
                                                    'valor' => ($this->boolean(request()->input('recibeRemuneracion')) == true) ? $this->monto(request()->input('montoValor')) : "",
                                                    'moneda' =>($this->boolean(request()->input('recibeRemuneracion')) == true) ? $this->catalogo->monedas(request()->input('montoMoneda'))->code : "",
                                                   ),
                            'ubicacion' => array(
                                                  'pais' => request()->input('pais'),
                                                  'entidadFederativa' => array(
                                                                              'clave' => (request()->input('pais') == "MX") ? str_pad(request()->input('entidadFederativa'),2, '0', STR_PAD_LEFT) : "",
                                                                              'valor' => (request()->input('pais') == "MX") ? $this->catalogo->inegiEntidades(request()->input('entidadFederativa'))->Nom_Ent : "",
                                                                              ),
                                                ),
                          );
            if(empty(request('rfcMoralHomo')))
            {
              unset($array['rfc']);
            }
            if(request('pais') != "MX")
            {
              unset($array['ubicacion']['entidadFederativa']);
            }
            if($this->boolean(request()->input('recibeRemuneracion')) == false)
            {
              unset($array['montoMensual']);
            }
            break;
          case "apoyos":
            $array = array(
                            'tipoOperacion' => request()->input('tipoOperacion'),
                            'tipoPersona' => request()->input('tipoPersona'),
                            'beneficiarioPrograma' => array(
                                                            'clave' => request()->input('beneficiario'),
                                                            'valor' => $this->catalogo->beneficiarios(request()->input('beneficiario'))->valor,
                                                           ),
                            'nombrePrograma' => request()->input('nombrePrograma'),
                            'institucionOtorgante' => request()->input('nombreInstitucion'),
                            'nivelOrdenGobierno' => request()->input('nivelOrdenGobierno'),
                            'tipoApoyo' => array(
                                                    'clave' => request()->input('tipoApoyo'),
                                                    'valor' => $this->catalogo->tipoApoyo(request()->input('tipoApoyo'))->valor,
                                                    ),
                            'formaRecepcion' => request()->input('formaRecepcion'),
                            'montoApoyoMensual' => array(
                                                        'valor' =>  (request()->input('formaRecepcion') == "MONETARIO") ? $this->monto(request()->input('montoValor')) : "",
                                                        'moneda' => (request()->input('formaRecepcion') == "MONETARIO") ? $this->catalogo->monedas(request()->input('montoMoneda'))->code : "",
                                                    ),
                            'especifiqueApoyo' => (request()->input('formaRecepcion') == "ESPECIE") ? request()->input('especifiqueEspecie') : "",
                          );
            if(empty(request('rfcMoralHomo')))
            {
              unset($array['rfc']);
            }
            if(request()->input('formaRecepcion') == "ESPECIE")
            {
              unset($array['montoApoyoMensual']);
            }
            else
            {
              unset($array['especifiqueApoyo']);
            }
            break;
          case "representaciones":
            $array = array(
                            'tipoOperacion' => request()->input('tipoOperacion'),
                            'tipoRelacion' => request()->input('tipoRelacion'),
                            'tipoRepresentacion' => request()->input('tipoRepresentacion'),
                            'fechaInicioRepresentacion' => request()->input('fechaObtencion'),
                            'tipoPersona' => request()->input('tipoPersona'),
                            'nombreRazonSocial' => request()->input('nombreRazonSocial'),
                            'rfc' => Auxiliares::nulo(request()->input('rfcHomo')),
                            'recibeRemuneracion' => $this->boolean(request()->input('recibeRemuneracion')),
                            'montoMensual' => array(
                                                      'valor' => ($this->boolean(request()->input('recibeRemuneracion')) == true) ? $this->monto(request()->input('montoValor')) : "",
                                                      'moneda' =>($this->boolean(request()->input('recibeRemuneracion')) == true) ? $this->catalogo->monedas(request()->input('montoMoneda'))->code : "",
                                                    ),
                            'ubicacion' => array(
                                                 'pais' => request()->input('pais'),
                                                 'entidadFederativa' => array(
                                                                              'clave' => (request()->input('pais') == "MX") ? str_pad(request()->input('entidadFederativa'),2, '0', STR_PAD_LEFT) : "",
                                                                              'valor' => (request()->input('pais') == "MX") ? $this->catalogo->inegiEntidades(request()->input('entidadFederativa'))->Nom_Ent : "",
                                                                              ),
                                                ),
                           'sector' => array(
                                             'clave' => request()->input('sectorClave'),
                                             'valor' => $this->catalogo->sector(request()->input('sectorClave'))->valor,
                                            ),
                       );
            if(request('pais') != "MX")
            {
              unset($array['ubicacion']['entidadFederativa']);
            }
            if($this->boolean(request()->input('recibeRemuneracion')) == false)
            {
              unset($array['montoMensual']);
            }
            break;
          case "clientesPrincipales":
            $array = array(
                            'tipoOperacion' => request()->input('tipoOperacion'),
                            'realizaActividadLucrativa' => $this->boolean(request()->input('realizaActividadLucrativa')),
                            'tipoRelacion' => request()->input('tipoRelacion'),
                            'empresa' => array(
                                                'nombreEmpresaServicio' => request()->input('nombreEmpresaServicio'),
                                                'rfc' => Auxiliares::nulo(request()->input('rfcMoralHomo')),
                                              ),
                            'clientePrincipal' => array(
                                                        'tipoPersona' => request()->input('tipoPersona'),
                                                        'nombreRazonSocial' => request()->input('nombreRazonSocial'),
                                                        'rfc' => Auxiliares::nulo(request()->input('rfcHomo')),
                                                       ),
                            'sector' => array(
                                               'clave' => request()->input('sectorClave'),
                                               'valor' => $this->catalogo->sector(request()->input('sectorClave'))->valor,
                                             ),
                            'montoAproximadoGanancia' => array(
                                                                'valor' =>  $this->monto(request()->input('montoValor')),
                                                                'moneda' => $this->catalogo->monedas(request()->input('montoMoneda'))->code,
                                                              ),
                            'ubicacion' => array(
                                                  'pais' => request()->input('pais'),
                                                  'entidadFederativa' => array(
                                                                                'clave' => (request()->input('pais') == "MX") ? str_pad(request()->input('entidadFederativa'),2, '0', STR_PAD_LEFT) : "",
                                                                                'valor' => (request()->input('pais') == "MX") ? $this->catalogo->inegiEntidades(request()->input('entidadFederativa'))->Nom_Ent : "",
                                                                              ),
                                                ),
                          );
            if(request('pais') != "MX")
            {
              unset($array['ubicacion']['entidadFederativa']);
            }
            break;
          case "beneficiosPrivados":
            $array = array(
                            'tipoOperacion' => request()->input('tipoOperacion'),
                            'tipoPersona' => request()->input('tipoPersona'),
                            'tipoBeneficio' => array(
                                                      'clave' => request()->input('tipoBeneficio'),
                                                      'valor' => $this->catalogo->tipoBeneficio(request()->input('tipoBeneficio'))->valor,
                                                    ),
                            'beneficiario' => $this->beneficiario(request()->input('beneficiario')),
                            'otorgante' => array(
                                                    'tipoPersona' => request()->input('tipoPersona_dos'),
                                                    'nombreRazonSocial' => request()->input('nombreRazonSocial'),
                                                    'rfc' => Auxiliares::nulo(request()->input('rfcHomo')),
                                                ),
                            'formaRecepcion' => request()->input('formaRecepcion'),
                            'especifiqueBeneficio' => (request()->input('formaRecepcion') == "ESPECIE") ? request()->input('especifiqueEspecie') : "",
                            'montoMensualAproximado' => array(
                                                            'valor' =>  (request()->input('formaRecepcion') == "MONETARIO") ? $this->monto(request()->input('montoValor')) : "",
                                                            'moneda' => (request()->input('formaRecepcion') == "MONETARIO") ? $this->catalogo->monedas(request()->input('montoMoneda'))->code : "",
                                                          ),
                            'sector' => array(
                                              'clave' => request()->input('sectorClave'),
                                              'valor' => $this->catalogo->sector(request()->input('sectorClave'))->valor,
                                              ),
                           );
                if(request()->input('formaRecepcion') == "ESPECIE")
                {
                  unset($array['montoMensualAproximado']);
                }
                break;
          case "fideicomisos":
            $array = array(
                            'tipoOperacion' => request()->input('tipoOperacion'),
                            'tipoRelacion' => request()->input('tipoRelacion'),
                            'tipoFideicomiso' => request()->input('tipoFideicomiso'),
                            'tipoParticipacion' => request()->input('tipoParticipacion'),
                            'rfcFideicomiso' => Auxiliares::nulo(request()->input('rfcMoralHomo')),
                            strtolower(request()->input('tipoParticipacion')) => $this->tipoParticipacion(request()->input('tipoParticipacion')),
                            'sector'         => array(
                                                      'clave' => request()->input('sectorClave'),
                                                      'valor' => $this->catalogo->sector(request()->input('sectorClave'))->valor,
                                                    ),
                            'extranjero' => request()->input('ubicacion'),
                          );
            if(request()->input('tipoParticipacion') == "COMITE_TECNICO")
            {
              unset($array[strtolower(request()->input('tipoParticipacion'))]);
            }
            break;
        }

        if(!empty($array))
        {

          if(!is_numeric(request()->input('array')))
          {
            $this->push($ruta.'.'.request()->route()->parameters()['subformatoSlug'],$array,true);

            Declaracion::where('_id',$this->_id)->update([$ruta.'.ninguno' => false]);

            Declaracion::where('_id',$this->_id)->update(['metadata.avance.'.request()->route()->parameters()['tipoDeclaracion'].'.'.request()->route()->parameters()['formatoSlug'] => false]);
          }
          else
          {
            Declaracion::where('_id',$this->_id)->update([$ruta.".".request()->route()->parameters()['subformatoSlug'].".".request()->input('array') => $array]);

            return true;
          }
        }
      }
    }



    public function borrarFormato($formato)
    {
      $ruta = 'declaracion.'.request()->route()->parameters()['tipoDeclaracion'].'.'.request()->route()->parameters()['formatoSlug'].'.'.$formato->subformatos;

      $array = $this->declaracion[request()->route()->parameters()['tipoDeclaracion']][request()->route()->parameters()['formatoSlug']][$formato->subformatos][request()->route()->parameters()['array']];

      $resultado = $this->pull($ruta, $array);

      $count_array = count($this->declaracion[request()->route()->parameters()['tipoDeclaracion']][request()->route()->parameters()['formatoSlug']][$formato->subformatos]);

      $count = $count_array - $resultado;

      if($count < 1)
      {
        Declaracion::where('_id',$this->_id)->update(['metadata.avance.'.request()->route()->parameters()['tipoDeclaracion'].'.'.request()->route()->parameters()['formatoSlug'] => false]);
      }
    }



    public function ninguno($formato)
    {
      if(request()->route()->parameters()['formatoSlug'] != "electronicamente")
      {
        if(count($this->declaracion[request()->route()->parameters()['tipoDeclaracion']][request()->route()->parameters()['formatoSlug']][$formato->subformatos]) < 1)
        {
          if(isset($formato->ninguno))
          {
            return true;
          }
          else
          {
            return false;
          }
        }
        else
        {
          return false;
        }
      }
    }



    public function tipoParticipacion($tipo)
    {
      if($tipo == "FIDUCIARIO")
      {
        return array('nombreRazonSocial' => (request()->input('tipoParticipacion') == "FIDUCIARIO") ? request()->input('nombreRazonSocial') : "",
                     'rfc' => (request()->input('tipoParticipacion') == "FIDUCIARIO") ? Auxiliares::nulo(request()->input('rfcHomo')) : "",);
      }
      elseif($tipo == "COMITE_TECNICO")
      {
        return "";
      }
      else
      {
        return array('tipoPersona'       => request()->input('tipoPersona'),
                     'nombreRazonSocial' => request()->input('nombreRazonSocial'),
                     'rfc'               => Auxiliares::nulo(request()->input('rfcHomo')),
                    );
      }
    }



    public function datosEmpleo()
    {
      return array(
                    'tipoOperacion' => request()->input('tipoOperacion'),
                    'nivelOrdenGobierno' => request()->input('nivelOrdenGobierno'),
                    'ambitoPublico' => request()->input('ambitoPublico'),
                    'nombreEntePublico' => request()->input('nombreInstitucion'),
                    'areaAdscripcion' => request()->input('areaAdscripcion'),
                    'empleoCargoComision' => request()->input('empleoCargoComision'),
                    'contratadoPorHonorarios' => $this->boolean(request()->input('contratadoPorHonorarios')),
                    'nivelEmpleoCargoComision' => request()->input('nivelEmpleoCargoComision'),
                    'funcionPrincipal' => request()->input('funcionPrincipal'),
                    'fechaTomaPosesion' => request()->input('fechaTomaPosesion'),
                    'clasificacion' => request()->input('clasificacion'),
                    'telefonoOficina' => array(
                                                'lada' => request()->input('oficinaLada'),
                                                'telefono' => request()->input('oficina'),
                                                'extension' => Auxiliares::nulo(request()->input('oficinaExt')),
                                              ),
                  );
    }


    public function monto($valor)
    {
      return (int) filter_var($valor, FILTER_SANITIZE_NUMBER_INT);
    }



    public function boolean($valor)
    {
      return filter_var($valor, FILTER_VALIDATE_BOOLEAN);
    }



    public function domicilio()
    {
      if(request()->input('lugarDondeReside') == "SE_DESCONOCE" or request()->input('ninguno') == true)
      {
        $domicilio['pais'] = "";
        $domicilio['estado'] = "";
        $domicilio['ciudad'] = "";
        $domicilio['calleE'] = "";
        $domicilio['noExtE'] = "";
        $domicilio['noIntE'] = "";
        $domicilio['cPE'] = "";

        $domicilio['entidadClave'] = "";
        $domicilio['entidadValor'] = "";
        $domicilio['municipioClave'] = "";
        $domicilio['municipioValor'] = "";
        $domicilio['colonia'] = "";
        $domicilio['calleM'] = "";
        $domicilio['noExtM'] = "";
        $domicilio['noIntM'] = "";
        $domicilio['cPM'] = "";
      }
      elseif(request()->input('pais') == "MX")
      {
        $domicilio['pais'] = "";

        $domicilio['entidadClave'] = str_pad(request()->input('entidadFederativa'),2, '0', STR_PAD_LEFT);
        $domicilio['municipioClave'] = str_pad(request()->input('municipioAlcaldia'),3, '0', STR_PAD_LEFT);
        $domicilio['entidadValor'] = (empty($array['entidadClave'])) ? "" : $this->catalogo->inegiEntidades($domicilio['entidadClave'])->Nom_Ent;
        $domicilio['municipioValor'] = (empty($array['entidadClave'])) ? "" : $this->catalogo->inegiAlcaldias(request()->input('entidadFederativa'),request()->input('municipioAlcaldia'))->Nom_Mun;
        $domicilio['calleM'] = request()->input('calle');
        $domicilio['colonia'] = request()->input('coloniaLocalidad');
        $domicilio['noExtM'] = request()->input('numeroExterior');
        $domicilio['noIntM'] = Auxiliares::nulo(request()->input('numeroInterior'));
        $domicilio['cPM'] = request()->input('codigoPostal');

        $domicilio['estado'] = "";
        $domicilio['ciudad'] = "";
        $domicilio['calleE'] = "";
        $domicilio['noExtE'] = "";
        $domicilio['noIntE'] = "";
        $domicilio['cPE'] = "";
      }
      else
      {
        $domicilio['pais'] = request()->input('pais');
        $domicilio['estado'] = request()->input('estadoProvincia');
        $domicilio['ciudad'] = request()->input('ciudadLocalidad');
        $domicilio['calleE'] = request()->input('calle');
        $domicilio['noExtE'] = request()->input('numeroExterior');
        $domicilio['noIntE'] = Auxiliares::nulo(request()->input('numeroInterior'));
        $domicilio['cPE'] = request()->input('codigoPostal');

        $domicilio['entidadClave'] = "";
        $domicilio['entidadValor'] = "";
        $domicilio['municipioClave'] = "";
        $domicilio['municipioValor'] = "";
        $domicilio['colonia'] = "";
        $domicilio['calleM'] = "";
        $domicilio['noExtM'] = "";
        $domicilio['noIntM'] = "";
        $domicilio['cPM'] = "";
      }


      $form = array(
                    'domicilioMexico' => array(
                                                'calle' => $domicilio['calleM'],
                                                'numeroExterior' => $domicilio['noExtM'],
                                                'numeroInterior' => $domicilio['noIntM'],
                                                'coloniaLocalidad' => $domicilio['colonia'],
                                                'municipioAlcaldia' => array(
                                                                              'clave' => str_pad($domicilio['municipioClave'],3, '0', STR_PAD_LEFT),
                                                                              'valor' => (empty($domicilio['entidadClave'])) ? "" : $this->catalogo->inegiAlcaldias(request()->input('entidadFederativa'),request()->input('municipioAlcaldia'))->Nom_Mun,
                                                                            ),
                                                'entidadFederativa' => array(
                                                                              'clave' => str_pad($domicilio['entidadClave'],2, '0', STR_PAD_LEFT),
                                                                              'valor' => (empty($domicilio['entidadClave'])) ? "" : $this->catalogo->inegiEntidades(request()->input('entidadFederativa'))->Nom_Ent,
                                                                            ),
                                                'codigoPostal' => $domicilio['cPM'],
                                              ),
                    'domicilioExtranjero' => array(
                                                    'calle' => $domicilio['calleE'],
                                                    'numeroExterior' => $domicilio['noExtE'],
                                                    'numeroInterior' => $domicilio['noIntE'],
                                                    'ciudadLocalidad' => $domicilio['ciudad'],
                                                    'estadoProvincia' => $domicilio['estado'],
                                                    'pais' => $domicilio['pais'],
                                                    'codigoPostal' => $domicilio['cPE'],
                                                    ),
                    );

      if(request()->input('pais') == "MX")
      {
        unset($form['domicilioExtranjero']);
      }
      else
      {
        unset($form['domicilioMexico']);
      }

      return $form;
    }//domicilio



    public function lugarDondeReside()
    {
      if(request()->input('lugarDondeReside') == "SE_DESCONOCE")
      {
          return "SE_DESCONOCE";
      }
      else
      {
          if(request()->input('pais') == "MX")
          {
            return "MEXICO";
          }
          else
          {
              return "EXTRANJERO";
          }
      }
    }



    public function actividadLaboral()
    {
      $empleoCargo = (request()->route()->parameters()['formatoSlug'] == 'datosPareja') ? 'empleoCargoComision' : 'empleoCargo';

      $array = array(
                    'actividadLaboral'          => array(
                                                      'clave' => (request()->input('ninguno') == false) ? request()->input('actividadLaboralClave') : "",
                                                      'valor' => (request()->input('ninguno') == false) ? $this->catalogo->actividadLaboral(request()->input('actividadLaboralClave'))->valor : "",
                                                    ),

                    'actividadLaboralSectorPublico' => array(
                                                              'nivelOrdenGobierno' => (request()->input('actividadLaboralClave') == "PUB" and request()->input('ninguno') == false) ? request()->input('nivelOrdenGobierno') : "",
                                                              'ambitoPublico'      => (request()->input('actividadLaboralClave') == "PUB" and request()->input('ninguno') == false) ? request()->input('ambitoPublico') : "",
                                                              'nombreEntePublico'  => (request()->input('actividadLaboralClave') == "PUB" and request()->input('ninguno') == false) ? request()->input('nombreInstitucion') : "",
                                                              'areaAdscripcion'    => (request()->input('actividadLaboralClave') == "PUB" and request()->input('ninguno') == false) ? request()->input('areaAdscripcion') : "",
                                                              'empleoCargoComision'=> (request()->input('actividadLaboralClave') == "PUB" and request()->input('ninguno') == false) ? request()->input('empleoCargo') : "",
                                                              'funcionPrincipal'   => (request()->input('actividadLaboralClave') == "PUB" and request()->input('ninguno') == false) ? request()->input('funcionPrincipal') : "",
                                                              'salarioMensualNeto' => array(
                                                                                            'valor' => (request()->input('actividadLaboralClave') == "PUB" and request()->input('ninguno') == false) ? $this->monto(request()->input('montoValor')) : "",
                                                                                            'moneda' => (request()->input('actividadLaboralClave') == "PUB" and request()->input('ninguno') == false) ? request()->input('montoMoneda') : "",
                                                                                           ),
                                                              'fechaIngreso' => (request()->input('actividadLaboralClave') == "PUB" and request()->input('ninguno') == false) ? request()->input('fechaIngreso') : "",
                                                            ),

                    'actividadLaboralSectorPrivadoOtro' => array(
                                                                  'nombreEmpresaSociedadAsociacion' => (request()->input('actividadLaboralClave') == "PRI" or request()->input('actividadLaboralClave') == "OTRO") ? (request()->input('ninguno') == false) ? request()->input('nombreInstitucion') : "" : "",
                                                                  $empleoCargo             => (request()->input('actividadLaboralClave') == "PRI" or request()->input('actividadLaboralClave') == "OTRO") ? (request()->input('ninguno') == false) ? request()->input('empleoCargo') : "" : "",
                                                                  'rfc'                             => (request()->input('actividadLaboralClave') == "PRI" or request()->input('actividadLaboralClave') == "OTRO") ? (request()->input('ninguno') == false) ? Auxiliares::nulo(request()->input('rfcMoralHomo')) : "" : "",
                                                                  'fechaIngreso'                    => (request()->input('actividadLaboralClave') == "PRI" or request()->input('actividadLaboralClave') == "OTRO") ? (request()->input('ninguno') == false) ? request()->input('fechaIngreso') : "" : "",
                                                                  'sector'                          => array(
                                                                                                              'clave' => (request()->input('actividadLaboralClave') == "PRI" or request()->input('actividadLaboralClave') == "OTRO") ? (request()->input('ninguno') == false) ? request()->input('sectorClave') : "" : "",
                                                                                                              'valor' => (request()->input('actividadLaboralClave') == "PRI" or request()->input('actividadLaboralClave') == "OTRO") ? (request()->input('ninguno') == false) ?  $this->catalogo->sector(request()->input('sectorClave'))->valor : "" : "",
                                                                                                              ),
                                                                  'salarioMensualNeto'              => array(
                                                                                                              'valor' => (request()->input('actividadLaboralClave') == "PRI" or request()->input('actividadLaboralClave') == "OTRO") ? (request()->input('ninguno') == false) ? $this->monto(request()->input('montoValor')) : "" : "",
                                                                                                              'moneda' => (request()->input('actividadLaboralClave') == "PRI" or request()->input('actividadLaboralClave') == "OTRO") ? (request()->input('ninguno') == false) ? request()->input('montoMoneda') : "" : "",
                                                                                                              ),
                                                                  'proveedorContratistaGobierno'    => (request()->input('actividadLaboralClave') == "PRI" or request()->input('actividadLaboralClave') == "OTRO") ? (request()->input('ninguno') == false) ? $this->boolean(request()->input('proveedorContratistaGobierno')) : "" : "",
                                                                ),
                   );

      if(request()->input('actividadLaboralClave') == "PUB")
      {
        unset($array['actividadLaboralSectorPrivadoOtro']);
      }
      elseif(request()->input('actividadLaboralClave') == "PRI" or request()->input('actividadLaboralClave') == "OTRO")
      {
        unset($array['actividadLaboralSectorPublico']);
      }
      else
      {
        unset($array['actividadLaboralSectorPrivadoOtro']);
        unset($array['actividadLaboralSectorPublico']);
      }

      return $array;
    }



    public function beneficiario()
    {
      foreach(request()->input('beneficiario') as $fila)
      {
        $array[] = array(
                        'clave' => $fila,
                        'valor' => $this->catalogo->beneficiarios($fila)->valor,
                        );
      }

      return $array;
    }



    public function titularBien()
    {
      foreach(request()->input('titular') as $fila)
      {
        $array[] = array(
                        'clave' => $fila,
                        'valor' => $this->catalogo->titularBien($fila)->valor,
                        );
      }

      return $array;
    }



    public function terceros($terceros)
    {
      $array = [];

      foreach($terceros as $tercero)
      {
        if(!is_null($tercero['tipoPersona']))
        {
          $array[] = array('tipoPersona' => $tercero['tipoPersona'],
                           'nombreRazonSocial' => Auxiliares::acentos($tercero['nombreRazonSocial']),
                           'rfc' => Auxiliares::nulo($tercero['rfc']),
                          );
        }
      }

      return $array;
    }



    public function transmisores($transmisores)
    {
      $array = [];

      foreach($transmisores as $transmisor)
      {
        if(!is_null($transmisor['tipoPersona']))
        {
          $array[] = array('tipoPersona' => $transmisor['tipoPersona'],
                           'nombreRazonSocial' => $transmisor['nombreRazonSocial'],
                           'rfc' => Auxiliares::nulo($transmisor['rfc']),
                           'relacion' => array(
                                                'clave' => $transmisor['relacion'],
                                                'valor' => $this->catalogo->parentescoRelacion($transmisor['relacion'])->valor
                                              ),
                          );
        }
      }

      return $array;
    }



    public function otrosIngresos($industrias = [],$financieras = [],$servicios = [],$bienes = [],$ingresos = [])
    {
      (empty($industrias))  ? $industrias =  [] : $industrias;
      (empty($financieras)) ? $financieras = [] : $financieras;
      (empty($servicios))   ? $servicios =   [] : $servicios;
      (empty($bienes))      ? $bienes =      [] : $bienes;
      (empty($ingresos))    ? $ingresos =    [] : $ingresos;

      $array = [];


      foreach($industrias as $industria)
      {
        if(!is_null($industria['remuneracion']))
        {
          $industrias['actividades'][] = array('remuneracion' => array(
                                                                        'valor' => $this->monto($industria['remuneracion']),
                                                                        'moneda' => 'MXN'
                                                                      ),
                                               'nombreRazonSocial' => $industria['nombreRazonSocial'],
                                               'tipoNegocio' => $industria['tipo'],
                                              );
          $industrias['remuneraciones'][] = $this->monto($industria['remuneracion']);
        }
      }

      if(isset($industrias['remuneraciones']))
      {
        $industrias['remuneraciones'] = array_sum($industrias['remuneraciones']);
      }
      else
      {
        $industrias['actividades'] = [];
        $industrias['remuneraciones'] = 0;
      }




      foreach($financieras as $financiera)
      {
        if(!is_null($financiera['remuneracion']))
        {
          $financieras['actividades'][] = array('remuneracion' => array(
                                                                         'valor' => $this->monto($financiera['remuneracion']),
                                                                         'moneda' => 'MXN'
                                                                       ),
                                                'tipoInstrumento' => array('clave' => $financiera['tipoInstrumento'],
                                                                           'valor' => $this->catalogo->tipoInstrumento($financiera['tipoInstrumento'])->valor,
                                                                          ),
                                               );
          $financieras['remuneraciones'][] = $this->monto($financiera['remuneracion']);
        }
      }

      if(isset($financieras['remuneraciones']))
      {
        $financieras['remuneraciones'] = array_sum($financieras['remuneraciones']);
      }
      else
      {
        $financieras['actividades'] = [];
        $financieras['remuneraciones'] = 0;
      }




      foreach($servicios as $servicio)
      {
        if(!is_null($servicio['remuneracion']))
        {
          $servicios['servicios'][] = array('tipoServicio' => $servicio['tipoServicio'],
                                            'remuneracion' => array(
                                                                     'valor' => $this->monto($servicio['remuneracion']),
                                                                     'moneda' => 'MXN'
                                                                   ),
                                             );
          $servicios['remuneraciones'][] = $this->monto($servicio['remuneracion']);
        }
      }

      if(isset($servicios['remuneraciones']))
      {
        $servicios['remuneraciones'] = array_sum($servicios['remuneraciones']);
      }
      else
      {
        $servicios['servicios'] = [];
        $servicios['remuneraciones'] = 0;
      }




      foreach($bienes as $bien)
      {
        if(!is_null($bien['remuneracion']))
        {
          $bienes['bienes'][] = array('tipoBienEnajenado' => $bien['tipoBienEnajenado'],
                                      'remuneracion' => array(
                                                               'valor' => $this->monto($bien['remuneracion']),
                                                               'moneda' => 'MXN'
                                                             ),
                                           );
          $bienes['remuneraciones'][] = $this->monto($bien['remuneracion']);
        }
      }

      if(isset($bienes['remuneraciones']))
      {
        $bienes['remuneraciones'] = array_sum($bienes['remuneraciones']);
      }
      else
      {
        $bienes['bienes'] = [];
        $bienes['remuneraciones'] = 0;
      }




      foreach($ingresos as $ingreso)
      {
        if(!is_null($ingreso['remuneracion']))
        {
          $ingresos['ingresos'][] = array('tipoIngreso' => $ingreso['tipoIngreso'],
                                            'remuneracion' => array(
                                                                     'valor' => $this->monto($ingreso['remuneracion']),
                                                                     'moneda' => 'MXN'
                                                                   ),
                                           );
          $ingresos['remuneraciones'][] = $this->monto($ingreso['remuneracion']);
        }
      }

      if(isset($ingresos['remuneraciones']))
      {
        $ingresos['remuneraciones'] = array_sum($ingresos['remuneraciones']);
      }
      else
      {
        $ingresos['ingresos'] = [];
        $ingresos['remuneraciones'] = 0;
      }



      $array['industriales'] = $industrias;
      $array['financieras'] = $financieras;
      $array['servicios'] = $servicios;
      $array['bienes'] = $bienes;
      $array['ingresos'] = $ingresos;

      return $array;
    }



    public function ingreso()
    {
      $otrosIngresos = $this->otrosIngresos(request()->input('industria'),request()->input('financiera'),request()->input('servicio'),request()->input('bien'),request()->input('ingreso'));

      $otrosIngresosTotal = $otrosIngresos['industriales']['remuneraciones'] + $otrosIngresos['financieras']['remuneraciones'] + $otrosIngresos['servicios']['remuneraciones'] + $otrosIngresos['bienes']['remuneraciones'] + $otrosIngresos['ingresos']['remuneraciones'];

      if(request()->route()->parameters()['formatoSlug'] == "ingresos")
      {
        if($this->metadata['tipo'] == "INICIAL")
        {
          $remuneracion = 'remuneracionMensualCargoPublico';
          $otro = 'otrosIngresosMensualesTotal';
          $netoDec = 'ingresoMensualNetoDeclarante';
          $netoDep = 'ingresoMensualNetoParejaDependiente';
          $netoTotal = 'totalIngresosMensualesNetos';
        }
        if($this->metadata['tipo'] == "MODIFICACIÓN")
        {
          $remuneracion = 'remuneracionAnualCargoPublico';
          $otro = 'otrosIngresosAnualesTotal';
          $netoDec = 'ingresoAnualNetoDeclarante';
          $netoDep = 'ingresoAnualNetoParejaDependiente';
          $netoTotal = 'totalIngresosAnualesNetos';
        }
        if($this->metadata['tipo'] == "CONCLUSIÓN")
        {
          $remuneracion = 'remuneracionConclusionCargoPublico';
          $otro = 'otrosIngresosConclusionTotal';
          $netoDec = 'ingresoConclusionNetoDeclarante';
          $netoDep = 'ingresoConclusionNetoParejaDependiente';
          $netoTotal = 'totalIngresosConclusionNetos';
        }
      }
      else
      {
        $remuneracion = 'remuneracionNetaCargoPublico';
        $otro = 'otrosIngresosTotal';
        $netoDec = 'ingresoNetoAnualDeclarante';
        $netoDep = 'ingresoNetoAnualParejaDependiente';
        $netoTotal = 'totalIngresosNetosAnuales';
      }

      $ingreso = array(
                        $remuneracion => array(
                                                                'valor' => $this->monto(request()->input('remuneracionNetaCargoPublico')),
                                                                'moneda' => 'MXN',
                                                                ),
                        $otro => array(
                                                                'valor' => $otrosIngresosTotal,
                                                                'moneda' => 'MXN',
                                                              ),
                        'actividadIndustrialComercialEmpresarial' => array(
                                                                            'remuneracionTotal' => array(
                                                                                                          'valor' => $otrosIngresos['industriales']['remuneraciones'],
                                                                                                          'moneda' => "MXN"
                                                                                                        ),
                                                                            'actividades' => $otrosIngresos['industriales']['actividades'],
                                                                          ),
                        'actividadFinanciera' => array(
                                                        'remuneracionTotal' => array(
                                                                                      'valor' =>  $otrosIngresos['financieras']['remuneraciones'],
                                                                                      'moneda' => 'MXN'
                                                                                    ),
                                                        'actividades' => $otrosIngresos['financieras']['actividades'],
                                                      ),
                        'serviciosProfesionales' => array(
                                                        'remuneracionTotal' => array(
                                                                                      'valor' =>  $otrosIngresos['servicios']['remuneraciones'],
                                                                                      'moneda' => 'MXN'
                                                                                    ),
                                                        'servicios' => $otrosIngresos['servicios']['servicios'],
                                                      ),
                        'enajenacionBienes' => array(
                                                          'remuneracionTotal' => array(
                                                                                        'valor' =>  $otrosIngresos['bienes']['remuneraciones'],
                                                                                        'moneda' => 'MXN'
                                                                                      ),
                                                          'bienes' => $otrosIngresos['bienes']['bienes'],
                                                         ),
                        'otrosIngresos' => array(
                                                      'remuneracionTotal' => array(
                                                                                    'valor' =>  $otrosIngresos['ingresos']['remuneraciones'],
                                                                                    'moneda' => 'MXN'
                                                                                  ),
                                                      'ingresos' => $otrosIngresos['ingresos']['ingresos'],
                                                    ),
                        $netoDec => array(
                                                              'valor' => $otrosIngresosTotal + $this->monto(request()->input('remuneracionNetaCargoPublico')),
                                                              'moneda' => 'MXN',
                                                             ),
                        $netoDep => array(
                                                                      'valor' => $this->monto(request()->input('ingresoNetoAnualParejaDependiente_valor')),
                                                                      'moneda' => 'MXN',
                                                                    ),
                        $netoTotal => array(
                                                              'valor' => $otrosIngresosTotal + $this->monto(request()->input('remuneracionNetaCargoPublico')) + $this->monto(request()->input('ingresoNetoAnualParejaDependiente_valor')),
                                                              'moneda' => 'MXN',
                                                            ),
                      );

      if($this->metadata['tipo'] == "INICIAL" and request()->route()->parameters()['formatoSlug'] == "ingresos")
      {
        unset($ingreso['enajenacionBienes']);
      }

      return $ingreso;
    }
}
