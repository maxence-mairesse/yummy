<?php

namespace app\Controller;
use app\Model\Recette;
class RecetteController extends CoreController
{
public function recetteById($param)
{
    $id = $param['id'];
  $recette = new Recette();
 $result = $recette->findById($id);


}
}