<?php namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
class Catalogo
{

  public static function clientes()
  {
    $array = DB::connection('catalogos')->collection('clientes')
                                        //->where('estado','=','Tlx')
                                        ->orderby('estado','ASC')
                                        ->orderby('subdominio','ASC')
                                        ->get();

    return json_decode(json_encode($array), FALSE);
  }




  public function clasificacion($clave = null)
  {
      if(is_null($clave))
      {
        $array= DB::connection('catalogos')->collection('clasificacion')
                                           ->orderby('lista','ASC')
                                           ->orderby('valor','ASC')
                                           ->get();
      }
      else
      {
        $array= DB::connection('catalogos')->collection('clasificacion')
                                            ->where('clave','=',$clave)
                                            ->first();
      }

      return json_decode(json_encode($array), FALSE);
  }




  public static function config($subdominio)
  {
    $array = DB::connection('catalogos')->collection('clientes')->where('subdominio','=',$subdominio)
                                                               ->first();

    return json_decode(json_encode($array), FALSE);
  }




  public static function api($completa = false)
  {
    $array = DB::connection('catalogos')->collection('api')
                                        ->first();
    unset($array['_id']);

    if($completa != true)
    {
      unset($array['declaracion']['situacionPatrimonial']['datosPareja']);
      unset($array['declaracion']['situacionPatrimonial']['datosDependientesEconomicos']);
      unset($array['declaracion']['situacionPatrimonial']['bienesInmuebles']);
      unset($array['declaracion']['situacionPatrimonial']['vehiculos']);
      unset($array['declaracion']['situacionPatrimonial']['bienesMuebles']);
      unset($array['declaracion']['situacionPatrimonial']['inversionesCuentasValores']);
      unset($array['declaracion']['situacionPatrimonial']['adeudosPasivos']);
      unset($array['declaracion']['situacionPatrimonial']['prestamoComodato']);
      unset($array['declaracion']['interes']);
    }

    return json_decode(json_encode($array), FALSE);
  }




  public static function formatos($tipo,$patrimonialoInteres = null,$formato = null,$completa = false)
  {
    $array = DB::connection('catalogos')->collection('formatos')
                                        ->orderby('lista','ASC')
                                        ->first();

    if(!is_null($patrimonialoInteres) and !is_null($formato))
    {
      foreach($array['tipoDeclaracion'] as $propiedadesTipoDeclaracion)
      {
        if($propiedadesTipoDeclaracion['slug'] == $patrimonialoInteres)
        {
          foreach($propiedadesTipoDeclaracion['formatos'] as $propiedadesFormato)
          {
            if($propiedadesFormato['slug'] == $formato)
            {
              $array['tipoDeclaracion'] = $propiedadesFormato;
            }
          }
        }
      }
    }
    else
    {
      $f = 0;
      $t = 0;

      foreach($array['tipoDeclaracion'] as $propiedadesTipoDeclaracion)
      {
        foreach($propiedadesTipoDeclaracion['formatos'] as $propiedadesFormato)
        {
          if($propiedadesFormato['excluido'] == $tipo)
          {
            unset($array['tipoDeclaracion'][$t]['formatos'][$f]);
          }
          $f++;
        }
        $t++;
      }
    }//else

    if($completa != true)
    {
      unset($array['tipoDeclaracion']['0']['formatos']['5']);
      unset($array['tipoDeclaracion']['0']['formatos']['6']);

      unset($array['tipoDeclaracion']['0']['formatos']['9']);
      unset($array['tipoDeclaracion']['0']['formatos']['10']);
      unset($array['tipoDeclaracion']['0']['formatos']['11']);
      unset($array['tipoDeclaracion']['0']['formatos']['12']);
      unset($array['tipoDeclaracion']['0']['formatos']['13']);
      unset($array['tipoDeclaracion']['0']['formatos']['14']);
      unset($array['tipoDeclaracion']['1']);
    }

    return json_decode(json_encode($array['tipoDeclaracion']), FALSE);
  }



