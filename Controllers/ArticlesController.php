<?php


namespace Controllers;


use Core\Controller;

/**
 * Class ArticlesController
 * <p>Classe de démonstration du routing avancé</p>
 * @package Controllers
 */
class ArticlesController extends Controller
{

    /**
     * Action Index
     * <p>Récupère les paramètres de l'URL et les transmet à la vue</p>
     * @param array $params
     */
    public function action_index(array $params)
    {
        $this->view->assign("slug", $params['slug']);
        $this->view->assign("id", $params['id']);
    }

}