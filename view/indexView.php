<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Immobellier</title>
    <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body>
    <header>
        <nav>
            <h1>Immobellier</h1>
            <p>
                <?php if (isConnected()) : ?>
                    <?php if (isAdminConnected()) : ?>
                        <a href="./adminImmobellier/index.php" role="button">Admin</a>
                    <?php endif ?>
                    <a href="./login/deconnexion.php">Déconnexion</a>
                <?php else : ?>
                    <a href="./register/">Créer un compte</a>
                    <a href="./login/">Connexion</a>
                <?php endif ?>
            </p>
        </nav>
    </header>
    <main>
    <?php if (isConnected()) : ?>
        <div><a href="./adminImmobellier/ajout.php">Nouvelle annonce</a></div>
        <?php endif ?>
        <section>
        <?php
        if (count(getAnnonceLimit($limit, $offset)) != 0) :
            foreach (getAnnonceLimit($limit, $offset) as $annonce) : ?>
            <article class="card">
                <h2><?= $annonce['title'] ?> <span><?= $annonce['type'] ?></span></h2>
                <div><img src="<?= $annonce['image'] ?>" alt=""></div>
                <p>description : <?= $annonce['description'] ?></p>
                <p>Superficie : <?= $annonce['surface'] ?> m2</p>
                <p>Nombre de pièces : <?= $annonce['room'] ?></p>
                <p class="gras">Prix : <?= $annonce['price'] ?></p>
            </article>
            <?php
                endforeach;
            else :
                echo 'Aucun article de disponible.';
            endif;
            ?>

        </section>
    </main>

</body>

</html>