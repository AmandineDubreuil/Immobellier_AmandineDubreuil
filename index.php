<?php
session_start();
include './inc/fonctions.php';
//dd($_SESSION['role']);
$limit = 10;
$offset = 0;
//$role = $_SESSION['role'];
include './view/indexView.php';
