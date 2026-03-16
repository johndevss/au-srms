<?php
session_start();

// Only allow logged-in admins
if (!isset($_SESSION['loggedin']) || $_SESSION['access_level'] != 1) {
    header("Location: index.php");
    exit;
}

// Include the actual dashboard view
require_once __DIR__ . "/../app/Views/admin/admin_dashboard.php";
?>
