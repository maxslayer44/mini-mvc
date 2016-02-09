<?php

namespace Core\Router;


class Route
{

    private $name;
    private $action;
    private $controller;
    private $url;
    private $varsNames;
    private $vars = [];

    /**
     * Route constructor.
     * @param $name
     * @param $url
     * @param $controller
     * @param $action
     * @param array $varsNames
     */
    public function __construct($name, $url, $controller, $action, array $varsNames)
    {
        $this->name = $name;
        $this->url = $url;
        $this->controller = $controller;
        $this->action = $action;
        $this->varsNames = $varsNames;
    }

    /**
     * @param $url
     * @return bool|array
     */
    public function match($url)
    {
        if (preg_match('`^' . $this->url . '$`', $url, $matches))
        {
            return $matches;
        }
        return false;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * @return mixed
     */
    public function getController()
    {
        return $this->controller;
    }

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @return array
     */
    public function getVarsNames()
    {
        return $this->varsNames;
    }

    /**
     * @return array
     */
    public function getVars()
    {
        return $this->vars;
    }

    /**
     * @param array $vars
     */
    public function setVars(array $vars)
    {
        $this->vars = $vars;
    }

    /**
     * @return bool
     */
    public function hasVars()
    {
        return !empty($this->varsNames);
    }

}