<!DOCTYPE html>
<html lang="lt">
<head>
 <meta charset="UTF-8">
 <title>MySQL dienynas</title>

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
    <th> Mokinio ID </th>
    <th> Vardas </th>
    <th> Pavardė </th>
  </tr>
<?php

    $serverName = "localhost";
    $userName = "root";
    $password = "";
    $dbName = "dienynas";

$connection = mysqli_connect($serverName, $userName, $password, $dbName);
if (!$connection) {
    die("Prisijungti nepavyko: " . mysqli_connect_error());
}
if (!empty($_GET['id'])) {
    $idNumber = $_GET['id'];
    $oneRowSqlData = "select id, name, surname from students where id=$idNumber ";
    $oneRowResult = mysqli_query($connection, $oneRowSqlData);
    $oneRow = mysqli_fetch_assoc($oneRowResult);

    ?>
<tr>
<td><?php echo htmlspecialchars($oneRow["id"]); ?></td>
<td><?php echo htmlspecialchars($oneRow["name"]); ?></td>
<td><?php echo htmlspecialchars($oneRow["surname"]); ?></td>
</tr>
  </table>
</body>
</html>
    <?php
    mysqli_close($connection);

        die();
}
    $sqlData = "select id, name, surname from students";
    $result = mysqli_query($connection, $sqlData);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        ?>
  <tr>
  <td><?php echo htmlspecialchars($row["id"]); ?></td>
  <td><?php echo htmlspecialchars($row["name"]); ?></td>
  <td><?php echo htmlspecialchars($row["surname"]); ?></td>
  </tr>

        <?php
    }
} else {
        echo "Rezultatų nėra";
}
    mysqli_close($connection);

?>

  </table>
  <form  method = "get" >
    Mokinio ID:<br>
    <input type="text" name="id">
    <br><br>
    <input type="submit"  value="Rodyti">
  </form>
  </body>
  </html>
