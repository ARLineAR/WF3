<?php

namespace Controller;

use Lib\ViewRenderer;
use Model\User;

class UserController {
    
    public function listAction(){
        
        $users = User::findAll();
        
        $viewRenderer = ViewRenderer::getInstance();
        $viewRenderer->render(
            'index.view.php',
            ['users' =>$users]
        );
        
        include '../view/index.view.php';
        
        
    }
    
    public function editAction(){
        
        echo 'user:edit';
    }
}
