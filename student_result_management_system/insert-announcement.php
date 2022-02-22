<?php
// dipo ang pag-add ng student
session_start();

//create connection
require_once "database/config.php";

//security
$announce = mysqli_real_escape_string($conn, $_REQUEST['announce']);

$sql = "INSERT INTO announcements (`announcement`)
        VALUES ('$announce')";

if (mysqli_query($conn, $sql,)) 
{	
	header('location: admin_dashboard.php');
	 exit;
}

else
{
	echo "Error: Could not able to execute $sql. ".mysqli_error($conn);
}


//close connection
mysqli_close($conn);
?>