<?php

    require_once "../database/config.php"; 

    function handleLogin(&$conn, &$username, &$password, &$username_err, &$password_err, &$login_err) {
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
                                                                    
                                    // Store data in session variables
                                    $_SESSION["loggedin"] = true;
                                    $user_id = $_SESSION["user_id"] = $user_id;
                                    $_SESSION["access_level"] = 1;
                                    $_SESSION["username"] = $username;  


                                    $query = ("UPDATE `users` SET `user_systemStatus` = 'Online' WHERE `user_id` = '$user_id'") or die(mysqli_error($conn)); 
                                    if (mysqli_query($conn, $query)) {

                                    // Redirect user to welcome page
                                    header("Location: /");
                                }
                            }

                                // pag 2 naman teacher lang at dalhin ito sa faculty page lang
                                if ($access_level == 2) {

                                    // Store data in session variables
                                    $_SESSION["loggedin"] = true;
                                    $_SESSION["user_id"] = $user_id;
                                    $_SESSION["advisory_class"] = $advisory_class;
                                    $_SESSION["access_level"] = 2;
                                    $_SESSION["username"] = $username;
                                    $_SESSION["password"] = $password;
                                    $_SESSION["strand"] = $strand;
                                    $_SESSION["subject_id"] = $subject_id;

                                    $query = ("UPDATE `users` SET `user_systemStatus` = 'Online' WHERE `user_id` = '$user_id'") or die(mysqli_error($conn)); 
                                    if (mysqli_query($conn, $query)) {

                                    header("Location: /");
                                }
                            }
                                // pag 0 naman student lang at dalhin ito sa user page lang
                                if ($access_level == 0) {

                                    // Store data in session variables
                                    $_SESSION["loggedin"] = true;
                                    $_SESSION["account_id"] = $account_id;
                                    $_SESSION["access_level"] = 0;
                                    $_SESSION["username"] = $username;
                                    $_SESSION["password"] = $password;

                                    $log = "INSERT INTO activity_log (username, action) VALUES ('$username', '$username logged in')";
                                    $res = mysqli_query($conn, $log);

                                    $query = ("UPDATE `users` SET `user_systemStatus` = 'Online' WHERE `user_id` = '$user_id'") or die(mysqli_error($conn)); 
                                    if (mysqli_query($conn, $query)) {

                                    header("Location: /");
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
    }

    function handleLogout($conn) {
    if (isset($_SESSION["user_id"])) {
        $user_id = $_SESSION["user_id"];
        $query = "UPDATE `users` SET `user_systemStatus` = 'Offline' WHERE `user_id` = '$user_id'";
        mysqli_query($conn, $query);
    }
    $_SESSION = [];
    session_destroy();
    header("Location: /");
    exit;
}

?>
