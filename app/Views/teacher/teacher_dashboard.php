<?php
require_once "../../../database/config.php";
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Public+Sans&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="/au-srms/public/assets/css/main.css">
  <link rel="stylesheet" type="text/css" href="/au-srms/public/assets/css/teacher_dashboard.css">
	<title>Admin</title>
</head>
<body>
	<div class="heading">
    <header>
      <img class="threeLines" src="/au-srms/public/assets/images/three_lines.png">
      <h1 class="text">Student Result Management System</h1>
    </header>
  </div>

  <div class="date">
		<h3><?php date_default_timezone_set("Asia/Singapore"); 
		echo date("F d, Y");?></h3>
		<?php echo date("h:iA");?>
  </div>

	<div class="navigation">
		<nav>
			<a style="text-decoration: none;" href="./teacher_dashboard.php">
			<img class="aulogo"; src="/au-srms/public/assets/images/aulogo.png"></a>
			<br> <br> <br>

        <ul class="nav">
        	<li>
        		<!--Dashboard-->
        		<a href="#">
        			<span class="active"><img class="active-icon" src="/au-srms/public/assets/images/four_squares.png" title="Dashboard"></span>
        		</a>
        	</li>
        	<li>
        		<!--list-->
        		<a href="./class_list.php">
        			<span class="icon"><img class="not-active" src="/au-srms/public/assets/images/list.png" title="Management"></span>
        		</a>
        	</li>
          <li>
            <!--logout-->
            <a href="/au-srms/public/logout.php">
              <span class="icon"><img class="not-active" src="/au-srms/public/assets/images/logout.png" title="Logout"></span>
            </a>
          </li>
        </ul>
        </nav>
    </div>
    <div class="content-heading"></div>
    <div class="content">
    	<h1>Announcements</h1>
      <table id = "table" class = "table-bordered">
        <tbody>
          <?php
            $query = $conn->query("SELECT * FROM `announcements` ") or die(mysqli_error());
            while($f_query = $query->fetch_array()){
          ?>
          <tr>
          <td><?php echo $f_query['announcement']?></td>
          </tr>
          <?php
            }
          ?>
        </tbody>
      </table>
    </div>
</body>
</html>