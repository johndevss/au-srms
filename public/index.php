<?php
    /*just render the page
    require_once "../database/config.php"; 
    require_once "../app/Controllers/AuthController.php";
    */

    // Check if the user is already logged in, if yes then redirect him to welcome page
    if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
        header("location: admin_dashboard.php");
        exit;
    }
 
    // Initialize variables
    $username = $password = "";
    $username_err = $password_err = $login_err = "";

    //handleLogin($conn, $username, $password, $username_err, $password_err, $login_err);
    
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" type="text/css" href="assets/css/main.css">
    <link rel="stylesheet" type="text/css" href="assets/css/index.css">
    <title>AU SRMS</title>
</head>
<body>

	<header>
        <span class="c1"><span class="c2"></span></span>
    </header>
    
    <div class="form">
        <img class="login-logo" src="assets/images/aulogo.png">
        <h2>Student Result Management System</h2>
        <hr> <br>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <input placeholder="Username" type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>"><br>
                <span class="invalid-feedback"><?php echo $username_err; ?></span>
            </div>    
            <br>
            <div class="form-group">
                <input placeholder="Password" type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>"> <br>
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
                <?php 
        if(!empty($login_err)){
            echo '<div class="invalid-feedback">' . $login_err . '</div>';
        }        
        ?>
            </div>
            <br>
            <div class="form-group">
                <input class="submit" type="submit" class="btn btn-primary" value="LOG IN">
            </div>
        </form>
    </div>
</body>
</html>