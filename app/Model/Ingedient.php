<?php

namespace app\Model;
use PDO;
use app\utils\Database;

class Ingedient extends CoreModel
{
protected $name;
private $picture;

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
public function getName()
{
    return $this->name;
}/**
 * @param mixed $name
 */
public function setName($name)
{
    $this->name = $name;
}

public function findAllIngredient()
{
    $pdo = Database::getPDO();
    $sql = "SELECT * FROM ingredient";
    $stm = $pdo->query($sql);
    return $stm->fetchAll(PDO::FETCH_CLASS, "\app\Model\Ingedient");
}

    public function findIngredient()
    {
        $pdo = Database::getPDO();
        $sql = "SELECT * FROM ingredient where id < 6";
        $stm = $pdo->query($sql);
        return $stm->fetchAll(PDO::FETCH_CLASS, "\app\Model\Ingedient");
    }
}