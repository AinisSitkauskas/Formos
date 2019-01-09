<?php
include("parameters.php");

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
