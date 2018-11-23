<!DOCTYPE html>
<html lang="lt">
<head>
 <meta charset="UTF-8">
 <title>Asmens duomenų atvaizdavimas</title>

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
    <th> Eil. Nr.</th>
    <th> Vardas </th>
    <th> Pavardė </th>
<?php

    $peopleNames = file_get_contents("people.txt");
    $names = explode("\n", $peopleNames);
    $n = count($names);
for ($i = 1; $i <= $n; $i++) {
      $onePerson = $names[$i-1];
      $nameRow = explode(" ", $onePerson); ?>
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
