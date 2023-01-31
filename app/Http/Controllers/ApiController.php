<?php namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Models\Declaracion;
use App\Models\Auxiliares;

use GrahamCampbell\DigitalOcean\Facades\DigitalOcean;



class ApiController extends Controller
{


  public function endpoint(Request $request)
  {
    $pageSize = (int) filter_var(request()->input('pageSize'), FILTER_SANITIZE_NUMBER_INT);

    if(empty($currentPage))
    {
      $currentPage = (int) filter_var(request()->input('page'), FILTER_SANITIZE_NUMBER_INT);
    }
    else
    {
      $currentPage = 1;
    }

    if(empty($pageSize))
    {
      $pageSize = 10;
    }
    else
    {
      if($pageSize > 200)
      {
        $pageSize = 200;
      }
      elseif($pageSize < 1)
      {
        $pageSize = 10;
      }
    }

    $sortNombres                  = empty(request()->input('sort.nombres'))                                           ? 'asc' : request()->input('sort.nombres');
    $sortPrimerApellido           = empty(request()->input('sort.primerApellido'))                                    ? 'asc' : request()->input('sort.primerApellido');
    $sortSegundoApellido          = empty(request()->input('sort.segundoApellido'))                                   ? 'asc' : request()->input('sort.segundoApellido');
    $sortEscolaridadNivel         = empty(request()->input('sort.escolaridadNivel'))                                  ? 'asc' : request()->input('sort.escolaridadNivel');
    $sortNombreEntePublico        = empty(request()->input('sort.datosEmpleoCargoComision.nombreEntePublico'))        ? 'asc' : request()->input('sort.datosEmpleoCargoComision.nombreEntePublico');
    $sortEntidadFederativa        = empty(request()->input('sort.datosEmpleoCargoComision.entidadFederativa'))        ? 'asc' : request()->input('sort.datosEmpleoCargoComision.entidadFederativa');
    $sortMunicipioAlcaldia        = empty(request()->input('sort.datosEmpleoCargoComision.municipioAlcaldia'))        ? 'asc' : request()->input('sort.datosEmpleoCargoComision.municipioAlcaldia');
    $sortEmpleoCargoComision      = empty(request()->input('sort.datosEmpleoCargoComision.empleoCargoComision'))      ? 'asc' : request()->input('sort.datosEmpleoCargoComision.empleoCargoComision');
    $sortNivelEmpleoCargoComision = empty(request()->input('sort.datosEmpleoCargoComision.nivelEmpleoCargoComision')) ? 'asc' : request()->input('sort.datosEmpleoCargoComision.nivelEmpleoCargoComision');
    $sortNivelOrdenGobierno       = empty(request()->input('sort.datosEmpleoCargoComision.nivelOrdenGobierno'))       ? 'asc' : request()->input('sort.datosEmpleoCargoComision.nivelOrdenGobierno');
    $sortTotalIngresosNetos       = empty(request()->input('sort.totalIngresosNetos'))                                ? 'asc' : request()->input('sort.totalIngresosNetos');
    $sortSuperficieConstruccion   = empty(request()->input('sort.bienesInmuebles.superficieConstruccion'))            ? 'asc' : request()->input('sort.bienesInmuebles.superficieConstruccion');
    $sortSuperficieTerreno        = empty(request()->input('sort.bienesInmuebles.superficieTerreno'))                 ? 'asc' : request()->input('sort.bienesInmuebles.superficieTerreno');
    $sortFormaAdquisicion         = empty(request()->input('sort.bienesInmuebles.formaAdquisicion'))                  ? 'asc' : request()->input('sort.bienesInmuebles.formaAdquisicion');
    $sortValorAdquisicion         = empty(request()->input('sort.bienesInmuebles.valorAdquisicion'))                  ? 'asc' : request()->input('sort.bienesInmuebles.valorAdquisicion');

    $pagination = Declaracion::id(request()->input('query.id'))
                               ->nombres(request()->input('query.nombres'))
                               ->primerApellido(request()->input('query.primerApellido'))
                               ->segundoApellido(request()->input('query.segundoApellido'))
                               ->escolaridadNivel(request()->input('query.escolaridadNivel'))
                               ->nombreEntePublico(request()->input('query.datosEmpleoCargoComision.nombreEntePublico'))
                               ->entidadFederativa(request()->input('query.datosEmpleoCargoComision.entidadFederativa'))
                               ->municipioAlcaldia(request()->input('query.datosEmpleoCargoComision.municipioAlcaldia'))
                               ->empleoCargoComision(request()->input('query.datosEmpleoCargoComision.empleoCargoComision'))
                               ->nivelEmpleoCargoComision(request()->input('query.datosEmpleoCargoComision.nivelEmpleoCargoComision'))
                               ->nivelOrdenGobierno(request()->input('query.datosEmpleoCargoComision.nivelOrdenGobierno'))
                               ->superficieConstruccion(request()->input('query.bienesInmuebles.superficieConstruccion'))
                               ->superficieTerreno(request()->input('query.bienesInmuebles.superficieTerreno'))
                               ->formaAdquisicion(request()->input('query.bienesInmuebles.formaAdquisicion'))
                               ->valorAdquisicion(request()->input('query.bienesInmuebles.valorAdquisicion'))
                               ->totalIngresosNetos(request()->input('query.totalIngresosNetos'))
                               ->rfcSolicitante(request()->input('query.rfcSolicitante'))
                               ->orderby('declaracion.situacionPatrimonial.datosGenerales.nombre',$sortNombres)
                               ->orderby('declaracion.situacionPatrimonial.datosGenerales.primerApellido',$sortPrimerApellido)
                               ->orderby('declaracion.situacionPatrimonial.datosGenerales.segundoApellido',$sortSegundoApellido)
                               ->orderby('declaracion.situacionPatrimonial.datosCurricularesDeclarante.escolaridad.nivel.clave',$sortEscolaridadNivel)
                               ->orderby('declaracion.situacionPatrimonial.datosEmpleoCargoComision.nombreEntePublico',$sortNombreEntePublico)
                               ->orderby('declaracion.situacionPatrimonial.datosEmpleoCargoComision.domicilioMexico.entidadFederativa.valor',$sortEntidadFederativa)
                               ->orderby('declaracion.situacionPatrimonial.datosEmpleoCargoComision.domicilioMexico.municipioAlcaldia.valor',$sortMunicipioAlcaldia)
                               ->orderby('declaracion.situacionPatrimonial.datosEmpleoCargoComision.empleoCargoComision',$sortEmpleoCargoComision)
                               ->orderby('declaracion.situacionPatrimonial.datosEmpleoCargoComision.nivelOrdenGobierno',$sortNivelOrdenGobierno)
                               ->orderby('declaracion.situacionPatrimonial.datosEmpleoCargoComision.nivelEmpleoCargoComision',$sortNivelEmpleoCargoComision)/*
                               ->orderby('declaracion.situacionPatrimonial.bienesInmuebles.bienInmueble.superficieConstruccion.valor',$sortSuperficieConstruccion)
                               ->orderby('declaracion.situacionPatrimonial.bienesInmuebles.bienInmueble.superficieTerreno.valor',$sortSuperficieTerreno)
                               ->orderby('declaracion.situacionPatrimonial.bienesInmuebles.bienInmueble.formaAdquisicion.clave',$sortFormaAdquisicion)*/
                               /*
                               ->orderby('declaracion.situacionPatrimonial.bienesInmuebles.bienInmueble.valorAdquisicion',$sortValorAdquisicion)
                               ->orderby('declaracion.situacionPatrimonial.ingresos.totalIngresosMensualesNetos',$sortTotalIngresosNetos)
                               */
                               ->paginate($pageSize,['*'], 'page',$currentPage);

    $array = array(
        'pagination' => array(
                              'pageSize' => $pagination->perPage(),
                              'page' => $pagination->currentPage(),
                              'totalRows' => $pagination->total(),
                              'hasNextPage' => $pagination->hasMorePages(),
                             ),
        'results' => $pagination->items(),
      );

    return $array;

  }//ENDPOINT

}///API CONTROLLER
