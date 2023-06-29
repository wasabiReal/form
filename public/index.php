<?php

require '../vendor/libs/debug.php';
$query = $_SERVER['REQUEST_URI'];

use vendor\core\Router;

const WWW = __DIR__;
define('CORE', dirname(__DIR__) . '/vendor/core');
define('ROOT', dirname(__DIR__));
define('APP', dirname(__DIR__) . '/app');
define('LIBS', dirname(__DIR__) . '/vendor/libs');
define('LAYOUT', 'default');


spl_autoload_register(function ($class){
    $file = ROOT . '/' . str_replace('\\', '/', $class) . '.php';
    if(is_file($file)){
        require_once $file;
    }
});
new \vendor\core\App;

Router::add('^$', ['controller' => 'Register', 'action' => 'index']);
Router::add('^(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$');

debug(Router::routes());

if (Router::matchRoutes($query)){
    debug(Router::route());
}else{
    echo '404';
}

Router::dispatch($query);