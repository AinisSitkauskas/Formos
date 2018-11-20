<?php

if ($_SERVER['REQUEST_METHOD'] == 'GET' && !empty($_GET['firstName']) && !empty($_GET['lastName'])) {
    $peopleNames = "people.txt";
    file_put_contents($peopleNames, $_GET['firstName']." ".$_GET['lastName']."\r\n", FILE_APPEND);
    echo "Išsaugota ";
    die();
}
?>

<!DOCTYPE html>
<html lang="lt">
 <meta charset="UTF-8">
 <title>Asmens duomenų forma</title>
<body>


<h1>Asmens duomenys</h1>

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
