<?php
include("connection.php");

$sqlData = "select id, name, surname from students";
$result = mysqli_query($connection, $sqlData);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {

include('C:\xampp\htdocs\mysql\table.php');

    }
} else {
    echo "Rezultatų nėra";
}
mysqli_close($connection);
