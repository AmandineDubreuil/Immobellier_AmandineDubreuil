<?php
/*
* Formulaire d'enregistrement d'un nouvel utilisateur
*/
session_start();

require '../inc/fonctions.php';

$last_name = $first_name = $email = $pwd = $address = $postal_code = $town = $phone = $role = $errors = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') :

    $last_name = nettoieChamps($_POST['last_name']);
    $first_name = nettoieChamps($_POST['first_name']);
    $email = nettoieChamps($_POST['email']);
    $pwd = nettoieChamps($_POST['pwd']);
    $address = nettoieChamps($_POST['address']);
    $postal_code = nettoieChamps($_POST['postal_code']);
    $town = nettoieChamps($_POST['town']);
    $phone = nettoieChamps($_POST['phone']);
    $role = nettoieChamps($_POST['role']);

    if ($email && $pwd) :
        if (chercheEmail($email)) :
            $errors = 'Veuiller choisir une autre adresse email !';
        else :
            $lastIdUtilisateur = insertUtilisateur($last_name, $first_name, $email, $pwd, $address, $postal_code, $town, $phone, $role);
            $_SESSION['login'] = chercheEmail($email)['role'];

            $_SESSION['id_user'] = $lastIdUtilisateur;
            if($role === 'admin'):
               redirectUrl('./adminImmobellier/');
            else:
               redirectUrl();
            endif;
        endif;
    else :
        $errors = 'Votre email ou mot de passe sont incorrect !';
    endif;
endif;

require '../view/register/indexView.php';
