<?php
// dipo ang pag-add ng student
session_start();

//create connection
require_once "database/config.php";

//security
$firstName = mysqli_real_escape_string($conn, $_REQUEST['firstName']);
$middleName = mysqli_real_escape_string($conn, $_REQUEST['middleName']);
$lastName = mysqli_real_escape_string($conn, $_REQUEST['lastName']);
$sex = mysqli_real_escape_string($conn, $_REQUEST['sex']);
$stdnt_strand = mysqli_real_escape_string($conn, $_REQUEST['stdnt_strand']);
$stdnt_section = mysqli_real_escape_string($conn, $_REQUEST['stdnt_section']);
$subjectsTaken = mysqli_real_escape_string($conn, $_REQUEST['subjectsTaken']);
$stdnt_lrn = mysqli_real_escape_string($conn, $_REQUEST['stdnt_lrn']);
$bday = mysqli_real_escape_string($conn, $_REQUEST['bday']);
$email = mysqli_real_escape_string($conn, $_REQUEST['email']);
$contact_num = mysqli_real_escape_string($conn, $_REQUEST['contact_num']);
$motherName = mysqli_real_escape_string($conn, $_REQUEST['motherName']);
$motherContactNum = mysqli_real_escape_string($conn, $_REQUEST['motherContactNum']);
$fatherName = mysqli_real_escape_string($conn, $_REQUEST['fatherName']);
$fatherContactNum = mysqli_real_escape_string($conn, $_REQUEST['fatherContactNum']);
$username = mysqli_real_escape_string($conn, $_REQUEST['username']);
$password = mysqli_real_escape_string($conn, $_REQUEST['password']);

  // The hash of the password that
  // can be stored in the database
  $encrypted_password = password_hash($password, PASSWORD_DEFAULT);
  
// for student registration
$access_level = 0;

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
$strand = "STUDENT";
$advisory_class = "STUDENT";
$subject_id = "STUDENT";

//eto ung maglalagay sa "students" database
$sql = "INSERT INTO users (`account_id`, `lastName`, `firstName`, `middleName`, `sex`, `stdnt_strand`, `stdnt_section`, `subjectsTaken`, `stdnt_lrn`, `bday`, `email`, `contact_num`, `motherName`, `motherContactNum`, `fatherName`, `fatherContactNum`, `strand`, `advisory_class`, `subject_id`, `access_level`, `username`, `password`, `user_systemStatus`)
       VALUES ('$randomID', '$lastName', '$firstName', '$middleName', '$sex', '$stdnt_strand', '$stdnt_section', '$subjectsTaken', '$stdnt_lrn' , '$bday', '$email', '$contact_num', '$motherName', '$motherContactNum', '$fatherName', '$fatherContactNum', '$strand', '$advisory_class', '$subject_id', '$access_level', '$username', '$encrypted_password', '$user_systemStatus')";

if (mysqli_query($conn, $sql,)) 
{	
  //eto ung maglalagay sa database
$sql = "INSERT INTO subjectscombination (`account_id`, `subject_id`) VALUES ('$randomID', '$subjectsTaken')";
  $res = mysqli_query($conn, $log);
	header('Location: section.php');
	 exit;
}

else
{
	echo "Error: Could not able to execute $sql. ".mysqli_error($conn);
}



//close connection
mysqli_close($conn);
?>
