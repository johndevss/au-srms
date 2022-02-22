<?php

session_start();
require_once "database/config.php";

$username = $_POST['username'];
$password = $_POST['password'];


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>

	<form action="phplesson.php" method="POST">
		<label>Username:</label>
		<input type="text" name="username">
		<label>Password:</label>
		<input type="password" name="password">
		<input type="submit">
	</form>
	<br>
</body>
</html>