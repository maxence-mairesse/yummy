<?php

namespace app\Model;

 abstract class CoreModel
{
protected $id;
     abstract public function insert();
     abstract public function update();


     public function save()
     {
         if (empty($this->id)) {
             return $this->insert();
         } else {
             return $this->update();
         }
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

}