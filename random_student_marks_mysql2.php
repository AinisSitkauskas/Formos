<?php
include("connection.php");
if (!empty($error)) {
    echo $error;
    die();
}

$n = $argv[1];
$studentFirstNames = array("Jonas Jonas", "Petras", "Antanas", "Tomas", "Juozas", "Jurgis", "Mantas", "Danielius", "Stasys", "Algis");
$studentLastNames = array("Kazlauskas", "Jonaitis", "Petraitis", "Minderis", "Ignatavičius", "Kavaliauskas", "Sabonis", "Savickas", "Kesminas", "Adamkus");
$teachingSubjects = array("Lietuvių kalba", "Matematika", "Anglų kalba", "Istorija", "Fizika", "Biologija", "Chemija", "Kūno kultūra", "Technologijos");

for ($i = 0; $i < $n; $i++) {
    $studentFirstRandomName = rand(0, 9);
    $studentLastRandomName = rand(0, 9);
    $teachingRandomSubject = rand(0, 8);
    $studentNames[$i] = $studentFirstNames[$studentFirstRandomName] . "," . $studentLastNames[$studentLastRandomName];
    $teachingRandomSubjects[$i] = $teachingSubjects[$teachingRandomSubject];
}
$uniqueStudentNames = array();
foreach ($studentNames as $key => $value) {
    if (!in_array($value, $uniqueStudentNames)) {
        $uniqueStudentNames[] = $value;
    }
}
$uniqueTeachingRandomSubjects = array();
foreach ($teachingRandomSubjects as $key => $value) {
    if (!in_array($value, $uniqueTeachingRandomSubjects)) {
        $uniqueTeachingRandomSubjects[] = $value;
    }
}
foreach ($uniqueStudentNames as $key => $value) {
    $uniqueStudentName = explode(",", $uniqueStudentNames[$key]);
    $sqlQuerry = "INSERT INTO students (name, surname) VALUES ('$uniqueStudentName[0]', '$uniqueStudentName[1]')";
    mysqli_query($connection, $sqlQuerry);
}
foreach ($uniqueTeachingRandomSubjects as $key => $value) {
    $sqlQuerry = "INSERT INTO teaching_subjects (teachingSubject) VALUES ('$uniqueTeachingRandomSubjects[$key]')";
    mysqli_query($connection, $sqlQuerry);
}
$counterStudent = count($uniqueStudentNames);
$counterSubject = count($uniqueTeachingRandomSubjects);
for ($i = 0; $i < $n; $i++) {
    $studentRandomNameId = rand(1, $counterStudent);
    $randomSubjectId = rand(1, $counterSubject);
    $dateTimestamp = rand(946684800, 1546300800);
    $mark = rand(1, 10);
    $date = date("Y-m-d", $dateTimestamp);
    $sqlQuerry = "INSERT INTO marks (idStudent, idSubject, mark, date)
    VALUES ('$studentRandomNameId', '$randomSubjectId', '$mark', '$date')";
    mysqli_query($connection, $sqlQuerry);
}

$sqlQuery = "SELECT idStudent FROM marks";
$result = mysqli_query($connection, $sqlQuery);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $idStudents[] = $row["idStudent"];
    }
} else {
    $error = "Rezultatų nėra";
}

for ($i = 1; $i <= $counterStudent; $i++) {
    if (!in_array($i, $idStudents)) {
        $sqlQuerry = "DELETE FROM students WHERE id=$i";
        mysqli_query($connection, $sqlQuerry);
    }
}

$sqlQuery = "SELECT idSubject FROM marks";
$result = mysqli_query($connection, $sqlQuery);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $idSubject[] = $row["idSubject"];
    }
} else {
    $error = "Rezultatų nėra";
}

for ($i = 1; $i <= $counterSubject; $i++) {
    if (!in_array($i, $idSubject)) {
        $sqlQuerry = "DELETE FROM teaching_subjects WHERE id=$i";
        mysqli_query($connection, $sqlQuerry);
    }
}

$sqlQuery = "SELECT id FROM students";
$result = mysqli_query($connection, $sqlQuery);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $students[] = $row["id"];
    }
} else {
    $error = "Rezultatų nėra";
}

foreach ($students as $key => $value) {
    $id = $key + 1;
    $sqlQuerry = "UPDATE students SET id=$id WHERE id=$students[$key]";
    mysqli_query($connection, $sqlQuerry);
}

$sqlQuery = "SELECT id FROM teaching_subjects";
$result = mysqli_query($connection, $sqlQuery);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $subjects[] = $row["id"];
    }
} else {
    $error = "Rezultatų nėra";
}

foreach ($subjects as $key => $value) {
    $id = $key + 1;
    $sqlQuerry = "UPDATE teaching_subjects SET id=$id WHERE id=$subjects[$key]";
    mysqli_query($connection, $sqlQuerry);
}

mysqli_close($connection);
echo "Pazymiai sugeneruoti ! \n";
