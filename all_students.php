<?php
include("connection.php");
$sqlQuery = "SELECT id, name, surname FROM students";
$result = mysqli_query($connection, $sqlQuery);
$counter = 0;
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $students[$counter][0] = $row["id"];
        $students[$counter][1] = $row["name"];
        $students[$counter][2] = $row["surname"];
        $counter++;
    }
} else {
    echo "Rezultatų nėra";
}
mysqli_close($connection);
