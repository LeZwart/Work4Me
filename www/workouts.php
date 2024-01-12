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
        <link rel="stylesheet" href="css/workouts.css">
        <title>Work4Me</title>
    </head>
    <body>
        <?php require "header.php"; ?>

        <main class="homepage-main">
            <section class="search-filter">
                <form action="workouts.php" method="GET">
                    <label for="search">Zoek naar workouts</label>
                    <input type="text" name="search" id="search" placeholder="Zoekterm">
                    <input type="submit" value="Zoek">
                </form>
            </section>
            <section class="workouts">
                <article class="workout-article">
                    <h2>Workout Naam</h2>
                    <img class="workout-img" src="images/500placeholder.png" alt="foto">
                </article>
            </section>
        </main>

        <?php require "footer.php"; ?>
    </body>
</html>

