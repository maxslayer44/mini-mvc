<?php

namespace Core;

/**
 * Class ErrorController
 * Controller appelé en cas d'erreur (ex : autre controlleur non trouvé)
 * @package Core
 */
class ErrorController extends Controller
{

    /**
     * Action erreur
     */
    public function action_error()
    {
        header("HTTP/1.1 500 Internal Server Error");
        $this->view->assign("errorType", "Une erreur est survenue ! D:");
        $this->view->assign("errorMessage", "Une erreur innatendue est survenue :/");
    }

}