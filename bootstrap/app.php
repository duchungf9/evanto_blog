<?php

/*
|--------------------------------------------------------------------------
| Create The Application
|--------------------------------------------------------------------------
|
| The first thing we will do is create a new Laravel application instance
| which serves as the "glue" for all the components of Laravel, and is
| the IoC container for the system binding all of the various parts.
|
*/
$_ENV['DOMAIN_CURRENT'] = isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : '';
$_ENV['CAUHINH'] = [
    [
        'domain'=>'kenhgosu.com',
        'name'=>'kenhgosu',
    ],
    [
        'domain'=>'evanto.com.vn',
        'name'=>'cms',
    ],
    [
        'domain'=>'nuockhoang365.com',
        'name'=>'nuockhoang365',
    ],
    [
        'domain'=>'139.59.250.144',
        'name'=>'nuockhoang365',
    ]
];
$sDomain =  $_SERVER['SERVER_NAME'];
$key = array_search($sDomain, array_column($_ENV['CAUHINH'], 'domain'));
$_ENV['PROJECT_NAME'] = 'cms';
if($key!=false){
    $_ENV['PROJECT_NAME'] = $_ENV['CAUHINH'][$key]['name'];
}

define('VIEW_FRONT', 'frontend.'.$_ENV['PROJECT_NAME'].'.');
$app = new Illuminate\Foundation\Application(
    realpath(__DIR__.'/../')
);

/*
|--------------------------------------------------------------------------
| Bind Important Interfaces
|--------------------------------------------------------------------------
|
| Next, we need to bind some important interfaces into the container so
| we will be able to resolve them when needed. The kernels serve the
| incoming requests to this application from both the web and CLI.
|
*/

$app->singleton(
    Illuminate\Contracts\Http\Kernel::class,
    App\Http\Kernel::class
);

$app->singleton(
    Illuminate\Contracts\Console\Kernel::class,
    App\Console\Kernel::class
);

$app->singleton(
    Illuminate\Contracts\Debug\ExceptionHandler::class,
    App\Exceptions\Handler::class
);

/*
|--------------------------------------------------------------------------
| Return The Application
|--------------------------------------------------------------------------
|
| This script returns the application instance. The instance is given to
| the calling script so we can separate the building of the instances
| from the actual running of the application and sending responses.
|
*/

return $app;
