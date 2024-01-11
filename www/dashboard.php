<?php
require "database.php";
require "permission.php";

session_start();

$permission = new Permission();

if (isset($_SESSION['user']) && !$permission->checkPermission(5, $_SESSION['user']['Rol'])) {
    header("Location: index.php");
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
        <header class="homepage-header">
            <a href="index.php" class="homelink">Work 4 Me</a>
            <nav class="header-nav">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <?php 
                    if (isset($_SESSION['user'])) {
                        echo "<li><a href='workouts.php'>Workouts</a></li>";
                        echo "<li><a href='logout.php'>Logout</a></li>";

                        if ($permission->checkPermission(5, $_SESSION['user']['Rol'])) {
                            echo "<li><a href='dashboard.php'>Dashboard</a></li>";
                        }
                    } else {
                        echo "<li><a href='login.php'>Login</a></li>";
                        echo "<li><a href='register.php'>Registreer</a></li>";
                    }
                    
                    ?>
                </ul>
            </nav>
        </header>

        <main>
        <h2>Dashboard</h2>
        </main>

        <footer>
            <p>Work4Me Blok 04</p>
            <p>Project door Leon Zwart</p>
        </footer>
    </body>
</html>

