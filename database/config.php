<?php
require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->safeLoad();

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$server = $_ENV['DB_HOST'] ?? $_ENV['DB_SERVER'] ?? 'mysql';
$port   = $_ENV['DB_PORT'] ?? 3306;
$name   = $_ENV['DB_DATABASE'] ?? $_ENV['DB_NAME'] ?? 'au_srms';
$user   = $_ENV['DB_USERNAME'] ?? $_ENV['DB_USER'] ?? 'root';
$pass   = $_ENV['DB_PASSWORD'] ?? '';

$conn = mysqli_init();
$conn->real_connect($server, $user, $pass, $name, (int)$port);
$conn->set_charset('utf8mb4');
