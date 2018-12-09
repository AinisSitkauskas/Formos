
<!DOCTYPE html>
<html lang="lt">
 <meta charset="UTF-8">
 <title>Mokinio duomenų forma</title>
<body>


<h1>Mokinio duomenys</h1>

<form  method = "get" >
  Vardas:<br>
  <input type="text" name="firstName">
  <br>
  Pavardė:<br>
  <input type="text" name="lastName">
  <br><br>
  <input type="submit"  value="Išsaugoti">
</form>

</body>
</html>

<?php

if ($_SERVER['REQUEST_METHOD'] == 'GET' && !empty($_GET['firstName']) && !empty($_GET['lastName'])) {
    $studentNames = fopen("student.csv", 'a');
    $studentNamesArray = array( $_GET['lastName'], $_GET['firstName']);
    fputcsv($studentNames, $studentNamesArray, ',', chr(0));
    fclose($studentNames);
    echo "Išsaugota ";
}
?>
