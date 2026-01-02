<?php
$server = getenv('DB_HOST') ?: 'localhost';
$user   = getenv('DB_USER') ?: 'root';
$pass   = getenv('DB_PASS') ?: '';
$name   = getenv('DB_NAME') ?: 'au-srms';

$conn = mysqli_connect($server, $user, $pass, $name);
if ($conn === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

?>