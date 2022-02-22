<?php
// Initialize the session
session_start();

include_once "database/config.php";

// Unset all of the session variables
$username = $_SESSION["username"];
$user_id = $_SESSION["user_id"];
$_SESSION = array();

 $query = ("UPDATE `users` SET `user_systemStatus` = 'Offline' WHERE `user_id` = '$user_id'") or die(mysqli_error()); 
                            if (mysqli_query($conn, $query)) {
$log = "INSERT INTO activity_log (username, action) VALUES ('$username', '$username logged out')";
                            $res = mysqli_query($conn, $log);
 }
$_SESSION["loggedin"] = false;

// Destroy the session.
session_destroy();


 
// Redirect to login page
header("location: login.php");
exit;


?>