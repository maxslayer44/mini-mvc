<?php

namespace Controllers;


use Core\Controller;

/**
 * Class AutreController
 * <p>Autre Controller pour la démo</p>
 * @package Controllers
 */
class AutreController extends Controller
{

    /**
     * Action autre
     * <p>Démonstration de l'assignation de variables et du changement de template</p>
     * @param array $params
     */
    public function action_autre(array $params)
    {
        $this->view->setTemplate("autre" . DS . "uneautre");
        $this->view->assign("foo", "bar");
    }

}