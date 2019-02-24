<?php
define("TIMESTAMP_YEAR_2000", "946684800");
define("TIMESTAMP_YEAR_2019", "1546300800");

function generateMarks($numberOfRows, $connection, $counterStudent, $counterSubject, $uniqueStudentNames, $uniqueTeachingRandomSubjects) {
    static $studentRandomNameIdArray = array();
    static $randomSubjectIdArray = array();
    static $idStudent = 1;
    static $idSubject = 1;
    static $idRowStudent = array();
    static $idRowSubject = array();
    $sqlQueryStudents = "INSERT INTO students (name, surname) VALUES";
    $sqlQuerySubject = "INSERT INTO teaching_subjects (teachingSubject) VALUES";
    $sqlQueryMarks = "INSERT INTO marks (idStudent, idSubject, mark, date) VALUES";
    $sqlQueryStudentsParts = array();
    $sqlQuerySubjectParts = array();
    unset($sqlQueryMarkParts);
    for ($i = 0; $i < $numberOfRows; $i++) {
        $studentRandomNameId = rand(0, $counterStudent);
        $randomSubjectId = rand(0, $counterSubject);
        $uniqueStudentName = explode(",", $uniqueStudentNames[$studentRandomNameId]);
        if (!in_array($studentRandomNameId, $studentRandomNameIdArray)) {
            $sqlQueryStudentsParts[] = "('$uniqueStudentName[0]', '$uniqueStudentName[1]')";
            $studentRandomNameIdArray[] = $studentRandomNameId;
            $idRowStudent[$studentRandomNameId] = $idStudent;
            $idStudent++;
        }
        if (!in_array($randomSubjectId, $randomSubjectIdArray)) {
            $sqlQuerySubjectParts[] = "('$uniqueTeachingRandomSubjects[$randomSubjectId]')";
            $randomSubjectIdArray[] = $randomSubjectId;
            $idRowSubject[$randomSubjectId] = $idSubject;
            $idSubject++;
        }
        $idStudents = $idRowStudent[$studentRandomNameId];
        $idSubjects = $idRowSubject[$randomSubjectId];
        $dateTimestamp = rand(TIMESTAMP_YEAR_2000, TIMESTAMP_YEAR_2019);
        $mark = rand(1, 10);
        $date = date("Y-m-d", $dateTimestamp);
        $sqlQueryMarkParts[] = "('$idStudents', '$idSubjects', '$mark', '$date')";
    }
    $endSqlQuerry = ";";
    if (!empty($sqlQueryStudentsParts)) {
        $sqlQueryStudents .= implode(',', $sqlQueryStudentsParts);
        $sqlQueryStudents .= $endSqlQuerry;
        mysqli_query($connection, $sqlQueryStudents);
    }
    if (!empty($sqlQuerySubjectParts)) {
        $sqlQuerySubject .= implode(',', $sqlQuerySubjectParts);
        $sqlQuerySubject .= $endSqlQuerry;
        mysqli_query($connection, $sqlQuerySubject);
    }
    $sqlQueryMarks .= implode(',', $sqlQueryMarkParts);
    $sqlQueryMarks .= $endSqlQuerry;
    mysqli_query($connection, $sqlQueryMarks);
}

include("connection.php");
$n = $argv[1];
$studentFirstNames = array("Jonas Dvivardis", "Petras", "Antanas", "Tomas", "Juozas", "Jurgis", "Mantas", "Danielius", "Stasys", "Algis");
$studentLastNames = array("Kazlauskas", "Jonaitis", "Petraitis", "Minderis", "Ignatavičius", "Kavaliauskas", "Sabonis", "Savickas", "Kesminas", "Adamkus");
$teachingSubjects = array("Lietuvių kalba", "Matematika", "Anglų kalba", "Istorija", "Fizika", "Biologija", "Chemija", "Kūno kultūra", "Technologijos");
$uniqueStudentNames = array();
$uniqueTeachingRandomSubjects = array();
for ($i = 0; $i < $n; $i++) {
    $studentNames = $studentFirstNames[rand(0, 9)] . "," . $studentLastNames[rand(0, 9)];
    $teachingRandomSubjects = $teachingSubjects[rand(0, 8)];

    if (!in_array($studentNames, $uniqueStudentNames)) {
        $uniqueStudentNames[] = $studentNames;
    }
    if (!in_array($teachingRandomSubjects, $uniqueTeachingRandomSubjects)) {
        $uniqueTeachingRandomSubjects[] = $teachingRandomSubjects;
    }
}
$counterStudent = count($uniqueStudentNames) - 1;
$counterSubject = count($uniqueTeachingRandomSubjects) - 1;

$m = (int) ($n / 5000);
if ($m > 0) {
    for ($j = 0; $j < $m; $j++) {
        generateMarks(5000, $connection, $counterStudent, $counterSubject, $uniqueStudentNames, $uniqueTeachingRandomSubjects);
    }
}
$k = $n % 5000;
if ($k > 0) {
    generateMarks($k, $connection, $counterStudent, $counterSubject, $uniqueStudentNames, $uniqueTeachingRandomSubjects);
}

mysqli_close($connection);
echo "Pazymiai sugeneruoti ! \n";
