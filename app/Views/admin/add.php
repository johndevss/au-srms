<?php
// Initialize the session
session_start();
require_once "database/config.php";
 
/*
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: admin_dashboard.php");
    exit;
    //checks if the user is admin or not
    if (!isset($_SESSION['access_level']) || ($_SESSION['access_level'] != 1)) {
    header('Location: teacher_dashboard.php');
    exit;
  }

}
*/
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<!--eto yung nagbibigay ng public sans font-->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Public+Sans&display=swap" rel="stylesheet">
<!--nagcoconnect sa css-->
<link rel="stylesheet" type="text/css" href="css/style.css">	
	<title>Admin</title>
	<style type="text/css">
	/*dito yung design sa logo*/
	.aulogo {
		position: absolute;
		height: 50px;
		width: 50px;
		margin-left: 5px;
		margin-top: 10px;
	}
	.active-icon {
		width: 30px; 
		height: 30px; 
		margin-left: -5px;
		margin-top: 75px;
	}
	.not-active {
		width: 30px; 
		height: 30px; 
		margin-left: -25px; 
		margin-top: 75px;
	}
	</style>
</head>
<body>
	<div class="heading">
	<header>
		<img class="threeLines" src="images/three_lines.png">
		<h1 class="text">Student Result Management System</h1>
	</header>
    </div>

	<div class="navigation">
		<nav>
			<a style="text-decoration: none;" href="admin_dashboard.php">
			<img class="aulogo"; src="images/aulogo.png"></a>
			<br> <br> <br>

         <ul class="nav">
        	<li>
        		<!--Dashboard-->
        		<a href="admin_dashboard.php">
        			<span class="icon"><img class="not-active" src="images/four_squares.png"></span>
        		</a>
        	</li>
        	<li>
        		<!--list-->
        		<a href="list.php">
        			<span class="icon"><img class="not-active" src="images/list.png"></span>
        		</a>
        	</li>
        	<li>
        		<!--profile?-->
        		<a href="#">
        			<span class="icon"><img class="not-active" src="images/manage.png"></span>
        		</a>
        	</li>
        	<li>
        		<!--add-->
        		<a href="#">
        			<span class="active"><img class="active-icon" src="images/add.png"></span>
        		</a>
        	</li>
        	<li>
        		<!--settings-->
        		<a href="#">
        			<span class="icon"><img class="not-active" src="images/settings.png"></span>
        		</a>
        	</li>
        	<li>
        		<!--logout-->
        		<a href="logout.php">
        			<span class="icon"><img class="not-active" src="images/logout.png"></span>
        		</a>
        	</li>
        </ul>
        </nav>
    </div>

    <div class="button">
    	<form action="addpersonnel.php">
    	<button type="submit" class="add_fac-btn">Add Faculty</button> <br>
    </form>
    <form action="addstudent.php">
    	<button type="submit" class="add_stdnt-btn">Add Students</button>
    </form>
    </div>



</body>
</html>