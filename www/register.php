<?php
    session_start();

    require "database.php";
    require "permission.php";
    
    $permission = new Permission();

    if(isset($_SESSION['user_id'])){
        header("Location: index.php");
    }

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/main-style.css">
        <link rel="stylesheet" href="css/login.css">
        <title>Work4Me - Registratie</title>
    </head>
    <body>
        <?php require "header.php"; ?>
        <main>
            <form action="process-register.php" method="POST">

                <!-- Naam -->
                <label for="firstname">Naam</label>
                <input type="text" name="firstname" id="firstname" placeholder="Voornaam">
                <input type="text" name="infix" id="infix" placeholder="Tussenvoegsel">
                <input type="text" name="lastname" id="lastname" placeholder="Achternaam">

                <!-- Geslacht -->
                <label for="gender">Geslacht</label>
                <input type="radio" name="gender" value="">
                <input type="radio" name="gender" value="">

                <!-- Gebruikersnaam -->
                <label for="username">Gebruikersnaam</label>
                <input type="text" name="username" id="username" placeholder="Gebruikersnaam">

                <!-- E-mail -->
                <label for="email">E-mail</label>
                <input type="email" name="email" id="email" placeholder="E-mail">

                <!-- Wachtwoord -->
                <label for="password">Wachtwoord</label>
                <input type="password" name="password" id="password" placeholder="Wachtwoord">


                <input type="submit" value="Log In">
                <a href="login.php" class="redirect-login-register">Heb je al een account? Log in!</a>
            </form>
        </main>
        <?php require "footer.php"; ?>
    </body>
</html>