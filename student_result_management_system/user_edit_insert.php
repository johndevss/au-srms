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
$firstName = mysqli_real_escape_string($conn, $_REQUEST['firstName']);
$middleName = mysqli_real_escape_string($conn, $_REQUEST['middleName']);
$lastName = mysqli_real_escape_string($conn, $_REQUEST['lastName']);
$contact_num = mysqli_real_escape_string($conn, $_REQUEST['contact_num']);
$stdnt_strand = mysqli_real_escape_string($conn, $_REQUEST['stdnt_strand']);

	$user_id = $_SESSION['user_id'];	

	$query = "UPDATE `users` SET `firstName` = '$firstName', `lastName` = '$lastName', `middleName` = '$middleName', `contact_num` = '$contact_num', `stdnt_strand` = '$stdnt_strand' WHERE `user_id` = '$_REQUEST[user_id]'" or die(mysqli_error());	
if (mysqli_query($conn, $query,)) 
{	
	header('location: section.php');
	 exit;
}

else
{
	echo "Error: Could not able to execute $query. ".mysqli_error($conn);
}


?>