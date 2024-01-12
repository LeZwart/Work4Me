<?php 
session_start();

require "permission.php";
require "database.php";

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
        <link rel="stylesheet" href="main-style.css">
        <title>Work4Me</title>
    </head>
    <body>
        <?php require "header.php"; ?>
        <main>
            <section class="workout-details">
                <h1>Workout details</h1>
                <div class="workout-details-container">
                    <?php
                    $sql = "SELECT * FROM Workouts WHERE WorkoutID = $id";
                    $result = mysqli_query($conn, $sql);
                    $workout = mysqli_fetch_assoc($result);
                    ?>
                    <div class="workout-details-info">
                        <h2><?php echo $workout['Titel']; ?></h2>
                        <p><?php echo $workout['Omschrijving']; ?></p>
                        <p><?php echo $workout['Toevoegdatum']; ?></p>
                    </div>
                    <div class="workout-details-image">
                        <img src="images/<?php echo $workout['Afbeelding']; ?>" alt="">
                    </div>
                </div>
            </section>
        </main>
        <?php require "footer.php"; ?>
    </body>
</html>