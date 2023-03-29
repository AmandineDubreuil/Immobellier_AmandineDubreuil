<?php
/*
* Suppression d'une annonce
*/
include '../inc/fonctions.php';

$id = $_GET['id'];

if (suppAnnonceById($id)) :
   header('Location: ./index.php');
   exit();
else :
   exit('Une Erreur s\'est produite !');
endif;
