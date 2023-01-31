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


class PublicController extends Controller
{

  public function landing()
  {
   echo "123"; exit;

    $dios = User::where('rol','=','Dios')->first();

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

    $array = explode(".", $_SERVER['SERVER_NAME'],2);

    return view('auth.login');

  }

}///API CONTROLLER
