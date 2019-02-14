<?php
include("connection.php");
if (!empty($error)) {
    include('views\error.php');
    die();
}
include("visi_mokiniai.php");
if (empty($error)) {
    include('views\mokiniu_sarasas.php');
} else {
    include('views\error.php');
}
