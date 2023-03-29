<?php
/*
* Ajout d'une annonce
*/
session_start();
include '../inc/fonctions.php';

(isConnected()) ?: redirectUrl('view/404.php');
//dd($_SESSION['id_utilisateur']);

$title = $description = $imageUpload = $type = $price = $surface = $room = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST["ajout"])) :

    uploadImage($_FILES["imageUpload"]["name"]);
    $imageName = $_FILES["imageUpload"]["name"];

    $title = nettoieChamps($_POST['title']);
    // image
    if ($imageName) :
        $image = "./uploads/" . basename($_FILES["imageUpload"]["name"]);
    else :
        $image = "";
    endif;

    $description = nettoieChamps($_POST['description']);
    $type = nettoieChamps($_POST['type']);
    $price = nettoieChamps($_POST['price']);
    $surface = nettoieChamps($_POST['surface']);
    $room = nettoieChamps($_POST['room']);

    insertAnnonce($title, $description, $image, $type, $price, $surface, $room, $_SESSION['id_utilisateur']);

    if ($_SESSION['login'] === 'user') :
        redirectUrl('');
    else :
        //dd($_SESSION); ./adminImmobellier/
        redirectUrl('');
    endif;

endif;

require '../view/adminImmobellier/ajoutView.php';
