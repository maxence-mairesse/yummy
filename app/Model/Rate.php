<?php

namespace app\Model;

use app\utils\Database;
use PDO;

class Rate extends CoreModel
{
protected $rate;
protected $user_id;
protected $recette_id;

    /**
     * @return mixed
     */
    public function getRate()
    {
        return $this->rate;
    }

    /**
     * @param mixed $rate
     */
    public function setRate($rate)
    {
        $this->rate = $rate;
    }

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



    public  function findByRecette($id){
        $pdo = Database::getPDO();
        $sql = "SELECT rate FROM rate INNER JOIN recette ON rate.recette_id = recette.id where recette.id =".$id;
      $stmt = $pdo->query($sql);
      $result = $stmt->fetchAll(PDO::FETCH_CLASS,'app\Model\Rate');
        return $result;
    }

    public function insert()
    {
        // TODO: Implement insert() method.
    }

    public function update()
    {
        // TODO: Implement update() method.
    }
}