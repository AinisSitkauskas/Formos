<?php
include("connection.php");
if (!empty($_GET['id'])) {
    include("one_student.php");
    include("one_student_rendering.php");
    die();
}
include("all_students.php");
include("all_students_rendering.php");
