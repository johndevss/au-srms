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
<script src="https://use.fontawesome.com/3238bf45aa.js"></script>
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
  .tables {
    margin-left: 80px;
  }
  .examTable {
    background-color: lightyellow;
    margin-left: -1%;
    border-collapse: separate;
    border: 1px solid black;
    border-spacing: 0 15px;
    text-align: center;
    padding: 10px;
    border: 1px solid black;
    width: 1200px;
  }
  th {
    background-color: burlywood;
    border: 1px solid black;
  }
  td {
    border: 1px solid black;
    border-collapse: separate;
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
            <a href="teacher_dashboard.php">
              <span class="icon"><img class="not-active" src="images/four_squares.png"></span>
            </a>
          </li>
          <li>
            <!--list-->
            <a href="class_list.php">
              <span class="active"><img class="active-icon" src="images/list.png"></span>
            </a>
          </li>
          <li>
            <!--profile?-->
            <a href="#">
              <span class="icon"><img class="not-active" src="images/manage.png"></span>
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

    <div class="main">
  <a href="class_list.php"><img class="back-btn" src="images/left-arrow.png"></a>
  <h1 class="inner-heading">Exam Results Management</h1>
  <main>
    <div class="tables">
  <h1><?php echo "List of $_SESSION[advisory_class]"?></h1>
  <table id = "table" class = "examTable">
          <thead>
            <tr>
              <th>Last Name</th>
              <th>First Name</th>
              <th>Middle Name</th>
              <th>Sex</th>
              <th>Email</th>
              <th>Mobile Number</th>
              <th>Strand</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            include_once "database/config.php";
              $query = $conn->query("SELECT * FROM `students` WHERE stdnt_section='$_SESSION[advisory_class]' ") or die(mysqli_error());
              while($f_query = $query->fetch_array()){
            ?>
            <tr>
              <td><?php echo $f_query['lastName']?></td>
              <td><?php echo $f_query['firstName']?></td>
              <td><?php echo $f_query['middleName']?></td>
              <td><?php echo $f_query['stdnt_sex']?></td>
              <td><?php echo $f_query['stdnt_email']?></td>
              <td><?php echo $f_query['stdnt_contactNum']?></td>
              <td><?php echo $f_query['stdnt_strand']?></td>
              <td><?php echo $f_query['user_systemStatus']?></td>
              <td><a href=""><button>Score Exam</button></a></td>
            </tr>
            <?php
              }
            ?>
          </tbody>
      </table>
 
</main>

</div>



</body>
</html>
