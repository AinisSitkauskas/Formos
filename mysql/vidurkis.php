<?php
$start = microtime(true);
include("connection.php");
if (!empty($error)) {
    include('views\error.php');
    die();
}
if (!empty($_GET['subject'])) {
    include("pazymiu_vidurkis.php");

    if (empty($error)) {
        include('views\mokomojo_dalyko_pazymiu_vidurkis.php');
        die();
    } else {
        include('views\error.php');
        die();
    }
}
include('views\mokomojo_dalyko_pazymiu_vidurkis.php');
mysqli_close($connection);
