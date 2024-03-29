<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Modification annonce</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>
    <main class="container">
    <?php if (isConnected()) : ?>
            <p class="bienvenue">Bienvenue, <?= $_SESSION['prenom']?> !</p>
            <?php endif ?>

        <h1>Modification d'une Annonce</h1>
        <form method="POST" action="" enctype="multipart/form-data" class="formEdit" novalidate>
            <div>
                <label for="title">Titre de l'annonce :</label>
                <input type="text" name="title" id="title" value="<?= $title ?>" placeholder="<?= $title ?>">
            </div>
            <div>
                <label for="description">Description :</label>
                <textarea name="description" id="description" placeholder="<?= $title ?>"><?= $description ?></textarea>
            </div>
            <div>
                <label for="imageUpload">Image :</label>
                <input type="file" name="imageUpload" id="imageUpload" value="<?= $imageUpload ?>">
            </div>
            <div class="locVent">
                <label for="type">Type de transaction :</label>
                Vente <input type="radio" name="type" id="type" value="Vente" checked>
                Location <input type="radio" name="type" id="type" value="Location">
            </div>

            <div>
                <label for="price">Prix :</label>
                <input type="number" name="price" id="price" value="<?= $price ?>" placeholder="<?= $price ?>">
            </div>
            <div>
                <label for="surface">Superficie :</label>
                <input type="number" name="surface" id="surface" value="<?= $surface ?>" placeholder="<?= $surface ?>">
            </div>
            <div>
                <label for="room">Nombre de pièces :</label>
                <select name="room" id="room">
                    <option value="">--Merci de choisir une option--</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
            </div>
            <div class="annulModif">
                <a href="../"><button class="btnInput" type="button">Annuler</button></a>
                <input class="btn" type="submit" name="ajout" value="Modifier">

            </div>
            <?php if (!empty($errors)) : ?>
                <div class="errors">
                    <ul class="errors">
                        <li><?= $errors ?></li>
                    </ul>
                </div>
            <?php endif; ?>
        </form>
    </main>
</body>

</html>