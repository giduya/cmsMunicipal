<?php namespace App\Models\old;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;




class usuariold extends Model
{
  use HasFactory;

  protected $table="users";

  protected $guarded = ['id'];

  protected $connection = "mysql";

  public $timestamps = false;

}
