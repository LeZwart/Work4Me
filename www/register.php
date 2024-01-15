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
        <link rel="stylesheet" href="css/register.css">
        <title>Work4Me - Registratie</title>
    </head>
    <body>
        <?php require "header.php"; ?>
        <main>
            <form action="process-register.php" method="POST">

                <div class="information">
                    <section>
                            <!-- Naam -->
                        <label for="Voornaam">Naam</label>
                        <input type="text" name="Voornaam" id="Voornaam" placeholder="Voornaam">
                        <input type="text" name="Tussenvoegsel" id="Tussenvoegsel" placeholder="Tussenvoegsel">
                        <input type="text" name="Achternaam" id="Achternaam" placeholder="Achternaam">

                        <!-- Geslacht -->
                        <label for="geslacht">Geslacht</label>
                        <select name="geslacht" id="geslacht">
                            <option value="">Wil ik niet zeggen</option>
                            <option value="Man">Man</option>
                            <option value="Vrouw">Vrouw</option>
                        </select>

                        <!-- Gebruikersnaam -->
                        <label for="Gebruikersnaam">Gebruikersnaam</label>
                        <input type="text" name="Gebruikersnaam" id="Gebruikersnaam" placeholder="Gebruikersnaam">

                        <!-- E-mail -->
                        <label for="email">E-mail</label>
                        <input type="email" name="email" id="email" placeholder="E-mail">

                        <!-- Wachtwoord -->
                        <label for="Wachtwoord">Wachtwoord</label>
                        <input type="password" name="password" id="password" placeholder="Wachtwoord">
                    </section>
                    <!-- <br><br> -->
                    <section>
                        <label for="straat">Straat</label>
                        <input type="text" name="straat" id="straat" placeholder="Straat">

                        <label for="huisnummer">Huisnummer</label>
                        <input type="text" name="huisnummer" id="huisnummer" placeholder="Huisnummer">

                        <label for="postcode">Postcode</label>
                        <input type="text" name="postcode" id="postcode" placeholder="Postcode">

                        <label for="land">Land</label>
                        <select name="land" id="land">
                            <option value="Nederland">Nederland</option>
                            <option value="België">België</option>
                        </select>

                        <label for="telefoonnummer">telefoonnummer</label>
                        <input type="text" name="telefoonnummer" id="telefoonnummer" placeholder="Telefoonnummer">

                        <label for="mobielnummer">mobielnummer</label>
                        <input type="text" name="mobielnummer" id="mobielnummer" placeholder="Mobielnummer">

                    </section>
                </div>


                <input type="submit" value="Maak account">
                <a href="login.php" class="redirect-login-register">Heb je al een account? Log in!</a>
            </form>
        </main>
        <?php require "footer.php"; ?>
    </body>
</html>