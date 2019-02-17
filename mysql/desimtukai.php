<?php
include("connection.php");
if (!empty($error)) {
    include('views\error.php');
    die();
}
include("desimtukininkai.php");
if (empty($error)) {
    include('views\desimtukai_mokiniai.php');
} else {
    include('views\error.php');
}
mysqli_close($connection);
