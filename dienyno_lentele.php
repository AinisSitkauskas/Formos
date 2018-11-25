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

<?php

    $studentMarks = file_get_contents("marks.txt");
    $marks = explode("\n", $studentMarks);
    $n = count($marks);
    sort($marks, SORT_STRING);
for ($i = 1; $i <= $n; $i++) {
      $oneStudent = $marks[$i-1];
      $studentRow = explode(" ", $oneStudent);
      $nn = count($studentRow);
    if ($nn == 4) {
        ?>
      <tr>
      <td><?php echo htmlspecialchars($studentRow[0]); ?></td>
      <td><?php echo htmlspecialchars($studentRow[1]); ?></td>
      <td><?php echo htmlspecialchars($studentRow[2]); ?></td>
      <td><?php echo htmlspecialchars($studentRow[3]); ?></td>
      </tr>
        <?php
    } elseif ($nn == 5) {
        ?>
<tr>
<td><?php echo htmlspecialchars($studentRow[0]); ?></td>
<td><?php echo htmlspecialchars($studentRow[1]); ?></td>
<td><?php echo htmlspecialchars($studentRow[2]." ".$studentRow[3]); ?></td>
<td><?php echo htmlspecialchars($studentRow[4]); ?></td>
</tr>

        <?php
    }
}
?>
</table>
</body>
</html>
