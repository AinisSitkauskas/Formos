<!DOCTYPE html>
<html lang="lt">
<head>
 <meta charset="UTF-8">
 <title>Dešimtukų lentelė</title>

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
<table>
  <tr>
    <th> Pavardė.</th>
    <th> Vardas </th>
    <th> Mokomasis dalykas </th>
    <th> Pažymys </th>
    <th> Data </th>
</tr>
<?php

    $studentNames = file_get_contents("studentMarks.csv");
    $studentNamesArray = explode("\n", $studentNames);
    $n = count($studentNamesArray);
    sort($studentNamesArray, SORT_STRING);

for ($i=1; $i < $n; $i++) {
            $oneStudentData = $studentNamesArray[$i];
            $oneStudentDataArray = explode(",", $oneStudentData);
    if ($oneStudentDataArray[3] == 10) {
        ?>
          <tr>
          <td><?php echo htmlspecialchars($oneStudentDataArray[0]); ?></td>
          <td><?php echo htmlspecialchars($oneStudentDataArray[1]); ?></td>
          <td><?php echo htmlspecialchars($oneStudentDataArray[2]); ?></td>
          <td><?php echo htmlspecialchars($oneStudentDataArray[3]); ?></td>
          <td><?php echo htmlspecialchars($oneStudentDataArray[4]); ?></td>
          </tr>


              <?php
    }
}




?>
</table>
</body>
</html>
