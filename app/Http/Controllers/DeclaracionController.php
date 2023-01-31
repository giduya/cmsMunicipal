<?php namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests\FormatoRequest;

use App\Models\Declaracion;
use App\Models\Catalogo;


class DeclaracionController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

}
