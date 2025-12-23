<?php 
// dipo ang pag-add ng student
session_start();

//create connection
require_once "database/config.php";


 $data = $conn->query("SELECT username FROM users") or die(mysqli_error()));
while($f_query = $query->fetch_array())
$username = $f_query['username'];
$password = $f_query['password'];


$access_level = 1;
//account_id generator
$randomID = rand(1,99999)

 $sql = "INSERT INTO login (`accountId`, `username`, `password`, `accessLevel`,
        VALUES ('$randomID', '$username', '$password', '$access_level' )";

if (mysqli_query($conn, $sql)) {
   header('location: add.php');
   exit;	

else
{
	echo "Error: Could not able to execute $sql. ".mysqli_error($conn);
}



//close connection
mysqli_close($conn);
?>