<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="main-style.css">
        <link rel="stylesheet" href="login.css">
        <title>Work4Me - Registratie</title>
    </head>
    <body>
    <header class="homepage-header">
            <a class="homelink" href="index.php">Work 4 Me</a>
            <h2>Registratie</h2>
            <nav class="header-nav">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="login.php">Log In</a></li>
                    <li><a href="register.php">Registreer</a></li>
                </ul>
            </nav>
        </header>
        <main>
            <form action="process-register.php" method="POST">

                <label for="firstname">Naam</label>
                <input type="text" name="firstname" id="firstname" placeholder="Voornaam">
                <input type="text" name="infix" id="infix" placeholder="Tussenvoegsel">
                <input type="text" name="lastname" id="lastname" placeholder="Achternaam">
                <br>
                <label for="username">Gebruikersnaam</label>
                <input type="text" name="username" id="username" placeholder="Gebruikersnaam">
                <label for="email">E-mail</label>
                <input type="email" name="email" id="email" placeholder="E-mail">
                <label for="password">Wachtwoord</label>
                <input type="password" name="password" id="password" placeholder="Wachtwoord">
                <input type="submit" value="Log In">
                <a href="login.php" class="redirect-login-register">Heb je al een account? Log in!</a>
            </form>
        </main>
        <footer class="homepage-footer">
            <p>Work4Me Blok 04</p>
            <p>Project door Leon Zwart</p>
        </footer>
    </body>
</html>