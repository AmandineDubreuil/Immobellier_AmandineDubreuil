<?php
/*
* Page qui appelle la vue pour la gestion des biens immobiliers
*/
session_start();
include '../inc/fonctions.php';

$limit = 10;
$offset = 0;

require '../view/adminForma/indexView.php';
