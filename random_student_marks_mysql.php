<?php
include("connection.php");
if (!empty($error)) {
    echo $error;
    die();
}
$n = $argv[1];
$studentFirstNames = array("Jonas", "Petras", "Antanas", "Tomas", "Juozas", "Jurgis", "Mantas", "Danielius", "Stasys", "Algis");
$studentLastNames = array("Kazlauskas", "Jonaitis", "Petraitis", "Minderis", "Ignatavičius", "Kavaliauskas", "Sabonis", "Savickas", "Kesminas", "Adamkus");
$teachingSubjects = array("Lietuvių kalba", "Matematika", "Anglų kalba", "Istorija", "Fizika", "Biologija", "Chemija", "Kūno kultūra", "Technologijos");

for ($i = 0; $i < $n; $i++) {
    $studentFirstRandomName = rand(0, 9);
    $studentLastRandomName = rand(0, 9);
    $teachingRandomSubject = rand(0, 8);
    $studentNames[$i] = $studentFirstNames[$studentFirstRandomName] . " " . $studentLastNames[$studentLastRandomName];
    $teachingRandomSubjects[$i] = $teachingSubjects[$teachingRandomSubject];
}
$k = 0;
$uniqueStudentNames = array();
foreach ($studentNames as $key => $value) {
    if (!in_array($value, $uniqueStudentNames)) {
        $uniqueStudentNames[$k] = $value;
        $k++;
    }
}
$k = 0;
$uniqueTeachingRandomSubjects = array();
foreach ($teachingRandomSubjects as $key => $value) {
    if (!in_array($value, $uniqueTeachingRandomSubjects)) {
        $uniqueTeachingRandomSubjects[$k] = $value;
        $k++;
    }
}
foreach ($uniqueStudentNames as $key => $value) {
    $uniqueStudentName = explode(" ", $uniqueStudentNames[$key]);
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
    $mark = rand(1, 10);
    $year = rand(2000, 2018);
    $month = rand(1, 12);
    $day = rand(1, 30);
    $date = $year . "-" . $month . "-" . $day;
    $sqlQuerry = "INSERT INTO marks (idStudent, idSubject, mark, date)
    VALUES ('$studentRandomNameId', '$randomSubjectId', '$mark', '$date')";
    mysqli_query($connection, $sqlQuerry);
}
mysqli_close($connection);
echo "Pazymiai sugeneruoti ! \n";
