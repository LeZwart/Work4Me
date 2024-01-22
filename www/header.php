<?php
// file that "requires" this must contain the following:

    // session_start();
    // require "database.php";
    // require "permission.php";
    // $permission = new Permission();
?>


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