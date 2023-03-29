<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Immo Bellier</title>
    <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body>
    <header>
        <nav>
        <?php if (isConnected()) : ?>
            <p class="bienvenue">Bienvenue, <?= $_SESSION['prenom']?> !</p>
            <?php endif ?>

            <p>
                <?php if (isConnected()) : ?>
                    <?php if (isAdminConnected()) : ?>
                        <a class="btn"  href="./adminImmobellier/index.php" role="button">Admin</a>
                    <?php endif ?>
                    <a class="btnInput"  href="./login/deconnexion.php">Déconnexion</a>
                <?php else : ?>
                    <a class="btnInput" href="./login/">Connexion</a>
                    <a class="btnInput"  href="./register/">Créer un compte</a>
                 
                <?php endif ?>
            </p>
            <h1>Immo Bellier</h1>

        </nav>
    </header>
    <main>
    <?php if (isConnected()) : ?>
        <div><a class="btn" href="./adminImmobellier/ajout.php">Nouvelle annonce</a></div>
        <?php endif ?>
        <section class="section">
        <?php
        if (count(getAnnonceLimit($limit, $offset)) != 0) :
            foreach (getAnnonceLimit($limit, $offset) as $annonce) : ?>
            <article class="card">
                <h2> <span><?= $annonce['type'] ?></span> <?= $annonce['title'] ?></h2>
                <div><img src="<?= $annonce['image'] ?>" alt=""></div>
                <p>description : <?= $annonce['description'] ?></p>
                <p>Superficie : <?= $annonce['surface'] ?> m2</p>
                <p>Nombre de pièces : <?= $annonce['room'] ?></p>
                <p><span class="gras"> Prix : <?= $annonce['price'] ?> €</span> frais d'agence inclus</p>
                <p class="italic">Mis en ligne : <?= $annonce['created_at'] ?> </p>
                <p class="italic">Mis à jour : <?= $annonce['modified_at'] ?> </p>
            </article>
            <?php
                endforeach;
            else :
                echo 'Aucune annonce de disponible.';
            endif;
            ?>

        </section>
    </main>

</body>

</html>