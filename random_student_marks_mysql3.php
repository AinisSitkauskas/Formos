<?php
define("TIMESTAMP_YEAR_2000", "946684800");
define("TIMESTAMP_YEAR_2019", "1546300800");
include("connection.php");
if (!empty($error)) {
    die($error);
}

function getIdNumber($connection, $sqlQuery) {
    $result = mysqli_query($connection, $sqlQuery);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $idRow = $row["id"];
            return $idRow;
        }
    } else {
        echo "Rezultatų nėra";
    }
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
foreach ($studentNames as $names) {
    if (!in_array($names, $uniqueStudentNames)) {
        $uniqueStudentNames[] = $names;
    }
}
$uniqueTeachingRandomSubjects = array();
foreach ($teachingRandomSubjects as $subject) {
    if (!in_array($subject, $uniqueTeachingRandomSubjects)) {
        $uniqueTeachingRandomSubjects[] = $subject;
    }
}
$counterStudent = count($uniqueStudentNames) - 1;
$counterSubject = count($uniqueTeachingRandomSubjects) - 1;
$studentRandomNameIdArray = array();
$randomSubjectIdArray = array();
for ($i = 0; $i < $n; $i++) {
    $studentRandomNameId = rand(0, $counterStudent);
    $randomSubjectId = rand(0, $counterSubject);
    $dateTimestamp = rand(TIMESTAMP_YEAR_2000, TIMESTAMP_YEAR_2019);
    $mark = rand(1, 10);
    $date = date("Y-m-d", $dateTimestamp);
    $uniqueStudentName = explode(",", $uniqueStudentNames[$studentRandomNameId]);
    if (!in_array($studentRandomNameId, $studentRandomNameIdArray)) {
        $sqlQuery = "INSERT INTO students (name, surname) VALUES ('$uniqueStudentName[0]', '$uniqueStudentName[1]')";
        mysqli_query($connection, $sqlQuery);
        $studentRandomNameIdArray[] = $studentRandomNameId;
    }
    $sqlQuery = "SELECT id FROM students WHERE name='$uniqueStudentName[0]' AND surname='$uniqueStudentName[1]'";
    $idStudent = getIdNumber($connection, $sqlQuery);
    if (!in_array($randomSubjectId, $randomSubjectIdArray)) {
        $sqlQuery = "INSERT INTO teaching_subjects (teachingSubject) VALUES ('$uniqueTeachingRandomSubjects[$randomSubjectId]')";
        mysqli_query($connection, $sqlQuery);
        $randomSubjectIdArray[] = $randomSubjectId;
    }
    $sqlQuery = "SELECT id FROM teaching_subjects WHERE teachingSubject='$uniqueTeachingRandomSubjects[$randomSubjectId]'";
    $idSubject = getIdNumber($connection, $sqlQuery);
    $sqlQuery = "INSERT INTO marks (idStudent, idSubject, mark, date)
    VALUES ('$idStudent', '$idSubject', '$mark', '$date')";
    mysqli_query($connection, $sqlQuery);
}
mysqli_close($connection);
echo "Pazymiai sugeneruoti ! \n";
