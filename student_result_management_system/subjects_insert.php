<?php

session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;    

}

//create connection
require_once "database/config.php";

//security
$subject_name = mysqli_real_escape_string($conn, $_REQUEST['subject_name']);

//eto ung maglalagay sa database
$sql = "INSERT INTO subjects (`subject_name`) VALUES ('$subject_name')";

if (mysqli_query($conn, $sql)) {

  header('Location: subjects.php');
}

else {
  echo "Error: Could not able to execute $sql. ".mysqli_error($conn);
}



//close connection
mysqli_close($conn);
?>

