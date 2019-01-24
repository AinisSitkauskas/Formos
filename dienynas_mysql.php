<?php
include("connection.php");
if (!empty($_GET['id'])) {
    include("one_student.php");

    if (empty($error)) {
        include('views\dienynas.php');
        die();
    } else {
        include('views\error.php');
        die();
    }
}
if (empty($error)) {
    include("all_students.php");
    include('views\dienynas.php');
} else {
    include('views\error.php');
}
