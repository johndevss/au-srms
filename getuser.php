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
    /*desgin para sa tables*/
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
  .tables {
    margin-left: 80px;
  }
  .table-bordered {
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

  <h1>1A</h1>
  <table id = "table" class = "table-bordered">
          <thead>
            <tr>
              <th>Last Name</th>
              <th>First Name</th>
              <th>Strand</th>
              <th>Advisory Class</th>
              <th>Subject</th>
              <th>Sex</th>
              <th>Email</th>
              <th>Mobile Number</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            include_once "database/config.php";
            $q = intval($_GET['q']);
            mysqli_select_db($con,"ajax_demo");
              $query = $conn->query("SELECT * FROM `users` WHERE advisory_class='1A' AND strand='".$q."'") or die(mysqli_error());
              while($f_query = $query->fetch_array()){
            ?>
            <tr>
              <td><?php echo $f_query['lastName']?></td>
              <td><?php echo $f_query['firstName']?></td>
              <td><?php echo $f_query['strand']?></td>
              <td><?php echo $f_query['advisory_class']?></td>
              <td><?php echo $f_query['subject']?></td>
              <td><?php echo $f_query['sex']?></td>
              <td><?php echo $f_query['email']?></td>
              <td><?php echo $f_query['contact_num']?></td>
              <td><?php echo $f_query['user_systemStatus']?></td>
              <td><button>See Information</button><button>Delete</button></td>
            </tr>
            <?php
              }
            ?>
          </tbody>
      </table>
  <h1>2A</h1>
  <table id = "table" class = "table-bordered">
          <thead>
            <tr>
              <th>Last Name</th>
              <th>First Name</th>
              <th>Strand</th>
              <th>Advisory Class</th>
              <th>Subject</th>
              <th>Sex</th>
              <th>Email</th>
              <th>Mobile Number</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            include_once "database/config.php";
              $query = $conn->query("SELECT * FROM `users` WHERE advisory_class='2A'") or die(mysqli_error());
              while($f_query = $query->fetch_array()){
            ?>
            <tr>
              <td><?php echo $f_query['lastName']?></td>
              <td><?php echo $f_query['firstName']?></td>
              <td><?php echo $f_query['strand']?></td>
              <td><?php echo $f_query['advisory_class']?></td>
              <td><?php echo $f_query['subject']?></td>
              <td><?php echo $f_query['sex']?></td>
              <td><?php echo $f_query['email']?></td>
              <td><?php echo $f_query['contact_num']?></td>
              <td><?php echo $f_query['user_systemStatus']?></td>
              <td><button>See Information</button><button>Delete</button></td>
            </tr>
            <?php
              }
            ?>
          </tbody>
      </table>
  <h1>1P</h1>
  <table id = "table" class = "table-bordered">
          <thead>
            <tr>
              <th>Last Name</th>
              <th>First Name</th>
              <th>Strand</th>
              <th>Advisory Class</th>
              <th>Subject</th>
              <th>Sex</th>
              <th>Email</th>
              <th>Mobile Number</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            include_once "database/config.php";
              $query = $conn->query("SELECT * FROM `users` WHERE advisory_class='1P'") or die(mysqli_error());
              while($f_query = $query->fetch_array()){
            ?>
            <tr>
              <td><?php echo $f_query['lastName']?></td>
              <td><?php echo $f_query['firstName']?></td>
              <td><?php echo $f_query['strand']?></td>
              <td><?php echo $f_query['advisory_class']?></td>
              <td><?php echo $f_query['subject']?></td>
              <td><?php echo $f_query['sex']?></td>
              <td><?php echo $f_query['email']?></td>
              <td><?php echo $f_query['contact_num']?></td>
              <td><?php echo $f_query['user_systemStatus']?></td>
              <td><button>See Information</button><button>Delete</button></td>
            </tr>
            <?php
              }
            ?>
          </tbody>
      </table>
    </body>
    </html>