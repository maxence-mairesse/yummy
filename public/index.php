<?php

require_once __DIR__ . '/../vendor/autoload.php';
session_start();
$router = new AltoRouter();
// $router->setBasePath($_SERVER['BASE_URI']);


$router->map(
    'GET',
    '/',
    [
    'method'=>'home',
    'controller' => '\app\Controller\MainController']
,
    'home'
);
$router->map(
    'GET',
    '/recette/[i:id]',
    [
        'method'=>'recetteById',
        'controller' => '\app\Controller\RecetteController']
    ,
    'RecetteController'
);

$router->map(
    'POST',
    '/recette/[i:id]',
    [
        'method'=>'commentaire',
        'controller' => '\app\Controller\RecetteController',
        'acl' => ['admin','user','catalog-manager']]
    ,
    'commentaire'
);

$router->map(
    'GET',
    '/list/[i:id]',
    [
        'method'=>'recetteBycategory',
        'controller' => '\app\Controller\RecetteController']
    ,
    'ListController'
);

$router->map(
    'GET',
    '/login',
    [
        'method'=>'login',
        'controller' => '\app\Controller\AuthentificationController']
    ,
    'login'
);
$router->map(
    'POST',
    '/login',
    [
        'method'=>'Auhtenticate',
        'controller' => '\app\Controller\AuthentificationController']
    ,
    'Authenticate'
);

$router->map(
    'GET',
    '/logout',
    [
        'method'=>'logout',
        'controller' => '\app\Controller\AuthentificationController']
    ,
    'logout'
);
$router->map(
    'GET',
    '/inscription',
    [
        'method'=>'inscription',
        'controller' => '\app\Controller\AuthentificationController']
    ,
    'inscription'
);
$router->map(
    'POST',
    '/inscription',
    [
        'method'=>'createUser',
        'controller' => '\app\Controller\AuthentificationController']
    ,
    'create-user'
);





$match = $router->match();

$dispatch = new Dispatcher($match,'app\Controller\ErrorController::error404');
$dispatch->dispatch();
