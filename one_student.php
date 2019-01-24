<?php
include("connection.php");
$idNumber = $_GET['id'];
$sqlQuery = "SELECT id, name, surname FROM students WHERE id=$idNumber";
$result = mysqli_query($connection, $sqlQuery);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $students[] = [$row["id"], $row["name"], $row["surname"]];
    }
} else {
    $error = "Rezultatų nėra";
}
mysqli_close($connection);
