
<main>

    <section id="recettes-coups-de-coeur">



        <h2> Recettes coups de coeur <path d="M28.585 43.955L7.937 15.592C.74 23.43-1.355 33.675.815 45.403 3.426 59.312 10.36 72.849 16.92 83.928c3.586 5.796 7.069 10.912 10.708 14.902l12.754-25.042 4.083-8.019-15.88-21.814zm25.409 3.108l13.59-26.682 8.752-17.186C71.353 1.725 65.88.729 60.05.279c-13.525-1.046-26.389.898-36.484 4.987l14.288 19.626 16.14 22.171zm47.111-26.885c-1.904-3.254-4.583-6.184-7.896-8.739L73.49 50.154l-27.199 53.407-2.084 4.093c6.318-.054 13.323-3.456 21.388-9.602 10.495-8.158 22.877-21.201 31.55-36.646 8.632-15.451 10.744-30.199 3.96-41.228z" ng-click="mouseDown($event,0)" id="PATH_2_0" fill="url(#SVGID_2_0)" class="ng-scope"></path></h2>

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

<!--    <section id="recettes-saison">-->
<!--        <h2> Recettes de saison </h2>-->
<!--        <div class="cards">-->
<!--            <div class="card">-->
<!--                <div class="card-head">-->
<!--                    <img src="--><?php //= $absoluteURL ?><!--/asset/img/Apero.jpg" alt="image d'apero">-->
<!--                </div>-->
<!--                <div class="card-body">-->
<!--                    <h3> Aperol Spritz: cocktail italien pétillant</h3>-->
<!--                </div>-->
<!--                <div class="card-footer">-->
<!--                    <i class="fa-solid fa-star"></i>-->
<!--                    <i class="fa-solid fa-star"></i>-->
<!--                    <i class="fa-solid fa-star"></i>-->
<!--                    <i class="fa-solid fa-star"></i>-->
<!--                    <i class="fa-solid fa-star"></i>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="card">-->
<!--                <div class="card-head">-->
<!--                    <img src="--><?php //= $absoluteURL ?><!--/asset/img/Apero.jpg" alt="image d'apero">-->
<!--                </div>-->
<!--                <div class="card-body">-->
<!--                    <h3> Aperol Spritz: cocktail italien pétillant</h3>-->
<!--                </div>-->
<!--                <div class="card-footer">-->
<!--                    <i class="fa-solid fa-star"></i>-->
<!--                    <i class="fa-solid fa-star"></i>-->
<!--                    <i class="fa-solid fa-star"></i>-->
<!--                    <i class="fa-solid fa-star"></i>-->
<!--                    <i class="fa-solid fa-star"></i>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="card">-->
<!--                <div class="card-head">-->
<!--                    <img src="--><?php //= $absoluteURL ?><!--/asset/img/Apero.jpg" alt="image d'apero">-->
<!--                </div>-->
<!--                <div class="card-body">-->
<!--                    <h3> Aperol Spritz: cocktail italien pétillant</h3>-->
<!--                </div>-->
<!--                <div class="card-footer">-->
<!--                    <i class="fa-solid fa-star"></i>-->
<!--                    <i class="fa-solid fa-star"></i>-->
<!--                    <i class="fa-solid fa-star"></i>-->
<!--                    <i class="fa-solid fa-star"></i>-->
<!--                    <i class="fa-solid fa-star"></i>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="card">-->
<!--                <div class="card-head">-->
<!--                    <img src="--><?php //= $absoluteURL ?><!--/asset/img/Apero.jpg" alt="image d'apero">-->
<!--                </div>-->
<!--                <div class="card-body">-->
<!--                    <h3> Aperol Spritz: cocktail italien pétillant</h3>-->
<!--                </div>-->
<!--                <div class="card-footer">-->
<!--                    <i class="fa-solid fa-star"></i>-->
<!--                    <i class="fa-solid fa-star"></i>-->
<!--                    <i class="fa-solid fa-star"></i>-->
<!--                    <i class="fa-solid fa-star"></i>-->
<!--                    <i class="fa-solid fa-star"></i>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="card">-->
<!--                <div class="card-head">-->
<!--                    <img src="--><?php //= $absoluteURL ?><!--/asset/img/Apero.jpg" alt="image d'apero">-->
<!--                </div>-->
<!--                <div class="card-body">-->
<!--                    <h3> Aperol Spritz: cocktail italien pétillant</h3>-->
<!--                </div>-->
<!--                <div class="card-footer">-->
<!--                    <i class="fa-solid fa-star"></i>-->
<!--                    <i class="fa-solid fa-star"></i>-->
<!--                    <i class="fa-solid fa-star"></i>-->
<!--                    <i class="fa-solid fa-star"></i>-->
<!--                    <i class="fa-solid fa-star"></i>-->
<!--                </div>-->
<!--            </div> <div class="card">-->
<!--            <div class="card-head">-->
<!--                <img src="--><?php //= $absoluteURL ?><!--/asset/img/Apero.jpg" alt="image d'apero">-->
<!--            </div>-->
<!--            <div class="card-body">-->
<!--                <h3> Aperol Spritz: cocktail italien pétillant</h3>-->
<!--            </div>-->
<!--            <div class="card-footer">-->
<!--                <i class="fa-solid fa-star"></i>-->
<!--                <i class="fa-solid fa-star"></i>-->
<!--                <i class="fa-solid fa-star"></i>-->
<!--                <i class="fa-solid fa-star"></i>-->
<!--                <i class="fa-solid fa-star"></i>-->
<!--            </div>-->
<!--        </div> <div class="card">-->
<!--            <div class="card-head">-->
<!--                <img src="--><?php //= $absoluteURL ?><!--/asset/img/Apero.jpg" alt="image d'apero">-->
<!--            </div>-->
<!--            <div class="card-body">-->
<!--                <h3> Aperol Spritz: cocktail italien pétillant</h3>-->
<!--            </div>-->
<!--            <div class="card-footer">-->
<!--                <i class="fa-solid fa-star"></i>-->
<!--                <i class="fa-solid fa-star"></i>-->
<!--                <i class="fa-solid fa-star"></i>-->
<!--                <i class="fa-solid fa-star"></i>-->
<!--                <i class="fa-solid fa-star"></i>-->
<!--            </div>-->
<!--        </div>-->
<!--        </div>-->
<!--    </section> -->
    <section id="ingedients-saison">
        <h2> Ingredients de saison </h2>
        <div class="cards">
            <?php  foreach($viewData['ingredient'] as $ingredient):?>

                <div class="card">
                    <div class="card-head">
                        <img src="<?= $ingredient->getPicture()?> alt="<?= $ingredient->getName()?>">
                    </div>
                    <div class="card-body">
                        <h3> <?= $ingredient->getName()?></h3>
                    </div>

                </div>

            <?php endforeach; ?>
        </div>
    </section>


</main>
