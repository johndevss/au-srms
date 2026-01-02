<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$server = getenv('DB_HOST') ?: '127.0.0.1'; 
$port   = getenv('DB_PORT') ?: 3306;
$user   = getenv('DB_USER') ?: 'root';
$pass   = getenv('DB_PASS') ?: '';
$name   = getenv('DB_NAME') ?: 'au-srms';

$conn = mysqli_init();
$conn->real_connect($server, $user, $pass, $name, (int)$port);
$conn->set_charset('utf8mb4');

?>