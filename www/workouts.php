<?php
require "database.php";

session_start();

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="main-style.css">
        <link rel="stylesheet" href="workouts.css">
        <title>Work4Me</title>
    </head>
    <body>
        <header class="homepage-header">
            <a href="index.php" class="homelink">Work 4 Me</a>
            <nav class="header-nav">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <?php 
                    if (isset($_SESSION['user'])) {
                        echo "<li><a href='workouts.php'>Workouts</a></li>";
                        echo "<li><a href='logout.php'>Logout</a></li>";
                    } else {
                        echo "<li><a href='login.php'>Login</a></li>";
                        echo "<li><a href='register.php'>Registreer</a></li>";
                    }
                    ?>
                </ul>
            </nav>
        </header>

        <main class="homepage-main">
            <section class="search-filter">
                <form action="workouts.php" method="GET">
                    <label for="search">Zoek naar workouts</label>
                    <input type="text" name="search" id="search" placeholder="Zoekterm">
                    <input type="submit" value="Zoek">
                </form>
            </section>
            <section class="workouts">

            </section>
        </main>

        <footer class="homepage-footer">
            <p>Work4Me Blok 04</p>
            <p>Project door Leon Zwart</p>
        </footer>
    </body>
</html>

