<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Immobellier - Inscription</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>
    <main class="container">
        <h1>Inscription à Immobellier</h1>
        <form method="POST" class="form">
            <div>
                <label for="last_name">Nom *</label>
                <input type="text" name="last_name" id="last_name" value="<?= $last_name ?>" required>
            </div>
            <div>
                <label for="first_name">Prénom *</label>
                <input type="text" name="first_name" id="first_name" value="<?= $first_name ?>" required>
            </div>

            <div>
                <label for="email">Email *</label>
                <input type="email" name="email" id="email" required value="<?= $email ?>">
            </div>
            <div>
                <label for="pwd">Mot de passe *</label>
                <input type="password" name="pwd" id="pwd" required value="<?= $pwd ?>">
            </div>
            <div>
                <label for="address">Adresse *</label>
                <input type="text" name="address" id="address" value="<?= $address ?>">
            </div>
            <div>
                <label for="postal_code">Code Postal *</label>
                <input type="text" name="postal_code" id="postal_code" value="<?= $postal_code ?>">
            </div>

            <div>
                <label for="town">Ville *</label>
                <input type="text" name="town" id="town" value="<?= $town ?>">
            </div>
            <div>
                <label for="phone">Téléphone *</label>
                <input type="tel" name="phone" id="phone" value="<?= $phone ?>">
            </div>
            <div>
                <label for="role">Role</label>
                User <input type="radio" name="role" id="role" value="user" checked>
                Admin <input type="radio" name="role" id="role" value="admin">
            </div>

            <div>
                <input type="submit" value="Inscription">
            </div>
            <?php if (!empty($errors)) : ?>
                <div class="errors">
                    <ul class="errors">
                        <li><?= $errors ?></li>
                    </ul>
                </div>
            <?php endif; ?>
        </form>
        <p>* Informations obligatoires</p>
    </main>
</body>

</html>