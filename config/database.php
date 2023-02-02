<?php

use Illuminate\Support\Str;

if(isset($_SERVER['SERVER_NAME']))
{
  $array = explode(".", $_SERVER['SERVER_NAME'],2);
}
else
{
  $array['0'] = "demo";
}

//$array['0'] = 'hueyotlipan';

return [

    /*
    |--------------------------------------------------------------------------
    | Default Database Connection Name
    |--------------------------------------------------------------------------
    |
    | Here you may specify which of the database connections below you wish
    | to use as your default connection for all database work. Of course
    | you may use many connections at once using the Database library.
    |
    */

    'default' => 'mongodb',

    /*
    |--------------------------------------------------------------------------
    | Database Connections
    |--------------------------------------------------------------------------
    |
    | Here are each of the database connections setup for your application.
    | Of course, examples of configuring each database platform that is
    | supported by Laravel is shown below to make development simple.
    |
    |
    | All database work in Laravel is done through the PHP PDO facilities
    | so make sure you have the driver for your particular database of
    | choice installed on your machine before you begin development.
    |
    */


    'connections' => [
      'mongodb' => [
        'driver' => 'mongodb',
        'dsn' => 'mongodb+srv://admin:cBRtY2gZz!9uUfu@cluster0.ojo6r.mongodb.net',
        'database' => 'bd_cms',
      ],
      'mysql' => [
          'driver' => 'mysql',
          'host' => '173.255.247.91',
          'port' => '3306',
          'database' => 'ayudigre_'.$array['0'],
          'username' => 'ayudigre_mineral',
          'password' => 'O;-@du-;_i=b',
          'unix_socket' => env('DB_SOCKET', ''),
          'charset' => 'utf8mb4',
          'collation' => 'utf8mb4_unicode_ci',
          'prefix' => '',
          'prefix_indexes' => true,
          'strict' => true,
          'engine' => null,
          'options' => extension_loaded('pdo_mysql') ? array_filter([
              PDO::MYSQL_ATTR_SSL_CA => env('MYSQL_ATTR_SSL_CA'),
          ]) : [],
      ],
      'catalogos' => [
        'driver' => 'mongodb',
        'dsn' => 'mongodb+srv://admin:cBRtY2gZz!9uUfu@cluster0.ojo6r.mongodb.net',
        'database' => 'bd_demo',
      ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Migration Repository Table
    |--------------------------------------------------------------------------
    |
    | This table keeps track of all the migrations that have already run for
    | your application. Using this information, we can determine which of
    | the migrations on disk haven't actually been run in the database.
    |
    */

    'migrations' => 'migrations',

    /*
    |--------------------------------------------------------------------------
    | Redis Databases
    |--------------------------------------------------------------------------
    |
    | Redis is an open source, fast, and advanced key-value store that also
    | provides a richer body of commands than a typical key-value system
    | such as APC or Memcached. Laravel makes it easy to dig right in.
    |
    */

    'redis' => [

        'client' => env('REDIS_CLIENT', 'phpredis'),

        'options' => [
            'cluster' => env('REDIS_CLUSTER', 'redis'),
            'prefix' => env('REDIS_PREFIX', Str::slug(env('APP_NAME', 'laravel'), '_').'_database_'),
        ],

        'default' => [
            'url' => env('REDIS_URL'),
            'host' => env('REDIS_HOST', '127.0.0.1'),
            'password' => env('REDIS_PASSWORD', null),
            'port' => env('REDIS_PORT', '6379'),
            'database' => env('REDIS_DB', '0'),
        ],

        'cache' => [
            'url' => env('REDIS_URL'),
            'host' => env('REDIS_HOST', '127.0.0.1'),
            'password' => env('REDIS_PASSWORD', null),
            'port' => env('REDIS_PORT', '6379'),
            'database' => env('REDIS_CACHE_DB', '1'),
        ],

    ],

];
