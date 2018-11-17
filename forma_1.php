<?php

if ($_SERVER['REQUEST_METHOD'] == 'GET' && !empty($_GET['pirmasDemuo']) && !empty($_GET['antrasDemuo'])) {
    echo "Suma: ". ($_GET["pirmasDemuo"] + $_GET["antrasDemuo"]);
    die();
}
?>

<!DOCTYPE html>
<html lang="lt">
 <meta charset="UTF-8">
 <title>Sudėties forma</title>
<body>


<h1>Sudėtis</h1>

<form  method = "get" >
  Pirmas dėmuo:<br>
  <input type="text" name="pirmasDemuo">
  <br>
  Antras dėmuo:<br>
  <input type="text" name="antrasDemuo">
  <br><br>
  <input type="submit"  value="Sudėti">
</form>

</body>
</html>
