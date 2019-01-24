<?php
include("connection.php");
$sqlQuery = "SELECT id, name, surname FROM students";
$result = mysqli_query($connection, $sqlQuery);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $students[] = [$row["id"], $row["name"], $row["surname"]];
    }
} else {
      $error = "Rezultatų nėra";
}
mysqli_close($connection);
