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
            <td><?php echo $student[0]; ?></td>
            <td><?php echo $student[1]; ?></td>
            <td><?php echo $student[2]; ?></td>
        </tr>
    </table>
</body>
</html>
