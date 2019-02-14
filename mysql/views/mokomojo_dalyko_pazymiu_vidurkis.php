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

            <?php
            if (!empty($_GET['subject'])) {
                ?>
                <p>Mokomojo dalyko pažymių vidurkis:    <?= $averageGrade ?> </p>
                <?php
            }
            ?>
        </table>
        <?php
        if (empty($_GET['subject'])) {
            ?>
            <h1> Mokomojo dalyko pažymių vidurkis </h1>
            <form  method = "get" >
                Įveskite mokomajį dalyką:<br>
                <input type="text" name="subject">
                <br><br>
                <input type="submit"  value="Rodyti">
            </form>
            <?php
        }
        ?>

    </body>
</html>
