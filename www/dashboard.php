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
                    <li><a href="dashboard.php">Dashboard</a></li>
                    <li><a href="dashboard.php">Dashboard</a></li>
                    <li><a href="dashboard.php">Dashboard</a></li>
                    <li><a href="dashboard.php">Dashboard</a></li>  
                </ul>
            </nav>
        </section>
        <section class="info-section">
            <h1>Dashboard</h1>
            <p>Welkom op het dashboard. Hier kan je de statistieken van de website bekijken.</p>
        </section>
        </main>

        <?php require "footer.php"; ?>
    </body>
</html>

