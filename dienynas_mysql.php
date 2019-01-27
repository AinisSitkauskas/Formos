<?php
include("connection.php");
if (!empty($error)) {
    include('views\error.php');
    die();
}
if (!empty($_GET['id'])) {
    include("one_student.php");

    if (empty($error)) {
        include('views\students.php');
        die();
    } else {
        include('views\error.php');
        die();
    }
}
include("all_students.php");
if (empty($error)) {
    include('views\students.php');
} else {
    include('views\error.php');
}
