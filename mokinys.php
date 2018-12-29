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
        while (($studentData = fgetcsv($studentMarks, 1000, ",")) !== false) {
            $n = count($studentData);


            if ($_GET['lastName'] == $studentData[0] && $_GET['firstName'] == $studentData[1]) {
                ?>
          <tr>
          <td><?php echo htmlspecialchars($studentData[0]); ?></td>
          <td><?php echo htmlspecialchars($studentData[1]); ?></td>
          <td><?php echo htmlspecialchars($studentData[2]); ?></td>
          <td><?php echo htmlspecialchars($studentData[3]); ?></td>
          <td><?php echo htmlspecialchars($studentData[4]); ?></td>
          </tr>


                     <?php
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
