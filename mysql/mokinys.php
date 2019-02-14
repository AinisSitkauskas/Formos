<?php
include("connection.php");
if (!empty($error)) {
    include('views\error.php');
    die();
}
if (!empty($_GET['name']) && !empty($_GET['surname'])) {
    include("vienas_mokinys.php");

    if (empty($error)) {
        include('views\mokinio_pazymiai.php');
        die();
    } else {
        include('views\error.php');
        die();
    }
}
include('views\mokinio_pazymiai.php');
