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
$onlyTenStudentArray = array();
if (($studentMarks = fopen("studentMarks.csv", "r")) !== false) {
    while (($studentData = fgetcsv($studentMarks, 1000, "\n")) !== false) {
        $n = count($studentData);

        for ($i=0; $i < $n; $i++) {
                $oneStudentDataArray = explode(",", $studentData[$i]);
            if ($oneStudentDataArray[3] == 10) {
                 array_push($onlyTenStudentArray, $oneStudentDataArray[1].",".$oneStudentDataArray[0].",".$oneStudentDataArray[2].",".$oneStudentDataArray[3].",".$oneStudentDataArray[4]);
            }
        }
    }
}
    sort($onlyTenStudentArray, SORT_STRING);
    $m = count($onlyTenStudentArray);
for ($i=0; $i < $m; $i++) {
    $oneOnlytenStudentArray = explode(",", $onlyTenStudentArray[$i]);

    ?>

          <tr>
          <td><?php echo htmlspecialchars($oneOnlytenStudentArray[1]); ?></td>
          <td><?php echo htmlspecialchars($oneOnlytenStudentArray[0]); ?></td>
          <td><?php echo htmlspecialchars($oneOnlytenStudentArray[2]); ?></td>
          <td><?php echo htmlspecialchars($oneOnlytenStudentArray[3]); ?></td>
          <td><?php echo htmlspecialchars($oneOnlytenStudentArray[4]); ?></td>
          </tr>
              <?php
}
?>
</table>
</body>
</html>
