<?php

require "database.php";

// var_dump($_POST);

// foreach ($_POST as $key => $value) {
//     echo "<br>" . $key . " " . $value . "<br>";
// }

$voornaam = $_POST['Voornaam'];
$tussenvoegsel = $_POST['Tussenvoegsel'];
$achternaam = $_POST['Achternaam'];

$geslacht = $_POST['geslacht'];

$gebruikersnaam = $_POST['Gebruikersnaam'];
$email = $_POST['email'];
$wachtwoord = $_POST['password'];

$straat = $_POST['straat'];
$huisnummer = $_POST['huisnummer'];
$postcode = $_POST['postcode'];
$land = $_POST['land'];

$telefoonnummer = $_POST['telefoonnummer'];
$mobielnummer = $_POST['mobielnummer'];

// Check if any of the variables are null
if (
 empty($voornaam) ||
 empty($achternaam) ||
 empty($geslacht) ||
 empty($gebruikersnaam) ||
 empty($email) ||
 empty($wachtwoord) ||
 empty($straat) ||
 empty($huisnummer) ||
 empty($postcode) ||
 empty($land) ||
 empty($mobielnummer)
 ) 
 {
    echo "Vul alle velden in";
    exit;
 }

// Check if email is not already used
$sql = "SELECT * FROM `users` WHERE `email` = " . $email;
$result = mysqli_query($conn, $sql);
$emailcount = mysqli_num_rows($result);

if ($emailcount > 0) {
    echo "Email is al in gebruik";
    exit;
}

// Check if username is not already used
$sql = "SELECT * FROM `users` WHERE `username` =" . $gebruikersnaam;
$result = mysqli_query($conn, $sql);
$usernamecount = mysqli_num_rows($result);

if ($usernamecount > 0) {
    echo "Gebruikersnaam is al in gebruik";
    exit;
}

// Insert user into database