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

</tr>
<?php
$onlyStudentNamesArray = array();
$uniqueStudentNamesArray = array();
if (($studentMarks = fopen("studentMarks.csv", "r")) !== false) {
    while (($studentData = fgetcsv($studentMarks, 1000, "\n")) !== false) {
        $n = count($studentData);

        for ($i=0; $i < $n; $i++) {
              $oneStudentDataArray = explode(",", $studentData[$i]);
            array_push($onlyStudentNamesArray, $oneStudentDataArray[1]." ".$oneStudentDataArray[0]);
        }
    }
}
$j =1;
$k=0;
foreach ($onlyStudentNamesArray as $key => $value) {
    if (!in_array($value, $uniqueStudentNamesArray)) {
        $uniqueStudentNamesArray[$k] = $value;
        $k++;
    }
}
foreach ($uniqueStudentNamesArray as $key => $value) {
    $oneOnlyStudentNameArray = explode(" ", $uniqueStudentNamesArray[$j-1]);

    ?>
          <tr>
          <td><?php echo htmlspecialchars($oneOnlyStudentNameArray[0]); ?></td>
          <td><?php echo htmlspecialchars($oneOnlyStudentNameArray[1]); ?></td>
          </tr>


              <?php
                $j++;
}
?>
</table>

<?php
echo "Viso mokinių:  $j ";

?>
</body>
</html>
