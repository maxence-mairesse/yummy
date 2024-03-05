<?php

require_once __DIR__ . '/../vendor/autoload.php';

$router = new AltoRouter();
$router->setBasePath($_SERVER['BASE_URI']);


$router->map(
    'GET',
    '/',
    [
    'action'=>'home',
    'controller' => '\app\Controller\MainController']
,
    'home'
);
$router->map(
    'GET',
    '/recette/[i:id]',
    [
        'action'=>'recetteById',
        'controller' => '\app\Controller\RecetteController']
    ,
    'RecetteController'
);

$match = $router->match();


if ($match) {
    // $match n'est pas false, ça veut dire que la route exite !

    //var_dump($match['target']);

    $controllerName = $match['target']['controller'];
    $methodName = $match['target']['action'];

    //echo "On va instancier le controller " . $controllerName . '<br>';
    //echo "et appeler la méthode " . $methodName;

    //var_dump($match['params']);

    // DISPATCH
    // on instancie le bon contrôleur
    $controller = new $controllerName();
    // on appelle la méthode appropriée de ce contrôleur
    //* Et on envoie les paramètres éventuels ($match['params']) à notre méthode de contrôleur !
    $controller->$methodName($match['params']);

} else {
    dump($router);
    // la route demandée par l'utilisateur n'existe pas, donc on lui affiche une erreur 404 !
    $errorController = new app\Controller\ErrorController();
    $errorController->error404();

}