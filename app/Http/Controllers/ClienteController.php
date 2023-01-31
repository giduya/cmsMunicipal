<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Catalogo;
use App\Models\Cliente;
use App\Models\CpanelApi;

use GrahamCampbell\DigitalOcean\Facades\DigitalOcean;


class ClienteController extends Controller
{
  private $id = '746deb2c-a710-48a8-a41e-98214707c9c5';


  public function __construct()
  {
    $this->middleware('auth');
  }



  public function crear(Request $request)
  {
    $cliente = new Cliente;
    $cliente->municipio = strtoupper($request->input('municipio'));
    $cliente->estado = $request->input('estado');
    $cliente->subdominio = trim(strtolower($request->input('subdominio')));
    $cliente->estatus = $request->input('estatus');
    $cliente->periodo = $request->input('periodo');
    $cliente->nivelOrdenGobierno = $request->input('nivelOrdenGobierno');
    $cliente->ambitoPublico = $request->input('ambitoPublico');
    $cliente->password = 'declarapat';
    $cliente->pagos = [];
    $cliente->save();

    return \Redirect::to('inicio')->with('success', 'El subdominio se agregó correctamente.');
  }



  public function deploy(Request $request)
  {
    $cPanel = new CpanelApi();

    $dominios = $cPanel->uapi->DomainInfo->list_domains();

    $subdominiosCpanel = $dominios->data->sub_domains;

    //$apps = DigitalOcean::app()->getAll();
    //dd($apps); exit;

    if($request->input('comando') == "deploy-server-declarapat")
    {
      $clientes = Catalogo::clientes();


      $array[0] =  array("domain" => "declarapat.gob.mx",
                         "type" => "PRIMARY",
                         "zone" => "declarapat.gob.mx",
                        );


      foreach($clientes as $cliente)
      {
        $array[] = array("domain" => $cliente->subdominio.".declarapat.gob.mx",
                         "type" => "ALIAS",
                         "zone" => "declarapat.gob.mx",
                        );

        $subdominiosDigitalOcean[] = $cliente->subdominio.".declaracionpatrimonial.gob.mx";
      }

      $subdominiosInexistentes = array_diff($subdominiosDigitalOcean,$subdominiosCpanel);


      foreach($subdominiosInexistentes as $subdominioCrear)
      {
        $subdominioCrear = explode(".",$subdominioCrear,2);

        $subdominio = $cPanel->uapi->SubDomain->addsubdomain([
                                                              'domain' => $subdominioCrear[0],
                                                              'rootdomain' => $subdominioCrear[1],
                                                              'dir' => "/public_html/public",
                                                             ]);
      }


      $esp = [
              "name" => "declarapat",
              "services" => [
                              [
                                "name" => "web",
                                "github" => [
                                            "repo" => "giduya/demo",
                                            "branch" => "main",
                                            "deploy_on_push" => true,
                                          ],
                                          "run_command" => "heroku-php-apache2 public/",
                                          "environment_slug" => "php",
                                          "instance_size_slug" => "basic-xxs",
                                          "instance_count" => 1,
                                          "http_port" => 8080,
                                          "routes" => [
                                              [
                                                "path" => "/"
                                              ]
                                            ]
                              ]
                            ],
              "domains" => $array,
              "region" => "tor"
             ];

      $apps = DigitalOcean::app()->update($this->id,$esp);
    }

    return \Redirect::to('inicio')->with('success', 'El servidor se reinició correctamente, en 6 minutos debe estar funcionando.');
  }



  public function borrar(Request $request)
  {
    if(\Auth::user()->rol == "Dios")
    {
      $cliente = Cliente::where('subdominio','=',$request->route()->subdominio)->first();

      if(is_array($cliente->pagos))
      {
        return \Redirect::to('inicio')->with('danger', 'El subdominio no se puede borrar por que ya es un cliente con pagos.');
      }
      else
      {
        $cliente->delete();

        return \Redirect::to('inicio')->with('success', 'El subdominio fué borrado correctamente.');
      }
    }

    return \Redirect::to('inicio');
  }

}
