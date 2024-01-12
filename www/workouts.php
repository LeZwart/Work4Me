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
                <!-- Dit is hoe een workout eruit ziet
                <article class="workout-article">
                    <h2>Workout Naam</h2>
                    <img class="workout-img" src="images/500placeholder.png" alt="foto">
                    <a class="workout-bekijk" href="#">Bekijk workout</a>
                </article>
                 -->

                <?php

                // TODO: Zoek workouts op basis van de zoekterm
                $sql = "SELECT * FROM Workouts";
                $result = mysqli_query($conn, $sql);

                // Zet elke workout in de pagina
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $title = $row['Titel'];
                        $image = $row['Afbeelding'];
                        $id = $row['WorkoutID'];

                        // Als er geen foto is dan wordt er een placeholder gebruikt
                        $placeholder = "images/500placeholder.png";
                        if ($image === "") {
                            $image = $placeholder;
                        }

                        // Zet de workout in de pagina
                        echo "<article class='workout-article'>";
                        echo "<h2>" . $title . "</h2>";
                        echo "<img class='workout-img' src='" . $image . "' alt='foto'>";
                        echo "<a class='workout-bekijk' href='workout.php?id=" . $id . "'>Bekijk workout</a>";
                        echo "</article>";
                    }
                } else {
                    echo "<p>Geen workouts gevonden</p>";
                }
                ?>
            </section>
        </main>

        <?php require "footer.php"; ?>
    </body>
</html>