    public static function uma($veces = 0)
    {
      $array = DB::connection('catalogos')->collection('uma')
                                          ->first();

      json_decode(json_encode($array['uma']), FALSE);

      $total = $array['uma'] * $veces;

      return $total;
    }



    public static function paises()
    {
        $array = DB::connection('catalogos')->collection('paises')
                                            ->where('Extraterritorial','=',"0")
                                            ->orderby('ESPANOL')
                                            ->get();

        return json_decode(json_encode($array), FALSE);
    }




    public function situacionPersonalEstadoCivil($clave = null)
    {
        if(is_null($clave))
        {
          $array= DB::connection('catalogos')->collection('situacionPersonalEstadoCivil')
                                             ->orderby('valor','ASC')
                                             ->get();
        }
        else
        {
          $array= DB::connection('catalogos')->collection('situacionPersonalEstadoCivil')
                                              ->where('clave','=',$clave)
                                              ->first();
        }

        return json_decode(json_encode($array), FALSE);
    }




    public function regimenMatrimonial($clave = null)
    {
      if(is_null($clave))
      {
        $array= DB::connection('catalogos')->collection('regimenMatrimonial')
                                           ->orderby('lista','asc')
                                           ->orderby('valor','asc')
                                           ->get();
      }
      else
      {
        $array= DB::connection('catalogos')->collection('regimenMatrimonial')
                                            ->where('clave','=',$clave)
                                            ->first();
      }

      return json_decode(json_encode($array), FALSE);
    }




    public static function inegiEntidades($clave = null)
    {
      if(is_null($clave))
      {
        $array = DB::connection('catalogos')->collection('inegi')
                                             ->groupby('Cve_Ent')
                                             ->groupby('Nom_Ent')
                                             ->orderby('Nom_Ent')
                                             ->get();
      }
      else
      {
			     $array = DB::connection('catalogos')->collection('inegi')
                                                ->where('Cve_Ent','=',$clave)
                                                ->orderby('Nom_Ent', 'ASC')
                                                ->first();
      }

      return json_decode(json_encode($array), FALSE);
    }




	public static function inegiAlcaldias($entidad_id, $alcaldia_id = null)
	{
    $array = [];

		if(is_null($alcaldia_id))
		{
			$array = DB::connection('catalogos')->collection('inegi')
                                          ->select('Cve_Mun','Nom_Mun')
                                          ->where('Cve_Ent','=',$entidad_id)
                                          ->groupby('Cve_Mun')
                                          ->groupby('Nom_Ent')
                                          ->orderby('Nom_Mun', 'ASC')
                                          ->get();
      return $array; exit;
    }
    else
    {
			$array = DB::connection('catalogos')->collection('inegi')
                                          ->select('Cve_Mun','Nom_Mun')
                                          ->where('Cve_Ent','=',$entidad_id)
                                          ->where('Cve_Mun','=',$alcaldia_id)
                                          ->orderby('Nom_Mun', 'ASC')
                                          ->first();
		}

    return json_decode(json_encode($array), FALSE);
  }




  public function inegiLocalidades($entidad_id,$alcaldia_id)
  {
    $array = DB::connection('catalogos')->collection('inegi')
                                        ->select('Nom_Loc','CP')
                                        ->where('Cve_Ent','=',$entidad_id)
                                        ->where('Cve_Mun','=',$alcaldia_id)
                                        ->orderby('Nom_Loc','ASC')
                                        ->get();

    return json_decode(json_encode($array), FALSE);
  }


	public function inegiCP($entidad_id,$alcaldia_id,$localidad)
	{
		$array = DB::connection('catalogos')->collection('inegi')
                                        ->where('Cve_Ent','=',$entidad_id)
                                        ->where('Cve_Mun','=',$alcaldia_id)
                                        ->where('Nom_Loc','=',$localidad)
                                        ->get();

        return json_decode(json_encode($array), FALSE);
	}




