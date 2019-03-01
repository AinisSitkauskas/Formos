<?php
$sqlQuery = "SELECT name, surname FROM students";
$result = mysqli_query($connection, $sqlQuery);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $students[] = [$row["name"], $row["surname"]];
    }
} else {
    $error = "Rezultatų nėra";
}
$sqlQuery = "SELECT COUNT(id) AS studentsAmount FROM students";
$result = mysqli_query($connection, $sqlQuery);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $studentsAmount = $row["studentsAmount"];
    }
} else {
    $error = "Rezultatų nėra";
}
