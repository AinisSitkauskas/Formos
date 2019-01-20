<?php
include("connection.php");
$idNumber = $_GET['id'];
$sqlQuery = "SELECT id, name, surname FROM students WHERE id=$idNumber";
$result = mysqli_query($connection, $sqlQuery);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $student = [$row["id"], $row["name"], $row["surname"]];
    }
} else {
    echo "Rezultatų nėra";
}
mysqli_close($connection);
