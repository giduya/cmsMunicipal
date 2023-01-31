<?php namespace App\Exports;

use Jenssegers\Mongodb\Eloquent\Model;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;


class TransparenciaExport implements FromQuery
{
  use Exportable;

  public function query()
  {
    return Invoice::query();
  }

}
