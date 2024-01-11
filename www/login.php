<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="main-style.css">
        <link rel="stylesheet" href="login.css">
        <title>Work4Me - Login</title>
    </head>
    <body>
    <header class="homepage-header">
            <a class="homelink" href="index.php">Work 4 Me</a>
            <h2>Login</h2>
            <nav class="header-nav">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="login.php">Log In</a></li>
                    <li><a href="register.php">Registreer</a></li>
                </ul>
            </nav>
        </header>
        <main>
            <form action="" method="get">
                <label for="username">Gebruikersnaam</label>
                <input type="text" name="username" id="username" placeholder="Gebruikersnaam">
                <label for="password">Wachtwoord</label>
                <input type="password" name="password" id="password" placeholder="Wachtwoord">
                <input type="submit" value="Log In">
                <a href="register.php" class="redirect-login-register">Geen account? Maak er een aan!</a>
            </form>
        </main>
        <footer class="homepage-footer">
            <p>Work4Me Blok 04</p>
            <p>Project door Leon Zwart</p>
        </footer>
    </body>
</html>