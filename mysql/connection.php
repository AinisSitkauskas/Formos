<?php
include("parameters.php");
$connection = mysqli_connect($serverName, $userName, $password, $dbName);
if (!$connection) {
    $error = "Prisijungti nepavyko: " . mysqli_connect_error();
}
