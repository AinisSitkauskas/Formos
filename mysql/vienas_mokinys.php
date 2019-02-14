<?php
include("connection.php");
$name = $_GET['name'];
$surname = $_GET['surname'];
$sqlQuery = "SELECT students.name, students.surname, teaching_subjects.teachingSubject, marks.mark,  marks.date
FROM marks
INNER JOIN students ON marks.idStudent=students.id
INNER JOIN teaching_subjects ON marks.idSubject=teaching_subjects.id
WHERE students.name='$name' AND students.surname='$surname'";
$result = mysqli_query($connection, $sqlQuery);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $students[] = [$row["name"], $row["surname"], $row["teachingSubject"], $row["mark"], $row["date"]];
    }
} else {
    $error = "Rezultatų nėra";
}
mysqli_close($connection);
