<?php

namespace app\Controller;
use app\Model\duree;
use app\Model\Rate;
use app\Model\Recette;
use DateTime;

class RecetteController extends CoreController
{
    public function recetteById($param)
    {

        $id = $param;
        $recette = new Recette();
        $rate = new Rate();
        $rates = $rate->findByRecette($id);

        if (empty($rates)){
            $rateMoyen = 0;
        }
        else{
            $somme = 0;
            foreach ($rates as $rate){
                $convetRate = $rate->getRate();
                $somme = $somme + $convetRate;
            }
            $totalRate = sizeof($rates);
            $rateMoyen = $somme/$totalRate;

        }

        $result = $recette->findById($id);
        $result['preparation']= $this->setTime($result,'time','Preparation');
        $result['cuisson']= $this->setTime($result,'time_cuisson','Cuisson');


        $dataToSend['rate']= $rateMoyen;
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
        public function commentaire()
        {
            dump($_POST);
        }






}