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
            include("one_student.php");
            ?>
        </table>
    </body>
</html>
