<?php
/*
* Ajout d'une formation
*/
session_start();
include '../inc/fonctions.php';

(isConnected()) ?: redirectUrl('view/404.php');


$titre = $description = $imageUpload = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST["ajout"])) :

    //imageUpload($imageUpload);
    //dd($target_file);
    $titre = cleanData($_POST['titre']);
    $imageUpload = cleanData($_POST['imageUpload']);
    $description = cleanData($_POST['description']);

        insertFormation($titre, $description, $imageUpload);

    redirectUrl('adminForma/index.php');

endif;

require '../view/adminForma/ajoutView.php';
