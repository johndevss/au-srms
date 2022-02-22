<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: admin_dashboard.php");
    exit;

}

 
// Include config file
require_once "database/config.php";
 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = $login_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT user_id, account_id, advisory_class, strand, subject_id, username, password, access_level FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $user_id, $account_id, $advisory_class, $strand, $subject_id, $username, $encrypted_password, $access_level);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $encrypted_password)){
                            // Password is correct, so start a new session
                            
                            // pag nakapasok na at ang access level ay 1 (admin yon)
                            if ($access_level == 1) {
                                
                            
                            session_start();
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $user_id = $_SESSION["user_id"] = $user_id;
                            $_SESSION["access_level"] = 1;
                            $_SESSION["username"] = $username;  

                            $log = "INSERT INTO activity_log (username, action) VALUES ('$username', '$username logged in')";
                            $res = mysqli_query($conn, $log);

                            $query = ("UPDATE `users` SET `user_systemStatus` = 'Online' WHERE `user_id` = '$user_id'") or die(mysqli_error()); 
                            if (mysqli_query($conn, $query)) {

                            // Redirect user to welcome page
                            header("location: admin_dashboard.php");
                        }
                    }

                        // pag 2 naman teacher lang at dalhin ito sa faculty page lang
                        if ($access_level == 2) {

                            session_start();
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["user_id"] = $user_id;
                            $_SESSION["advisory_class"] = $advisory_class;
                            $_SESSION["access_level"] = 2;
                            $_SESSION["username"] = $username;
                            $_SESSION["password"] = $password;
                            $_SESSION["strand"] = $strand;
                            $_SESSION["subject_id"] = $subject_id;

                             $log = "INSERT INTO activity_log (username, action) VALUES ('$username', '$username logged in')";
                            $res = mysqli_query($conn, $log);

                            $query = ("UPDATE `users` SET `user_systemStatus` = 'Online' WHERE `user_id` = '$user_id'") or die(mysqli_error()); 
                            if (mysqli_query($conn, $query)) {

                            header("location: teacher_dashboard.php");
                        }
                    }
                         // pag 0 naman student lang at dalhin ito sa user page lang
                        if ($access_level == 0) {

                            session_start();
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["account_id"] = $account_id;
                            $_SESSION["access_level"] = 2;
                            $_SESSION["username"] = $username;
                            $_SESSION["password"] = $password;

                             $log = "INSERT INTO activity_log (username, action) VALUES ('$username', '$username logged in')";
                            $res = mysqli_query($conn, $log);

                            $query = ("UPDATE `users` SET `user_systemStatus` = 'Online' WHERE `user_id` = '$user_id'") or die(mysqli_error()); 
                            if (mysqli_query($conn, $query)) {

                            header("location: student_dashboard.php");
                        }
                    }
                        
                        } else{
                            // Password is not valid, display a generic error message
                            $login_err = "Invalid username or password.";
                        }
                    }
                } else{
                    // Username doesn't exist, display a generic error message
                    $login_err = "Invalid username or password.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($conn);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Public+Sans&display=swap" rel="stylesheet"> 
<link rel="stylesheet" type="text/css" href="css/style.css">   
    <title>Login</title>
    <style>
    body {
        font-family: 'Public Sans', sans-serif;
        background-color: lightgray;
    }
    h2 {
        font-size: 30px;
    }
    input {
        width: 250px;
        background-color: #f4f4f4;
        padding: 10px;
        outline: none;
        border-radius: 10px;
    }
    .login-logo {
        width: 100px;
        height: 100px;
    }
    .c1 {
        background-color: #004EA8;
        height: 50px;
    }
    .c2 {
        position: relative; top: 12.5px;
        background-color: #DA291C;
        height: 25px;
    }
    .form {
        margin-top: 10%;
        margin-right: 25%;
        margin-left: 24.5%;
        width: 50%;
        text-align: center;
        background-color: white;
        border-radius: 20px;
        padding: 10px;
    }
    .submit {
        background-color: #004EA8;
        color: white;
        width: 25%;
    }
    .invalid-feedback {
        color: red;
    }
    </style>
</head>
<body>
	<div class="c1">
		<header class="c2"></header>
	</div>
    <div class="form">
        <img class="login-logo" src="images/aulogo.png">
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