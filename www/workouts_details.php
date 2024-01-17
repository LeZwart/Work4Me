<?php 
session_start();

require "permission.php";
require "database.php";

$permission = new Permission();

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

$id;

if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    header("Location: workouts.php");
    exit();
}

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
        <main>
            <section class="workout-details">
                <a href="workouts.php" id=""><h1> < Terug naar workouts</h1></a>

                <div class="workout-details-container">
                    <?php
                    $sql = "SELECT * FROM Workouts WHERE WorkoutID = $id";
                    $result = mysqli_query($conn, $sql);
                    $workout = mysqli_fetch_assoc($result);
                    ?>
                    <div class="workout-details-info">
                        <h2><?php echo $workout['Titel']; ?></h2>
                        <br>
                        <p><strong>Omschrijving:</strong> <?php echo $workout['Omschrijving']; ?></p>
                        <p><strong>Lengte:</strong> <?php echo $workout['Duur']; ?>~ minuten</p>
                        <p><strong>Notitie:</strong> <?php echo $workout['Notitie']; ?></p>
                        <br>
                        <img src="<?php echo $workout['Afbeelding']; ?>" alt="Afbeelding workout">
                    </div>
                </div>
                
            </section>
        </main>
        <?php require "footer.php"; ?>
    </body>
</html>