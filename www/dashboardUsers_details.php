<?php
session_start();

require "database.php";
require "permission.php";

$permission = new Permission();
$CheckFor = [5, 3];

if (isset($_SESSION['user'])) {
    if (!$permission->checkPermissions($CheckFor, $_SESSION['user']['Rol'])) {
        header("Location: index.php");
        exit();
    }
} else {
    header("Location: login.php");
    exit();
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    header("Location: dashboardUsers.php");
    exit();
}

$sql = "SELECT * 
        FROM gebruiker 
        JOIN Woonplaats ON gebruiker.WoonplaatsID = Woonplaats.WoonplaatsID 
        WHERE gebruiker.GebruikerID = '$id'";

$result = mysqli_query($conn, $sql);

$gebruiker = mysqli_fetch_assoc($result);
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
                <h1>Gebruiker Details (TODO)</h1>
                <br>

                <?php 
                foreach ($gebruiker as $key => $value) {
                    echo "<p><strong>$key:</strong> $value</p>";
                }
                ?>
            </section>
        </main>
        <?php require "footer.php"; ?>
    </body>
</html>