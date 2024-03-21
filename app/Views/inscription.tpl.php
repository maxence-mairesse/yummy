<main>
<!-- Si la variable $errors existe on affiche les erreurs -->
<?php

if (isset($errors)): ?>
    <div >
        <ul>
            <?php foreach ($errors as $error) : ?>
                <li><?= $error ?></li>
            <?php endforeach ?>
        </ul>
    </div>
<?php endif ?>



<div class="login-box">
    <h2>Login</h2>
    <form method="POST">
        <div class="user-box">
            <input  type="email" id="email" name="email"  required="">
            <label for="email">Email</label>
        </div>
        <div class="user-box">
            <input type="password" id="password" name="password"  required="">
            <label for="password">Password</label>
        </div>

        <div class="user-box">
            <input type="text" name="lastname" id="lastname"  required=""  aria-describedby="subtitleHelpBlock">
            <label for="lastname">Nom</label>
        </div>
        <div class="user-box">
            <input type="text" name="firstname" id="firstname"  required=""  aria-describedby="subtitleHelpBlock">
            <label for="firstname">Prénom</label>
        </div>
        <div class="user-box">
            <input type="text" name="Pseudo" id="Pseudo" required=""  aria-describedby="subtitleHelpBlock">
            <label for="Pseudo">Pseudo</label>
        </div>

        <input type="hidden" name="tokenCSRF" value="<?= $_SESSION['tokenCSRF'] ?>">

        <button type="submit">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            S'inscrire
        </button>
    </form>

</div>
</main>