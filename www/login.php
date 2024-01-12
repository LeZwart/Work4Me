<?php
    session_start();

    require "database.php";
    require "permission.php";
    
    $permission = new Permission();
    if(isset($_SESSION['user_id'])){
        header("Location: index.php");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/main-style.css">
        <link rel="stylesheet" href="css/login.css">
        <title>Work4Me - Login</title>
    </head>
    <body>
        <?php require "header.php"; ?>
        <main>
            <form action="process-login.php" method="POST">
                <label for="email">E-Mail</label>
                <input type="email" name="email" id="email" placeholder="voorbeeld@work4me.nl">
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