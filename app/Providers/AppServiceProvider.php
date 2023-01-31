<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

use App\Models\Catalogo;



class AppServiceProvider extends ServiceProvider
{

    public function register()
    {

    }



    public function boot()
    {
      \URL::forceScheme('https');

      view()->share('tabindex', 0);

      if(isset($_SERVER['SERVER_NAME']))
      {
        $config = Catalogo::config(explode(".", $_SERVER['SERVER_NAME'],2)['0']);

        view()->share('config', $config);
      }

      Blade::directive('money', function ($number) {
          return "<?php
                        if(is_numeric($number))
                        {
                          if($number > 0)
                          {
                            echo number_format($number, 0, '.', ',');
                          }
                        }
                  ?>";
      });

      Blade::directive('dMy', function($fecha){
            return "<?php
              if($fecha)
              {
                echo \Date::parse($fecha)->format('d-M-y');
              }
            ?>"; //12-dic-17
      });

      Blade::directive('sinZero', function($numero){
        return "<?php echo ltrim($numero, '0'); ?>"; //01
      });

      Blade::directive('rfc', function($string){
        return "<?php echo substr($string, 0, 10); ?>"; //01
      });

      Blade::directive('homoClave', function($string){
        return "<?php echo substr($string, -3); ?>"; //01
      });

    }

}
