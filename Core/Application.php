<?php

namespace Core;

use Core\Router\Route;
use Core\Router\Router;

/**
 * Class Application
 * Classe application du Framework
 * @package Core
 */
class Application
{

    private $config;

    /**
     * @var Router
     */
    private $router;

    /**
     * Application constructor.
     * @param $config URL du répertoire de configuration
     */
    public function __construct($config)
    {
        $this->config = $config;
        $this->router = new Router();
    }

    /**
     * Lancement de l'application
     */
    public function run()
    {
        $this->initRouter();

        $ex = null;
        $controller = "";
        $action = "";
        $error = true;

        try {
            $route = $this->router->matchRoute(parse_url($_SERVER['REQUEST_URI'])['path']);

            $_GET = array_merge($_GET, $route->getVars());

            $controller = "\\Controllers\\" . $route->getController() . "Controller";

            if(!file_exists(CONTROLLERS . $route->getController() . "Controller.php") || !class_exists($controller))
            {
                throw new \ErrorException('Le controlleur n\'existe pas');
            }

            $action = "action_" . $route->getAction();

            if(!method_exists($controller, $action))
            {
                throw new \ErrorException('L\'action n\'existe pas');
            }

            $error = false;
        } catch(\RuntimeException $ex) {
            $controller = "\\Core\\NotFoundController";
            $action = "action_notFound";
        } catch(\ErrorException $ex) {
            $controller = "\\Core\\ErrorController";
            $action = "action_error";
        }

        /**
         * @var Controller
         */
        $ctrl = new $controller($this, $error);

        $ctrl->onBeforeAction();
        $ctrl->$action($_GET);
        $ctrl->onAfterAction();
    }

    /**
     * Initialise les routes
     */
    private function initRouter()
    {
        $xml = new \DOMDocument();
        $xml->load($this->config . DS . 'routes.xml');

        $XMLRoutes = $xml->getElementsByTagName('route');

        foreach($XMLRoutes as $XMLRoute)
        {
            $vars = [];

            if($XMLRoute->hasAttribute('vars'))
            {
                $vars = explode(',', $XMLRoute->getAttribute('vars'));
            }

            $route = new Route(
                $XMLRoute->getAttribute('name'),
                $XMLRoute->getAttribute('path'),
                $XMLRoute->getAttribute('controller'),
                $XMLRoute->getAttribute('action'),
                $vars
            );

            $this->router->addRoute($route);
        }
    }

    /**
     * @return Router
     */
    public function getRouter()
    {
        return $this->router;
    }

}
