<?php

namespace app\Model;

use app\controller\CoreController;
use app\utils\Database;
use PDO;

class Recette extends CoreController
{
    protected $id;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }
    protected $name;
    protected $description;
    protected $picture;
    protected $ordre_saison;
    protected $preparation;
    protected $cuisson;
    protected $etape1;
    protected $etape2;

    protected $etape3;

    protected $etape4;

    protected $etape5;

    protected $etape6;

    protected $etape7;

    protected $etape8;

    protected $etape9;
    protected $etape10;
    protected $ingredient;

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * @param mixed $picture
     */
    public function setPicture($picture)
    {
        $this->picture = $picture;
    }

    /**
     * @return mixed
     */
    public function getOrdreSaison()
    {
        return $this->ordre_saison;
    }

    /**
     * @param mixed $ordre_saison
     */
    public function setOrdreSaison($ordre_saison)
    {
        $this->ordre_saison = $ordre_saison;
    }

    /**
     * @return mixed
     */
    public function getPreparation()
    {
        return $this->preparation;
    }

    /**
     * @param mixed $preparation
     */
    public function setPreparation($preparation)
    {
        $this->preparation = $preparation;
    }

    /**
     * @return mixed
     */
    public function getCuisson()
    {
        return $this->cuisson;
    }

    /**
     * @param mixed $cuisson
     */
    public function setCuisson($cuisson)
    {
        $this->cuisson = $cuisson;
    }

    /**
     * @return mixed
     */
    public function getEtape1()
    {
        return $this->etape1;
    }

    /**
     * @param mixed $etape1
     */
    public function setEtape1($etape1)
    {
        $this->etape1 = $etape1;
    }

    /**
     * @return mixed
     */
    public function getEtape2()
    {
        return $this->etape2;
    }

    /**
     * @param mixed $etape2
     */
    public function setEtape2($etape2)
    {
        $this->etape2 = $etape2;
    }

    /**
     * @return mixed
     */
    public function getEtape3()
    {
        return $this->etape3;
    }

    /**
     * @param mixed $etape3
     */
    public function setEtape3($etape3)
    {
        $this->etape3 = $etape3;
    }

    /**
     * @return mixed
     */
    public function getEtape4()
    {
        return $this->etape4;
    }

    /**
     * @param mixed $etape4
     */
    public function setEtape4($etape4)
    {
        $this->etape4 = $etape4;
    }

    /**
     * @return mixed
     */
    public function getEtape5()
    {
        return $this->etape5;
    }

    /**
     * @param mixed $etape5
     */
    public function setEtape5($etape5)
    {
        $this->etape5 = $etape5;
    }

    /**
     * @return mixed
     */
    public function getEtape6()
    {
        return $this->etape6;
    }

    /**
     * @param mixed $etape6
     */
    public function setEtape6($etape6)
    {
        $this->etape6 = $etape6;
    }

    /**
     * @return mixed
     */
    public function getEtape7()
    {
        return $this->etape7;
    }

    /**
     * @param mixed $etape7
     */
    public function setEtape7($etape7)
    {
        $this->etape7 = $etape7;
    }

    /**
     * @return mixed
     */
    public function getEtape8()
    {
        return $this->etape8;
    }

    /**
     * @param mixed $etape8
     */
    public function setEtape8($etape8)
    {
        $this->etape8 = $etape8;
    }

    /**
     * @return mixed
     */
    public function getEtape9()
    {
        return $this->etape9;
    }

    /**
     * @param mixed $etape9
     */
    public function setEtape9($etape9)
    {
        $this->etape9 = $etape9;
    }

    /**
     * @return mixed
     */
    public function getEtape10()
    {
        return $this->etape10;
    }

    /**
     * @param mixed $etape10
     */
    public function setEtape10($etape10)
    {
        $this->etape10 = $etape10;
    }

    /**
     * @return mixed
     */
    public function getIngredient()
    {
        return $this->ingredient;
    }

    /**
     * @param mixed $ingredient
     */
    public function setIngredient($ingredient)
    {
        $this->ingredient = $ingredient;
    }

    public function findAll()
    {
        $pdo = Database::getPDO();
        $sql = "SELECT * FROM recette";
        $stmt = $pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_CLASS, 'app\Model\Recette');
    }
    public function findById($id){
        $pdo  = Database::getPDO();
        $sql = "SELECT * FROM recette where id = :id";
        $pdoStatement = $pdo->prepare($sql);
        $pdoStatement->bindParam(':id', $id,PDO::PARAM_INT);
        $pdoStatement->execute();
// Récupération des résultats
        $result = $pdoStatement->fetch(PDO::FETCH_ASSOC);
        dump($result);
        return $result;
    }


}