<?php

use Controller\IndexController;
use Controller\Admin\CategoryController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

//Request::setTrustedProxies(array('127.0.0.1'));

$app['index.controller'] = function () use ($app) {
    return new IndexController($app);
};

$app
    ->get('/', 'index.controller:indexAction')  
    ->bind('homepage')
;

$app
    ->get('/rubriques', 'index.controller:categoriesAction')  
    ->bind('categories')
;

$app['admin.category.controller'] = function () use ($app) {
    return new CategoryController($app);
};

$app
    ->get('admin/rubriques', 'admin.category.controller:listAction')  
    ->bind('admin_categories')
;

$app
    ->match('admin/rubriques/edition', 'admin.category.controller:editAction') //match accepte plusieurs méthodes, nomtamment get et post  
    ->bind('admin_category_edit')
;


$app->error(function (Exception $e, Request $request, $code) use ($app) {
    if ($app['debug']) {
        return;
    }

    // 404.html, or 40x.html, or 4xx.html, or error.html
    $templates = array(
        'errors/'.$code.'.html.twig',
        'errors/'.substr($code, 0, 2).'x.html.twig',
        'errors/'.substr($code, 0, 1).'xx.html.twig',
        'errors/default.html.twig',
    );

    return new Response($app['twig']->resolveTemplate($templates)->render(array('code' => $code)), $code);
});
