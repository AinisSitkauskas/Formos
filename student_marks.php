<!DOCTYPE html>
<html lang="lt">
<head>
 <meta charset="UTF-8">
 <title>Dienyno lentelė</title>

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
</tr>
<?php

if (($studentNames = fopen("studentMarks.csv", "r")) !== false) {
    while (($studentData = fgetcsv($studentNames, 1000, "\n")) !== false) {
        $num = count($studentData);
        sort($studentData, SORT_STRING);

        for ($i=0; $i < $num; $i++) {
            $studentDataArray = explode(",", $studentData[$i]);

            ?>
          <tr>
          <td><?php echo htmlspecialchars($studentDataArray[0]); ?></td>
          <td><?php echo htmlspecialchars($studentDataArray[1]); ?></td>
          <td><?php echo htmlspecialchars($studentDataArray[2]); ?></td>
          <td><?php echo htmlspecialchars($studentDataArray[3]); ?></td>
          </tr>

              <?php
        }
    }
    fclose($studentNames);
}
?>
</table>
</body>
</html>
