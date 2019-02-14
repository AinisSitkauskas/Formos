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
                <th> Vardas </th>
                <th> Pavardė </th>
                <th> Mokomasis dalykas </th>
                <th> Pažymys </th>
                <th> Data </th>
            </tr>
            <?php
            foreach ($students as $key => $value) {
                ?>
                <tr>
                    <td><?= $students[$key][0]; ?></td>
                    <td><?= $students[$key][1]; ?></td>
                    <td><?= $students[$key][2]; ?></td>
                    <td><?= $students[$key][3]; ?></td>
                    <td><?= $students[$key][4]; ?></td>
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>
