<?php

include("connection.php");

if (!empty($_GET['id'])) {
    include("one_student_atvaizdavimas.php");
    die();
}
include("all_students_atvaizdavimas.php");
