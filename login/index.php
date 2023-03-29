<?php
/*
 * Formulaire de connexion
 */
session_start();
include '../inc/fonctions.php';

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') :
    $email = nettoieChamps($_POST['email']);
    $pwd = nettoieChamps($_POST['pwd']);

    if ($email) :
        if (chercheEmail($email)) :
            if (password_verify($pwd, chercheEmail($email)['password'])) :
                $_SESSION['login'] = chercheEmail($email)['role'];
                $_SESSION['id_utilisateur'] = chercheEmail($email)['id_user'];

                if (chercheEmail($email)['role'] === 'admin') :
                    redirectUrl('adminImmobellier/');
                endif;

                redirectUrl();
            else :
                $errors[] = 'Le mot de passe est invalide.';
            endif;
        else :
            echo 'Votre email n\'est pas enregistré comme utilisateur de notre site.<br>';
            echo 'Veuillez vous enregister avec <a href="../register">ce formulaire</a>';
            exit();
        endif;

    else :
        $errors[] = 'Votre email est manquant ou incorrect !';
    endif;


endif;

require '../view/login/indexView.php';