  public function monedas($clave = null)
	{
    if(is_null($clave))
    {
      $array = DB::connection('catalogos')->collection('monedas')
                                          ->orderby('code', 'ASC')
                                          ->get();
    }
    else
    {
      $array = DB::connection('catalogos')->collection('monedas')
                                          ->where('code','=',$clave)
                                          ->first();
    }

    return json_decode(json_encode($array), FALSE);
  }




	public function nivel($clave = null)
	{
		if(is_null($clave))
		{
			$array = DB::connection('catalogos')->collection('niveles')
                                                 ->orderby('lista', 'ASC')
                                                 ->get();
		}
		else
		{
			$array = DB::connection('catalogos')->collection('niveles')
                                                 ->where('clave','=',$clave)
                                                 ->first();
		}

        return json_decode(json_encode($array), FALSE);
    }




	public function extranjero($clave = null)
	{
		if(is_null($clave))
		{
			$array = DB::connection('catalogos')->collection('extranjero')
												 ->orderby('valor','DESC')
												 ->get();

		}
		else
		{
			$array = DB::connection('catalogos')->collection('extranjero')
                                                 ->where('clave','=',$clave)
                                                 ->first();
		}

        return json_decode(json_encode($array), FALSE);
	}




  public function estatus()
	{
		$array = DB::connection('catalogos')->collection('estatus')
                                        ->orderby('lista', 'ASC')
                                        ->get();

    return json_decode(json_encode($array), FALSE);
	}




	public function documentoObtenido()
	{
		$array = DB::connection('catalogos')->collection('documentoObtenido')
                                        ->orderby('lista', 'ASC')
                                        ->get();

    return json_decode(json_encode($array), FALSE);
	}




	public function tipoRelacion($clave = null)
	{
    if(is_null($clave))
    {
      $array = DB::connection('catalogos')->table('tipoRelacion')
                                          ->orderby('valor','ASC')
                                          ->get()->toArray();

    }
    else
    {
      $array = DB::connection('catalogos')->table('tipoRelacion')
                                          ->where('clave','=',$clave)
                                          ->first();
    }

    return json_decode(json_encode($array), FALSE);
	}




  public function tipoParticipacionFideicomiso($clave = null)
	{
        if(is_null($clave))
        {
            $array = DB::connection('catalogos')->table('tipoParticipacionFideicomiso')
                                                 ->orderby('valor','ASC')
                                                 ->get()->toArray();

        }
        else
        {
            $array = DB::connection('catalogos')->table('tipoParticipacionFideicomiso')
                                                 ->where('clave','=',$clave)
                                                 ->first();
        }

        return json_decode(json_encode($array), FALSE);
	}


	public function tipoFideicomiso($clave = null)
	{
        if(is_null($clave))
        {
            $array = DB::connection('catalogos')->table('tipoFideicomiso')
                                                 ->orderby('valor','ASC')
                                                 ->get()->toArray();

        }
        else
        {
            $array = DB::connection('catalogos')->table('tipoFideicomiso')
                                                 ->where('clave','=',$clave)
                                                 ->first();
        }

        return json_decode(json_encode($array), FALSE);
	}



	public function sector($clave = null,$nulo = false)
	{
    if(is_null($clave))
    {
      $array = DB::connection('catalogos')->table('sector')
                                          ->orderby('lista','ASC')
                                          ->orderby('valor','ASC')
                                          ->get()->toArray();
    }
    else
    {
      $array = DB::connection('catalogos')->table('sector')
                                          ->where('clave','=',$clave)
                                          ->first();
    }

    return json_decode(json_encode($array), FALSE);
	}



	public function tipoPersona($clave = null)
	{
        if(is_null($clave))
        {
            $array = DB::connection('catalogos')->table('tipoPersona')
                                                 ->orderby('valor','ASC')
                                                 ->get()->toArray();

        }
        else
        {
            $array = DB::connection('catalogos')->table('tipoPersona')
                                                 ->where('clave','=',$clave)
                                                 ->first();
        }

        return json_decode(json_encode($array), FALSE);
	}


