<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Nouvelle annonce</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>
    <main class="container">
        <h2>Nouvelle Annonce</h2>
        <form method="POST" action="" enctype="multipart/form-data" class="form" novalidate>
            <div>
                <label for="title">Titre de l'annonce :</label>
                <input type="text" name="title" id="title" value="<?= $title ?>">
            </div>
            <div>
                <label for="description">Description :</label>
                <textarea name="description" id="description"><?= $description ?></textarea>
            </div>
            <div>
                <label for="imageUpload">Image :</label>
                <input type="file" name="imageUpload" id="imageUpload" value="<?= $imageUpload ?>">
            </div>
            <div>
                <label for="type">Type de transaction :</label>
                User <input type="radio" name="type" id="type" value="Vente" checked>
                Admin <input type="radio" name="type" id="type" value="Location">
            </div>

            <div>
                <label for="price">Prix :</label>
                <input type="number" name="price" id="price" value="<?= $price ?>">
            </div>
            <div>
                <label for="surface">Superficie :</label>
                <input type="number" name="surface" id="surface" value="<?= $surface ?>">
            </div>
            <div>
                <label for="room">Nombre de pièces :</label>
                <select name="romm" id="room">
                    <option value="">--Merci de choisir une option--</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
            </div>
            <div>
                <input type="submit" name="ajout" value="Ajouter">
                <a href="./"><button type="button">Annuler</button></a>
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