


<main class="list">
    <h2><?=$viewData['category']->getName()?></h2>
    <section class="cards">
        <?php  foreach ($viewData['recette'] as $result): ?>
            <a href="/recette/<?=$result->id?>">  <div class="card">
                    <div class="card-head">
                        <img src="<?= $result->picture?>" alt="image d'apero">
                    </div>
                    <div class="card-body">
                        <h3> <?= $result->name?></h3>
                    </div>
                    <div class="card-footer">

                        <?php

                        $rate = $result->rateMoyen;

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

                    </div>
                </div>
            </a>
        <?php endforeach;?>
    </section>

</main>
