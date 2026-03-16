<?php
require_once __DIR__ . "/../../../database/config.php";
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/assets/css/main.css">
	<title>Admin</title>
</head>
<body>
	<div class="heading">
        <header>
            <img class="threeLines" src="/assets/images/three_lines.png">
            <h1 class="text">Student Result Management System</h1>
        </header>
    </div>

	<div class="navigation">
		<nav>
			<a style="text-decoration: none;" href="/">
			<img class="aulogo"; src="/assets/images/aulogo.png"></a>
			<br> <br> <br>

            <ul class="nav">
                <li>
                    <!--Dashboard-->
                    <a href="/">
                        <span class="icon"><img class="not-active" src="/assets/images/four_squares.png" title="Dashboard"></span>
                    </a>
                </li>
                <li>
                    <!--list-->
                    <a href="#">
                        <span class="active"><img class="active-icon" src="/assets/images/list.png" title="Management"></span>
                    </a>
                </li>
                <li>
                    <!--logout-->
                    <a href="/logout.php">
                        <span class="icon"><img class="not-active" src="/assets/images/logout.png" title="Logout"></span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>

    <div class="button">
        <a href="/?page=teacher" class="fac-btn">Manage Faculty</a><br>
        <a href="/?page=section" class="stdnt-btn">Manage Sections</a>
        <a href="/?page=subjects" class="stdnt-btn">Manage Subjects</a>
    </div>

</body>
</html>