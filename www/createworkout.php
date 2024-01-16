<?php
session_start();

require "database.php";
require "permission.php";

$permission = new Permission();

if (isset($_SESSION['user'])) {
    if (!$permission->checkPermission(5, $_SESSION['user']['Rol'])) {
        header("Location: index.php");
        exit();
    }
} else {
    header("Location: login.php");
    exit();
}


?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/main-style.css">
        <link rel="stylesheet" href="css/dashboard.css">

        <title>Work4Me - User Details</title>
    </head>
    <body>
        <?php require "header.php"; ?>
        <main>
            <section class="nav-options">
                <nav>
                    <ul>
                        <li><a href="dashboard.php">Statistieken</a></li>
                        <li><a href="dashboardWorkouts.php">Workouts</a></li>
                        <li style="background-color: #93b6d782;"><a href="dashboardUsers.php">Gebruikers</a></li>
                    </ul>
                </nav>
            </section>
            <section class="info-section">
                <h1>Maak Workout</h1>
                <p>Maak hier een workout aan.</p>
                <br>
                <form id="workoutcreation" action="process-createworkout.php" method="post">

                    <label for="Titel">Titel</label>
                    <input type="text" name="Titel" id="Titel" placeholder="Titel">

                    <label for="Omschrijving">Korte omschrijving</label>
                    <input type="text" name="Omschrijving" id="Omschrijving" placeholder="Omschrijving">

                    <label for="Duur">Duur</label>
                    <input type="number" name="Duur" id="Duur" placeholder="Duur">

                    <label for="Notitie">Notitie</label>
                    <input type="text" name="Notitie" id="Notitie" placeholder="Notitie">


                    <label for="Afbeelding">Afbeelding</label>
                    <input type="file" name="Afbeelding">

                    <input type="submit" value="Maak Workout">
                </form>
            </section>
        </main>
        <?php require "footer.php"; ?>
    </body>
</html>

<!-- Not neccesary but neat :) -->
<script>
    const duur_element = document.getElementById("Duur");

    duur_element.addEventListener("input", function() {
        
        // Make sure time isn't negative
        if (duur_element.value < 0) {
            duur_element.value = 0;
        }
        
        // Make sure only numbers are entered
        let value = duur_element.value;
        value = value.replace(/\D/g, ''); // Remove non-numeric characters
        duur_element.value = value;
    
    });

</script>