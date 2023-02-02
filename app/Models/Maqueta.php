<?php namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;
//use Illuminate\Database\Eloquent\Model;

use App\Models\Catalogo;



class Maqueta extends Model
{
  use HasFactory;

  protected $connection = 'mongodb';

  protected $collection = 'maqueta';

  protected $fillable = ['nombre'];

  public $timestamps = false;


    /////////////////////////////////////////////////////////////////////////////////
    /////////////////////// FUNCIONES
    /////////////////////////////////////////////////////////////////////////////////

    public function crear($tipo)
    {
      $maqueta = Maqueta::create(['plantilla' => 1]);

      dd($maqueta); exit;


    }






}
