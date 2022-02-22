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
  .back-btn {
    position: absolute;
  }
  input {
    width: auto;
    clear: both;
    background-color: #f4f4f4;

  }
  select {
    width: 175px;
    clear: both;
    background-color: #f4f4f4;
  }
  /*yung inline block yung nag papantay dun sa mga input block*/
  label {
    font-weight: bold;
    display: inline-block;
    width: 150px;
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
              <span class="icon"><img class="not-active" src="images/four_squares.png" title="Dashboard"></span>
            </a>
          </li>
          <li>
            <!--list-->
            <a href="list.php">
              <span class="icon"><img class="not-active" src="images/list.png" title="Management"></span>
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
              <span class="icon"><img class="not-active" src="images/logout.png" title="Logout"></span>
            </a>
          </li>
        </ul>
        </nav>
    </div>
    
    <div class="main">
    <a href="section.php"><img class="back-btn" src="images/left-arrow.png"></a>
    <h1 class="inner-heading">Section Management <img class="back-btn" style="position: relative;" src="images/right-arrow.png"> Student Registration</h1>
    <p>Please fill in the required information for registration.</p>

  <!--eto ung nagcoconnect sa database-->
  <div class="input-container">
    <form action="student_insert.php" method="POST">
      <h1>Personal Information</h1>
      <label for="firstName">First Name:</label>
      <input type="text" name="firstName" required=""> 
      <br> <br>
      <label for="middleName">Middle Name:</label>
      <input type="text" name="middleName" placeholder="Optional">
      <br> <br>
      <label for="lastName">Last Name:</label>
      <input type="text" name="lastName" required=""> 
      <br> <br>
      <label>LRN</label>
      <input type="text" name="stdnt_lrn">
      <br> <br>
      <label>Sex:</label>
      <input type="radio" name="sex" required="" value="Male">Male <input type="radio" name="sex" required="" value="Female">Female <input type="radio" name="sex" required="" value="Other">Other
      <br> <br>
      <label>Birthday</label>
      <input type="date" name="bday">
      <br> <br>
      <label for="email">Email:</label>
      <input  type="email" name="email" required="">
      <br> <br>
      <label for="cell_No">Mobile:</label>
      <input type="text" name="contact_num" required="" maxlength="11">
      <br> <br>
      <label>Mother's Name</label>
      <input type="text" name="motherName" placeholder="Optional">
      <br> <br>
      <label>Mother's Contact Number:</label>
      <input type="text" name="motherContactNum" placeholder="Optional" maxlength="11">
      <br> <br>
      <label>Father's Name</label>
      <input type="text" name="fatherName" placeholder="Optional">
      <br> <br>
      <label>Father's Contact Number:</label>
      <input type="text" name="fatherContactNum" placeholder="Optional" maxlength="11">
      <br> <br>
      <label for="stdnt_strand">Strand</label>
      <select name="stdnt_strand" required="">
        <option>---</option>
        <option  name="stdnt_strand1" value="ICT">ICT</option>
        <option  name="stdnt_strand2" value="STEM">STEM</option>
        <option  name="stdnt_strand3" value="ABM">ABM</option>
        <option  name="stdnt_strand4" value="GAS">GAS</option>
        <option  name="stndt_strand5" value="HUMSS">HUMSS</option>
      </select>
      <br> <br> 
        <label for="stdnt_section">Section</label>
        <select name="stdnt_section" required="">
        <option>---</option>
        <option  name="stdnt_section1" value="1A">1A</option>
        <option  name="stdnt_section2" value="2A">2A</option>
        <option  name="stdnt_section3" value="1P">1P</option>
    </select>
      <br> <br>
      <label for="SubjectsTaken">Subjects:</label>
      <?php
        $query = $conn->query("SELECT * FROM `subjects`") or die(mysqli_error());
              while($f_query = $query->fetch_array()){
        echo '<input type="checkbox" name="subjectsTaken" value ='.$f_query['subject_id'].'>'.$f_query['subject_name'].'';    
        }    
        ?>
        <br><br>
      <label for="Username">Username:</label>
      <input  type="text" name="username" required="">
      <br> <br>
      <label for="Password">Password:</label>
      <input type="password" name="password" required="">
      <br> <br>
      <input type="submit" class="btn btn-primary"value="Register">
    </form>
    <br>
  </div>
  </div>
    </div>
    </div>

</body>
</html>