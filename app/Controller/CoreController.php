<?php

namespace app\Controller;

use app\Model\Categorie;
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
        $viewData['errors']=[];

        $categoyrModel = new Categorie();
        $categories = $categoyrModel->findAll();
        $viewData['categorie']= $categories;


        $RecetteModel = new Recette();
        $Recette = $RecetteModel->findFavoris();

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

                    $convetRate = $rate['rate'];
                    $somme = $somme + $convetRate;
                }
                $totalRate = sizeof($rates);
                $rateMoyen = $somme/$totalRate;
                $value->rateMoyen = $rateMoyen;

            }
            if($value->rateMoyen === null){
                $value->rateMoyen = 0;
            };

        }



        require_once __DIR__ . '/../Views/header.tpl.php';
        require_once __DIR__ . '/../Views/' . $viewName . '.tpl.php';
        require_once __DIR__ . '/../Views/footer.tpl.php';

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
            if (in_array($appUser->getRoles(), $roles)) {
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
