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
   $homeUrl = 'http://' . $_SERVER['HTTP_HOST']. '/Immobellier' ;
   $homeUrl .= '/'. $path;
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





