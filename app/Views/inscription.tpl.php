<h2>Ajouter un utilisateur</h2>

<!-- Si la variable $errors existe on affiche les erreurs -->
<?php if (isset($errors)): ?>
    <div >
        <ul>
            <?php foreach ($errors as $error) : ?>
                <li><?= $error ?></li>
            <?php endforeach ?>
        </ul>
    </div>
<?php endif ?>

<form action="" method="POST" >
    <div >
        <label for="email" >Email</label>
        <input type="email" name="email" id="email" placeholder="Email de connexion" >
    </div>
    <div >
        <label for="lastname">Nom</label>
        <input type="text" name="lastname" id="lastname" placeholder="Nom de l'utilisateur"  aria-describedby="subtitleHelpBlock">
    </div>
    <div >
        <label for="firstname">Prénom</label>
        <input type="text" name="firstname" id="firstname" placeholder="Prénom de l'utilisateur"  aria-describedby="subtitleHelpBlock">
    </div>
    <div >
        <label for="Pseudo">Pseudo</label>
        <input type="text" name="Pseudo" id="Pseudo" placeholder="Pseudo"  aria-describedby="subtitleHelpBlock">
    </div>


    <div >
        <label for="password">Mot de passe</label>
        <input type="password" name="password" id="password" placeholder="Mot de passe pour la connection"  aria-describedby="subtitleHelpBlock">
    </div>
    <div >
        <button type="submit" >Valider</button>
    </div>
    <input type="hidden" name="tokenCSRF" value="<?= $_SESSION['tokenCSRF'] ?>">
</form>