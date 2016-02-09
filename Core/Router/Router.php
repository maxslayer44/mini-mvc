<?php

namespace core\Router;


class Router
{
    private $routes = [];

    /**
     * @var Route
     */
    private $current;

    const NO_ROUTE = 1;

    /**
     * @param Route $route
     */
    public function addRoute(Route $route)
    {
        if(!in_array($route, $this->routes))
        {
            $this->routes[$route->getName()] = $route;
        }
    }

    /**
     * Vérifie qu'une route correspond à l'URL passée en paramètre
     * @param string $url
     * @return Route
     */
    public function matchRoute($url)
    {
        foreach($this->routes as $route)
        {
            if(($varsValues = $route->match($url)) !== FALSE)
            {
                if($route->hasVars())
                {
                    $varsNames = $route->getVarsNames();
                    $listVars = [];

                    foreach($varsValues as $key => $match)
                    {
                        if($key !== 0)
                        {
                            $listVars[$varsNames[$key - 1]] = $match;
                        }
                    }

                    $route->setVars($listVars);
                }

                $this->current = $route;

                return $route;
            }
        }

        throw new \RuntimeException('Aucune route ne correspond à l\'URL', self::NO_ROUTE);
    }

    /**
     * Génère la route de nom $name et de paramètres $params
     * @param string $name
     * @param array $params
     * @return string
     */
    public function makeRoute($name, $params = [])
    {
        if(isset($this->routes[$name]))
        {
            $route = $this->routes[$name];
            $url = $route->getUrl();

            if($route->hasVars())
            {
                $varsNames = $route->getVarsNames();
                preg_match_all('/\((.*?)?\)/', $url, $matches);

                foreach($varsNames as $key => $value)
                {
                    $url = str_replace_first($matches[0][$key], $params[$value], $url);
                }

            }

            $url = str_replace('\\', "", $url);
            return $url;
        }
        throw new \RuntimeException('Aucune route ne correspond à l\'URL', self::NO_ROUTE);
    }

    /**
     * Retourne les routes
     * @return array
     */
    public function routes()
    {
        return $this->routes;
    }

    /**
     * Renvoi la route courante
     * @return Route
     */
    public function getCurrent()
    {
        return $this->current;
    }
}