<?php
define("TIMESTAMP_YEAR_2000", "946684800");
define("TIMESTAMP_YEAR_2019", "1546300800");
include("connection.php");
if (!empty($error)) {
    die($error);
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
foreach ($uniqueStudentNames as $key => $names) {
    $uniqueStudentName = explode(",", $uniqueStudentNames[$key]);
    $sqlQuerry = "INSERT INTO students (name, surname) VALUES ('$uniqueStudentName[0]', '$uniqueStudentName[1]')";
    mysqli_query($connection, $sqlQuerry);
}
foreach ($uniqueTeachingRandomSubjects as $key => $subject) {
    $sqlQuerry = "INSERT INTO teaching_subjects (teachingSubject) VALUES ('$uniqueTeachingRandomSubjects[$key]')";
    mysqli_query($connection, $sqlQuerry);
}
$counterStudent = count($uniqueStudentNames);
$counterSubject = count($uniqueTeachingRandomSubjects);
for ($i = 0; $i < $n; $i++) {
    $studentRandomNameId = rand(1, $counterStudent);
    $randomSubjectId = rand(1, $counterSubject);
    $dateTimestamp = rand(TIMESTAMP_YEAR_2000, TIMESTAMP_YEAR_2019);
    $mark = rand(1, 10);
    $date = date("Y-m-d", $dateTimestamp);
    $sqlQuerry = "INSERT INTO marks (idStudent, idSubject, mark, date)
    VALUES ('$studentRandomNameId', '$randomSubjectId', '$mark', '$date')";
    mysqli_query($connection, $sqlQuerry);
}
mysqli_close($connection);
echo "Pazymiai sugeneruoti ! \n";
