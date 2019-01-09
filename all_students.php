<?php
include("parameters.php");

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
