<?php
/*
* Page qui appelle la vue pour la gestion des biens immobiliers
*/
session_start();
include '../inc/fonctions.php';
(isAdminConnected()) ?: redirectUrl('view/404.php');
$limit = 10;
$offset = 0;

require '../view/adminImmobellier/indexView.php';
