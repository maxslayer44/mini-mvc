<?php

namespace Core;

/**
 * Class ApplicationComponent
 * @package Core
 */
abstract class ApplicationComponent
{
    /**
     * @var Application;
     */
    protected $application;

    /**
     * ApplicationComponent constructor.
     * Composant de l'pplication
     * @param Application $application
     */
    public function __construct(Application $application)
    {
        $this->application = $application;
    }


}