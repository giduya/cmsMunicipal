<?php namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests\DashboardRequest;

use App\Models\User;
use App\Models\Dashboard;
use App\Models\Catalogo;
use App\Models\Cliente;
use App\Models\Declaracion;
use App\Models\old\respaldo;

use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Hash;


class DashboardController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');
  }





  public function inicio(DashboardRequest $request)
  {

    if($request->method() == "GET")
    {
      $catalogo = new Catalogo;

      $pendiente = Declaracion::where('metadata.avance.firmar.electronicamente','=',false)->where('usuario','=', \Auth::user()->email)->first();

      $declaraciones = Declaracion::where('usuario','=', \Auth::user()->email)->orderby('metadata.actualizacion','DESC')->get();

      $respaldos = respaldo::where('user_id','=', \Auth::user()->idRespaldo)->orderby('fecha','DESC')->get();

      return view('dashboard.'.\Auth::user()->rol)->with('catalogo',$catalogo)->with('declaraciones',$declaraciones)->with('pendiente',$pendiente)->with('respaldos',$respaldos);
    }//get
  }





  public function transparencia(DashboardRequest $request)
  {
    $catalogo = new Catalogo;

    $año = $request->input('año');

    switch($request->input('trimestre'))
    {
      case "1t":
        $Inicio = Carbon::createMidnightDate($año,1,1);
        $Final = Carbon::createMidnightDate($año,3,31);
      break;
      case "2t":
        $Inicio = Carbon::createMidnightDate($año,4,1);
        $Final = Carbon::createMidnightDate($año,6,30);
      break;
      case "3t":
        $Inicio = Carbon::createMidnightDate($año,7,1);
        $Final = Carbon::createMidnightDate($año,9,30);
      break;
      case "4t":
        $Inicio = Carbon::createMidnightDate($año,10,1);
        $Final = Carbon::createMidnightDate($año,12,31);
      break;
    }

    $array = [];

    $transparenciaArray = Declaracion::whereBetween('metadata.actualizacion', [$Inicio, $Final])->get();

    foreach($transparenciaArray as $transparencia)
    {
      $array[] =
                  array("EJERCICIO" => $transparencia->metadata['actualizacion']->toDateTime()->format('Y'),
                        "INICIA" => $Inicio->toDateTime()->format('d/m/Y'),
                        "TERMINA" => $Final->toDateTime()->format('d/m/Y'),
                        "CATÁLOGO" => (isset($transparencia->declaracion['situacionPatrimonial']['datosEmpleoCargoComision']['clasificacion'])) ? $transparencia->declaracion['situacionPatrimonial']['datosEmpleoCargoComision']['clasificacion'] : '',
                        "NIVEL" => $transparencia->declaracion['situacionPatrimonial']['datosEmpleoCargoComision']['nivelEmpleoCargoComision'],
                        "PUESTO" => $transparencia->declaracion['situacionPatrimonial']['datosEmpleoCargoComision']['empleoCargoComision'],
                        "CARGO" => $transparencia->declaracion['situacionPatrimonial']['datosEmpleoCargoComision']['empleoCargoComision'],
                        "ADSCRIPCIÓN" => $transparencia->declaracion['situacionPatrimonial']['datosEmpleoCargoComision']['areaAdscripcion'],
                        "NOMBRE" => $transparencia->declaracion['situacionPatrimonial']['datosGenerales']['nombre'],
                        "PRIMER APELLIDO" => $transparencia->declaracion['situacionPatrimonial']['datosGenerales']['primerApellido'],
                        "SEGUNDO APELLIDO" => $transparencia->declaracion['situacionPatrimonial']['datosGenerales']['segundoApellido'],
                        "TIPO" => ucfirst($transparencia->metadata['tipo']),
                        "HIPERVÍNCULO" => "https://".explode(".", $_SERVER['SERVER_NAME'],2)['0'].".declarapat.gob.mx/versionPublica/".$transparencia->_id.'/pdf',
                        "ÁREA QUE PUBLICA" => "CONTRALORÍA",
                        "VALIDACIÓN" => $Inicio->toDateTime()->format('d/m/Y'),
                        "ACTUALIZACIÓN" => $Final->toDateTime()->format('d/m/Y'),
                        "NOTA" => "NINGUNA",
                  );
      }

      $json = json_encode($array);

    return view('dashboard.formatoTransparencia')->with('transparencia',$transparenciaArray)->with('json',$json)->with('inicio',$Inicio)->with('final',$Final)->with('subdominio',explode(".", $_SERVER['SERVER_NAME'],2)['0']);
  }





  public function config(DashboardRequest $request)
  {
    if(explode(".", $_SERVER['SERVER_NAME'],2)['0'] != "demo")
    {
      if(\Auth::user()->rol == "Contralor")
      {
        $config = Dashboard::where('subdominio','=',explode(".", $_SERVER['SERVER_NAME'],2)['0'])->first();
        $config->password = $request->input('contrasenaGeneral');
        $config->save();

        \Session::flash('success', 'La configuración se actualizó correctamente.');
      }
    }
    else
    {
      \Session::flash('danger', 'Los datos de la cuenta demo no pueden ser cambiados.');
    }

    return \Redirect::to('inicio');
  }





  public function titular(DashboardRequest $request)
  {
    if(explode(".", $_SERVER['SERVER_NAME'],2)['0'] != "demo")
    {
      if(\Auth::user()->rol == "Contralor")
      {
        $contralor = User::where('_id','=',\Auth::user()->id)->first();
        $contralor->name = $request->input('nombre');
        $contralor->primerApellido = $request->input('primerApellido');
        $contralor->segundoApellido = $request->input('segundoApellido');
        $contralor->correo = $request->input('correo');
        $contralor->celular = $request->input('celular');
        $contralor->email = $request->input('usuario');
        $contralor->password = Hash::make($request->input('contrasenaAdmin'));
        $contralor->save();

        \Session::flash('success', 'Los datos del titular de contraloría se actualizaron correctamente.');

        return \Redirect::to('inicio/titular');
      }
    }
    else
    {
      \Session::flash('danger', 'Los datos de la cuenta demo no pueden ser cambiados.');
    }

    return \Redirect::to('inicio');
  }





  public function contrasena(DashboardRequest $request)
  {
    if(explode(".", $_SERVER['SERVER_NAME'],2)['0'] != "demo")
    {
      if(\Auth::user()->rol != "Contralor")
      {
        $user = User::where('_id','=',\Auth::user()->id)->first();
        $user->password = Hash::make($request->input('contrasenaAdmin'));
        $user->save();

        \Session::flash('success', 'La contraseña se actualizó correctamente.');

        return \Redirect::to('inicio');
      }
    }
    else
    {
      \Session::flash('danger', 'Los datos de la cuenta demo no pueden ser cambiados.');
    }

    return \Redirect::to('inicio');
  }





  public function declaranteImportar(DashboardRequest $request)
  {
    if($request->method() == "GET")
    {
      return view('dashboard.declaranteImportar');
    }

    if($request->method() == "POST")
    {
      $collection = Excel::toCollection(new UsersImport,request()->file('excel'));

      foreach($collection['0'] as $fila)
      {
        switch($fila['5'] == "S")
        {
          case "S":
            $tipo = false;
          break;
          case "C":
            $tipo = true;
          break;
          default:
            $tipo = false;
        }

        $persona['nombre'] = $fila['0'];
        $persona['primerApellido'] = $fila['1'];
        $persona['segundoApellido'] = $fila['2'];
        $persona['tipo'] = $tipo;
        $persona['rfcFisica'] = $fila['3'];
        $persona['homoClave'] = $fila['4'];

        $this->crearUsuario($persona);
      }//foreach

      return \Redirect::to('declarante/importar')->with('success', 'Los usuarios del excel se han importado correctamente.');
    }//if
  }





  public function declaranteHistorial(DashboardRequest $request)
  {
    if(\Auth::user()->rol == "Contralor")
    {
      $usuario = User::where('email','=',request('usuario'))->first();

      $declaraciones = Declaracion::where('usuario','=',request('usuario'))->orderby('metadata.actualizacion','DESC')->get();

      $respaldos = respaldo::where('user_id','=', $usuario['idRespaldo'])->orderby('fecha','DESC')->get();

      return view('dashboard.declaranteHistorial')->with('declaraciones',$declaraciones)->with('usuario',$usuario)->with('respaldos',$respaldos);
    }

    return \Redirect::to('inicio');
  }





  public function declaranteBorrar(DashboardRequest $request)
  {
    if(\Auth::user()->rol == "Contralor")
    {
      $declarante = User::where('_id','=',$request->input('id'))->first();
      $declarante->delete();

      return \Redirect::to('declarante/lista')->with('success', 'El usuario se ha borrado correctamente, sin afectar sus declaraciones existentes.');
    }

    return \Redirect::to('inicio');
  }





  public function declarantePassword(DashboardRequest $request)
  {
    if(\Auth::user()->rol == "Contralor")
    {
      $config = Dashboard::where('subdominio','=',explode(".", $_SERVER['SERVER_NAME'],2)['0'])->first();
      $usuario = User::where('_id','=',request('id'))->first();
      $usuario->password =  Hash::make($config->password);
      $usuario->save();

      return \Redirect::to('declarante/lista')->with('success', 'La contraseña de: '.$usuario->email.' se reinició correctamente a: '.$config->password);
    }

    return \Redirect::to('inicio');
  }





  public function declaranteLista(DashboardRequest $request)
  {
    if(\Auth::user()->rol == "Contralor")
    {
      $declarantes = User::where('rol','=','declarante')->orderby('primerApellido','ASC')->get();

      return view('dashboard.declaranteLista')->with('declarantes',$declarantes);
    }

    return \Redirect::to('inicio');
  }




  private function crearUsuario($array)
  {
    $config = Dashboard::where('subdominio','=',explode(".", $_SERVER['SERVER_NAME'],2)['0'])->first();

    $existe = User::where('email','=',strtoupper($array['rfcFisica']).strtoupper($array['homoClave']))->first();

    if(is_null($existe))
    {
      if(!empty($array['nombre']))
      {
        $usuario = new User;
        $usuario->name = strtoupper(trim($array['nombre']));
        $usuario->primerApellido = strtoupper(trim($array['primerApellido']));
        $usuario->segundoApellido = strtoupper(trim($array['segundoApellido']));
        $usuario->declaracionCompleta = filter_var($array['tipo'], FILTER_VALIDATE_BOOLEAN);;
        $usuario->rol = 'declarante';
        $usuario->email = strtoupper(trim(strtoupper($array['rfcFisica'])).trim($array['homoClave']));
        $usuario->periodo = isset($array['periodo']) ? $array['periodo'] : $config->periodo;
        $usuario->password = Hash::make($config->password);
        $usuario->contrasena = $config->password;
        $usuario->save();
        return $usuario;
      }
    }
  }





  public function declaranteCrear(DashboardRequest $request)
  {

    if(\Auth::user()->rol == "Contralor")
    {
      if($request->method() == "GET")
      {
        $catalogo = new Catalogo;

        $usuario = User::where('email','=',request('usuario'))->first();

        return view('dashboard.declaranteCrear')->with('catalogo',$catalogo)->with('usuario',$usuario);
      }



      if($request->method() == "PATCH")
      {
        $config = Dashboard::where('subdominio','=',explode(".", $_SERVER['SERVER_NAME'],2)['0'])->first();

        $usuario = User::where('email','=',request('rfcFisica').request('homoClave'))->first();
        $usuario->name = strtoupper(trim(request('nombre')));
        $usuario->primerApellido = strtoupper(trim(request('primerApellido')));
        $usuario->segundoApellido = strtoupper(trim(request('segundoApellido')));
        $usuario->declaracionCompleta = filter_var(request('tipo'), FILTER_VALIDATE_BOOLEAN);
        $usuario->periodo = empty(request('periodo')) ? $config->periodo : request('periodo');

        $usuario->save();

        \Session::flash('success', 'El declarante se ha actualizado correctamente.');

        return \Redirect::to('declarante/lista');
      }



      if($request->method() == "POST" )
      {
        $usuario = User::where('email','=',request('rfcFisica').request('homoClave'))->first();

        if(empty($usuario))
        {
          $usuario = $this->crearUsuario(request());

          \Session::flash('success', 'El declarante se ha agregado correctamente. Usuario: '.$usuario->email." Contraseña: ".$usuario->contrasena);
        }
        else
        {
          \Session::flash('danger', 'El declarante ya existe anteriormente.');
        }
      }
    }

    return \Redirect::to('inicio');

  }//public


}
