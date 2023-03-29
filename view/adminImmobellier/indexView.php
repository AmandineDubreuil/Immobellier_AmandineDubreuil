<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin ImmoBellier</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>
    <header>
        <nav>
            <h1>Admin ImmoBellier</h1>
            <p>
                <a class="btn"  href="../index.php">Accueil</a>
                <a class="btn"  href="ajout.php">Ajouter une annonce</a>
            </p>
        </nav>
    </header>
    <main>
        <section class="admin">
            <?php 
            if (count(getAnnonceLimit($limit, $offset)) != 0) : ?>
                <table class="adminTable">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Titre de l'annonce</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php //dd(getArticleLimit($limit, $offset)) 
                        ?>
                        <?php foreach (getAnnonceLimit($limit, $offset) as $key => $value) : ?>
                            <tr>
                                <td><?= $value['id_annonce'] ?></td>
                                <td><?= $value['title'] ?></td>
                                <td>
                                    <a class="btn" href="./edit.php?id=<?= $value['id_annonce'] ?>">Modifier</a>
                                    <a class="btnInput"  href="./supp.php?id=<?= $value['id_annonce'] ?>" onclick="return confirm('Confirmer la suppression de cette annonce ?');">Supprimer</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else : ?>
                <p>Aucune Annonce !</p>
            <?php endif; ?>
        </section>
    </main>
</body>

</html>