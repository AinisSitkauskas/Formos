<?php

include("connection.php");

$idNumber = $_GET['id'];
$rowSqlData = "select id, name, surname from students where id=$idNumber ";
$result = mysqli_query($connection, $rowSqlData);
$row = mysqli_fetch_assoc($result);
include('C:\xampp\htdocs\mysql\table.php');
mysqli_close($connection);
