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

<h2>Mokomojo dalyko pažymių vidurkis </h2><br>
    <form  method = "get" >
    Įveskite mokomąjį dalyką:<br>
      <input type="text" name="teachingSubject">
      <br><br>
      <input type="submit"  value="Išsaugoti">
    </form>

<br>

<?php
if (!empty($_GET['teachingSubject'])) {
    $averageMark = 0;
    $counter = 0;
    if (($studentMarks = fopen("studentMarks.csv", "r")) !== false) {
        while (($studentData = fgetcsv($studentMarks, 1000, ",")) !== false) {
            $n = count($studentData);
            for ($i=0; $i < $n; $i++) {
                    $studentData[2] = trim($studentData[2]);
                if ($_GET['teachingSubject'] == $studentData[2]) {
                    $averageMark += $studentData[3];
                    $counter++;
                }
            }
        }
    }
    echo "Pažymių vidurkis:  ".$averageMark/$counter;
}
?>
</body>
</html>
