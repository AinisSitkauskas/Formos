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
            foreach ($students as $key => $value) {
                ?>
                <tr>
                    <td><?= $students[$key][0]; ?></td>
                    <td><?= $students[$key][1]; ?></td>
                    <td><?= $students[$key][2]; ?></td>
                </tr>
                <?php
            }
            ?>
        </table>
        <?php
        if (empty($_GET['id'])) {
          ?>
        <form  method = "get" >
            Mokinio ID:<br>
            <input type="text" name="id">
            <br><br>
            <input type="submit"  value="Rodyti">
        </form>
        <?php
}

         ?>

    </body>
</html>
