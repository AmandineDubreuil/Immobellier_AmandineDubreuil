<?php

//echo 'test';

function dbug($valeur)
{
    echo "<pre style='background-color:black;color:white;padding: 15px;overflow:auto;height:300px;'>";
    var_dump($valeur);
    echo "</pre>";
}


function dd($valeur)
{
    echo "<pre style='background-color:black;color:white;padding: 15px;overflow:auto;height:300px;'>";
    var_dump($valeur);
    echo "</pre>";
    die();
}

function redirectUrl(string $path = ''): void
{
    $homeUrl = 'http://' . $_SERVER['HTTP_HOST'] . '/Immobellier';
    $homeUrl .= '/' . $path;
    header("Location: {$homeUrl}");
    exit();
}

/** pour bdd user */

function nettoieChamps($valeur)
{
    if (!empty($valeur) && isset($valeur)) :
        $valeur = strip_tags(trim($valeur));
        return $valeur;
    else :
        return false;
    endif;
}

function chercheEmail(string $email): array|bool
{
    require 'pdo.php';

    $requete = 'SELECT * FROM users where email = :email';
    $resultat = $conn->prepare($requete);
    $resultat->bindValue(':email', $email, PDO::PARAM_STR);
    $resultat->execute();
    return $resultat->fetch();
}

function insertUtilisateur(string $last_name, string $first_name, string $email, string $pwd, string $address, int $postal_code, string $town, int $phone, string $role): int
{
    require 'pdo.php';
    $pwdHashe = password_hash($pwd, PASSWORD_DEFAULT);

    $requete = 'INSERT INTO users (`first_name`, `last_name`, `email`, `password`, `address`, `town`, `postal_code`, `phone`, `role`, `created_at`, `modified_at`) VALUES (:first_name, :last_name, :email, :pwd, :address, :town, :postal_code, :phone, :role, now(), now())';
    $resultat = $conn->prepare($requete);
    $resultat->bindValue(':first_name', $first_name, PDO::PARAM_STR);
    $resultat->bindValue(':last_name', $last_name, PDO::PARAM_STR);
    $resultat->bindValue(':email', $email, PDO::PARAM_STR);
    $resultat->bindValue(':pwd', $pwdHashe, PDO::PARAM_STR);
    $resultat->bindValue(':address', $address, PDO::PARAM_STR);
    $resultat->bindValue(':postal_code', $postal_code, PDO::PARAM_INT);
    $resultat->bindValue(':town', $town, PDO::PARAM_STR);
    $resultat->bindValue(':phone', $phone, PDO::PARAM_INT);
    $resultat->bindValue(':role', $role, PDO::PARAM_STR);
    $resultat->execute();
    return $conn->lastInsertId();
}

function isConnected(): bool
{
    if (isset($_SESSION['login']) && $_SESSION['login'] == true) :
        return true;
    else :
        return false;
    endif;
}
function isAdminConnected(): bool
{
    if (isset($_SESSION['login']) && $_SESSION['login'] === 'admin') :
        return true;
    else :
        return false;
    endif;
}

/* BDD annonces */
function insertAnnonce( $title,  $description,  $image,  $type,  $price,  $surface,  $room,  $id_utilisateur): int
{
    require 'pdo.php';
    $requete = 'INSERT INTO annonces (`title`, `description`, `image`, `type`, `price`, `surface`, `room`, `user_id`) VALUES (:title, :description, :image, :type, :price, :surface, :room, :id_utilisateur)';
    $resultat = $conn->prepare($requete);
    $resultat->bindValue(':title', $title, PDO::PARAM_STR);
    $resultat->bindValue(':description', $description, PDO::PARAM_STR);
    $resultat->bindValue(':image', $image, PDO::PARAM_STR);
    $resultat->bindValue(':type', $type, PDO::PARAM_STR);
    $resultat->bindValue(':price', $price, PDO::PARAM_INT);
    $resultat->bindValue(':surface', $surface, PDO::PARAM_INT);
    $resultat->bindValue(':room', $room, PDO::PARAM_INT);
    $resultat->bindValue(':id_utilisateur', $id_utilisateur, PDO::PARAM_INT);

    $resultat->execute();
    return $conn->lastInsertId();
}

function uploadImage($image)
{
    $target_dir = "../uploads/";
    $target_file = $target_dir . basename($_FILES["imageUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["imageUpload"]["tmp_name"], $target_file)) {
            echo "The file " . htmlspecialchars(basename($_FILES["imageUpload"]["name"])) . " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
