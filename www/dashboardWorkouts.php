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


$sql = "SELECT * FROM Workouts";
$result = mysqli_query($conn, $sql);

$workouts = mysqli_fetch_all($result, MYSQLI_ASSOC);

// var_dump($workouts);
// exit();
        
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
            <h1>Dashboard</h1>
            <p>Welkom op het dashboard. Hier kan je de statistieken van de website bekijken.</p>

            <div class="table-display">
                <table>
                    <thead>
                        <tr>
                            <th>Titel</th>
                            <th>Omschrijving</th>
                            <th>Toevoegdatum</th>
                            <th>Acties</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        
                        foreach ($workouts as $workout):
                        ?>
                        <tr>
                            <td><?php echo $workout['Titel']?></td>
                            <td><?php echo $workout["Omschrijving"]?></td>
                            <td><?php echo $workout["Toevoegdatum"]?></td>
                            <td><a href="DashboardWorkouts_details?WorkoutID=<?php $workout["WorkoutID"] ?>">Inspecteer</a></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <a id="createworkout" href="createworkout.php">Maak Workout</a>
            </div>
        </section>
        </main>

        <?php require "footer.php"; ?>
    </body>
</html>

