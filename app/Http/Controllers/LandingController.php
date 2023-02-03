<?php namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Cliente;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;


use App\Models\Auxiliares;
use App\Models\Maqueta;



class LandingController extends Controller
{

  public function index()
  {
    $array = explode(".", $_SERVER['SERVER_NAME'],2);

    $archivos = Storage::disk('local')->allFiles();

    return view('Plantilla.index')->with('archivos',$archivos);
  }

}///API CONTROLLER
