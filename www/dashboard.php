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
        <title>Work4Me</title>
    </head>
    <body>
        <?php require "header.php"; ?>

        <main>
        <section class="nav-options">
            <nav>
                <ul>
                    <li style="background-color: #93b6d782;"><a href="dashboard.php">Statistieken</a></li>
                    <li><a href="dashboardWorkouts.php">Workouts</a></li>
                    <li><a href="dashboardUsers.php">Gebruikers</a></li>
                </ul>
            </nav>
        </section>
        <section class="info-section">
            <h1>Dashboard</h1>
            <p>Welkom op het dashboard. Hier kan je de statistieken van de website bekijken.</p>

            <div class="statistics-display">
                <p>Aantal gebruikers: <?php echo mysqli_fetch_row(mysqli_query($conn, "SELECT COUNT(*) FROM Gebruiker"))[0] ?></p>

                <p>Aantal workouts: <?php echo mysqli_fetch_row(mysqli_query($conn, "SELECT COUNT(*) FROM Workouts"))[0]; ?></p>
            </div>
        </section>
        </main>

        <?php require "footer.php"; ?>
    </body>
</html>

