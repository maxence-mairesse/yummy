<?php

namespace app\Model;

use app\utils\Database;
use PDO;

class Commentary extends CoreModel
{
protected $user_id;


protected $recette_id;

    /**
     * @return mixed
     */
    public function getRecetteId()
    {
        return $this->recette_id;
    }

    /**
     * @param mixed $recette_id
     */
    public function setRecetteId($recette_id)
    {
        $this->recette_id = $recette_id;
    }

    /**
     * @return mixed
     */
    public function getCommentaire()
    {
        return $this->commentaire;
    }

    /**
     * @param mixed $commentaire
     */
    public function setCommentaire($commentaire)
    {
        $this->commentaire = $commentaire;
    }
protected $commentaire;


    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * @param mixed $user_id
     */
    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
    }

    public function findByRecette($id)
    {
        $pdo = Database::getPDO();
        $sql = "SELECT * FROM commentary 
    INNER JOIN recette ON recette.id = commentary.recette_id
    INNER JOIN  user on user.id = commentary.user_id
WHERE commentary.recette_id = :id
";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(
            [
                'id'=>$id,



            ]
        );
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function insert()
    {
        $pdo = Database::getPDO();
        $sql = "INSERT INTO commentary (user_id, recette_id, commentaire) VALUES (:user_id, :recette_id, :commentaire)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(
            [
                'user_id'=>$this->user_id,
                'recette_id' => $this->recette_id,
                'commentaire' => $this->commentaire,


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
        // TODO: Implement update() method.
    }
}