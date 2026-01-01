
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
      <a style="text-decoration: none;" href="student_dashboard.php">
      <img class="aulogo"; src="images/aulogo.png"></a>
      <br> <br> <br>

        <ul class="nav">
          <li>
            <!--Dashboard-->
            <a href="#">
              <span class="icon"><img class="not-active" src="images/four_squares.png" title="Dashboard"></span>
            </a>
          </li>
          <li>
            <!--list-->
            <a href="class_list.php">
              <span class="icon"><img class="not-active" src="images/list.png" title="Management"></span>
            </a>
          </li>
          <li>
            <!--profile?-->
            <a href="studentprofile.php">
              <span class="active"><img class="active-icon" src="images/manage.png"></span>
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
              <span class="icon"><img class="not-active" src="images/logout.png" title="Logout"></span>
            </a>
          </li>
        </ul>
        </nav>
    </div>
    <div class="main">
      <h1>Student Information</h1>
      <?php
      $account_id = $_SESSION['account_id'];
      include_once "database/config.php";
      $query = $conn->query("SELECT * FROM `users` 
        WHERE users.account_id = '$account_id'") or die(mysqli_error());
              while($f_query = $query->fetch_array()){
            ?>
            <p><b>Name:</b> <?php echo $f_query['firstName']. ' '. $f_query['lastName']?></p>
            <p><b>Strand and Section:</b> <?php echo $f_query['stdnt_strand']. ' '. $f_query['stdnt_section']?></p>
            <p><b>Sex:</b> <?php echo $f_query['sex']?></p>
            <p><b>Birthdate:</b> <?php echo $f_query['bday']?></p>
            <p><b>Email:</b> <?php echo $f_query['email']?></p>
            <p><b>Mobile Number:</b> <?php echo $f_query['contact_num']?></p>
            <p><b>LRN:</b> <?php echo $f_query['stdnt_lrn']?></p>
          <?php 
            }
           ?>
      <h2>Subjects Enrolled in:</h2>
      <?php
      $account_id = $_SESSION['account_id'];
      include_once "database/config.php";
      $query = $conn->query("SELECT * FROM `subjects`
      INNER JOIN subjectcombination ON subjectcombination.subject_id = subjects.subject_id 
        WHERE subjectcombination.account_id = '$account_id'") or die(mysqli_error());
              while($f_query = $query->fetch_array()){
            ?>            
            <p> <?php echo $f_query['subject_name']?></p>
            <?php 
            }
           ?>
    </div>
</body>
</html>