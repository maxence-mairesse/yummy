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
        $id = $param['id'];
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

        $this->setTime($result,'time','Preparation');
        $this->setTime($result,'time_cuisson','Cuisson');


        $dataToSend['rate']= $rateMoyen;
        $dataToSend['details']= $result;
        $this->show('details',$dataToSend);

    }

    private function setTime($result,$time,$var)
    {

        $time = DateTime::createFromFormat('H:i:s',$result->$time);
        $heure = $time->format('H');
        $minutes =$time->format('i');
        if ($var === 'Cuisson'){
            if ($heure == 0){
                //$dataToSend['time_prepa']= $minutes.' min';
                $result->setCuisson($minutes.' min');
            }else if ($heure >0 && $minutes>0){
                // $dataToSend['time_prepa']= $heure.'h'.''.$minutes.'min';
                $result->setCuisson($heure.'h'.''.$minutes.'min');

            }else {
                // $dataToSend['time_prepa']= $heure.' h';

                $result->setCuisson($heure.' h');
            }
        }else if ($var === 'Preparation'){
            if ($heure == 0){
                //$dataToSend['time_prepa']= $minutes.' min';
                $result->setPreparation($minutes.' min');
            }else if ($heure >0 && $minutes>0){
                // $dataToSend['time_prepa']= $heure.'h'.''.$minutes.'min';
                $result->setPreparation($heure.'h'.''.$minutes.'min');

            }else {
                // $dataToSend['time_prepa']= $heure.' h';

                $result->setPreparation($heure.' h');
            }
        }




    }

}