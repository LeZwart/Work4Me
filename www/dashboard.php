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
        
$sql_workouts = "SELECT count(*) FROM Workouts";


// will return 1 if the rol is ROLE, otherwise it will return 0.
// SUM will add all the 1's and 0's together, resulting in the amount of that role.
$sql_users = "SELECT
            COUNT(*) AS TotalCount,
            SUM(CASE WHEN rol = 'Manager' THEN 1 ELSE 0 END) AS ManagerCount,
            SUM(CASE WHEN rol = 'Regular' THEN 1 ELSE 0 END) AS RegularCount,
            SUM(CASE WHEN rol = 'Administrator' THEN 1 ELSE 0 END) AS AdministratorCount
            FROM Gebruiker";

$result = mysqli_query($conn, $sql_workouts);
$workouts = mysqli_fetch_row($result);

$result = mysqli_query($conn, $sql_users);
$users = mysqli_fetch_row($result);


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
                 
                <div>
                    <h2>Aantal gebruikers: <?php echo $users[0] ?></h2>
                    <p>Regulars: <?php echo $users[2] ?></p>
                    <p>Managars: <?php echo $users[1] ?></p>
                    <p>Administrators: <?php echo $users[3] ?></p>
                </div>

                <h2>Aantal workouts: <?php echo $workouts[0]; ?></h2>

               
            </div>
        </section>
        </main>

        <?php require "footer.php"; ?>
    </body>
</html>

