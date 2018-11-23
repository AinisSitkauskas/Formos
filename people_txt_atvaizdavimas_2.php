<!DOCTYPE html>
<html lang="lt">
<head>
 <meta charset="UTF-8">
 <title>Asmens duomenų forma</title>
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
    <th> Eil. Nr. </th>
    <th> Vardas </th>
    <th> Pavardė </th>
    </tr>
<?php

$peopleContacts = "people.txt";
$peopleNames = file($peopleContacts);
$n = count($peopleNames);
for ($i = 1; $i <= $n; $i++) {
      $onePerson = $peopleNames[$i-1];
      $nameRow = explode(" ", $onePerson);
    ?>
      <tr>
      <td><?php echo htmlspecialchars($i); ?></td>
      <td><?php echo htmlspecialchars($nameRow[0]); ?></td>
      <td><?php echo htmlspecialchars($nameRow[1]); ?></td>
      </tr>
      <?php
}
?>
</table>
</body>
</html>
