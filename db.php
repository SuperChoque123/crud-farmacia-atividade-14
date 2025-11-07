<?php
$host = "localhost";
$user = "root";
$pass = "root";
$dbname = "farmacia_vilaboa";

$con = new mysqli($host, $user, $pass, $dbname);

if ($con->connect_error) {
    die("Erro na conexão: " . $con->connect_error);
}
?>
