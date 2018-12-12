<!DOCTYPE html>
<html lang="lt">
<head>
 <meta charset="UTF-8">
 <title>Mokomojo dalyko pažymių vidurkis</title>

  <style>
  table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
    text-align: center;
    padding: 15px;
  }
  </style>
</head>
  <body>

<h1>Mokomojo dalyko pažymių vidurkis </h1><br>
    <form  method = "get" >
    Įveskite mokomąjį dalyką:<br>
      <input type="text" name="teachingSubject">
      <br><br>
      <input type="submit"  value="Išsaugoti">
    </form>

<br>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET' && !empty($_GET['teachingSubject'])) {
    $averageMark = 0;
    $counter = 0;
    $studentNames = file_get_contents("studentMarks.csv");
    $studentNamesArray = explode("\n", $studentNames);
    $n = count($studentNamesArray);
    sort($studentNamesArray, SORT_STRING);

    for ($i=1; $i < $n; $i++) {
            $oneStudentData = $studentNamesArray[$i];
            $oneStudentDataArray = explode(",", $oneStudentData);

        if ($_GET['teachingSubject'] == $oneStudentDataArray[2]) {
            $averageMark += $oneStudentDataArray[3];
            $counter++;
        }
    }

    echo "Pažymių vidurkis:  ".$averageMark/$counter;
}
?>
</body>
</html>
