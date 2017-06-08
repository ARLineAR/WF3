<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Lib;

/**
 * Description of ViewRenderer
 *
 * @author Etudiant
 */
class ViewRenderer {
   /**
 * 
 * @var ViewRenderer
 */

private static $instance;

private $viewDir;

private $layoutPath;


private function __construct() {}

/**
 * 
 * @return ViewRenderer
 */

public static function getInstance(){
       
        if(is_null(self::$instance)){
            self::$instance = new self();
        }
        
        return self::$instance;
    }
    
    public function render ($view, $parameters = []){
        
        extract ($parameters);
        ob_start();
        include $this -> viewDir . $view;
        $pageContentForLayout = ob_get_clean();
        include $this -> layoutPath;
    }
    
    public function getViewDir() {
        return $this->viewDir;
    }

    public function getLayoutPath() {
        return $this->layoutPath;
    }

    public function setViewDir($viewDir) {
        $this->viewDir = $viewDir;
        return $this;
    }

    public function setLayoutPath($layoutPath) {
        $this->layoutPath = $layoutPath;
        return $this;
    }

 

}


