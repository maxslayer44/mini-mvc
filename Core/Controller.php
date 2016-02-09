<?php

namespace Core;

abstract class Controller extends ApplicationComponent
{

    protected $error;

    /**
     * @var View
     */
    protected $view;

    /**
     * Controller constructor.
     * @param Application $application
     * @param bool $error
     */
    public function __construct(Application $application, $error = false)
    {
        parent::__construct($application);
        $this->error = $error;
    }

    /**
     * Appelé avant l'appel de l'action à éxécuter
     */
    public function onBeforeAction()
    {
        $this->view = new View($this->application);

        if(!$this->error)
        {
            $controller = strtolower($this->application->getRouter()->getCurrent()->getController());
            $action = strtolower($this->application->getRouter()->getCurrent()->getAction());

            $template = $controller . DS . $action;
        } else {
            $template = "error";
        }

        $this->view->setTemplate($template);
    }

    /**
     * Appelé après l'appel de l'action à éxécuter
     */
    public function onAfterAction()
    {
        $this->view->fetch();
    }

}