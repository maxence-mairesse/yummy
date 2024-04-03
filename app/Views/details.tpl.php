<?php $data = $viewData['details'];
//$time =$viewData['time_prepa'];

//dump($time);
?>
<main class="details">
    <h2><?= $data['name'] ?></h2>
    <div class="presentation">
        <section class="image">
            <img src="<?= $data['picture'] ?>">
        </section>
        <section class="description">
            <ul>
                <li>Description: <?= $data['description'] ?></li>
                <li>Temps de préparation: <?= $data['preparation'] ?> <i class="fa-regular fa-clock"></i></li>
                <li> Temps de cuisson: <?= $data['cuisson'] ?> <i class="fa-regular fa-clock"></i></li>
                <li>
                    Note:
                    <span class="star">
                    <?php
                    $rate = $viewData['details']['rateMoyen'];
                    $int = floor($rate);
                    $dec = $rate - $int;

                    for ($i = 1; $i <= 5; $i++) {
                        if ($i <= $rate) {
                            echo '<i class="fa-solid fa-star "></i>';
                        } elseif ($i == $int + 1 && $dec >= 0.5) {
                            echo '<i class="fa-solid fa-star-half-stroke"></i>';
                        } else {
                            echo '<i class="fa-regular fa-star"></i>';
                        }
                    }
                    ?>
                        </span>
                </li>
            </ul>


        </section>
    </div>

    <div class="prepa">

        <h2>Étapes de préparation</h2>

        <?php

        foreach ($data as $key => $d) {
            if (strpos($key, 'etape') !== false) {
                if ($d !== null && $key !== 'etape_id') {
                    $etape = substr($key, -1);
                    echo '<div><h3>Etape ' . $etape . '</h3>';
                    echo '<p>' . $d . '</p></div>';
                }

            }

        }
        ?>
        <ul>

        </ul>
    </div>
    <section id="ingredients" class="ingredients">
        <h2> Ingredients de la recette </h2>
        <div class="cards recette_ingredient">
            <?php

            foreach ($viewData['ingredient'] as $ingredient):?>

                <div class="card">
                    <div class="card-head">
                        <img src="<?= $ingredient['picture'] ?> alt="<?= $ingredient['name'] ?>">
                    </div>
                    <div class="card-body">
                        <h3> <?= $ingredient['name'] ?></h3>
                    </div>

                </div>

            <?php endforeach; ?>
        </div>
    </section>

    <section class="commentaires">
        <h2>Commentaires</h2>
        <?=
        isset($_SESSION['userId']) ?
            "<form class='commentaire' method='POST'>

    <div>
        <label for='commentaire'>Votre commentaire </label>
        <textarea id='commentaire' name='commentaire'></textarea>
    </div>
<div>
<label for='rate' >Note</label>
<select name='rate' id='rate'>
<option value='' selected>Choisir une note</option>
<option value='1'>1</option>
<option value='2'>2</option>
<option value='3'>3</option>
<option value='4'>4</option>
<option value='5'>5</option>
</select>
</div>

 <div class=''>
        <button id='btn'>
            <p id='btnText'>Submit</p>
        </button>
    </div>
</form>





" : ""

        ?>
        <div class="allComment">
            <?php foreach ($viewData['commentary'] as $value): ?>
                <div class="block-commentaire">
                    <h4><?= $value['pseudo'] ?> a dit:</h4>
                    <div>
                        <p><?= $value['commentaire'] ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

</main>