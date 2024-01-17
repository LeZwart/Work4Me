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

if (isset($_GET['WorkoutID'])) {
    $id = $_GET['WorkoutID'];
} else {
    echo "FOUT: Geen ID meegegeven";
    exit();
}

$sql = "SELECT * FROM Workouts WHERE WorkoutID = '$id'";
$result = mysqli_query($conn, $sql);

$workout = mysqli_fetch_assoc($result);
        
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
                    <li><a href="dashboard.php">Statistieken</a></li>
                    <li style="background-color: #93b6d782;"><a href="dashboardWorkouts.php">Workouts</a></li>
                    <li><a href="dashboardUsers.php">Gebruikers</a></li>
                </ul>
            </nav>
        </section>
        <section class="info-section">
            <h1><a href="dashboardWorkouts.php">< Terug naar workout lijst</a></h1>
            
            <?php 
            foreach ($workout as $key => $value) {
                echo "<p><strong>$key:</strong> $value</p>";
            }
            ?>

            
        </section>
        </main>

        <?php require "footer.php"; ?>
    </body>
</html>
