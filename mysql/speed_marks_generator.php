<?php
define("TIMESTAMP_YEAR_2000", "946684800");
define("TIMESTAMP_YEAR_2019", "1546300800");
include("connection.php");
$n = $argv[1];
$m = (int) ($n / 5000);
if ($m > 0) {
    for ($j = 0; $j < $m; $j++) {
        for ($i = 0; $i < 5000; $i++) {
            if ($i == 0) {
                $idStudent = rand(1, 100);
                $idSubject = rand(1, 9);
                $dateTimestamp = rand(TIMESTAMP_YEAR_2000, TIMESTAMP_YEAR_2019);
                $mark = rand(1, 10);
                $date = date("Y-m-d", $dateTimestamp);
                $sqlQuery = "INSERT INTO marks (idStudent, idSubject, mark, date)
    VALUES ('$idStudent', '$idSubject', '$mark', '$date'),";
            } else if (($i != 0) && ($i != 4999)) {
                $idStudent = rand(1, 100);
                $idSubject = rand(1, 9);
                $dateTimestamp = rand(946684800, 1546300800);
                $mark = rand(1, 10);
                $date = date("Y-m-d", $dateTimestamp);
                $markRow = " ('$idStudent', '$idSubject', '$mark', '$date'),";
                $sqlQuery .= $markRow;
            } else {
                $idStudent = rand(1, 100);
                $idSubject = rand(1, 9);
                $dateTimestamp = rand(946684800, 1546300800);
                $mark = rand(1, 10);
                $date = date("Y-m-d", $dateTimestamp);
                $markRow = " ('$idStudent', '$idSubject', '$mark', '$date');";
                $sqlQuery .= $markRow;
            }
        }
        mysqli_query($connection, $sqlQuery);
    }
}
$k = $n % 5000;
if ($k > 0) {
    for ($i = 0; $i < $k; $i++) {
        if ($i == 0) {
            $idStudent = rand(1, 100);
            $idSubject = rand(1, 9);
            $dateTimestamp = rand(946684800, 1546300800);
            $mark = rand(1, 10);
            $date = date("Y-m-d", $dateTimestamp);
            $sqlQuery = "INSERT INTO marks (idStudent, idSubject, mark, date)
    VALUES ('$idStudent', '$idSubject', '$mark', '$date'),";
        } else if (($i != 0) && ($i != $k - 1)) {
            $idStudent = rand(1, 100);
            $idSubject = rand(1, 9);
            $dateTimestamp = rand(946684800, 1546300800);
            $mark = rand(1, 10);
            $date = date("Y-m-d", $dateTimestamp);
            $markRow = " ('$idStudent', '$idSubject', '$mark', '$date'),";
            $sqlQuery .= $markRow;
        } else {
            $idStudent = rand(1, 100);
            $idSubject = rand(1, 9);
            $dateTimestamp = rand(946684800, 1546300800);
            $mark = rand(1, 10);
            $date = date("Y-m-d", $dateTimestamp);
            $markRow = " ('$idStudent', '$idSubject', '$mark', '$date');";
            $sqlQuerry .= $markRow;
        }
    }
    mysqli_query($connection, $sqlQuerry);
}
mysqli_close($connection);
echo "Pazymiai sugeneruoti ! \n";
