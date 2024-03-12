<?php

namespace app\Model;

use app\utils\Database;

class user extends CoreModel
{
    private $pseudo;
    private $firstName;
    private $lastName;
    private $email;
    private $password;
    private $roles;

    /**
     * @return mixed
     */
    public function getRoles()
    {
        return $this->roles;
    }

    /**
     * @param mixed $roles
     */
    public function setRoles($roles)
    {
        $this->roles = $roles;
    }
    /**
     * @return mixed
     */
    public function getPseudo()
    {
        return $this->pseudo;
    }

    /**
     * @param mixed $pseudo
     */
    public function setPseudo($pseudo)
    {
        $this->pseudo = $pseudo;
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param mixed $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param mixed $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function findUserByEmail($email)
    {
        $pdo = Database::getPDO();
        $sql = "SELECT * FROM user WHERE email =:email";
       $stmt= $pdo->prepare($sql);
        $stmt->execute([
            'email'=>$email
        ]);
        $result = $stmt->fetchObject('app\Model\user');
        return $result;

    }

    public function insert()
    {
        $pdo = Database::getPDO();
        $sql = "INSERT INTO user (email,password,firstName,lastName,pseudo,roles )VALUES  (:email,:password,:firstName,:lastName,:pseudo,:role)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(
            [
                'email'=>$this->email,
                'password' => $this->password,
                'firstName' => $this->firstName,
                'lastName' => $this->lastName,
                'pseudo'=>$this->pseudo,
                'role' => $this->roles,

            ]
        );
        if ($stmt->rowCount() > 0) {
            // On récupère l'id généré automatiquement dans la base de données
            // et on met à jour la propriété id
            $this->id = $pdo->lastInsertId();

            return true;
        }

        return false;
    }

    public function update()
    {
       dump('coucou');
    }
}