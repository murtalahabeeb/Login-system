<?php
session_start();
include_once("dbconect2.php");


if(isset($_GET["id"])){
	$id=$_GET["id"];
	$query1="SELECT * from users where userid='$id'";
	$send=mysqli_query($conn,$query1);
	$resultcheck=mysqli_num_rows($send);
	if($resultcheck==1){
		$row=mysqli_fetch_assoc($send);

	}
}
if(isset($_POST["update"])){
	$username=mysqli_real_escape_string($conn,$_POST["firstname"]);
	$lastname=mysqli_real_escape_string($conn,$_POST["lastname"]);
	$email=mysqli_real_escape_string($conn,$_POST["email"]);
	$password=mysqli_real_escape_string($conn,password_hash($_POST["password"], PASSWORD_DEFAULT));
	
	
	$query2="UPDATE users set firstname='$username',lastname='$lastname',email='$email',password='$password' where userid ='$id'";
	$submit=mysqli_query($conn,$query2);
	if($submit){
		$_SESSION["mgs"]="update successfull";
		header("Location:viewusers.php?update=success");
		exit();
	}
	else{
		$_SESSION["mgs"]="update failed";
		header("Location:viewuser.php?update=failed");
		exit();
	}
}
	

?>

<!DOCTYPE html>
<html>
<head>
	<title>Update</title>
</head>
<body>
	<form method="POST" action="update.php?id=<?php echo $id; ?>">
		
		<input type="text" name="firstname" placeholder="firstname" value=<?php echo $row["firstname"]; ?>><br>
		<input type="text" name="lastname" placeholder="lastname" value=<?php echo $row["lastname"]; ?>><br>
		<input type="text" name="email" placeholder="email" value=<?php echo $row["email"]; ?>><br>

		<input type="password" name="password" placeholder="password" value=<?php echo $row["password"]; ?>><br>
		<input type="submit" name="update" value="update">
	</form>
</body>
</html>