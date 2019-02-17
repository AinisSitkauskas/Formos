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
        if (!empty($_GET['subject'])) {
            ?>
            <p>Mokomojo dalyko pažymių vidurkis:    <?= $averageGrade ?> </p>
            <p>Programos veikimo trukmė:    <?= microtime(true) - $start ?> s </p>
            <p>Maksimali naudojama atmintis:    <?= memory_get_peak_usage(true) / 1024 ?> Kb </p>
            <?php
        }
        ?>
    </body>
</html>
