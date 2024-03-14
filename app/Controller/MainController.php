<?php
namespace app\Controller;
use app\Model\Categorie;
use app\Model\Ingedient;
use app\Model\Rate;

class MainController extends CoreController
{
public function home()
{


    $ig = new Ingedient();
 $allIngredients = $ig->findIngredient();



 $dataToSend['ingredient']= $allIngredients;
$this->show('home',$dataToSend);
}
}