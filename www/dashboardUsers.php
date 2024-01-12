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


$sql = "SELECT * FROM gebruiker";
$result = mysqli_query($conn, $sql);

$gebruikers = mysqli_fetch_all($result, MYSQLI_ASSOC)
        
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
                    <li><a href="dashboardWorkouts.php">Workouts</a></li>
                    <li style="background-color: #93b6d782;"><a href="dashboardUsers.php">Gebruikers</a></li>
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
                            <th>Gebruikersnaam</th>
                            <th>Email</th>
                            <th>Rol</th>
                            <th>Acties</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($gebruikers as $gebruiker):
                        ?>
                        <tr>
                            <td><?php echo $gebruiker['Gebruikersnaam']; ?></td>
                            <td><?php echo $gebruiker['Email']; ?></td>
                            <td><?php echo $gebruiker['Rol']; ?></td>
                            <td><a href="dashboardUsers_details.php?id=<?php echo $gebruiker['GebruikerID']; ?>">Inspecteer</a></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </section>
        </main>

        <?php require "footer.php"; ?>
    </body>
</html>

