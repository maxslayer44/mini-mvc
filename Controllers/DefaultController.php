<?php

namespace Controllers;


use Core\Controller;

/**
 * Class DefaultController
 * <p>Controller appelé par défaut à l'URL /</p>
 * @package Controllers
 */
class DefaultController extends Controller
{

    /**
     * Action Index
     * @param array $params
     */
    public function action_index(array $params)
    {
        // Ne fait rien, affiche juste la vue
    }

}