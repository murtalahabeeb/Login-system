<?php
include_once("dbconect2.php");
if(isset($_POST["login"])){
	$username=$_POST["username"];
	$password=$_POST["password"];
	//validations
	
	//send to database
	$query1="SELECT * from users where firstname='$username' OR email='$username' ";
	$send=mysqli_query($conn,$query1);
	$resultcheck=mysqli_num_rows($send);
	if($resultcheck<1){
		header("Location:login.php?login=user not found");
		exit();
	}
	else{
		if($row=mysqli_fetch_assoc($send)){
		$hash=$row['password'];
		$unhash=password_verify($password, $hash);
		if($unhash==false){
			header("Location:login.php");
			exit();
		}else{
			header("Location:dashboard.php");
			exit();
		}	
		
	}

	
	
}
}


?>

<!DOCTYPE html>
<html>
<head>
	<title>login</title>
</head>
<body>
	<form method="POST" action="login.php">
		<input type="text" name="username" placeholder="Username or email"><br>
		<input type="pasword" name="password" placeholder="password"><br>
		<input type="submit" name="login" value="login">
	</form>

</body>
</html>