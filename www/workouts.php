<?php
session_start();

require "database.php";
require "permission.php";

$permission = new Permission();
    

// Query VVV

$sql = "SELECT * FROM Workouts";

// Als er een zoekterm is dan wordt er gezocht op basis van de zoekterm
if (isset($_GET['search'])) {
    $search = $_GET['search'];
    $sql = "SELECT * FROM Workouts WHERE Titel LIKE '%$search%' OR Omschrijving LIKE '%$search%'";
}

// SORT BY
if (isset($_GET['sortby'])) {
    $sortby = $_GET['sortby'];
    switch ($sortby) {
        case "new":
            $sql .= " ORDER BY Toevoegdatum DESC";
            break;
        case "old":
            $sql .= " ORDER BY Toevoegdatum ASC";
            break;
        case "name":
            $sql .= " ORDER BY Titel ASC";
            break;
        default:
            $sql .= " ORDER BY Titel ASC";
            break;
    }
}

$result = mysqli_query($conn, $sql);
$resultcount = mysqli_num_rows($result);

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
            <section class="search-filter">
                <form action="workouts.php" method="GET">
                    <input type="text" name="search" id="search" placeholder="Zoekterm">
                    <input type="submit" value="Zoek">
                    <select name="sortby" id="sortby">
                        <option value="new">Nieuwste</option>
                        <option value="old">Oudste</option>
                        <option value="name">Naam</option>
                    </select>
                </form>
                <h2>Resultaten gevonden: <?php echo $resultcount ?></h2>

                <?php
                $checkfor = 4; 
                if ($permission->checkPermissions($checkfor, $_SESSION['user']['Rol'])) {
                    echo "<a id='createworkout' href='createworkout.php'>Maak workout</a>";
                }

                ?>
            </section>
            <section class="workouts">
                <!-- Dit is hoe een workout eruit ziet
                <article class="workout-article">
                    <h2>Workout Naam</h2>
                    <img class="workout-img" src="images/500placeholder.png" alt="foto">
                    <a class="workout-bekijk" href="#">Bekijk workout</a>
                </article>
                 -->

                <?php
                // Zet elke workout in de pagina
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $title = $row['Titel'];
                        $image = $row['Afbeelding'];
                        $id = $row['WorkoutID'];

                        // Als er geen foto is dan wordt er een placeholder gebruikt
                        $placeholder = "images/500placeholder.png";
                        if ($image === "") {
                            $image = $placeholder;
                        }

                        // Zet de workout in de pagina
                        echo "<article class='workout-article'>";
                        echo "<h2>" . $title . "</h2>";
                        echo "<img class='workout-img' src='" . $image . "' alt='foto'>";
                        echo "<a class='workout-bekijk' href='workouts_details.php?id=" . $id . "'>Bekijk workout</a>";
                        echo "</article>";
                    }
                } else {
                    echo "<p>Geen workouts gevonden</p>";
                }
                ?>

            </section>
        </main>

        <?php require "footer.php"; ?>
    </body>
</html>

