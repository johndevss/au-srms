<?php
// dipo ang pag-add ng student
session_start();

//create connection
require_once "database/config.php";

//security
$firstName = mysqli_real_escape_string($conn, $_REQUEST['firstName']);
$middleName = mysqli_real_escape_string($conn, $_REQUEST['middleName']);
$lastName = mysqli_real_escape_string($conn, $_REQUEST['lastName']);
$advisory_class = mysqli_real_escape_string($conn, $_REQUEST['advisory_class']);
$subject_id = mysqli_real_escape_string($conn, $_REQUEST['subject_id']);
$sex = mysqli_real_escape_string($conn, $_REQUEST['sex']);
$bday = mysqli_real_escape_string($conn, $_REQUEST['bday']);
$email = mysqli_real_escape_string($conn, $_REQUEST['email']);
$contact_num = mysqli_real_escape_string($conn, $_REQUEST['contact_num']);
$motherName = mysqli_real_escape_string($conn, $_REQUEST['stdnt_motherName']);
$motherContactNum = mysqli_real_escape_string($conn, $_REQUEST['motherContactNum']);
$fatherName = mysqli_real_escape_string($conn, $_REQUEST['stdnt_fatherName']);
$fatherContactNum = mysqli_real_escape_string($conn, $_REQUEST['fatherContactNum']);
$strand = mysqli_real_escape_string($conn, $_REQUEST['strand']);
$username = mysqli_real_escape_string($conn, $_REQUEST['username']);
$password = mysqli_real_escape_string($conn, $_REQUEST['password']);


  // The hash of the password that
  // can be stored in the database
  $encrypted_password = password_hash($password, PASSWORD_DEFAULT);
  
// for personnel registration
$access_level = 2;


//account_id generator
$randomID = rand(1,99999);

if (empty($middleName)) {
  $middleName = "N/A";
}
  if (empty($motherName)) {
    $motherName = "N/A";
  }
    if (empty($fatherName)) {
      $fatherName = "N/A";
    }
     if (empty($motherContactNum)) {
      $motherContactNum = "N/A";
      }
       if (empty($fatherContactNum)) {
      $fatherContactNum = "N/A";
       }


$user_systemStatus = "Offline";
$stdnt_strand = "FACULTY";
$stdnt_section = "FACULTY";
$stdnt_lrn ="FACULTY";


//eto ung maglalagay sa "students" database
$sql = "INSERT INTO users (`account_id`, `lastName`, `firstName`, `middleName`, `sex`, `bday`, `motherName`, `motherContactNum`, `fatherName`, `fatherContactNum`, `advisory_class`, `subject_id`, `email`, `contact_num`, `strand`, `stdnt_strand`, `stdnt_section`, `stdnt_lrn`, `access_level`, `username`, `password`, `user_systemStatus`)
       VALUES ('$randomID', '$lastName', '$firstName', '$middleName', '$sex', '$bday', '$motherName', '$motherContactNum', '$fatherName', '$fatherContactNum', '$advisory_class', '$subject_id', '$email', '$contact_num', '$strand', '$stdnt_strand', '$stdnt_section', '$stdnt_lrn', '$access_level', '$username', '$encrypted_password', '$user_systemStatus')";

       /*$sql2 = "INSERT INTO users (`user_id`, `lastName`, `firstName`, `username`, `password`, `email`, `user_systemStatus`, `access_level`)
       VALUES ('$randomID', '$lastName', '$firstName', '$username', '$encrypted_password', $stdnt_email', '$user_systemStatus', '$access_level')";
       */


if (mysqli_query($conn, $sql,)) 
{	
	header('location: teacher.php');
	 exit;
}

else
{
	echo "Error: Could not able to execute $sql. ".mysqli_error($conn);
}



//close connection
mysqli_close($conn);
?>
