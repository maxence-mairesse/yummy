<?php

namespace app\Controller;
use app\Model\Categorie;
use app\Model\Commentary;
use app\Model\duree;
use app\Model\Ingedient;
use app\Model\Rate;
use app\Model\Recette;
use DateTime;

class RecetteController extends CoreController
{
    public function recetteById($param)
    {
        $id = $param;
$ingredients = new Ingedient();
$ingredient = $ingredients->findByRecette($id);
        $dataToSend['ingredient']= $ingredient;




        $recette = new Recette();
        $result = $recette->findById($id);
        $rate = new Rate();
        $rates = $rate->findByRecette($id);


        $commentaryModel=new Commentary();
        $commentary= $commentaryModel->findByRecette($id);
        $dataToSend['commentary']= $commentary;
        if (empty($rates)){
            $rateMoyen = 0;
        }
        else{
            $somme = 0;
            foreach ($rates as $rate){
                $convetRate = $rate['rate'];
                $somme = $somme + $convetRate;
            }
            $totalRate = sizeof($rates);
            $rateMoyen = $somme/$totalRate;

        }
        $result['rateMoyen'] =$rateMoyen;

        $result['preparation']= $this->setTime($result,'time','Preparation');
        $result['cuisson']= $this->setTime($result,'time_cuisson','Cuisson');


        $dataToSend['details']= $result;
        $this->show('details',$dataToSend);

    }

    private function setTime($result,$time,$var)
    {

        $time = DateTime::createFromFormat('H:i:s',$result[$time]);
        $heure = $time->format('H');
        $minutes =$time->format('i');

        if ($heure == 0){
            return   ($minutes.' min');
        }else if ($heure >0 && $minutes>0){
            return  ($heure.'h'.$minutes.'min');
        }else {
            return ($heure.' h');
        }

    }
    public function commentaire($param)
    {
        $user_id= $_SESSION['userId'];
        $recette_id = $param;
        $description = ($_POST['commentaire']);
        $commentary = new Commentary();
        $rate =$_POST['rate'];
        $rates = new Rate();

if ($rate != '' && $description != ''){
    $commentary->setUserId($user_id);
    $commentary->setRecetteId($recette_id);
    $commentary->setCommentaire($description);
    $commentary->save();

    $rates->setRate($rate);
    $rates->setUserId($user_id);
    $rates->setRecetteId($recette_id);
    $rates->save();
}elseif ($rate != '' && $description == ''){
    $rates->setRate($rate);
    $rates->setUserId($user_id);
    $rates->setRecetteId($recette_id);
    $rates->save();
}elseif ($rate == '' && $description != ''){
    $commentary->setUserId($user_id);
    $commentary->setRecetteId($recette_id);
    $commentary->setCommentaire($description);
    $commentary->save();

}
            header('Location: /recette/'.$param);
            exit();
        }






    public function recetteBycategory($param)
    {

        $recettesModel = new Recette();
        $recettes = $recettesModel->findByCategory($param);

        $CategorieModel = new Categorie();
        $categorie = $CategorieModel->findById($param);


        foreach ($recettes as $key=>$value){
            $id= $value->getId();
            $rate = new Rate();
            $rates = $rate->findByRecette($id);


            if (empty($rates)){
                $rateMoyen = 0;
            }
            else{
                $somme = 0;
                foreach ($rates as $rate){

                    $convetRate = $rate['rate'];
                    $somme = $somme + $convetRate;
                }
                $totalRate = sizeof($rates);
                $rateMoyen = $somme/$totalRate;
                $value->rateMoyen = $rateMoyen;

            }
            if($value->rateMoyen === null){
                $value->rateMoyen = 0;
            };

        }



        $data['recette'] = $recettes;
        $data['category'] = $categorie;

        $this->show('list', $data);
    }






}