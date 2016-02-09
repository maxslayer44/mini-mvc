<?php

if (preg_match('/\.(?:png|jpg|jpeg|gif|css|js)$/', $_SERVER["REQUEST_URI"]))
{
    return false;
} else {

    define('DS', DIRECTORY_SEPARATOR);
    define('WEBROOT', dirname(__FILE__));
    define('ROOT', dirname(WEBROOT));
    define('CONTROLLERS', ROOT . DS . 'Controllers' . DS);
    define('VIEWS', ROOT . DS . 'Views' . DS);

    spl_autoload_register(function ($classname) {
        $path = '..' . DS . str_replace('\\', DS, $classname) . '.php';
        require_once $path;
    });

    require_once '..' . DS . 'Core' . DS . 'functions.php';

    $app = new \Core\Application(ROOT . DS . 'Config');
    $app->run();
}
