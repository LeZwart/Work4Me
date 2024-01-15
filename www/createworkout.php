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

                <input type="submit" value="Maak Workout">
                </form>
            </section>
        </main>
        <?php require "footer.php"; ?>
    </body>
</html>