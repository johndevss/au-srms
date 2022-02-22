<?php

session_start();
require_once "database/config.php";
/*
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;    

}
   //checks if the user is admin or not
    if (!isset($_SESSION['access_level']) || ($_SESSION['access_level'] != 1)) {
    header('Location: admin_dashboard.php');
    exit;
*/


//security
$account_id = mysqli_real_escape_string($conn, $_REQUEST['account_id']);

	$user_id = $_SESSION['user_id'];	
	$subject_id = $_SESSION['subject_id'];

	$query =  "INSERT INTO subjectcombination (`account_id`, `subject_id`) 
              VALUES ('$account_id', '$subject_id')" or die(mysqli_error());	
if (mysqli_query($conn, $query,)) 
{	
	header('location: class_list.php');
	 exit;
}

else
{
	echo "Error: Could not able to execute $query. ".mysqli_error($conn);
}


?>