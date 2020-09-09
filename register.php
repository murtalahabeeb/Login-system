<?php
session_start();
include_once("dbconect2.php");
if(isset($_POST["register"])){
	$firstname=mysqli_real_escape_string($conn,$_POST["firstname"]);
	$lastname=mysqli_real_escape_string($conn,$_POST["lastname"]);
	$email=mysqli_real_escape_string($conn,$_POST["email"]);
	$password=mysqli_real_escape_string($conn,password_hash($_POST["password"], PASSWORD_DEFAULT));
	
	
	$query2="INSERT into users (firstname,lastname,email,password)VALUES('$firstname','$lastname','$email','$password')";
	$submit=mysqli_query($conn,$query2);
	if($submit){
		$_SESSION["mgs"]="Registration successfull";
		header("Location:dashboard.php?update=success");
		exit();
	}
	else{
		$_SESSION["mgs"]="Registration failed";
		header("Location:register.php?update=failed");
		exit();
	}
}
	

?>

<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
</head>
<body>
	<form method="POST" action="register.php">
		
		<input type="text" name="firstname" placeholder="firstname" ><br>
		<input type="text" name="lastname" placeholder="lastname"><br>
		<input type="text" name="email" placeholder="email"><br>

		<input type="password" name="password" placeholder="password" ><br>
		<input type="submit" name="register" value="register">
	</form>
</body>
</html>