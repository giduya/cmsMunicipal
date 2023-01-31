<?php namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests\FormatoRequest;

use App\Models\Declaracion;
use App\Models\Catalogo;


class DeclaracionController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }



    public function crear(Request $request)
    {
      if($request->method() == "POST" )
      {
        $declaracion = new Declaracion;
        $declaracion->crear($request->input('tipo'));
        $resultado = $declaracion->save();
        $declaracion->id = $declaracion->_id;
        $declaracion->save();
        $declaracion->unset('updated_at');
        $declaracion->unset('created_at');

        if($resultado == true)
        {
          return \Redirect::to('declaracion/'.$declaracion->id)->with('success', 'La declaración se ha iniciado.');

          \Session::flash('success', 'Los declaración se ha iniciado.');
        }
      }//post
      else
      {
        return \Redirect::to('inicio');
      }

    }





    public function siguiente(Request $request)
    {
      $declaracion = Declaracion::where('_id','=',$request->route()->declaracionId)->where('usuario','=', \Auth::user()->email)
                                                                                   ->first();

      if($declaracion)
      {
        if(isset($declaracion['metadata']['avance']))
        {
          foreach($declaracion['metadata']['avance'] as $tipoDeclaracion => $formatos)
          {
            foreach($formatos as $formato => $boolean)
            {
              if($boolean != 1)
              {
                return \Redirect::to('declaracion/'.$declaracion->_id.'/'.$tipoDeclaracion.'/'.$formato)->with('warning', 'Completa el siguiente formato para poder firmar electrónicamente la declaración y cumplir con la obligación.');
              }
            }
          }//foreach
        }//isset

      }

      return \Redirect::to('inicio')->with('success', 'La declaración se ha completado y firmado correctamente.');
    }





    public function borrar(Request $request)
    {
      $declaracion = Declaracion::where('_id','=',$request->route()->declaracionId)->where('usuario','=', \Auth::user()->email)
                                                                                   ->delete();

      return \Redirect::to('inicio');
    }





    public function formato(FormatoRequest $request)
    {
      if($request->route()->declaracion == "declaracion")
      {
        if(!is_null($request->route()->declaracionId))
        {
          $declaracion = Declaracion::where('_id','=',$request->route()->declaracionId)->where('usuario','=', \Auth::user()->email)
                                                                                       ->first();
          if(!is_null($declaracion))
          {
            if(isset($declaracion->declaracion[$request->route()->tipoDeclaracion]) or $request->route()->tipoDeclaracion == "firmar")
            {
              if(isset($declaracion->declaracion[$request->route()->tipoDeclaracion][$request->route()->formatoSlug]) or $request->route()->formatoSlug == "electronicamente")
              {

                  if(!is_null($request->route()->subformatoSlug))
                  {
                    if(!isset($declaracion->declaracion[$request->route()->tipoDeclaracion][$request->route()->formatoSlug][$request->route()->subformatoSlug]))
                    {
                      return \Redirect::to('inicio');
                    }
                  }

                  if(!is_null($request->route()->array))
                  {
                    if(empty($declaracion->declaracion[$request->route()->tipoDeclaracion][$request->route()->formatoSlug][$request->route()->subformatoSlug][$request->route()->array]))
                    {
                      return \Redirect::to('declaracion'.'/'.$declaracion->id.'/'.$request->route()->tipoDeclaracion.'/'.$request->route()->formatoSlug);
                    }
                  }

                  $tagsFormato = Catalogo::formatos($declaracion->metadata['tipo'],$request->route()->tipoDeclaracion,$request->route()->formatoSlug);

                  if($request->method() == "DELETE" )
                  {
                    if($declaracion->borrarFormato($tagsFormato) == 1)
                    {
                      session(['success' => 'La fila se borró correctamente.']);
                    }

                    return \Redirect::to('declaracion/'.$declaracion->id.'/'.$request->route()->tipoDeclaracion.'/'.$request->route()->formatoSlug);
                  }


                  $formatos = Catalogo::formatos($declaracion->metadata['tipo'],null,null,$declaracion->metadata['declaracionCompleta']);


                  if($request->method() == "GET")
                  {
                    if($request->route()->formatoSlug == "prestamoComodato")
                    {
                      if($request->route()->subformatoSlug)
                      {
                        if(!is_null($request->route()->array))
                        {
                          if(!in_array($request->get('tipoBien'),['vehiculo','inmueble']))
                          {
                            $array = array_keys($declaracion->declaracion[$request->route()->tipoDeclaracion][$request->route()->formatoSlug][$request->route()->subformatoSlug][$request->route()->array]['tipoBien']);

                            return \Redirect::to('declaracion/'.$declaracion->id.'/'.$request->route()->tipoDeclaracion.'/'.$request->route()->formatoSlug.'/'.$request->route()->subformatoSlug.'/'.$request->route()->array.'/?tipoBien='.$array[0]);
                          }
                        }// si tiene array
                        else
                        {
                          if(!in_array($request->get('tipoBien'),['vehiculo','inmueble']))
                          {
                            return \Redirect::to('declaracion/'.$declaracion->id.'/'.$request->route()->tipoDeclaracion.'/'.$request->route()->formatoSlug);
                          }
                        }
                      }// si tiene subformato
                    }//si es el formato prestamoComodato

                    return view($request->route()->formatoSlug.'_'.$request->route()->subformatoSlug)->with('declaracion',$declaracion)
                                                                                                     ->with('formatos',$formatos)
                                                                                                     ->with('tagsFormato',$tagsFormato);
                  }


                  if($request->method() == "POST")
                  {
                    $siguiente = $declaracion->insertarFormato($tagsFormato);

                    if($siguiente == true)
                    {
                      return \Redirect::to('declaracion/'.$declaracion->id.'/siguiente');
                    }
                    else
                    {
                      return \Redirect::to('declaracion/'.$declaracion->id.'/'.$request->route()->tipoDeclaracion.'/'.$request->route()->formatoSlug);
                    }
                  }//if post

              }//isset formatoSlug
            }//if ->formatos
          }//if declaracion existe
        }//contiene declaracion
      }//=declaracion

      return \Redirect::to('inicio');
    }//public





    public function catalogo(Request $request,$nombre_catalogo,$a = null,$b = null,$c = null)
    {
      $catalogo = new catalogo;

      switch($nombre_catalogo)
      {
        case "getPeriodos";
          return response()->json($catalogo->periodosGobierno($a));
        break;
        case "getTipoInversion";
          return response()->json($catalogo->subTipoInversion($a));
        break;
        case "getAlcaldias";
          return response()->json($catalogo->inegiAlcaldias($a));
        break;
        case "getLocalidades";
          return response()->json($catalogo->inegiLocalidades($a,$b));
        break;
        case "getCP";
          return response()->json($catalogo->inegiCP($a,$b,$c));
        break;
        case "getPago";
          return response()->json($catalogo->formapago($a));
        break;
      }
    }

}
