<?php

namespace Controller;

abstract class ControllerAbstract { // classe qui ne sert qu'à être héritée
    /**
     *
     * @var Application
     */
    protected $app;
    
    /**
     *
     * @var \Twig_Environment
     */
    
    protected $twig;
    
    public function __construct(\Silex\Application $app){
       
        $this->app = $app;
        $this->twig = $app['twig'];
       
    }
    
    /**
     * 
     * @param string $view
     * @param array $parameters
     * @return string
     */
    
    public function render($view, $parameters =[]){
        return $this->twig->render($view, $parameters);
        
    }
}
