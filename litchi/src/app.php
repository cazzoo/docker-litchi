<?php

require(LYCHEE_SRC . 'autoload.php');

use Silex\Application;
use Silex\Provider\AssetServiceProvider;
use Silex\Provider\TwigServiceProvider;
use Silex\Provider\ServiceControllerServiceProvider;
use Silex\Provider\HttpFragmentServiceProvider;
use Silex\Provider\MonologServiceProvider;
use Silex\Provider\SessionServiceProvider;

date_default_timezone_set('UTC');

$app = new Application();

$app->register(new ServiceControllerServiceProvider());
$app->register(new AssetServiceProvider());
$app->register(new TwigServiceProvider());
$app->register(new HttpFragmentServiceProvider());
$app->register(new Silex\Provider\SessionServiceProvider());
$app->register(new Silex\Provider\VarDumperServiceProvider());
$app->register(new Silex\Provider\DoctrineServiceProvider(), [
    'db.options' => [
        'driver'   => 'pdo_mysql',
        'host'      => getenv('DATABASE_HOST'),
        'dbname'    => getenv('DATABASE_NAME'),
        'user'      => getenv('DATABASE_USER'),
        'password'  => getenv('DATABASE_PASSWORD'),
    ],
]);

$app['twig'] = $app->extend('twig', function ($twig, $app) {
    // add custom globals, filters, tags, ...

    return $twig;
});

$app->register(new Lychee\System\ServiceProvider());
$app->register(new Lychee\Dock\ServiceProvider());
$app->register(new Lychee\Auth\ServiceProvider());
$app->register(new Lychee\Albums\ServiceProvider());
$app->register(new Lychee\Album\ServiceProvider());
$app->register(new Lychee\Photo\ServiceProvider());
$app->register(new Lychee\Search\ServiceProvider());
$app->register(new Lychee\Settings\ServiceProvider());

return $app;
