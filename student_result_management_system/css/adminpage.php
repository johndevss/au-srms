<?php
// Initialize the session
session_start();

include_once "database/config.php";



// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;    

}

   //checks if the user is admin or not
    if (!isset($_SESSION['access_level']) || ($_SESSION['access_level'] != 1)) {
    header('Location: dashboard_student.php');
    exit;
  }

?>




<!DOCTYPE html>
<html lang="en" dir="ltr">
  
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/adminstyle.css">
    <script src="https://kit.fontawesome.com/5150f4be38.js" crossorigin="anonymous"></script>
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body> 
 <div class="sidebar close">
   <div class="logo-details">
   <i class="far fa-clipboard"></i>
   <span class="logo_name">Dashboard</span>
 </div>
    
<ul class="nav-links">
<li>
  <div class="iocn-link">
   <a href="#">
   <i class="far fa-plus-square"></i>
   <span class="link_name">Add</span>
   </a>
   <i class='bx bxs-chevron-down arrow' ></i>
  </div>
        
<ul class="sub-menu">
   <li><a class="link_name" href="#">Add</a></li>
   <li><a href="addstudent.php">Student</a></li>
   <li><a href="addpersonnel.php">Faculty</a></li>
   <li><a href="subjects.php">Subjects</a></li>
</ul>
</li>
      
<li>
  <a href="teacher.php">
    <i class="fas fa-chalkboard-teacher"></i>
    <span class="link_name">Faculty Management</span>
  </a>
        
  <ul class="sub-menu blank">
    <li><a class="link_name" href="#">Faculty Management</a></li>
  </ul>
</li>
    
<li>
  <a href="section.php">
    <i class="fas fa-user-friends"></i>
    <span class="link_name">Section Management</span>
  </a>
        
  <ul class="sub-menu blank">
    <li><a class="link_name" href="#">Section Management</a></li>
  </ul>
</li>
      

<li>
    <div class="profile-details">
      <div class="profile-content">
      </div>
      <div class="name-job">
        <div class="profile_name">Admin</div>
        <div class="job"></div>
      </div>
      <a href="logout.php"><i class='bx bx-log-out' ></i></a>

    </div>
  </li>
</ul>
  </div>
   
    <section class="home-section">

<div class="home-content">
    <i class='bx bx-menu' ></i>
    <span class="text">Student Result Management System</span>
</div>
</section>

<script>
  let arrow = document.querySelectorAll(".arrow");
  for (var i = 0; i < arrow.length; i++) {
    arrow[i].addEventListener("click", (e)=>{
   let arrowParent = e.target.parentElement.parentElement;//selecting main parent of arrow
   arrowParent.classList.toggle("showMenu");
    });
  }
  let sidebar = document.querySelector(".sidebar");
  let sidebarBtn = document.querySelector(".bx-menu");
  console.log(sidebarBtn);
  sidebarBtn.addEventListener("click", ()=>{
    sidebar.classList.toggle("close");
  });
</script>
</body>
</html>