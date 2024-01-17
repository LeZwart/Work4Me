<?php

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    echo "Incorrect request method";
    exit;
}

if (isset($_POST['submit'])) {
    echo "User did not click on submit button";
    exit;
}

if (!isset($_POST["email"]) || !isset($_POST["password"])) {
    echo "Insufficient information";
    exit;
}

$email = $_POST['email'];
$password = $_POST['password'];

require "database.php";

$sql = "SELECT * FROM Gebruiker WHERE email = '$email'"; // kan je niet ook gewoon "AND Wachtwoord = '$password'" doen?
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $gebruiker = mysqli_fetch_assoc($result);

    if ($gebruiker['Wachtwoord'] === $password) {
        session_start();
        $_SESSION['user'] = $gebruiker;

        header("Location: index.php");
    }

} else {
    header("Location: login.php");
}