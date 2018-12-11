<?php

$n = $argv[1];
$studentFirstNames = array("Jonas", "Petras", "Antanas", "Tomas", "Juozas", "Jurgis", "Mantas", "Danielius", "Stasys", "Algis");
$studentLastNames = array("Kazlauskas", "Jonaitis", "Petraitis", "Minderis", "Ignatavičius", "Kavaliauskas", "Sabonis", "Savickas", "Kesminas", "Adamkus");
$teachingSubjects =  array("Lietuvių kalba", "Matematika", "Anglų kalba", "Istorija", "Fizika", "Biologija", "Chemija", "Kūno kultūra", "Technologijos");
$studentMarksFile = fopen("studentMarks.csv", 'a');

for ($i = 0; $i < $n; $i++  ) {
$studentFirstRandomName = rand(0 ,9);
$studentLastRandomName = rand(0 ,9);
$teachingRandomSubjects = rand(0, 8);
$mark = rand(1 , 10);
$year= rand(2000, 2018);
$month = rand(1, 12);
$day = rand(1, 30);
$studentMarksInfo = array($studentLastNames[$studentLastRandomName],$studentFirstNames[$studentFirstRandomName], $teachingSubjects[$teachingRandomSubjects], $mark, $year."-".$month."-".$day);
fputcsv($studentMarksFile, $studentMarksInfo, ",", "\0");
}

  fclose($studentMarksFile);
