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
  .subjectsTable {
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
            <a href="admin_dashboard.php">
              <span class="icon"><img class="not-active" src="images/four_squares.png" title="Dashboard"></span>
            </a>
          </li>
          <li>
            <!--list-->
            <a href="list.php">
              <span class="active"><img class="active-icon" src="images/list.png" title="Management"></span>
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
  <h1 class="inner-heading">Edit Information</h1>
  <main>
    <div>
     <h2>Update Information</h2>
          <?php
            $acc_query = $conn->query("SELECT * FROM `users` WHERE user_id = '$_REQUEST[user_id]'") or die(mysqli_error());
            $acc_fetch = $acc_query->fetch_array();
          ?>
          <form action="user_edit_insert.php" method= "POST">
              <label>First name:</label>
              <input name="firstName" id = "firstName" type = "text" value ="<?php echo $acc_fetch['firstName']?>">
              <input  name="user_id" type = "hidden" value ="<?php echo $acc_fetch['user_id']?>"> <br>
              <label>Middle name:</label>
              <input name="middleName" type = "text" value ="<?php echo $acc_fetch['middleName']?>"> <Br>
              <label>Last name:</label>
              <input type = "text" name="lastName" type = "text" value="<?php echo $acc_fetch['lastName']?>"> <br>
              <label>Mobile Number: </label>
              <input type = "text" name="contact_num" type = "text" value="<?php echo $acc_fetch['contact_num']?>"> <br>
              <label>Strand: </label>
              <select name="stdnt_strand">
              <option value= "<?php echo $acc_fetch['stdnt_strand']?>"><?php echo $acc_fetch['stdnt_strand']?></option>
              <option  name="stdnt_strand1" value="ICT">ICT</option>
              <option  name="stdnt_strand2" value="STEM">STEM</option>
              <option  name="stdnt_strand3" value="ABM">ABM</option>
              <option  name="stdnt_strand4" value="GAS">GAS</option>
              <option  name="stdnt_strand5" value="HUMSS">HUMSS</option>
              </select>

            <div class = "form-group">
              <button  type = "submit">Save Changes</button>
            </form>
 </div>
</main>
</div>




</body>
</html>
