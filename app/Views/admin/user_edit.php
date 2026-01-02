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
  <link rel="stylesheet" type="text/css" href="/au-srms/public/assets/css/user_edit.css">
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
              <span class="active"><img class="active-icon" src="/au-srms/public/assets/images/list.png" title="Management"></span>
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
    <a href="./section.php"><img class="back-btn" src="/au-srms/public/assets/images/left-arrow.png"></a>
    <h1 class="inner-heading">Edit Information</h1>
    <main>
      <div>
        <h2>Update Information</h2>
        <?php
            $acc_query = $conn->query("SELECT * FROM `users` WHERE user_id = '$_REQUEST[user_id]'") or die(mysqli_error());
            $acc_fetch = $acc_query->fetch_array();
        ?>
            <form action="../../../app/Controllers/InsertController.php" method="POST">
            <input type="hidden" name="action" value="userEditInsert">
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
