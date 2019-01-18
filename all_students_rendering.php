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
            for ($i = 0; $i < $counter; $i++) {
                ?>
                <tr>
                    <td><?php echo $students[$i][0]; ?></td>
                    <td><?php echo $students[$i][1]; ?></td>
                    <td><?php echo $students[$i][2]; ?></td>
                </tr>
                <?php
            }
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
