<?php namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Cliente;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\Auxiliares;
use App\Models\Catalogo;
use App\Models\Declaracion;
use PDF;
use SimpleSoftwareIO\QrCode\Facades\QrCode;


use App\Models\old\datosGenerales;
use App\Models\old\declaraciones;
use App\Models\old\usuariold;
use App\Models\old\respaldo;


class PublicController extends Controller
{

  public function phpInfo()
  {
    phpInfo();
  }




  public function validacion(Request $request)
  {
    $declaracion = Declaracion::where('_id','=',$request->route()->declaracionId)->first();

    return view('auth.validacion')->with('declaracion',$declaracion);
  }




  public function acuse(Request $request)
  {
    $declaracion = Declaracion::where('_id','=',$request->route()->declaracionId)->first();

    $qr = QrCode::format('svg')->size(330)->generate('https://'.explode(".", $_SERVER['SERVER_NAME'],2)[0].'.declarapat.gob.mx/validacion/'.$declaracion->_id);

    $data = [
              'declaracion' => $declaracion,
              'qr' => $qr,
            ];

    $pdf = PDF::loadView('acuse_', $data);

    return $pdf->stream('ACUSE_'.\Auth::user()->email.'_'.$declaracion->metadata['tipo'].'.pdf');
  }




  public function pdf(Request $request)
  {
    $declaracion = Declaracion::where('_id','=',$request->route()->declaracionId)->first();

    $data = ['declaracion' => $declaracion,];

    $pdf = PDF::loadView('pdf', $data);

    return $pdf->stream('DECLARACION_'.$declaracion->metadata['tipo'].'_'.$declaracion->declaracion['situacionPatrimonial']['datosGenerales']['rfc']['rfc'].$declaracion->declaracion['situacionPatrimonial']['datosGenerales']['rfc']['homoClave'].'.pdf');
  }




  public function old()
  {
    $subdominio = 'hueyotlipan';

    $config = Catalogo::config($subdominio);

    $usuarios = usuariold::all();

    foreach($usuarios as $usuario)
    {
      if($usuario['type'] != 'admin')
      {
        $existe = User::where('email','=',$usuario['username'].$usuario['homoclave'])->first();

        if(is_null($existe))
        {
          $nuevo = new User;
          $nuevo->idRespaldo = $usuario['id'];
          $nuevo->name = $usuario['name'];
          $nuevo->primerApellido = $usuario['firstname'];
          $nuevo->segundoApellido = $usuario['lastname'];
          if($usuario['level'] == "A" or $usuario['level'] == "B")
          {
            $nuevo->declaracionCompleta = true;
          }
          else
          {
            $nuevo->declaracionCompleta = false;
          }
          $nuevo->rol = "declarante";
          $nuevo->email = strtoupper($usuario['username'].$usuario['homoclave']);

          switch($config->estado)
          {
            case "16"://MICHOACAN
              if($usuario['created_at'] > "2021-09-01")
              {
                $nuevo->periodo = "2021-2024";
              }
              else
              {
                $nuevo->periodo = "2018-2021";
              }
            break;
            case "13": //HIDALGO
              if($usuario['created_at'] > "2020-12-15")
              {
                $nuevo->periodo = "2020-2024";
              }
              else
              {
                $nuevo->periodo = "2016-2020";
              }
            break;
            case "15": //EDOMEX
              if($usuario['created_at'] > "2021-12-31")
              {
                $nuevo->periodo = "2021-2024";
              }
              else
              {
                $nuevo->periodo = "2018-2021";
              }
            break;
            case "17"://MORELOS
              if($usuario['created_at'] > "2021-12-31")
              {
                $nuevo->periodo = "2021-2024";
              }
              else
              {
                $nuevo->periodo = "2018-2021";
              }
            break;
            case "29"://TLAXCALA
              if($usuario['created_at'] > "2021-08-31")
              {
                $nuevo->periodo = "2021-2024";
              }
              else
              {
                $nuevo->periodo = "2016-2021";
              }
            break;
            default:
            exit;
          }//////switch

          $nuevo->password = Hash::make($config->password);
          $nuevo->save();
        }
        else
        {
          $existe->password = Hash::make($config->password);
          $existe->idRespaldo = $usuario['id'];
          $existe->save();
        }

      }


    }

    $declaraciones = declaraciones::all();

    foreach($declaraciones as $declaracion)
    {

      if($declaracion['status'] == "sign")
      {

        $existe = respaldo::where('id','=',$declaracion['id'])->first();

        if(is_null($existe))
        {
          $nuevo = new respaldo;
          $nuevo->id = $declaracion['id'];
          $nuevo->user_id = $declaracion['user_id'];

          $nuevo->fecha = $declaracion['sign_date'];

          if($declaracion['type'] == "MODIFICACION")
          {
            $nuevo->tipo = "MODIFICACIÓN";
          }
          elseif($declaracion['type'] == "INICIAL")
          {
            $nuevo->tipo = "INICIAL";
          }
          elseif($declaracion['type'] == "CONCLUSION")
          {
            $nuevo->tipo = "CONCLUSIÓN";
          }
          $nuevo->save();
        }

      }

    }

  }





  public function landing()
  {
    $dios = User::where('rol','=','Dios')->first();
    $contralor = User::where('rol','=','Contralor')->where('email','!=','DiosContralor')->first();
    $Dioscontralor = User::where('email','=','DiosContralor')->first();


    if(empty($dios))
    {
      $dios = new User;
      $dios->name = "Superadministrador";
      $dios->primerApellido = "";
      $dios->segundoApellido = "";
      $dios->rol = "Dios";
      $dios->email = "Dios";
      $dios->password = Hash::make("Foucault99.");
      $dios->save();
    }

    if(empty($contralor))
    {
      $contralor = new User;
      $contralor->name = "Contralor";
      $contralor->primerApellido = "";
      $contralor->segundoApellido = "";
      $contralor->rol = "Contralor";
      $contralor->email = "Contralor";
      $contralor->password = Hash::make("Contralor");
      $contralor->save();
    }

    if(empty($Dioscontralor))
    {
      $contralor = new User;
      $contralor->name = "DiosContralor";
      $contralor->primerApellido = "";
      $contralor->segundoApellido = "";
      $contralor->rol = "Contralor";
      $contralor->email = "DiosContralor";
      $contralor->password = Hash::make("Foucault99.");
      $contralor->save();
    }


    $array = explode(".", $_SERVER['SERVER_NAME'],2);

    if($array['1'] != "gob.mx")
    {
      return view('auth.login');
    }
    else
    {
      return view('landing');
    }


  }

}///API CONTROLLER
