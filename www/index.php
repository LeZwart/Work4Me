<?php
session_start();

require "database.php";
require "permission.php";

$permission = new Permission();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/main-style.css">
        <link rel="stylesheet" href="css/index.css">
        <title>Work4Me</title>
    </head>
    <body>
        <?php require "header.php"; ?>

        <main class="homepage-main">
            <section>
                <h2>Wordt fit met ons!</h2>
                <?php 
                if (isset($_SESSION['user'])) {
                    echo "<p>Welkom " . $_SESSION['user']['Gebruikersnaam'] . "</p>";
                } else {
                    echo "<p>Maak een account aan en probeer onze workouts!</p>";
                }
                ?>
            </section>
            <section>
                <!-- TODO -->
                <!-- Iets moet hier -->
            </section>
        </main>

        <?php require "footer.php"; ?>
    </body>
</html>

