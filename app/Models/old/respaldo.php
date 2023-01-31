<?php namespace App\Models\old;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;
//use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;




class respaldo extends Model
{
  use HasFactory;

  protected $connection = 'mongodb';

  protected $collection = 'respaldo';

  protected $guarded = ['id'];

  protected $dates = ['fecha'];
}
