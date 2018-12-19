<!DOCTYPE html>
<html lang="lt">
<head>
 <meta charset="UTF-8">
 <title>Mokinio pažymiai</title>

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

<h1>Mokinio pažymiai </h1><br>
    <form  method = "get" >
      Mokinio vardas:<br>
      <input type="text" name="firstName">
      <br>
      Mokinio pavardė:<br>
      <input type="text" name="lastName">
      <br><br>
      <input type="submit"  value="Išsaugoti">
    </form>

<br>

<?php
if (!empty($_GET['firstName']) && !empty($_GET['lastName'])) {
    ?>


<table>
  <tr>
    <th> Pavardė.</th>
    <th> Vardas </th>
    <th> Mokomasis dalykas </th>
    <th> Pažymys </th>
    <th> Data </th>
</tr>
    <?php

    if (($studentMarks = fopen("studentMarks.csv", "r")) !== false) {
        while (($studentData = fgetcsv($studentMarks, 1000, "\n")) !== false) {
            $n = count($studentData);

            for ($i=0; $i < $n; $i++) {
                    $oneStudentDataArray = explode(",", $studentData[$i]);
                if ($_GET['lastName'] == $oneStudentDataArray[0] && $_GET['firstName'] == $oneStudentDataArray[1]) {
                    ?>
          <tr>
          <td><?php echo htmlspecialchars($oneStudentDataArray[0]); ?></td>
          <td><?php echo htmlspecialchars($oneStudentDataArray[1]); ?></td>
          <td><?php echo htmlspecialchars($oneStudentDataArray[2]); ?></td>
          <td><?php echo htmlspecialchars($oneStudentDataArray[3]); ?></td>
          <td><?php echo htmlspecialchars($oneStudentDataArray[4]); ?></td>
          </tr>


                     <?php
                }
            }
        }
    }
    ?>
</table>
    <?php
}
?>
</body>
</html>
