<?php
/*
* Mise à jour d'une annonce
*/
session_start();
include '../inc/fonctions.php';

(isAdminConnected()) ?: redirectUrl('view/404.php');


(isGetIdValid()) ? $id = $_GET['id'] : error404();


$title = getAnnonceById($id)['title'];
$description = getAnnonceById($id)['description'];
$type = getAnnonceById($id)['type'];
$price = getAnnonceById($id)['price'];
$surface = getAnnonceById($id)['surface'];
$roomDb = getAnnonceById($id)['room'];
$imageDb = getAnnonceById($id)['image'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') :
    $title = nettoieChamps($_POST['title']);
    $description = nettoieChamps($_POST['description']);
    $type = nettoieChamps($_POST['type']);
    $price = nettoieChamps($_POST['price']);
    $surface = nettoieChamps($_POST['surface']);
    $roomModif = nettoieChamps($_POST['room']);
    $imageName = $_FILES["imageUpload"]["name"];

    if (!empty($imageName) && $imageName !== $imageDb) :

        uploadImage($_FILES["image"]["name"]);
        $image = "./uploads/" . basename($_FILES["image"]["name"]);
    else :
        $image = $imageDb;

    endif;

    if (!empty($roomModif) && $roomModif !== $room) :
      
       $room = $roomModif;
    else :
        $room = $roomDb;

    endif;

    updateAnnonce($id, $title, $description, $image, $type,  $price,  $surface,  $room);

    header('Location: ./index.php');
    exit();
endif;

require '../view/adminImmobellier/editView.php';
