<?php
$servername = "localhost";
$username = "u145170788_admin";
$password = "CSQwerty1!";
$dbname = "u145170788_cente_sportif";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Échec de la connexion : " . mysqli_connect_error());
}
?>

