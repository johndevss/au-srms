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
              <span class="icon"><img class="not-active" src="images/four_squares.png" title="Dashboard"></span>
            </a>
          </li>
          <li>
            <!--list-->
            <a href="class_list.php">
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
  <h1 class="inner-heading">Class Management</h1>
  <main>
    <div class="tables">
      <!--eto yung nagpapaalam kung ano subject mo gumagamit to ng $_session kaya pag naglogin ka malalaman ano subject mo-->
  <h1><?php $subject_id = $_SESSION['subject_id'];  
  $query = $conn->query("SELECT * FROM `subjects` WHERE subject_id = '$subject_id'") or die(mysqli_error());
              while($f_query = $query->fetch_array()){  
              $subject_name = $f_query['subject_name']; 
  echo "List of $subject_name Students";}?></h1>
  <a href="addtosubject.php"><button style=" font-size: 10px; font-family: 'Public Sans', sans-serif;padding: 5px 10px; border-radius: 30px; background-color: #f4f4f4;">Add Student to Subject</button></a>
  <table id = "table" class = "examTable">
    <h2>1A</h2>
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
            //dito nalalaman ng system kung ano subject mo at ilalabas neto kung sino mga estudyante mo
            include_once "database/config.php";
            $subject_id = $_SESSION['subject_id'];
              $query = $conn->query("SELECT * FROM `subjectcombination` 
                INNER JOIN users ON subjectcombination.account_id = users.account_id 
                WHERE subjectcombination.subject_id = '$subject_id' AND users.stdnt_section ='1A'") or die(mysqli_error());
              while($f_query = $query->fetch_array()){
            ?>
            <tr>
              <td><?php echo $f_query['lastName']?></td>
              <td><?php echo $f_query['firstName']?></td>
              <td><?php echo $f_query['middleName']?></td>
              <td><?php echo $f_query['sex']?></td>
              <td><?php echo $f_query['email']?></td>
              <td><?php echo $f_query['contact_num']?></td>
              <td><?php echo $f_query['stdnt_strand']?></td>
              <td><?php echo $f_query['user_systemStatus']?></td>
              <td id=examScore> <a href=""><button>Grade Student</button></a></td>
            </tr>
            <?php
              }
            ?>
          </tbody>
      </table>
      <table id = "table" class = "examTable">
    <h2>2A</h2>
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
            //dito nalalaman ng system kung ano subject mo at ilalabas neto kung sino mga estudyante mo
            include_once "database/config.php";
            $subject_id = $_SESSION['subject_id'];
              $query = $conn->query("SELECT * FROM `subjectcombination` 
                INNER JOIN users ON subjectcombination.account_id = users.account_id 
                WHERE subjectcombination.subject_id = '$subject_id' AND users.stdnt_section ='2A'") or die(mysqli_error());
              while($f_query = $query->fetch_array()){
            ?>
            <tr>
              <td><?php echo $f_query['lastName']?></td>
              <td><?php echo $f_query['firstName']?></td>
              <td><?php echo $f_query['middleName']?></td>
              <td><?php echo $f_query['sex']?></td>
              <td><?php echo $f_query['email']?></td>
              <td><?php echo $f_query['contact_num']?></td>
              <td><?php echo $f_query['stdnt_strand']?></td>
              <td><?php echo $f_query['user_systemStatus']?></td>
              <td id=examScore> <a href=""><button>Grade Student</button></a></td>
            </tr>
            <?php
              }
            ?>
          </tbody>
      </table>
      <table id = "table" class = "examTable">
    <h2>1P</h2>
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
            //dito nalalaman ng system kung ano subject mo at ilalabas neto kung sino mga estudyante mo
            include_once "database/config.php";
            $subject_id = $_SESSION['subject_id'];
              $query = $conn->query("SELECT * FROM `subjectcombination` 
                INNER JOIN users ON subjectcombination.account_id = users.account_id 
                WHERE subjectcombination.subject_id = '$subject_id' AND users.stdnt_section ='1P'") or die(mysqli_error());
              while($f_query = $query->fetch_array()){
            ?>
            <tr>
              <td><?php echo $f_query['lastName']?></td>
              <td><?php echo $f_query['firstName']?></td>
              <td><?php echo $f_query['middleName']?></td>
              <td><?php echo $f_query['sex']?></td>
              <td><?php echo $f_query['email']?></td>
              <td><?php echo $f_query['contact_num']?></td>
              <td><?php echo $f_query['stdnt_strand']?></td>
              <td><?php echo $f_query['user_systemStatus']?></td>
              <td id=examScore> <a href=""><button>Grade Student</button></a></td>
            </tr>
            <?php
              }
            ?>
          </tbody>
      </table>
 
</main>

</div>


<script type="text/javascript">
  prompt(Please put the score of student here)
</script>
</body>
</html>
