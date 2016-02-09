<?php

namespace Core;

/**
 * Class NotFoundController
 * Controlleur appelé quand l'URL demandé n'existe pas
 * @package Core
 */
class NotFoundController extends Controller
{

    /**
     *
     */
    public function action_notFound()
    {
        header("HTTP/1.1 404 Not Found");
        $this->view->assign("errorType", "Page non trouvée ! :(");
        $this->view->assign("errorMessage", "La page que vous demandez n'existe pas :/");
    }

}