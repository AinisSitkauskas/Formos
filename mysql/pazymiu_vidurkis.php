<?php
include("connection.php");
$subject = $_GET['subject'];
$sqlQuery = "SELECT teaching_subjects.teachingSubject, AVG(marks.mark)
FROM marks
INNER JOIN teaching_subjects ON marks.idSubject=teaching_subjects.id
WHERE teaching_subjects.teachingSubject='$subject'";
$result = mysqli_query($connection, $sqlQuery);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $averageGrade = $row["AVG(marks.mark)"];
    }
} else {
    $error = "Rezultatų nėra";
}
mysqli_close($connection);
