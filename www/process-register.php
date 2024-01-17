<?php

require "database.php";

// var_dump($_POST);

// foreach ($_POST as $key => $value) {
//     echo "<br>" . $key . " " . $value . "<br>";
// }

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    echo "Incorrect request method";
    exit;
}

if (isset($_POST['submit'])) {
    echo "User did not click on submit button";
    exit;
}

$voornaam = $_POST['Voornaam'];
$tussenvoegsel = $_POST['Tussenvoegsel'];
$achternaam = $_POST['Achternaam'];

$geslacht = $_POST['geslacht'];

$gebruikersnaam = $_POST['Gebruikersnaam'];
$email = $_POST['email'];
$wachtwoord = $_POST['password'];

$straat = $_POST['straat'];
$plaats = $_POST['plaats'];
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
    empty($plaats) ||
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
$sql = "SELECT * FROM `Gebruiker` WHERE `email` = '$email'";
$result = mysqli_query($conn, $sql);
$emailcount = mysqli_num_rows($result);

if ($emailcount > 0) {
    echo "Email is al in gebruik";
    exit;
}

// Check if username is not already used
$sql = "SELECT * FROM `Gebruiker` WHERE `gebruikersnaam` = '$gebruikersnaam'";
$result = mysqli_query($conn, $sql);
$usernamecount = mysqli_num_rows($result);

if ($usernamecount > 0) {
    echo "Gebruikersnaam is al in gebruik";
    exit;
}


// Gebruiker has WoonplaatsID as foreign key
// Insert user into database
$sql_woonplaats = "INSERT INTO `Woonplaats` (`Straat`, `Huisnummer`, `Postcode`, `Plaats`, `Land`, `telefoonnummer`, `mobielnummer`)
                   VALUES ('$straat', '$huisnummer', '$postcode', '$plaats', '$land' , '$telefoonnummer', '$mobielnummer')";


mysqli_query($conn, $sql_woonplaats);

// Get the ID of the last inserted row
$woonplaats_id = mysqli_insert_id($conn);

$sql_gebruiker = "INSERT INTO `Gebruiker` (`Voornaam`, `Tussenvoegsel`, `Achternaam`, `Geslacht`, `Gebruikersnaam`, `email`, `Wachtwoord`, `WoonplaatsID`, `Rol`)
                  VALUES ('$voornaam', '$tussenvoegsel', '$achternaam', '$geslacht', '$gebruikersnaam', '$email', '$wachtwoord', '$woonplaats_id', 'Regular')";

mysqli_query($conn, $sql_gebruiker);

// verify if gebruiker and woonplaats are inserted
if (mysqli_affected_rows($conn) > 0) {

    // Login the user
    $sql = "SELECT * FROM Gebruiker WHERE email = '$email'"; // kan je niet ook gewoon "AND Wachtwoord = '$password'" doen?
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $gebruiker = mysqli_fetch_assoc($result);

        if ($gebruiker['Wachtwoord'] === $wachtwoord) {
            session_start();
            $_SESSION['user'] = $gebruiker;

            header("Location: index.php");
        }

    } else {
        header("Location: login.php");
    }
}