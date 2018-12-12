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

    $studentNames = file_get_contents("studentMarks.csv");
    $studentNamesArray = explode("\n", $studentNames);
    $n = count($studentNamesArray);
    sort($studentNamesArray, SORT_STRING);
$onlyStudentNamesArray = array();
for ($i=1; $i < $n; $i++) {
            $oneStudentData = $studentNamesArray[$i];
            $oneStudentDataArray = explode(",", $oneStudentData);
    array_push($onlyStudentNamesArray, $oneStudentDataArray[1]." ".$oneStudentDataArray[0]);
}

$uniqueStudentNamesArray = array_unique($onlyStudentNamesArray);
$filteredUniqueStudentNamesArray=(array_values(array_filter($uniqueStudentNamesArray)));
$j =1;
foreach ($filteredUniqueStudentNamesArray as $key => $value) {
    $oneUniqueStudentName = $filteredUniqueStudentNamesArray[$j-1];
    $oneUniqueStudentNameArray = explode(" ", $oneUniqueStudentName);

    ?>
          <tr>
          <td><?php echo htmlspecialchars($oneUniqueStudentNameArray[0]); ?></td>
          <td><?php echo htmlspecialchars($oneUniqueStudentNameArray[1]); ?></td>
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
