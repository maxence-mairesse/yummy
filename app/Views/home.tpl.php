
<main>

    <section id="recettes-coups-de-coeur">



        <h2> Recettes coups de coeur <i class="fa-solid fa-heart"></i>
</h2>

        <div class="cards">
            <?php

            foreach ($Recette as $result) :?>

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

        </div>
    </section>

<!--    <section id="ingredients" >-->
<!--        <h2> Ingredients de saison </h2>-->
<!--        <div class="cards ">-->
<!--            --><?php // foreach($viewData['ingredient'] as $ingredient):?>
<!---->
<!--                <div class="card">-->
<!--                    <div class="card-head">-->
<!--                        <img src="--><?php //= $ingredient->getPicture()?><!-- alt="--><?php //= $ingredient->getName()?><!--">-->
<!--                    </div>-->
<!--                    <div class="card-body">-->
<!--                        <h3> --><?php //= $ingredient->getName()?><!--</h3>-->
<!--                    </div>-->
<!---->
<!--                </div>-->
<!---->
<!--            --><?php //endforeach; ?>
<!--        </div>-->
<!--    </section>-->


</main>
