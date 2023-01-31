<?php namespace App\Models\old;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;




class declaraciones extends Model
{
  use HasFactory;

  protected $table="declarations";

  protected $guarded = ['id'];

  protected $connection = "mysql";
}
