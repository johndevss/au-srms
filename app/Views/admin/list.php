<?php
require_once "../../../database/config.php";
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/au-srms/public/assets/css/main.css">
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
                    <a href="#">
                        <span class="active"><img class="active-icon" src="/au-srms/public/assets/images/list.png" title="Management"></span>
                    </a>
                </li>
                <li>
                    <!--logout-->
                    <a href="logout.php">
                        <span class="icon"><img class="not-active" src="/au-srms/public/assets/images/logout.png" title="Logout"></span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>

    <div class="button">
        <a href="teacher.php" class="fac-btn">Manage Faculty</a><br>
        <a href="section.php" class="stdnt-btn">Manage Sections</a>
        <a href="subjects.php" class="stdnt-btn">Manage Subjects</a>
    </div>

</body>
</html>