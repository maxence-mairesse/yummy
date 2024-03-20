<html lang=fr>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="../../public/asset/favicon/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="../../public/asset/CSS/reset.css">
    <link rel="stylesheet" href="../../public/asset/CSS/style.css">
    <script src="https://kit.fontawesome.com/d16614f244.js" crossorigin="anonymous"></script>
    <title>Yummy</title>
</head>
<body>
<header>

    <div class="navigation">
        <div class="button-nav">
            <i class="fa-solid fa-bars" id="button-navigation"></i>
        </div>
        <div id="overlay"></div>
        <nav class="hidden" >
            <h2>Recettes par catégorie </h2>
            <ul>
                <?php foreach ($viewData['categorie'] as $value):  ?>

                <li><a href="/list/<?=$value['id']?>"><?= $value['name']?></a> </li>

<?php endforeach; ?>
            </ul>
        </nav>
    </div>
    <h1><a href="/">Yummy <span>おいしい</span></a></h1>
    <?= isset($_SESSION['appUser']) ? "<span  class='login name'>Bonjour ".$_SESSION['appUser']->getPseudo()."</span> <span><a class='login' href='/logout'> Deconnexion</a></span><span><a href='/profil' class='login name'>Profil</a></span>
" : "<a href='/login' class='login name'>connexion</a> " ?>
</header>