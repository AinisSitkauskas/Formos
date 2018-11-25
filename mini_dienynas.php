<!DOCTYPE html>
<html lang="lt">
<head>
 <meta charset="UTF-8">
 <title>Mokyklos dienynas</title>
</head>
  <body>

    <h2>Mokyklos dienynas</h2><br>
<form  method = "post" >
  Pasirinkite mokinį: <br>
  <select name="student">
<?php

    $peopleNames = file_get_contents("people.txt");
    $studentNames = explode("\n", $peopleNames);
    $n = count($studentNames);
    sort($studentNames, SORT_STRING);
for ($i = 1; $i <= $n; $i++) {
      $oneStudent = $studentNames[$i-1];
    ?>
      <option><?php echo htmlspecialchars($oneStudent); ?></option>

      <?php
}
?>
</select><br>
  Mokomasis dalykas:<br>
  <input type="text" name="teachingSubject">
  <br>
  Pažymys:<br>
  <input type="text" name="mark">
  <br><br>
  <input type="submit"  value="Išsaugoti" name = "save_mark">
  <br>
</form>
<?php

if (isset($_POST["save_mark"])) {
    $marks = "marks.txt";
    file_put_contents($marks, $_POST['student']." ".$_POST['teachingSubject']." ".$_POST['mark']."\r\n", FILE_APPEND);
    echo "Išsaugota ";
}
?>
</body>
</html>