	public function tipoBeneficio($clave = null)
	{
        if(is_null($clave))
        {
            $array = DB::connection('catalogos')->table('tipoBeneficio')
                                                 ->orderby('lista','ASC')
                                                 ->orderby('valor','ASC')
                                                 ->get()->toArray();

        }
        else
        {
            $array = DB::connection('catalogos')->table('tipoBeneficio')
                                                 ->where('clave','=',$clave)
                                                 ->first();
        }

        return json_decode(json_encode($array), FALSE);
	}


  public function beneficiarios($clave = null)
	{
    if(is_null($clave))
    {
      $array = DB::connection('catalogos')->table('beneficiario')
                                          ->orderby('lista','ASC')
                                          ->orderby('valor','ASC')
                                          ->get()->toArray();
    }
    else
    {
      $array = DB::connection('catalogos')->table('beneficiario')
                                          ->where('clave','=',$clave)
                                          ->first();
    }

    return json_decode(json_encode($array), FALSE);
	}


  public function formaRecepcion($clave = null)
	{
        if(is_null($clave))
        {
            $array = DB::connection('catalogos')->table('formaRecepcion')
                                                 ->orderby('valor','ASC')
                                                 ->get()->toArray();

        }
        else
        {
            $array = DB::connection('catalogos')->table('formaRecepcion')
                                                 ->where('clave','=',$clave)
                                                 ->first();
        }

        return json_decode(json_encode($array), FALSE);
	}


    public function tipoMoneda($clave = null)
	{
        if(is_null($clave))
        {
            $array = DB::connection('catalogos')->table('tipoPersona')
                                                 ->orderby('valor','ASC')
                                                 ->get()->toArray();

        }
        else
        {
            $array = DB::connection('catalogos')->table('tipoPersona')
                                                 ->where('clave','=',$clave)
                                                 ->first();
        }

        return json_decode(json_encode($array), FALSE);
	}


    public function tipoRepresentacion($clave = null)
	{
        if(is_null($clave))
        {
            $array = DB::connection('catalogos')->table('tipoRepresentacion')
                                                 ->orderby('valor','ASC')
                                                 ->get()->toArray();

        }
        else
        {
            $array = DB::connection('catalogos')->table('tipoRepresentacion')
                                                 ->where('clave','=',$clave)
                                                 ->first();
        }

        return json_decode(json_encode($array), FALSE);
	}


  public function tipoApoyo($clave = null)
	{
    if(is_null($clave))
    {
      $array = DB::connection('catalogos')->table('tipoApoyo')
                                          ->orderby('lista','ASC')
                                          ->orderby('valor','ASC')
                                          ->get()->toArray();
    }
    else
    {
      $array = DB::connection('catalogos')->table('tipoApoyo')
                                          ->where('clave','=',$clave)
                                          ->first();
    }

    return json_decode(json_encode($array), FALSE);
	}


    public function nivelOrdenGobierno($clave = null)
	{
        if(is_null($clave))
        {
            $array = DB::connection('catalogos')->table('nivelOrdenGobierno')
                                                 ->orderby('lista','ASC')
                                                 ->get()->toArray();

        }
        else
        {
            $array = DB::connection('catalogos')->table('nivelOrdenGobierno')
                                                 ->where('clave','=',$clave)
                                                 ->first();
        }

        return json_decode(json_encode($array), FALSE);
	}


    public function ambitoPublico($clave = null)
	{
        if(is_null($clave))
        {
            $array = DB::connection('catalogos')->table('ambitoPublico')
                                                 ->orderby('valor','ASC')
                                                 ->get()->toArray();

        }
        else
        {
            $array = DB::connection('catalogos')->table('ambitoPublico')
                                                 ->where('clave','=',$clave)
                                                 ->first();
        }

        return json_decode(json_encode($array), FALSE);
	}


    public function boolean($clave = null)
	{
        if(is_null($clave))
        {
            $array = DB::connection('catalogos')->table('boolean')
                                                 ->orderby('valor','ASC')
                                                 ->get()->toArray();

        }
        else
        {
            $array = DB::connection('catalogos')->table('boolean')
                                                 ->where('clave','=',$clave)
                                                 ->first();
        }

        return json_decode(json_encode($array), FALSE);
	}


