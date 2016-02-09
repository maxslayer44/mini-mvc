<?php

namespace Core;

/**
 * Class View
 * @package Core
 */
class View extends ApplicationComponent
{
    private $vars = [];
    private $template;

    /**
     * Assigne un couple $key => $value dans la vue
     * @param string $key
     * @param mixed $value
     */
    public function assign($key, $value)
    {
        $this->vars[$key] = $value;
    }

    /**
     * Initialise le chemin dutemplate à rendre
     * @param string $file Chemin du template (relatif au dossier Views)
     */
    public function setTemplate($file)
    {
        $this->template = $file;
    }

    /**
     * Alias de Router::makeRoute
     * @param string $name
     * @param array $params
     * @return string
     * @see \Core\Router\Router::makeRoute
     */
    private function url($name, $params = [])
    {
        try {
            return $this->application->getRouter()->makeRoute($name, $params);
        } catch(\RuntimeException $ex) {
            return "#";
        }
    }

    /**
     * Rendu de la vue
     */
    public function fetch()
    {
        ob_start();

        extract($this->vars);
        include_once VIEWS . $this->template . ".php";

        $viewContent = ob_get_contents();
        ob_end_clean();

        include_once VIEWS . 'main.php';
    }

}