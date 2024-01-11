<?php

$host =         "mariadb";
$dbuser =       "root";
$dbpassword =   "password";
$dbname =       "work4me";

$conn = mysqli_connect($host, $dbuser, $dbpassword, $dbname);

echo mysqli_connect_error();    // If this is not empty, something went wrong with the connection.
                                //  D:

?>