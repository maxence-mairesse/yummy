<?php

namespace app\Controller;

use app\Model\Rate;
use app\Model\Recette;
use app\Model\Ingedient;

class CoreController
{

    public function __construct()
    {
        // Nom de la route actuelle
        global $match;

        // S'il existe des acl pour la page en cours
        if (isset($match['target']['acl'])) {
            // La variable $acl contient un tableau avec les rôles autorisés pour la route actuelle
            $acl = $match['target']['acl'];

            // Est-ce que le rôle de l'utilisateur lui autorise à voir la page ?
            $this->checkAuthorization($acl);
        }

        $currentRoute = $match['name'];

        // CSRF en POST
        $routesCSRF = [
            'user-create',
        ];

        // 1. Génère un token aléatoire s'il n'existe pas encore
        if (! isset($_SESSION['tokenCSRF'])) {
            $token = bin2hex(random_bytes(32));
            $_SESSION['tokenCSRF'] = $token;
        }

        // 2. Est-ce que la route actuelle doit être contrôlée ?
        if (in_array($currentRoute, $routesCSRF)) {
            // Oui : on vérifie si le token csrf soumis correspond au token en session

            // Si le token n'existe pas dans le formulaire on met une chaîne de caractères vide
            $postToken = isset($_POST['tokenCSRF']) ? $_POST['tokenCSRF'] : '';

            if ($postToken != $_SESSION['tokenCSRF']) {
                // Token différents : ce n'est pas la même personne qui a envoyé le formulaire !
                header('HTTP/1.0 403 Forbidden');
                $this->show('error/err403');
                exit();
            }
        }
    }
    protected function show($viewName, $viewData = [])
    {
        // on utilise `global` pour accéder à la méthode `generate()` d'AltoRouter
        // c'est pas génial, mais pour l'instant on sait pas faire mieux :/
        global $router;

        //dump($viewData);

        //var_dump(__DIR__);
        // on se servira de ce $absoluteURL pour nos assets dans les fichiers de vue
        // $absoluteURL = $_SERVER['BASE_URI'];

        // on a besoin de la liste des catégories sur l'ensemble des routes de notre application, pour générer la navigation
        // on va les récupérer ici, vu que la méthode show() est utilisée sur l'ensemble des routes !
        // 1. on instancie le modèle Category
        $RecetteModel = new Recette();
        // 2. on utilise la méthode findAll() de ce modèle, pour récupérer tous les enregistrements
        $Recette = $RecetteModel->findAll();


        foreach ($Recette as $key=>$value){
            $id=$value->id;
            $rate = new Rate();
            $rates = $rate->findByRecette($id);

            if (empty($rates)){
                $rateMoyen = 0;
            }
            else{
                $somme = 0;
                foreach ($rates as $rate){
                    $convetRate = $rate->getRate();
                    $somme = $somme + $convetRate;
                }
                $totalRate = sizeof($rates);
                $rateMoyen = $somme/$totalRate;

                $viewData[$id]=$rateMoyen;
            }

        }



        require_once __DIR__ . '/../views/header.tpl.php';
        require_once __DIR__ . '/../views/' . $viewName . '.tpl.php';
        require_once __DIR__ . '/../views/footer.tpl.php';

    }
    protected function checkAuthorization($roles = [])
    {
        // 1. Récupérer l'utilisateur connecté (et par extension son rôle)
        if (isset($_SESSION['userId'])) {
            // Si l'utilisateur est connecté, on récupère ses informations
            $appUser = $_SESSION['appUser'];

            // 2. En fonction des rôles autorisés ($roles), on affiche ou non la page
            // $roles => un tableau avec les rôles autorisés pour cette page
            // $appUser->getRole() => le rôle de l'utilisateur

            // Est-ce que le rôle de l'utilisateur se trouve dans la liste des rôles autorisés ?
            // => est-ce que la $user->getRole() est contenu dans le tableau $roles ?
            if (in_array($appUser->getRole(), $roles)) {
                // Utilisateur est autorisé !
                return true;
            } else {
                // Utilisateur non autorisé !
                // => on affiche une page 403
                header('HTTP/1.0 403 Forbidden');
                $this->show("error/err403");

                // On arrête le script
                exit();
            }
        } else {
            // Si l'utilisaur n'est pas connecté on le renvoie sur la page de connexion
            header('Location: /login');
            exit();
        }
    }


}
