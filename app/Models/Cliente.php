<?php namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;
//use Illuminate\Database\Eloquent\Model;

use App\Models\Catalogo;



class Cliente extends Model
{
  use HasFactory;

  protected $connection = 'catalogos';

  protected $collection = 'clientes';

  protected $fillable = ['nombre'];


}
