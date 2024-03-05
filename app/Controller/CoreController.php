<?php

namespace app\Controller;

use app\Model\Recette;
use app\Model\Ingedient;

class CoreController
{
// on utilise `global` pour accéder à la méthode `generate()` d'AltoRouter
    // c'est pas génial, mais pour l'instant on sait pas faire mieux :/


    //dump($viewData);

    //var_dump(__DIR__);

    // on se servira de ce $absoluteURL pour nos assets dans les fichiers de vue
    protected function show($viewName, $viewData = [])
    {
        // on utilise `global` pour accéder à la méthode `generate()` d'AltoRouter
        // c'est pas génial, mais pour l'instant on sait pas faire mieux :/
        global $router;

        //dump($viewData);

        //var_dump(__DIR__);

        // on se servira de ce $absoluteURL pour nos assets dans les fichiers de vue
        $absoluteURL = $_SERVER['BASE_URI'];

        // on a besoin de la liste des catégories sur l'ensemble des routes de notre application, pour générer la navigation
        // on va les récupérer ici, vu que la méthode show() est utilisée sur l'ensemble des routes !
        // 1. on instancie le modèle Category
        $RecetteModel = new Recette();
        // 2. on utilise la méthode findAll() de ce modèle, pour récupérer tous les enregistrements
        $Recette = $RecetteModel->findAll();



        require_once __DIR__ . '/../views/header.tpl.php';
        require_once __DIR__ . '/../views/' . $viewName . '.tpl.php';
        require_once __DIR__ . '/../views/footer.tpl.php';

    }


}
