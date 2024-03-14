<?php

    namespace app\Controller;

    use app\Model\user;

    class AuthentificationController extends CoreController
    {
    public function login()
    {
    $this->show('login');
    }

    public function Auhtenticate()
    {
        $email = filter_input(INPUT_POST,'email');


        $users = new user();
        $user= $users->findUserByEmail($email);

        if (empty($user)){
            echo "cet utilisateur n'existe pas";
        }else{
            $password = filter_input(INPUT_POST,'password');

            if (! password_verify($password, $user->getPassword())){
                echo "le password est faux";
            }else{
                // Identifiants corrects => on connecte l'utilisateur
                // Stockage des informations dans la session
                $_SESSION['userId'] = $user->getId();
                $_SESSION['appUser'] = $user;
                header('Location: /');
                exit();

            }
        }

    }
    public function inscription()
    {
        $this->show('inscription');
    }
    public function createUser()
    {
// Récupération des données du formulaire

        $email = htmlspecialchars(filter_input(INPUT_POST, 'email'));
        $password = htmlspecialchars(filter_input(INPUT_POST, 'password'));
        $firstname = htmlspecialchars(filter_input(INPUT_POST, 'firstname'));
        $lastname = htmlspecialchars(filter_input(INPUT_POST, 'lastname'));
        $pseudo = htmlspecialchars(filter_input(INPUT_POST, 'Pseudo'));

        $role = 3;

        $hashedPassword = password_hash($password,PASSWORD_DEFAULT);
        $formErrors = [];
        // Vérification des champs vides
        if (empty($email) || empty($password)) {
            $formErrors[] = "Les champs email et mot de passe ne doivent pas être vides";
        }

        if (filter_var($email, FILTER_VALIDATE_EMAIL) == false) {
            $formErrors[] = "L'email doit avoir le bon format";
        }

        if (strlen($password) < 8) {
            $formErrors[] = "Le mot de passe doit contenir au-moins 8 caractères";
        }
        $regex = "/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,12}/";

        // Est-ce que le mot de passe correspond au format demandé ?
        if (! preg_match($regex, $password)) {
            // Si le mot de passe ne correspond pas
            $formErrors[] = "Le mot de passe doit contenir une majuscule, un caractère spécial et 8 caractères";
        }

        $user = new user();
        $findUser = $user->findUserByEmail($email);
        if (!empty($findUser)){
            $formErrors[] = "L'email est déjà utilisé";
        }

        if (! empty($formErrors)) {
            $this->show('inscription', [
                'errors' => $formErrors
            ]);

            // On arrête le script car il y a des erreurs et on continue pas par l'enregistrement
            exit();
        }

        $user->setEmail($email);
        $user->setPassword($hashedPassword);
        $user->setFirstName($firstname);
        $user->setLastName($lastname);
        $user->setPseudo($pseudo);
        $user->setRoles($role);
        $user->save();
        // Redirection
        header('Location: /');
        exit();

    }

    public function logout()
    {
        unset( $_SESSION['userId']);
        unset( $_SESSION['appUser']);
        header('Location: /');
        exit();
    }
    }