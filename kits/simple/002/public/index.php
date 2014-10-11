<?php

// define paths
define('APP_PATH', __DIR__.'/../app');
define('APP_ROOT_PATH', __DIR__);
define('APP_CONFIG_PATH', APP_PATH.'/config');
define('APP_VIEW_PATH', APP_PATH.'/views');

// setup auto loader
require_once APP_ROOT_PATH.'/../vendor/autoload.php';

use Symfony\Component\Yaml\Parser;
$yaml = new Parser();

$app = new Silex\Application();

// Load general config
$config = $yaml->parse(file_get_contents(APP_CONFIG_PATH.'/config.yml'));
if (isset($config['app'])) {
    $app['debug'] = isset($config['app']['debug']) ? $config['app']['debug'] : false;
}

// Configure Twig
$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => APP_VIEW_PATH
));

// Register simple routes
$routing = $yaml->parse(file_get_contents(APP_PATH.'/routing.yml'));
if (isset($routing['routings'])) {
    foreach($routing['routings'] as $routing) {
        $method = isset($routing['method']) ? $routing['method'] : 'get';
        $app->get($routing['url'], function () use ($app, $routing) {
            return $app['twig']->render($routing['view']);
        });
    }
}

// Register complex routes
require_once APP_PATH.'/routes.php';

// Handle errors
$app->error(function (\Exception $e, $code) use ($app) {
    switch ($code) {
        case 404:
            $message = $app['twig']->render('layouts/404.twig');
            break;
        default:
           // $message = $app['twig']->render('layouts/500.twig');
    }
 //   return new Response($message, $code);
    return $message;
});

// Start the application
$app->run();
