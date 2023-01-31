<?php namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Builder;


class Auxiliares
{

  public static function acentos($cadena)
  {
    $originales = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿ';
    $modificadas = 'aaaaaaaceeeeiiiidnoooooouuuuybsaaaaaaaceeeeiiiidnoooooouuuyyby';
    $cadena = utf8_decode($cadena);
    $cadena = strtr($cadena, utf8_decode($originales), $modificadas);
    $cadena = strtoupper($cadena);
    return utf8_encode($cadena);
  }

  public static function nulo($cadena)
  {
    if(empty($cadena))
    {
      return "";
    }
    else
    {
      return $cadena;
    }
  }

};