    public function relacionConDeclarante($clave = null)
    {
        if(is_null($clave))
        {
            $array = DB::connection('catalogos')->table('relacionConDeclarante')
                                                 ->orderby('valor','ASC')
                                                 ->get()->toArray();

        }
        else
        {
            $array = DB::connection('catalogos')->table('relacionConDeclarante')
                                                 ->where('clave','=',$clave)
                                                 ->first();
        }

        return json_decode(json_encode($array), FALSE);
    }


    public function actividadLaboral($clave = null)
    {
        if(is_null($clave))
        {
            $array = DB::connection('catalogos')->table('actividadLaboral')
                                                 ->orderby('lista','ASC')
                                                 ->orderby('valor','ASC')
                                                 ->get()->toArray();

        }
        else
        {
            $array = DB::connection('catalogos')->table('actividadLaboral')
                                                 ->where('clave','=',$clave)
                                                 ->first();
        }

        return json_decode(json_encode($array), FALSE);
    }



    public function motivoBaja($clave = null)
  	{
  		if(is_null($clave))
  		{
  			$array = DB::connection('catalogos')->collection('motivoBaja')
  												 ->orderby('valor','DESC')
  												 ->get();

  		}
  		else
  		{
  			$array = DB::connection('catalogos')->collection('motivoBaja')
                                                   ->where('clave','=',$clave)
                                                   ->first();
  		}

          return json_decode(json_encode($array), FALSE);
  	}




    public function formaAdquisicion($clave = null)
    {
      if(is_null($clave))
      {
        $array = DB::connection('catalogos')->collection('formaAdquisicion')
                                            ->orderby('valor','ASC')
                                            ->get();
      }
      else
      {
        $array = DB::connection('catalogos')->collection('formaAdquisicion')
                                            ->where('clave','=',$clave)
                                            ->first();
      }

      return json_decode(json_encode($array), FALSE);
    }




    public function formaPago($adquisicion, $clave = null)
    {
      if($adquisicion == "CPV")
      {
        $array = DB::connection('catalogos')->collection('formaPago')
                                            ->where('adquisicion','=','CPV')
                                            ->orderby('valor','ASC')
                                            ->get();
      }
      else
      {
        $array = DB::connection('catalogos')->collection('formaPago')
                                            ->where('adquisicion','!=','CPV')
                                            ->orderby('valor','ASC')
                                            ->get();
      }

      return json_decode(json_encode($array), FALSE);
    }





    public function lugarDondeReside($clave = null)
    {
      if(is_null($clave))
      {
        $array = DB::connection('catalogos')->collection('lugarDondeReside')
                                             ->orderby('valor','DESC')
                                             ->get();

      }
      else
      {
        $array = DB::connection('catalogos')->collection('lugarDondeReside')
                                             ->where('clave','=',$clave)
                                             ->first();
      }

      return json_decode(json_encode($array), FALSE);
    }





    public function nombreRazonSocial($clave = null)
    {
      if(is_null($clave))
      {
        $array = DB::connection('catalogos')->collection('nombreRazonSocial')
                                             ->orderby('valor','DESC')
                                             ->get();

      }
      else
      {
        $array = DB::connection('catalogos')->collection('nombreRazonSocial')
                                             ->where('clave','=',$clave)
                                             ->first();
      }

      return json_decode(json_encode($array), FALSE);
    }




    public function parentescoRelacion($clave = null)
    {
      if(is_null($clave))
      {
        $array = DB::connection('catalogos')->collection('parentescoRelacion')
                                             ->orderby('lista','ASC')
                                             ->orderby('valor','ASC')
                                             ->get();

      }
      else
      {
        $array = DB::connection('catalogos')->collection('parentescoRelacion')
                                             ->where('clave','=',$clave)
                                             ->first();
      }

      return json_decode(json_encode($array), FALSE);
    }





