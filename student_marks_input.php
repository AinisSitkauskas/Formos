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


if (($studentNames = fopen("student.csv", "r")) !== false) {
    while (($studentData = fgetcsv($studentNames, 1000, "\n")) !== false) {
        $num = count($studentData);
        sort($studentData, SORT_STRING);

        for ($i=0; $i < $num; $i++) {
            ?>
              <option><?php echo htmlspecialchars($studentData[$i]); ?></option>

              <?php
        }
    }
    fclose($studentNames);
}
?>

</select><br>
  Mokomasis dalykas:<br>
  <input type="text" name="teachingSubject">
  <br>
  Pažymys:<br>
  <input type="text" name="mark">
  <br><br>
  <input type="submit"  value="Išsaugoti" name = "submit">
  <br>
</form>
<?php

if (isset($_POST["submit"])) {
    $studentMarks = fopen("studentMarks.csv", 'a');
    $studentMarksArray = array( $_POST['student'],$_POST['teachingSubject'],$_POST['mark']);
    fputcsv($studentMarks, $studentMarksArray, ',', chr(0));
    fclose($studentMarks);
    echo "Išsaugota ";
}
?>
</body>
</html>
