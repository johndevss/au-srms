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
	<link rel="stylesheet" type="text/css" href="/au-srms/public/assets/css/addpersonnel.css">
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
			<a style="text-decoration: none;" href="./admin_dashboard.php">
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
						<span class="icon"><img class="not-active" src="/au-srms/public/assets/images/list.png" title="Management"></span>
					</a>
				</li>
				<li>
					<!--logout-->
					<a href="./logout.php">
						<span class="icon"><img class="not-active" src="/au-srms/public/assets/images/logout.png" title="Logout"></span>
					</a>
				</li>
			</ul>
        </nav>
    </div>
    
    <div class="main">
    <a href="teacher.php"><img class="back-btn" src="/au-srms/public/assets/images/left-arrow.png"></a>
		<h1 class="inner-heading">Faculty Management <img class="back-btn" style="position: relative;" src="/au-srms/public/assets/images/right-arrow.png"> Faculty Registration</h1>
		<p>Please fill in the required information for registration.</p>

	<!--eto ung nagcoconnect sa database-->
	<div class="input-container">
		<h1>Personal Information</h1>
		<form action="insert_personnel.php" method="POST">
			<!--eto yung tatlong kailangan para sa student-->
			<label for="firstName">First Name:</label>
			<input type="text" name="firstName" required=""> 
			<br> <br>
			<label for="middleName">Middle Name:</label>
			<input type="text" name="middleName" placeholder="Optional">
			<br> <Br>
			<label for="lastName">Last Name:</label>
			<input type="text" name="lastName" required=""> 
			<br> <br>
			<label>Sex:</label>
			<input type="radio" name="sex" required="" value="Male">Male <input type="radio" name="sex" required="" value="Female">Female <input type="radio" name="sex" required="" value="Other">Other
      <br> <br>
      <label>Birthday</label>
      <input type="date" name="bday">
      <br> <br>
            <!--dito ang email-->
			<label for="email">Email:</label>
			<input  type="email" name="email" id="email" required="">
			<br> <br>
			<!--dito ang mobile number ng teacher-->
			<label for="contact_num">Mobile:</label>
			<input type="text" name="contact_num" id="contact_num" required="" maxlength="11">
			<br> <br>
      <label>Mother's Name</label>
      <input type="text" name="stdnt_motherName" placeholder="Optional">
      <br> <br>
      <label>Mother's Contact Number:</label>
      <input type="text" name="motherContactNum" placeholder="Optional" maxlength="11">
      <br><br>
      <label>Father's Name</label>
      <input type="text" name="stdnt_fatherName" placeholder="Optional">
      <br> <br>
      <label>Father's Contact Number:</label>
      <input type="text" name="fatherContactNum" placeholder="Optional" maxlength="11">
      <br> <br>
      <label for="Strand">Strand</label>
      <select name="strand" required="">
        <option>---</option>
        <option  name="strand1" value="ICT">ICT</option>
        <option  name="strand2" value="STEM">STEM</option>
        <option  name="strand3" value="ABM">ABM</option>
        <option  name="strand4" value="GAS">GAS</option>
        <option  name="strand5" value="HUMSS">HUMSS</option>
      </select>
      <br> <br> 
			<label for="section">Advisory:</label>
        <select name="advisory_class" required="">
        <option>---</option>
        <option  name="advisory_class1" value="1A">1A</option>
        <option  name="advisory_class2" value="2A">2A</option>
        <option  name="advisory_class3" value="1P">1P</option>
    </select>
			<br> <br>
			<label>Subject:</label>
			<select name="subject_id" id="subject" required="">
        <option>---</option>
        <?php
        $query = $conn->query("SELECT * FROM `subjects`") or die(mysqli_error());
              while($f_query = $query->fetch_array()){
        echo '<option value ='.$f_query['subject_id'].'>'.$f_query['subject_name'].'</option>';    
        }    
        ?>
      </select>
			<br> <br>
			<label for="Username">Username:</label>
			<input  type="text" name="username" id="username" required="">
			<br> <br>
			<label for="Password">Password:</label>
			<input type="password" name="password" id="password" required="">
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