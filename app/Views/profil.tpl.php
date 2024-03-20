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

    <form method="post">
        <div>
        <label for="email">Changer votre email </label>
        <input name="email" id="email" type="email">
        </div>
        <div>
       <label for="password">Changer votre mots de passe </label>
        <input name="password" id="password" type="password">
        </div>
        <button type="submit"> Soumettre</button>
    </form>
</main>