    public function rfcFideicomiso($clave = null)
    {
      if(is_null($clave))
      {
        $array = DB::connection('catalogos')->collection('rfcFideicomiso')
        ->orderby('valor','DESC')
        ->get();

      }
      else
      {
        $array = DB::connection('catalogos')->collection('rfcFideicomiso')
        ->where('clave','=',$clave)
        ->first();
      }

      return json_decode(json_encode($array), FALSE);
    }





    public function subTipoInversion($tipo,$clave = null)
    {
      if(is_null($clave))
      {
        $array = DB::connection('catalogos')->collection('subTipoInversion')
                                            ->where('tipo','=',$tipo)
                                            ->orderby('valor','ASC')
                                            ->get();
      }
      else
      {
        $array = DB::connection('catalogos')->collection('subTipoInversion')
                                            ->where('tipo','=',$tipo)
                                            ->where('clave','=',$clave)
                                            ->first();
      }

      return json_decode(json_encode($array), FALSE);
    }





    public function tipoAdeudo($clave = null)
    {
      if(is_null($clave))
      {
        $array = DB::connection('catalogos')->collection('tipoAdeudo')
                                            ->orderby('lista','ASC')
                                            ->orderby('valor','ASC')
                                            ->get();
      }
      else
      {
        $array = DB::connection('catalogos')->collection('tipoAdeudo')
                                            ->where('clave','=',$clave)
                                            ->first();
      }

      return json_decode(json_encode($array), FALSE);
    }






    public function tipoBien($clave = null)
    {
      if(is_null($clave))
      {
        $array = DB::connection('catalogos')->collection('tipoBien')
                                            ->orderby('valor','ASC')
                                            ->orderby('lista','ASC')
                                            ->get();
      }
      else
      {
        $array = DB::connection('catalogos')->collection('tipoBien')
                                            ->where('clave','=',$clave)
                                            ->first();
      }

      return json_decode(json_encode($array), FALSE);
    }





    public function tipoBienEnajenado($clave = null)
    {
      if(is_null($clave))
      {
        $array = DB::connection('catalogos')->collection('tipoBienEnajenado')
                                            ->orderby('valor','ASC')
                                            ->get();
      }
      else
      {
        $array = DB::connection('catalogos')->collection('tipoBienEnajenado')
                                            ->where('clave','=',$clave)
                                            ->first();
      }

      return json_decode(json_encode($array), FALSE);
    }





    public function tipoInmueble($clave = null)
    {
      if(is_null($clave))
      {
        $array = DB::connection('catalogos')->collection('tipoInmueble')
                                            ->orderby('lista','ASC')
                                            ->orderby('valor','ASC')
                                            ->get();
      }
      else
      {
        $array = DB::connection('catalogos')->collection('tipoInmueble')
                                            ->where('clave','=',$clave)
                                            ->first();
      }

      return json_decode(json_encode($array), FALSE);
    }




    public function tipoInstitucion($clave = null)
    {
      if(is_null($clave))
      {
        $array = DB::connection('catalogos')->collection('tipoInstitucion')
                                            ->orderby('lista','ASC')
                                            ->orderby('valor','DESC')
                                            ->get();

      }
      else
      {
        $array = DB::connection('catalogos')->collection('tipoInstitucion')
                                            ->where('clave','=',$clave)
                                            ->first();
      }

      return json_decode(json_encode($array), FALSE);
    }





    public function tipoInstrumento($clave = null)
    {
      if(is_null($clave))
      {
        $array = DB::connection('catalogos')->collection('tipoInstrumento')
                                            ->orderby('lista','ASC')
                                            ->orderby('valor','ASC')
                                            ->get();
      }
      else
      {
        $array = DB::connection('catalogos')->collection('tipoInstrumento')
                                            ->where('clave','=',$clave)
                                            ->first();
      }

      return json_decode(json_encode($array), FALSE);
    }





    public function tipoInversion($clave = null)
    {
      if(is_null($clave))
      {
        $array = DB::connection('catalogos')->collection('tipoInversion')
                                            ->orderby('lista','ASC')
                                            ->orderby('valor','ASC')
                                            ->get();
      }
      else
      {
        $array = DB::connection('catalogos')->collection('tipoInversion')
                                            ->where('clave','=',$clave)
                                            ->first();
      }

      return json_decode(json_encode($array), FALSE);
    }





