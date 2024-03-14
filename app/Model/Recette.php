<?php

namespace app\Model;

use app\controller\CoreController;
use app\utils\Database;
use PDO;

class Recette extends CoreController
{
    protected $id;
    protected $name;
    protected $description;
    protected $picture;
    protected $ordre_saison;
    protected $preparation;
    protected $cuisson;

    protected $ingredient;
    protected $duree_id;

    protected $cuisson_id;
    protected $etape_id;
    protected $categorie_id;
    public $rateMoyen;

    /**
     * @return mixed
     */
    public function getRateMoyen()
    {
        return $this->rateMoyen;
    }

    /**
     * @param mixed $rateMoyen
     */
    public function setRateMoyen($rateMoyen)
    {
        $this->rateMoyen = $rateMoyen;
    }

    /**
     * @return mixed
     */
    public function getCategorieId()
    {
        return $this->categorie_id;
    }

    /**
     * @param mixed $categorie_id
     */
    public function setCategorieId($categorie_id)
    {
        $this->categorie_id = $categorie_id;
    }

    /**
     * @return mixed
     */
    public function getEtapeId()
    {
        return $this->etape_id;
    }

    /**
     * @param mixed $etape_id
     */
    public function setEtapeId($etape_id)
    {
        $this->etape_id = $etape_id;
    }


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

    /**
     * @return mixed
     */
    public function getCuissonId()
    {
        return $this->cuisson_id;
    }

    /**
     * @param mixed $cuisson_id
     */
    public function setCuissonId($cuisson_id)
    {
        $this->cuisson_id = $cuisson_id;
    }

    /**
     * @return mixed
     */
    public function getDureeId()
    {
        return $this->duree_id;
    }

    /**
     * @param mixed $duree_id
     */
    public function setDureeId($duree_id)
    {
        $this->duree_id = $duree_id;
    }

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
        $sql = "SELECT recette.*, duree.*, cuisson.*, etape.* FROM recette
            INNER JOIN duree ON recette.duree_id = duree.id 
            INNER JOIN cuisson ON recette.cuisson_id = cuisson.id 
            INNER JOIN etape ON recette.etape_id = etape.id 
            WHERE recette.id = :id";
        $pdoStatement = $pdo->prepare($sql);
        $pdoStatement->bindParam(':id', $id,PDO::PARAM_INT);
        $pdoStatement->execute();

        // Récupération du résultat de la requête sous forme de tableau associatif
        $result = $pdoStatement->fetch(PDO::FETCH_ASSOC);

        // Vous pouvez maintenant manipuler les données récupérées de vos jointures
        // par exemple : $result['nom_de_la_colonne']

        return $result;
    }


    public function findByCategory($category){
        $pdo  = Database::getPDO();
        $sql = "SELECT recette.* FROM recette
            INNER JOIN categorie ON recette.categorie_id = categorie.id 
            
            WHERE categorie.id = :category";
        $pdoStatement = $pdo->prepare($sql);
        $pdoStatement->bindParam(':category', $category,PDO::PARAM_STR);
        $pdoStatement->execute();

        // Récupération du résultat de la requête sous forme de tableau associatif
        $result = $pdoStatement->fetchAll(PDO::FETCH_CLASS, 'app\Model\Recette');

        // Vous pouvez maintenant manipuler les données récupérées de vos jointures
        // par exemple : $result['nom_de_la_colonne']

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