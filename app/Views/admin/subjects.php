<?php
// Initialize the session
require_once __DIR__ . "/../../../database/config.php";
 
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Public+Sans&display=swap" rel="stylesheet">
  <script src="https://use.fontawesome.com/3238bf45aa.js"></script>
  <link rel="stylesheet" type="text/css" href="/assets/css/main.css">
  <link rel="stylesheet" type="text/css" href="/assets/css/subjects.css">
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
            <a href="/?page=list">
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

  <div class="main">
  <a href="/?page=list"><img class="back-btn" src="/assets/images/left-arrow.png"></a>
  <h1 class="inner-heading">Subjects Management</h1>
  <main>
    <div class="tables">
      <a href="/?page=addsubject"><button>Add Subjects</button></a> <br> <br>
      <table id = "table" class = "subjectsTable">
        <thead>
          <tr>
            <th>Subjects</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
              $query = $conn->query("SELECT * FROM `subjects`") or die(mysqli_error($conn));
              while($f_query = $query->fetch_array()){
          ?>
            <tr>
              <td><?php echo $f_query['subject_name']?></td>
              <td>
                <a href=""><button>See Faculty</button></a>
                <a href=""><button>Add Student</button></a>
                <a href=""><button>Edit Subject</button></a>
              </td>
            </tr>
            <?php
              }
            ?>
          </tbody>
      </table>
</main>
</div>

</body>
</html>