    public function tipoOperacion($clave = null)
    {
      if(is_null($clave))
      {
        $array = DB::connection('catalogos')->collection('tipoOperacion')
        ->orderby('valor','DESC')
        ->get();

      }
      else
      {
        $array = DB::connection('catalogos')->collection('tipoOperacion')
        ->where('clave','=',$clave)
        ->first();
      }

      return json_decode(json_encode($array), FALSE);
    }





    public function tipoParticipacion($clave = null)
    {
      if(is_null($clave))
      {
        $array = DB::connection('catalogos')->collection('tipoParticipacion')
                                            ->orderby('lista','ASC')
                                            ->orderby('valor','ASC')
                                            ->get();
      }
      else
      {
        $array = DB::connection('catalogos')->collection('tipoParticipacion')
                                            ->where('clave','=',$clave)
                                            ->first();
      }

      return json_decode(json_encode($array), FALSE);
    }





    public function tipoVehiculo($clave = null)
    {
      if(is_null($clave))
      {
        $array = DB::connection('catalogos')->collection('tipoVehiculo')
                                            ->orderby('lista','ASC')
                                            ->orderby('valor','ASC')
                                            ->get();

      }
      else
      {
        $array = DB::connection('catalogos')->collection('tipoVehiculo')
                                            ->where('clave','=',$clave)
                                            ->first();
      }

      return json_decode(json_encode($array), FALSE);
    }





    public function titularBien($clave = null)
    {
      if(is_null($clave))
      {
        $array = DB::connection('catalogos')->collection('titularBien')
                                            ->orderby('valor','DESC')
                                            ->get();
      }
      else
      {
        $array = DB::connection('catalogos')->collection('titularBien')
                                            ->where('clave','=',$clave)
                                            ->first();
      }

      return json_decode(json_encode($array), FALSE);
    }




    public function unidadMedida($clave = null)
    {
      if(is_null($clave))
      {
        $array = DB::connection('catalogos')->collection('unidadMedida')
                                            ->orderby('valor','DESC')
                                            ->get();
      }
      else
      {
        $array = DB::connection('catalogos')->collection('unidadMedida')
                                            ->where('clave','=',$clave)
                                            ->first();
      }

      return json_decode(json_encode($array), FALSE);
    }





    public function valorConformeA($clave = null)
    {
      if(is_null($clave))
      {
        $array = DB::connection('catalogos')->collection('valorConformeA')
                                            ->orderby('valor','DESC')
                                            ->get();
      }
      else
      {
        $array = DB::connection('catalogos')->collection('valorConformeA')
                                            ->where('clave','=',$clave)
                                            ->first();
      }

      return json_decode(json_encode($array), FALSE);
    }




    public function ambitoSector($clave = null)
    {
      if(is_null($clave))
      {
        $array = DB::connection('catalogos')->collection('ambitoSector')
        ->orderby('valor','DESC')
        ->get();

      }
      else
      {
        $array = DB::connection('catalogos')->collection('ambitoSector')
        ->where('clave','=',$clave)
        ->first();
      }

      return json_decode(json_encode($array), FALSE);
    }




    public function ubicacion($clave = null)
    {
      if(is_null($clave))
      {
        $array = DB::connection('catalogos')->collection('ubicacion')
        ->orderby('valor','DESC')
        ->get();

      }
      else
      {
        $array = DB::connection('catalogos')->collection('ubicacion')
                                            ->where('clave','=',$clave)
                                            ->first();
      }

      return json_decode(json_encode($array), FALSE);
    }




    public function periodosGobierno($clave = null)
    {
      if(!empty($clave))
      {
        $array = DB::connection('catalogos')->collection('periodosGobierno')
                                            ->where('estado','=',$clave)
                                            ->first();

        return json_decode(json_encode($array['periodos']), FALSE);
      }
      else
      {
        return [];
      }
    }

};
