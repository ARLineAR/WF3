<?php

namespace Controller\Admin;

use Controller\ControllerAbstract;

class CategoryController extends ControllerAbstract {
    
    public function listAction(){
        
        $categories = $this->app['category.repository']->findAll();
        
        return $this->render(
            'admin/category/list.html.twig',
            ['categories' => $categories]
        );
    }
    
    public function editAction(){
        
        if (!empty($_POST)){
            $category = new Category();
            $category->setName($_POST['name']);
            
            $this->app['category.repository']->insert($category);
        }
                
        return $this->render(
                'admin/category/edit.html.twig'
        );
    }
  
}
