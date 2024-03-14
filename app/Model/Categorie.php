<?php

namespace app\Model;

use app\utils\Database;
use PDO;

class Categorie extends CoreModel
{
protected $name;

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

    public function findById($id)
    {
        $pdo = Database::getPDO();
        $sql = "SELECT * FROM categorie WHERE categorie.id = :id";
        $smt = $pdo->prepare($sql);
        $smt->execute([
            'id'=>$id
        ]);

        $result = $smt->fetchObject('app\Model\Categorie');
        return $result;
    }
    public function findAll()
    {
        $pdo = Database::getPDO();
        $sql = "SELECT * FROM categorie ";
        $smt = $pdo->query($sql);

        $result = $smt->fetchAll(PDO::FETCH_ASSOC);
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