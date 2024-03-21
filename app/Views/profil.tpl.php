<main id="profils">

        <?php $errors= $viewData['errors'];
        if (isset($errors)): ?>
            <div >
                <ul>
                    <?php foreach ($errors as $error) : ?>
                        <li class="error"><?= $error ?></li>
                    <?php endforeach ?>
                </ul>
            </div>
        <?php endif ?>

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
            <h2>Profils</h2>
            <h4>Changer mes données personnelles </h4>
            <form method="POST">
                <div class="user-box">
                    <input  type="email" id="email" name="email"  required="">
                    <label for="email">Email</label>
                </div>
                <div class="user-box">
                    <input type="password" id="password" name="password"  required="">
                    <label for="password">Password</label>
                </div>

                <input type="hidden" name="tokenCSRF" value="<?= $_SESSION['tokenCSRF'] ?>">

                <button type="submit">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
Modifier                </button>
            </form>

        </div>
    </main>
</main>