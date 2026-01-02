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
  <script src="https://use.fontawesome.com/3238bf45aa.js"></script>
  <link rel="stylesheet" type="text/css" href="/au-srms/public/assets/css/main.css">
  <link rel="stylesheet" type="text/css" href="/au-srms/public/assets/css/addsubject.css">
  <title>Admin</title>
</head>
<body>
  <div class="heading">
    <header>
      <img class="threeLines" src="/au-srms/public/assets/images/three_lines.png">
      <h1 class="text">Student Result Management System</h1>
    </header>
  </div>

  <div class="navigation">
    <nav>
      <a style="text-decoration: none;" href="admin_dashboard.php">
      <img class="aulogo"; src="/au-srms/public/assets/images/aulogo.png"></a>
      <br> <br> <br>

        <ul class="nav">
          <li>
            <!--Dashboard-->
            <a href="./admin_dashboard.php">
              <span class="icon"><img class="not-active" src="/au-srms/public/assets/images/four_squares.png" title="Dashboard"></span>
            </a>
          </li>
          <li>
            <!--list-->
            <a href="./list.php">
              <span class="active"><img class="active-icon" src="/au-srms/public/assets/images/list.png" title="Management"></span>
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

    <div class="main">
      <a href="./list.php"><img class="back-btn" src="/au-srms/public/assets/images/left-arrow.png"></a>
      <h1 class="inner-heading">Subjects Management <img class="back-btn" style="position: relative;" src="/au-srms/public/assets/images/right-arrow.png"> Add a Subject</h1>
      <p>Please put a name for the subject.</p>
        <br>  
        <form action="../../../app/Controllers/InsertController.php" method="POST">
        <input type="hidden" name="action" value="insertSubject">
        <label>Subject name</label>
        <input type="text" name="subject_name" required="">
        <button type="submit">Add subject</button>
      </form>
</body>
</html>
