<?php

use Controller\Admin\ArticleController;
use Controller\Admin\CategoryController;
use Controller\IndexController;
use Controller\UserController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

//Request::setTrustedProxies(array('127.0.0.1'));


/* Front */
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

$app
    ->get('/rubriques/{id}', 'index.controller:categorieAction')
     ->assert('id', '\d+')
    ->bind('category')
;

/* Utilisateurs */

$app['user.controller'] = function () use ($app) {
    return new UserController($app);
};

$app
    ->match(
        'utilisateur/inscription',
        'user.controller:registerAction'
    )
    ->bind('register')
;

$app
    ->match(
        'utilisateur/connexion',
        'user.controller:loginAction'
    )
    ->bind('login')
;

$app
    ->match(
        'utilisateur/deconnexion',
        'user.controller:logoutAction'
    )
    ->bind('logout')
;

/* Admin */
$app['admin.category.controller'] = function () use ($app) {
    return new CategoryController($app);
};
// créer un sous-ensemble de routes
$admin = $app['controllers_factory'];
$admin->before(function () use ($app){// permet de faire un traitement avant l'accès à la route
    if(!$app['user.manager']->isAdmin()){ //si un admin n'est pas connecté
        $app->abort(403, 'Accès refusé'); // HTTP 403 fonction
 
        
    }
});

//toutes les routes du sous-ensemble commenceront par /admin
$app->mount('/admin', $admin);

$admin
    ->get('/rubriques', 'admin.category.controller:listAction')  
    ->bind('admin_categories')
;

$admin
    ->match('/rubriques/edition/{id}', 'admin.category.controller:editAction') //match accepte plusieurs méthodes, nomtamment get et post
    ->value('id', null) // valeur par défaut (null) pour le paramètre (id) de la route
    ->bind('admin_category_edit')
;

$admin
    ->match('/rubriques/suppression/{id}', 'admin.category.controller:deleteAction')
    ->bind('admin_category_delete')
;


$app['admin.article.controller'] = function () use ($app) {
    return new ArticleController($app);
};

$admin
    ->get('/articles', 'admin.article.controller:listAction')  
    ->bind('admin_articles')
;

$admin
    ->match('/articles/edition/{id}', 'admin.article.controller:editAction')
    ->value('id', null)
        // si la valeur est précisée, ça doit être un nombre ('\d+' est une expression régulière qui signifie nombre
    ->assert('id', '\d+')
    ->bind('admin_article_edit')
;

$admin
    ->match('/articles/suppression/{id}', 'admin.article.controller:deleteAction')
    ->bind('admin_article_delete')
;


/*
 * Créer la partie admin pour les articles :
 * - Créer le contrôleur Admin\ArticleController
 * - le définir en service
 * - on y ajoute la méthode listAction à vide
 * - puis la route qui pointe dessus
 * - on ajoute le lien vers cette route dans la navbar admin
 * - on crée l'entity Article et le repository Article Repository
 * - on remplit la méthode listAction du contrôleur en utilisant ArticleRepository
 * - on crée la vue qui affiche les articles dans un tableau html
 */

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
