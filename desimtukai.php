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
    while (($studentData = fgetcsv($studentMarks, 1000, ",")) !== false) {
        $n = count($studentData);

        for ($i=0; $i < $n; $i++) {
            if ($studentData[3] == 10) {
                 array_push($onlyTenStudentArray, $studentData[1].",".$studentData[0].",".$studentData[2].",".$studentData[3].",".$studentData[4]);
            }
        }
    }
}
    sort($onlyTenStudentArray, SORT_STRING);
    $m = count($onlyTenStudentArray);
for ($i=0; $i < $m; $i++) {
    $oneOnlyTenStudentArray = explode(",", $onlyTenStudentArray[$i]);

    ?>

          <tr>
          <td><?php echo htmlspecialchars($oneOnlyTenStudentArray[1]); ?></td>
          <td><?php echo htmlspecialchars($oneOnlyTenStudentArray[0]); ?></td>
          <td><?php echo htmlspecialchars($oneOnlyTenStudentArray[2]); ?></td>
          <td><?php echo htmlspecialchars($oneOnlyTenStudentArray[3]); ?></td>
          <td><?php echo htmlspecialchars($oneOnlyTenStudentArray[4]); ?></td>
          </tr>
              <?php
}
?>
</table>
</body>
</html>
