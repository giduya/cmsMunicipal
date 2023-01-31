<?php namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests\DashboardRequest;

use App\Models\User;
use App\Models\Dashboard;
use App\Models\Catalogo;
use App\Models\Cliente;
use App\Models\Declaracion;
use App\Models\old\respaldo;

use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Hash;


class DashboardController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');
  }

}
