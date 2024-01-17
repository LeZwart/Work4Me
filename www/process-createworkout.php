<?php
require 'database.php';

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    echo "Incorrect request method";
    exit;
}

if (empty($_POST['Titel']) || empty($_POST['Omschrijving']) || empty($_POST['Duur']) || empty($_POST['Notitie'])) {
    echo "Insufficient information";
    exit();
}

$titel = $_POST['Titel'];
$omschrijving = $_POST['Omschrijving'];
$duur = $_POST['Duur'];
$notitie = $_POST['Notitie'];

$sql = "INSERT INTO Workouts (Titel, Omschrijving, Duur, Notitie) 
        VALUES ('$titel', '$omschrijving', '$duur', '$notitie')";

mysqli_query($conn, $sql);

header("Location: workouts.php");
exit();