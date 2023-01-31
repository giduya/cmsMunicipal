<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Laravel\Passport\Exceptions\OAuthServerException as ExceptionsOAuthServerException;
use League\OAuth2\Server\Exception\OAuthServerException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return voidsi panchurris
     */
    public function register()
    {

      $this->renderable(function (\Exception $e) {
          if ($e->getPrevious() instanceof \Illuminate\Session\TokenMismatchException) {
              return redirect()->route('landing');
          };
      });



        $this->reportable(function (Throwable $e) {
            // if($e instanceof ExceptionsOAuthServerException) {
            //      return \response()->json(['message' => $e->getMessage()], );
            //     exit;
            // }
        });
    }
}
