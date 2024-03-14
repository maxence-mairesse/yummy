<?php $data = $viewData['details'];
//$time =$viewData['time_prepa'];

//dump($time);
?>
<main class="details">
    <h2><?= $data['name']  ?></h2>
    <div class="presentation">
        <section class="image">
            <img src="<?=$data['picture']?>">
        </section>
        <section class="description">
            <ul>
                <li >Description: <?= $data['description'] ?></li>
                <li>Temps de préparation: <?=$data['preparation']?> <i class="fa-regular fa-clock"></i> </li>
                <li> Temps de cuisson: <?=$data['cuisson']?>  <i class="fa-regular fa-clock"></i> </li>
                <li >
                    Note:
                    <span class="star">
                    <?php
                    $rate = $viewData['details']['rateMoyen'];
                    $int = floor($rate);
                    $dec = $rate - $int;

                    for ($i = 1; $i <=5; $i++){
                        if ($i<=$rate){
                            echo '<i class="fa-solid fa-star "></i>';
                        }elseif ($i == $int + 1 && $dec >= 0.5){
                            echo '<i class="fa-solid fa-star-half-stroke"></i>';
                        }


                        else{
                            echo '<i class="fa-regular fa-star"></i>';
                        }
                    }
                    ?>
                        </span>
                </li>
            </ul>


        </section>
    </div>
    <hr>
    <div class="prepa">
        <h2>Étapes de préparation</h2>
        <?php

        foreach ($data as $key => $d){
            if (strpos($key,'etape') !== false){
                if($d !== null && $key !== 'etape_id'){
                    $etape = substr($key, -1);
                    echo '<h3>'.$etape.'</h3>';
                    echo '<p>'.$d.'</p>';
                }

            }

        }
        ?>
        <ul>

        </ul>
    </div>

    <section>
        <h2>Commentaires</h2>
        <?=
        isset($_SESSION['userId']) ?
            "<form class='commentaire' method='POST'>
<label for='commentaire'>Votre commentaire </label>
<textarea id='commentaire' name='commentaire'></textarea>
 <div class='container'>
        <button id='btn'>
            <p id='btnText'>Submit</p>
            <div class='check-box'>
                <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 50 50'>
                    <path fill='transparent' d='M14.1 27.2l7.1 7.2 16.7-16.8' />
                </svg>
            </div>
        </button>
    </div>
</form>":""

       ?>
        <div class="allComment">
        <?php foreach ($viewData['commentary'] as $value): ?>
            <div class="block-commentaire">
                <h4><?=$value['pseudo']?> a dit:</h4>
                <div>
                    <p><?=$value['commentaire']?></p>
                </div>
            </div>
            <?php endforeach;?>
        </div>
    </section>

</main>